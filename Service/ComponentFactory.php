<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Service;

class ComponentFactory implements \Creativestyle\ContentConstructor\Factory\ComponentFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    private $objectManager;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    private $classMappings = [
        'headline' => \Creativestyle\ContentConstructor\Components\Headline\Headline::class,
        'static-cms-block' => \Creativestyle\ContentConstructorFrontendExtension\Block\StaticBlock::class,
        'paragraph' => \Creativestyle\ContentConstructorFrontendExtension\Block\Paragraph::class,
        'navigation' => \Creativestyle\ContentConstructor\Components\Navigation\Navigation::class,
        'product-carousel' => \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarousel::class,
        'hero-carousel' => \Creativestyle\ContentConstructor\Components\HeroCarousel\HeroCarousel::class,
        'brand-carousel' => \Creativestyle\ContentConstructor\Components\BrandCarousel\BrandCarousel::class,
        'image-teaser' => \Creativestyle\ContentConstructor\Components\ImageTeaser\ImageTeaser::class,
        'button' => \Creativestyle\ContentConstructor\Components\Button\Button::class,
        'category-links' => \Creativestyle\ContentConstructor\Components\CategoryLinks\CategoryLinks::class,
        'separator' => \Creativestyle\ContentConstructor\Components\Separator\Separator::class,
        'product-grid' => \Creativestyle\ContentConstructor\Components\ProductGrid\ProductGrid::class,
        'magento-product-grid-teasers' => \Creativestyle\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasers::class,
        'custom-html' => \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtml::class,
        'cms-teaser' => \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaser::class
    ];

    /**
     * @param $componentName
     * @param $classOverrides
     * @return \Creativestyle\ContentConstructor\Component
     */
    public function create(string $componentName, $classOverrides = [])
    {
        if(!isset($this->classMappings[$componentName])) {
            return null;
        }

        $classOverrides = $this->getClassOverrides($classOverrides);

        return $this->objectManager->create($this->classMappings[$componentName], $classOverrides);
    }

    /**
     * Converts class names to objects for overriding in component factory
     * @param $componentData
     * @return array
     */
    protected function getClassOverrides($classOverrides) {
        if(!is_array($classOverrides) or empty($classOverrides)) {
            return [];
        }

        foreach($classOverrides as $constructorFieldName => $className) {
            if(empty($className)) {
                unset($classOverrides[$constructorFieldName]);
                continue;
            }

            $classOverrides[$constructorFieldName] = $this->objectManager->create($className);
        }

        return $classOverrides;
    }
}