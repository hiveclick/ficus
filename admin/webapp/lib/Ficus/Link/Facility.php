<?php
namespace Ficus\Link;

class Facility extends BaseLink {
    
    private $facility;
    
    /**
     * Sets the _id
     * @param $arg0
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getFacility()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\Facility;
     */
    function getFacility() {
        if (is_null($this->facility)) {
            $this->facility = new \Ficus\Facility();
            if (\MongoId::isValid($this->getId())) {
                $this->facility->setId($this->getId());
                $this->facility->query();
            }
        }
        return $this->facility;
    }
    
}