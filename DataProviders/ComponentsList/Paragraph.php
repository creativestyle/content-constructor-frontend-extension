<?php

namespace Creativestyle\ContentConstructorFrontendExtension\DataProviders\ComponentsList;

class Paragraph
{
    use GetDataProviderBlocks;

    public function __construct()
    {

        $this->blocks = [
            0 => [
                'id' => 'component048f',
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'Full width',
                    'subtitle' => '',
                ],
            ],
            1 => [
                'id' => 'component17ed',
                'section' => 'content',
                'type' => 'paragraph',
                'data' => [
                    'blockId' => 10001,
                    'title' => 'Full width paragraph title',
                    'columns' => 'none',
                    'scenarios' => [
                        'reading' => [
                            'name' => 'Container width',
                            'iconId' => 'tw_content-width-text',
                            'id' => 'full',
                        ]
                    ],
                    'componentVisibility' => [
                        'mobile' => 1,
                        'desktop' => 1
                    ]
                ],
            ],
            2 => [
                'id' => 'component2dfa',
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => '2 columns',
                    'subtitle' => '',
                ],
            ],
            3 => [
                'id' => 'component38ed',
                'section' => 'content',
                'type' => 'paragraph',
                'data' => [
                    'blockId' => 10001,
                    'title' => '2 columns paragraph title',
                    'columns' => '2',
                    'scenarios' => [
                        'reading' => [
                            'name' => 'Container width',
                            'iconId' => 'tw_content-width-text',
                            'id' => 'full',
                        ]
                    ],
                    'componentVisibility' => [
                        'mobile' => 1,
                        'desktop' => 1
                    ]
                ],
            ],
            4 => [
                'id' => 'component4f80',
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => '3 columns',
                    'subtitle' => '',
                ],
            ],
            5 => [
                'id' => 'component59ed',
                'section' => 'content',
                'type' => 'paragraph',
                'data' => [
                    'blockId' => 10001,
                    'title' => '3 columns paragraph title',
                    'columns' => '3',
                    'scenarios' => [
                        'reading' => [
                            'name' => 'Container width',
                            'iconId' => 'tw_content-width-text',
                            'id' => 'full',
                        ]
                    ],
                    'componentVisibility' => [
                        'mobile' => 1,
                        'desktop' => 1
                    ]
                ],
            ],
            6 => [
                'id' => 'component611b',
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => '4 columns',
                    'subtitle' => '',
                ],
            ],
            7 => [
                'id' => 'component70ed',
                'section' => 'content',
                'type' => 'paragraph',
                'data' => [
                    'blockId' => 10001,
                    'title' => '4 columns paragraph title',
                    'columns' => '4',
                    'scenarios' => [
                        'reading' => [
                            'name' => 'Container width',
                            'iconId' => 'tw_content-width-text',
                            'id' => 'full',
                        ]
                    ],
                    'componentVisibility' => [
                        'mobile' => 1,
                        'desktop' => 1
                    ]
                ],
            ],
            8 => [
                'id' => 'component811op',
                'section' => 'content',
                'type' => 'headline',
                'data' => [
                    'title' => 'Optimal reading',
                    'subtitle' => '',
                ],
            ],
            9 => [
                'id' => 'component9af8',
                'section' => 'content',
                'type' => 'paragraph',
                'data' => [
                    'blockId' => 10001,
                    'title' => 'Optimal paragraph title',
                    'columns' => 'none',
                    'scenarios' => [
                        'reading' => [
                            'name' => 'Optimal reading width',
                            'iconId' => 'tw_optimal-reading',
                            'id' => 'optimal',
                        ]
                    ],
                    'componentVisibility' => [
                        'mobile' => 1,
                        'desktop' => 1
                    ]
                ],
            ]
        ];
    }
}
