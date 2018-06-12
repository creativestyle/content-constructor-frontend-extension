<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Service;

class UrlResolver implements \Creativestyle\ContentConstructor\Service\UrlResolver
{

    protected $classesToTypes = [
        'Magento\Catalog\Block\Category\Widget\Link' => self::TYPE_CATEGORY,
        'Magento\Catalog\Block\Product\Widget\Link' => self::TYPE_PRODUCT,
        'Magento\Cms\Block\Widget\Page\Link' => self::TYPE_PAGE
    ];

    const TYPE_CATEGORY = 'category';
    const TYPE_PRODUCT = 'product';
    const TYPE_PAGE = 'page';
    const TYPE_DIRECT = 'direct';

    /**
     * @var \Magento\Catalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var \Magento\Catalog\Api\CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Cms\Api\PageRepositoryInterface
     */
    protected $pageRepository;

    /**
     * @var string Current store URL
     */

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->urlBuilder = $urlBuilder;
        $this->pageRepository = $pageRepository;
    }

    /**
     * Returns URL for entities (product, category, cms page) using identifier
     * @var $resourceIdentifier identifier, example: {{widget type="Magento\Catalog\Block\Product\Widget\Link" template="product/widget/link/link_block.phtml" id_path="product/106101"}}
     */
    public function resolve(string $resourceIdentifier)
    {
        if($this->isDirectUrl($resourceIdentifier)) {
            return $resourceIdentifier;
        }

        $type = $this->getEntityType($resourceIdentifier);
        $id = $this->getEntityId($resourceIdentifier, $type);

        $functionName = 'get'.ucfirst($type).'Url';

        return $this->$functionName($id);
    }

    protected function isDirectUrl(string $resourceIdentifier) {
        return !preg_match('/{{widget .*?}}/si', $resourceIdentifier);
    }

    protected function getProductUrl($id) {
        $product = $this->productRepository->getById($id);

        return $product->getUrlModel()->getUrl($product);
    }

    protected function getCategoryUrl($id) {
        return $this->categoryRepository->get($id)->getUrl();
    }

    protected function getPageUrl($id) {
        $page = $this->pageRepository->getById($id);

        return $this->urlBuilder->getUrl(null, ['_direct' => $page->getIdentifier()]);
    }

    public function getEntityId($string, $type)
    {
        if($type == self::TYPE_PAGE) {
            return $this->getPageId($string);
        }

        return $this->getProductOrCategoryId($string, $type);
    }

    public function getEntityType($string) {
        if($this->isDirectUrl($string)) {
            return self::TYPE_DIRECT;
        }

        preg_match_all('/type="(?<class>.+?)"/si', $string, $results, PREG_PATTERN_ORDER);

        $class = $results['class'][0];

        return $this->classesToTypes[$class];
    }

    protected function getPageId($string)
    {
        preg_match_all('/page_id="(?<id>[0-9]+)"/', $string, $results, PREG_PATTERN_ORDER);
        return $results['id'][0];
    }

    protected function getProductOrCategoryId($string, $type)
    {
        preg_match_all('/' . $type . '\/(?<id>[0-9]+)/si', $string, $results, PREG_PATTERN_ORDER);
        return $results['id'][0];
    }
}