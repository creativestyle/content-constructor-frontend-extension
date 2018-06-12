<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Test\Unit\Block;

class ComponentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\Block\Component
    */
    private $block;

    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructor\Component|\PHPUnit_Framework_MockObject_MockObject
     */
    private $componentStub;

    /**
     * @var \Creativestyle\ContentConstructor\Factory\ComponentFactory|\PHPUnit_Framework_MockObject_MockObject
     */
    private $componentFactoryStub;

    public function setUp() {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->componentStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Component::class)->getMock();
        $this->componentFactoryStub = $this->getMockBuilder(\Creativestyle\ContentConstructor\Factory\ComponentFactory::class)->getMock();

        $this->block = $this->objectManager->create(
            \Creativestyle\ContentConstructorFrontendExtension\Block\Component::class,
            ['componentFactory' => $this->componentFactoryStub]
        );
    }

    public function testItImplementsBlockInterface() {
        $this->assertInstanceOf(\Magento\Framework\View\Element\BlockInterface::class, $this->block);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionWhenNoTypeIsPassed() {
        $this->block->toHtml();
    }

    public function testItShowsHeadlineComponent() {
        $this->componentStub->method('render')->willReturn('rendered_component_data');
        $this->componentFactoryStub->method('create')->willReturn($this->componentStub);

        $this->block->setData([
            'type' => 'headline',
            'data' => [
                'tag' => 'h1',
                'title' => 'Main',
                'subtitle' => 'Sub'
            ]
        ]);

        $htmlOutput = $this->block->toHtml();

        $this->assertEquals('rendered_component_data', $htmlOutput);
    }
}