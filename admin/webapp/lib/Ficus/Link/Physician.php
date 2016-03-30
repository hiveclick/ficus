<?php
namespace Ficus\Link;

class Physician extends BaseLink {
    
    
    private $physician;
    
    /**
     * Sets the _id
     * @param $arg0 
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getPhysician()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\Physician;
     */
    function getPhysician() {
        if (is_null($this->physician)) {
            $this->physician = new \Ficus\Physician();
            if (\MongoId::isValid($this->getId())) {
                $this->physician->setId($this->getId());
                $this->physician->query();
            }
        }
        return $this->physician;
    }
    
}