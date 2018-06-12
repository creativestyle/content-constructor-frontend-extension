<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Template;

class Twig implements \Creativestyle\ContentConstructor\View\Template
{
    /**
     * @var \Creativestyle\FrontendExtension\Template\Twig
     */
    private $twig;

    public function __construct(\Creativestyle\FrontendExtension\Template\Twig $twig)
    {
        $this->twig = $twig;
    }

    public function render(string $templateLocation, array $data)
    {
        return $this->twig->render($templateLocation, $data);
    }
}