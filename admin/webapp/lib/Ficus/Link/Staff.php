<?php
namespace Ficus\Link;

class Staff extends BaseLink {
    
    private $staff;
    
    /**
     * Sets the _id
     * @param $arg0
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getStaff()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\Staff;
     */
    function getStaff() {
        if (is_null($this->staff)) {
            $this->staff = new \Ficus\Staff();
            if (\MongoId::isValid($this->getId())) {
                $this->staff->setId($this->getId());
                $this->staff->query();
            }
        }
        return $this->staff;
    }
    
}