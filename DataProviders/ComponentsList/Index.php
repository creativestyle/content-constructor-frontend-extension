<?php

namespace Creativestyle\ContentConstructorFrontendExtension\DataProviders\ComponentsList;

class Index
{
    use GetDataProviderBlocks;

    public function __construct()
    {
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'LIST OF COMPONENTS',
                    'subtitle' => '',
                ]
            ]
        ];

        # ===== HERO CARUSEL ===== #
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Hero carousel Large',
                '_path' => 'contentconstructor/components/index/page/herocarousel-large'
            ]
        ];

        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Hero carousel Slider',
                '_path' => 'contentconstructor/components/index/page/herocarousel-slider'
            ]
        ];

        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Hero carousel Hidden',
                '_path' => 'contentconstructor/components/index/page/herocarousel-hidden'
            ]
        ];

        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'separator',
                'data' => []
            ]
        ];

        # ===== IMAGE TEASERS ===== #
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Image Teaser Window width',
                '_path' => 'contentconstructor/components/index/page/itwindowwidth'
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Image Teaser Container width',
                '_path' => 'contentconstructor/components/index/page/itcontainerwidth'
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Image Teaser Window width slider',
                '_path' => 'contentconstructor/components/index/page/itwindowwidthslider'
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Image Teaser Content width slider',
                '_path' => 'contentconstructor/components/index/page/itcontentwidthslider'
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'separator',
                'data' => []
            ]
        ];

        # ===== PRODUCT GRIDS ===== #
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Product Grid without Hero',
                '_path' => 'contentconstructor/components/index/page/productgridnohero'
            ],
        ];
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Product Grid with left Hero',
                '_path' => 'contentconstructor/components/index/page/productgridheroleft'
            ],
        ];
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Product Grid with right Hero',
                '_path' => 'contentconstructor/components/index/page/productgridheroright'
            ],
        ];
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'separator',
                'data' => []
            ]
        ];

        # ===== PARAGRAPHS ===== #
        $this->blocks[] = [
            '_type' => '\Magento\Cms\Block\Widget\Page\Link',
            '_template' => 'widget/link/link_block.phtml',
            '_data' => [
                'section' => 'content',
                'anchor_text' => 'Paragraph',
                '_path' => 'contentconstructor/components/index/page/paragraph'
            ],
        ];

        # ===== Product carousel ===== #
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'Product carousel',
                ]
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'id' => 'component8ed5',
                'section' => 'content',
                'type' => 'product-carousel',
                'data' => [
                    'category_id' => '2',
                    'order_by' => 'price',
                    'order_type' => 'ASC',
                    'limit' => '20',
                ],
            ],
        ];

        # ===== Brand carousel ===== #
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'Brand carousel',
                ]
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'id' => 'componentb3b2',
                'section' => 'content',
                'type' => 'brand-carousel',
                'data' => [],
            ],
        ];

        # ===== Button ===== #
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'Button',
                ]
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'id' => 'component332d',
                'section' => 'content',
                'type' => 'button',
                'data' => [
                    'label' => 'Go to the list page',
                    'target' => '',
                ],
            ],
        ];

        # ===== Category links ===== #
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'Category links',
                ]
            ]
        ];
        $this->blocks[] = [
            '_type' => '\Creativestyle\ContentConstructorFrontendExtension\Block\Component',
            '_data' => [
                'id' => 'component91a3',
                'section' => 'content',
                'type' => 'category-links',
                'data' => [
                    'main_category_id' => '2',
                    'sub_categories_ids' => '',
                    'shownumbers' => '1',
                    'main_category_labels' => [
                        0 => 'Women',
                        'length' => '1',
                        'prevObject' => [
                            0 => [
                                'jQuery1124019406504422772541' => '444',
                            ],
                            'context' => [
                                'jQuery1124019406504422772541' => '444',
                            ],
                            'length' => '1',
                        ],
                        'context' => [
                            'jQuery1124019406504422772541' => '444',
                        ],
                    ],
                    'sub_categories_labels' => [],
                ],
            ],
        ];

    }
}