<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Model\Filter;

interface FilterInterface
{
    public function getIdentifier();
    public function getLabel();
    public function filter($collection);
}