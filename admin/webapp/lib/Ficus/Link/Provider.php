<?php
namespace Ficus\Link;

class Provider extends BaseLink {
        
    private $provider;
    
    protected $code;
    
    /**
     * Sets the _id
     * @param $arg0 
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getProvider()->getName());
        }
        if (\MongoId::isValid($arg0) && $this->getCode() == '') {
            $this->setCode($this->getProvider()->getCode());
        }
    }
    
    /**
     * Returns the code
     * @return string
     */
    function getCode() {
        if (is_null($this->code)) {
            $this->code = "";
        }
        return $this->code;
    }
    
    /**
     * Sets the code
     * @var string
     */
    function setCode($arg0) {
        $this->code = $arg0;
        $this->addModifiedColumn("code");
        return $this;
    }
    
    
    
    /**
     * Returns the full account info
     * @return \Ficus\Provider;
     */
    function getProvider() {
        if (is_null($this->provider)) {
            $this->provider = new \Ficus\Provider();
            if (\MongoId::isValid($this->getId())) {
                $this->provider->setId($this->getId());
                $this->provider->query();
            }
        }
        return $this->provider;
    }
    
}