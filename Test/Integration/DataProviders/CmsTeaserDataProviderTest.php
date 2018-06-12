<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Test\Integration\DataProviders;

class CmsTeaserDataProviderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\DataProviders\CmsTeaserDataProvider
     */
    private $dataProvider;

    public function setUp() {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->dataProvider = $this->objectManager
            ->get(\Creativestyle\ContentConstructorFrontendExtension\DataProviders\CmsTeaserDataProvider::class);
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoDataFixture loadPages
     */
    public function testItReturnsCorrectCategoriesStructure() {
        $result = $this->dataProvider->getPages($this->getDummyConfiguration());

        $this->assertCount(4, $result);

        foreach ($result as $pageData) {
            $this->assertArrayHasKey('headline', $pageData);
            $this->assertArrayHasKey('href', $pageData);
            $this->assertArrayHasKey('image', $pageData);
            $this->assertArrayHasKey('src', $pageData['image']);
            $this->assertArrayHasKey('srcSet', $pageData['image']);
        }
    }

    public static function loadPages() {
        include __DIR__.'/_files/pages.php';
    }

    protected function getDummyConfiguration()
    {
        return [
            'limit' => 8,
            'tags' => 'second,double tag'
        ];
    }
}