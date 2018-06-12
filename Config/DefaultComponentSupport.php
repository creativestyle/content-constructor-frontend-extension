<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Config;

class DefaultComponentSupport implements \Creativestyle\ContentConstructor\ComponentSupport
{
    /**
     * All components are supported by default
     * @param string $component component type identifier
     * @return bool
     */
    public function isSupported($component)
    {
        return true;
    }
}