<?php

namespace Creativestyle\ContentConstructorFrontendExtension\DataProviders;

class ButtonDataProvider implements \Creativestyle\ContentConstructor\Components\Button\DataProvider
{
    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\Service\UrlResolver
     */
    private $urlResolver;

    /**
     * @var \Magento\Catalog\Api\CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\Helper\Category
     */
    private $categoryHelper;

    public function __construct(
        \Creativestyle\ContentConstructorFrontendExtension\Service\UrlResolver $urlResolver,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Creativestyle\ContentConstructorFrontendExtension\Helper\Category $categoryHelper
    )
    {
        $this->urlResolver = $urlResolver;
        $this->categoryRepository = $categoryRepository;
        $this->categoryHelper = $categoryHelper;
    }

    public function addCategoryInformation($buttonConfiguration)
    {
        if(!isset($buttonConfiguration['target'])) {
            return $buttonConfiguration;
        }

        if($this->urlResolver->getEntityType($buttonConfiguration['target']) == \Creativestyle\ContentConstructorFrontendExtension\Service\UrlResolver::TYPE_CATEGORY) {
            try {
                $categoryId = $this->urlResolver->getEntityId($buttonConfiguration['target'], \Creativestyle\ContentConstructorFrontendExtension\Service\UrlResolver::TYPE_CATEGORY);
                $category = $this->categoryRepository->get($categoryId);
                $buttonConfiguration['number_of_products'] = $this->categoryHelper->getNumberOfProducts($category);
            }
            catch(\Magento\Framework\Exception\NoSuchEntityException $exception) {}
        }

        return $buttonConfiguration;
    }
}