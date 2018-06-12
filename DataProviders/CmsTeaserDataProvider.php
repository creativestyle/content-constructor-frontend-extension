<?php

namespace Creativestyle\ContentConstructorFrontendExtension\DataProviders;

class CmsTeaserDataProvider implements \Creativestyle\ContentConstructor\Components\CmsTeaser\DataProvider
{
    /**
     * @var \Magento\Cms\Model\ResourceModel\Page\CollectionFactory
     */
    private $cmsPageCollectionFactory;
    /**
     * @var \Creativestyle\CmsTagManagerExtension\Service\Mapper\CmsPageDataMapper
     */
    private $cmsPageDataMapper;

    public function __construct(
        \Magento\Cms\Model\ResourceModel\Page\CollectionFactory $cmsPageCollectionFactory,
        \Creativestyle\CmsTagManagerExtension\Service\Mapper\CmsPageDataMapper $cmsPageDataMapper
    )
    {
        $this->cmsPageCollectionFactory = $cmsPageCollectionFactory;
        $this->cmsPageDataMapper = $cmsPageDataMapper;
    }

    /**
     * @param array $configuration
     * @return array
     */
    public function getPages($configuration)
    {
        $tagsArray = explode(',', $configuration['tags']);

        $limit = ($configuration['limit'] != 1000) ? $configuration['limit'] : null;

        $cmsCollection = $this->cmsPageCollectionFactory->create();
        $cmsCollection
            ->setOrder('creation_time', 'DESC')
            ->setPageSize($limit)
            ->addFieldToFilter('cms_page_tags', ['in' => $tagsArray]);

        $pagesData = [];
        foreach ($cmsCollection as $page) {
            $pagesData[] = $this->cmsPageDataMapper->mapPage($page);
        }

        return $pagesData;
    }
}