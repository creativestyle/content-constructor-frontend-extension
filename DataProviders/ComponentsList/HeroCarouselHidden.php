<?php

namespace Creativestyle\ContentConstructorFrontendExtension\DataProviders\ComponentsList;

class HeroCarouselHidden extends HeroCarousel
{
    public function __construct()
    {
        $this->mobileDisplayVariant = [
            'name' => 'Hidden',
            'iconId' => 'ml_hidden',
            'id' => 'hidden',
        ];

        parent::__construct();
    }

}