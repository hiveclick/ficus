<?php
namespace Ficus;

class CareGiver extends Base\CareGiver {
    
    /**
     * Returns if the care giver is active or not
     * @return boolean
     */
    function isActive() {
        return ($this->getStatus() != self::STATUS_INACTIVE);
    }
    
    // +------------------------------------------------------------------------+
    // | HELPER METHODS															|
    // +------------------------------------------------------------------------+
    
    /**
     * Returns the care giver based on the criteria
     * @return Ficus\CareGiver
     */
    function queryAll(array $criteria = array(), array $fields = array(), $hydrate = true, $timeout = 30000) {
        if (trim($this->getName()) != '') {
            $criteria['name'] = new \MongoRegex("/" . $this->getName() . "/i");
        }
        if (count($this->getProviderIdArray()) > 0) {
            $criteria['provider._id'] = array('$in' => $this->getProviderIdArray());
        }
        
        return parent::queryAll($criteria, $fields, $hydrate, $timeout);
    }
    
    /**
     * Updates the password for this care giver
     * @return integer
     */
    function updatePassword() {
        if ($this->getNewPassword() == $this->getNewPasswordConfirm()) {
            $this->setPassword($this->getNewPassword());
            return $this->update();
        } else {
            throw new \Exception('The passwords do not match. Please check them.');
        }
    }
    
    /**
     * Updates the password for this user
     * @return integer
     */
    function updateToken() {
        $new_token = md5(strtotime('now'));
        $this->setToken($new_token);
        return $this->update();
    }
    
    /**
     * Attempts to login the user
     * @return Ficus\CareGiver
     */
    function tryLogin() {
        $care_giver = $this->query(array('username' => $this->getUsername(), 'password' => $this->getPassword(), 'provider.code' => (int)$this->getProvider()->getCode(), 'status' => self::STATUS_ACTIVE), false);
        if ($care_giver === false) {
            throw new \Exception('Your login credentials are not correct.  Please check your username and/or password (cg)');
        }
        if (!is_null($care_giver) && \MongoId::isValid($care_giver->getId())) {
            $this->populate($care_giver);
        }
        return $this;
    }
    
    /**
     * Attempts to login the user with a token
     * @return Ficus\CareGiver
     */
    function tryTokenLogin() {
        $user = $this->query(array('token' => $this->getToken(), 'status' => self::STATUS_ACTIVE), false);
        if ($user === false) {
            throw new \Exception('Your login credentials are not correct.  Please check your username and/or password');
        }
        if (!is_null($user) && \MongoId::isValid($user->getId())) {
            $this->populate($user);
        }
        return $this;
    }
    
}