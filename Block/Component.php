<?php

namespace Creativestyle\ContentConstructorFrontendExtension\Block;

class Component extends \Magento\Framework\View\Element\AbstractBlock implements \Magento\Framework\View\Element\BlockInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_LIFETIME = 86400;
    const CACHE_KEY = 'component_html_%s_%s';

    private $component;

    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\Service\ComponentFactory
     */
    private $componentFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Creativestyle\ContentConstructor\Factory\ComponentFactory $componentFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->storeManager = $storeManager;
        $this->componentFactory = $componentFactory;

        $componentHash = substr(md5(serialize($this->getData())), 0 ,8);

        $cacheKey = sprintf(
            self::CACHE_KEY,
            $componentHash,
            $this->storeManager->getStore()->getId()
        );

        $serverName = $context->getRequest()->getServer('HTTP_HOST');

        if($serverName != null and !empty($serverName)) {
            $cacheKey .= '_'.md5($serverName);
        }

        $this->setData('cache_key', $cacheKey);
        $this->setData('cache_lifetime', self::CACHE_LIFETIME);
    }

    public function getIdentities()
    {
        if(!$this->component){
            return [];
        }

        $tags = [];

        foreach($this->component->getIdentities() as $identities){

            if(is_string($identities)) {
                $identities = [$identities];
            }

            $tags = array_merge($tags, $identities);
        }

        return $tags;
    }

    public function _toHtml()
    {
        if(!$this->hasData('type')) {
            throw new \InvalidArgumentException("Block must receive it's type in configuration");
        }

        $componentData = $this->getData('data');
        $classOverrides = $componentData['class_overrides'] ?? [];

        $this->component = $this->componentFactory->create($this->getData('type'), $classOverrides);

        if($this->component == null) {
            return '';
        }

        return $this->component->render($componentData);
    }

    
}