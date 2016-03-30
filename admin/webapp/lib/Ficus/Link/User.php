<?php
namespace Ficus\Link;

class User extends BaseLink {
    
    protected $email;
    
    private $user;
    
    /**
     * Sets the _id
     * @param $arg0 
     */
    function setId($arg0) {
        parent::setId($arg0);
        if (\MongoId::isValid($arg0) && $this->getName() == '') {
            $this->setName($this->getUser()->getName());
        }
    }
    
    /**
     * Returns the full account info
     * @return \Ficus\User;
     */
    function getUser() {
        if (is_null($this->user)) {
            $this->user = new \Ficus\User();
            if (\MongoId::isValid($this->getId())) {
                $this->user->setId($this->getId());
                $this->user->query();
            }
        }
        return $this->user;
    }
    
}