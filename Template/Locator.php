<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Template;

class Locator implements \Creativestyle\ContentConstructor\View\TemplateLocator
{
    /**
     * @var \Creativestyle\FrontendExtension\Template\Locator
     */
    private $locator;

    public function __construct(\Creativestyle\FrontendExtension\Template\Locator $locator)
    {
        $this->locator = $locator;
    }

    public function locate($path)
    {
        return $this->locator->locate($path);
    }
}