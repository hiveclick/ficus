<?php
namespace Ficus\Link;

class Adl extends BaseLink {
    
    protected $code;
    
    private $adl;
    
    /**
     * Sets the _id
     * @param $arg0 
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getAdl()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\Adl;
     */
    function getAdl() {
        if (is_null($this->adl)) {
            $this->adl = new \Ficus\Adl();
            if (\MongoId::isValid($this->getId())) {
                $this->adl->setId($this->getId());
                $this->adl->query();
            }
        }
        return $this->adl;
    }
    
}