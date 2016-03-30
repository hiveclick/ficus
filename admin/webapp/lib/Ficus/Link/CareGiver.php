<?php
namespace Ficus\Link;

class CareGiver extends BaseLink {
    
    
    private $care_giver;
    
    /**
     * Sets the _id
     * @param $arg0 
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getCareGiver()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\CareGiver;
     */
    function getCareGiver() {
        if (is_null($this->care_giver)) {
            $this->care_giver = new \Ficus\CareGiver();
            if (\MongoId::isValid($this->getId())) {
                $this->care_giver->setId($this->getId());
                $this->care_giver->query();
            }
        }
        return $this->care_giver;
    }
    
}