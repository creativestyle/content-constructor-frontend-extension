<?php

namespace Creativestyle\ContentConstructorFrontendExtension\DataProviders\ComponentsList;

class HeroCarouselSlider extends HeroCarousel
{
    public function __construct()
    {
        $this->mobileDisplayVariant = [
            'name' => 'Slider',
            'iconId' => 'ml_slider',
            'id' => 'slider',
        ];

        parent::__construct();
    }

}
