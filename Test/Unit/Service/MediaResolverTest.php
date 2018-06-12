<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Test\Unit\Service;

class MediaResolverTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Framework\App\Filesystem\DirectoryList
     */
    protected $directoryListStub;

    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    private $objectManager;

    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\Service\MediaResolver
     */
    private $mediaResolver;

    public function setUp()
    {
        $this->objectManager = \Magento\TestFramework\ObjectManager::getInstance();

        $this->directoryListStub = $this
            ->getMockBuilder(\Magento\Framework\App\Filesystem\DirectoryList::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->mediaResolver = $this->objectManager->create(
            \Creativestyle\ContentConstructorFrontendExtension\Service\MediaResolver::class,
            ['directoryList' => $this->directoryListStub]
        );
    }

    public function testItImplementsMediaResolverInterface()
    {
        $this->assertInstanceOf(\Creativestyle\ContentConstructor\Service\MediaResolver::class, $this->mediaResolver);
    }

    public function testItCorrectlyResolvesMediaPath()
    {
        $this->assertEquals(
            'http://localhost/pub/media/wysiwyg/test.png',
            $this->mediaResolver->resolve('{{media url="wysiwyg/test.png"}}')
        );
    }

    public function testItCorrectlyResolvesSrcSet()
    {
        $wysiwygUploadDirectoryPath = realpath(__DIR__ . '/../assets');

        $this->directoryListStub->method('getPath')->willReturn($wysiwygUploadDirectoryPath);

        $this->assertEquals(
            'http://localhost/pub/media/wysiwyg/test.jpg 1920w, http://localhost/pub/media/wysiwyg/.thumbs/480/test.jpg 480w, http://localhost/pub/media/wysiwyg/.thumbs/768/test.jpg 768w',
            $this->mediaResolver->resolveSrcSet('{{media url="wysiwyg/test.jpg"}}')
        );
    }

    public function testItCorrectlyResolvesSrcSetByDensity()
    {
        $wysiwygUploadDirectoryPath = realpath(__DIR__ . '/../assets');

        $this->directoryListStub->method('getPath')->willReturn($wysiwygUploadDirectoryPath);

        $this->assertEquals(
            'http://localhost/pub/media/wysiwyg/.thumbs/480/test.jpg, http://localhost/pub/media/wysiwyg/.thumbs/960/test.jpg 2x',
            $this->mediaResolver->resolveSrcSetByDensity('{{media url="wysiwyg/test.jpg"}}')
        );
    }

    public function testItReturnsEmptySrcSetWhenFileDoesNotExist()
    {
        $wysiwygUploadDirectoryPath = realpath(__DIR__ . '/../assets');

        $this->directoryListStub->method('getPath')->willReturn($wysiwygUploadDirectoryPath);

        $this->assertEquals(
            '',
            $this->mediaResolver->resolveSrcSet('{{media url="wysiwyg/not_existing.jpg"}}')
        );
    }

}