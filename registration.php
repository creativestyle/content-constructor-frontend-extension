<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Creativestyle_ContentConstructorFrontendExtension',
    __DIR__
);

$contentConstructorPackagePath = __DIR__.'/../content-constructor';

if(file_exists($contentConstructorPackagePath)) {
    \Magento\Framework\Component\ComponentRegistrar::register(
        \Magento\Framework\Component\ComponentRegistrar::MODULE,
        'Creativestyle_ContentConstructor',
        realpath($contentConstructorPackagePath)
    );
}
