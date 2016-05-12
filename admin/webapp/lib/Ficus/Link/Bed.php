<?php
namespace Ficus\Link;

class Bed extends BaseLink {
    
    private $bed;
    
    /**
     * Sets the _id
     * @param $arg0
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getBed()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\Bed;
     */
    function getBed() {
        if (is_null($this->bed)) {
            $this->bed = new \Ficus\Bed();
            if (\MongoId::isValid($this->getId())) {
                $this->bed->setId($this->getId());
                $this->bed->query();
            }
        }
        return $this->bed;
    }
}