<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Test\Unit\Service;

class ComponentFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructor\Factory\ComponentFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    private $factory;

    public function setUp() {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->factory = $this->objectManager->get(\Creativestyle\ContentConstructorFrontendExtension\Service\ComponentFactory::class);
    }

    public function testItImplementsComponentFactoryInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Factory\ComponentFactory::class, $this->factory);
    }

    public function testItReturnsNullWhenComponentDoesNotExists() {
        $createdComponent = $this->factory->create('not_existing_component');

        $this->assertNull($createdComponent);
    }

    /**
     * @dataProvider getComponents
     */
    public function testItReturnsComponentsProperly($componentName, $expectedClass) {
        $createdComponent = $this->factory->create($componentName);

        $this->assertInstanceOf($expectedClass, $createdComponent);
    }

    public function getComponents() {
        return [
            ['headline', \Creativestyle\ContentConstructor\Components\Headline\Headline::class],
            ['static-cms-block', \Creativestyle\ContentConstructorFrontendExtension\Block\StaticBlock::class],
            ['paragraph', \Creativestyle\ContentConstructorFrontendExtension\Block\Paragraph::class],
            ['navigation', \Creativestyle\ContentConstructor\Components\Navigation\Navigation::class],
            ['product-carousel', \Creativestyle\ContentConstructor\Components\ProductCarousel\ProductCarousel::class],
            ['hero-carousel', \Creativestyle\ContentConstructor\Components\HeroCarousel\HeroCarousel::class],
            ['brand-carousel', \Creativestyle\ContentConstructor\Components\BrandCarousel\BrandCarousel::class],
            ['image-teaser', \Creativestyle\ContentConstructor\Components\ImageTeaser\ImageTeaser::class],
            ['button', \Creativestyle\ContentConstructor\Components\Button\Button::class],
            ['category-links', \Creativestyle\ContentConstructor\Components\CategoryLinks\CategoryLinks::class],
            ['separator', \Creativestyle\ContentConstructor\Components\Separator\Separator::class],
            ['product-grid', \Creativestyle\ContentConstructor\Components\ProductGrid\ProductGrid::class],
            ['custom-html', \Creativestyle\ContentConstructor\Components\CustomHtml\CustomHtml::class],
            ['cms-teaser', \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaser::class]
        ];
    }
}