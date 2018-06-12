<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Test\Unit\Block;

class StaticBlockTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\Block\StaticBlock
     */
    private $block;

    public function setUp()
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->block = $this->objectManager->get(\Creativestyle\ContentConstructorFrontendExtension\Block\StaticBlock::class);
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Component::class, $this->block);
    }
}