<?php
namespace Ficus;

class Shift extends Base\Shift {
    
    /**
     * Returns if an ADL is selected on this shift
     * @return boolean
     */
    function isAdlSelected($arg0) {
        foreach ($this->getAdls() as $adl) {
            if ($adl->getId() == $arg0) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Returns the user based on the criteria
     * @return Ficus\User
     */
    function queryAll(array $criteria = array(), array $fields = array(), $hydrate = true, $timeout = 30000) {
        if (\MongoId::isValid($this->getCareGiver()->getId())) {
            $criteria['care_giver._id'] = $this->getCareGiver()->getId();
        }
        if (\MongoId::isValid($this->getClient()->getId())) {
            $criteria['client._id'] = $this->getClient()->getId();
        }
        return parent::queryAll($criteria, $fields, $hydrate, $timeout);
    }
    
}