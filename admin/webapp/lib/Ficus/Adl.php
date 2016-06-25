<?php
namespace Ficus;

class Adl extends Base\Adl {
    
    /**
     * Returns the user based on the criteria
     * @return Ficus\User
     */
    function queryAll(array $criteria = array(), array $fields = array(), $hydrate = true, $timeout = 30000) {
        if (trim($this->getName()) != '') {
            $criteria['name'] = new \MongoRegex("/" . $this->getName() . "/i");
        }
        return parent::queryAll($criteria, $fields, $hydrate, $timeout);
    }
}