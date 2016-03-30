<?php
namespace Ficus;

class Staff extends Base\Staff {
    
    private $new_password;
    private $new_password_confirm;
    private $provider_id_array;
    
    /**
     * Returns the provider_id_array
     * @return array
     */
    function getProviderIdArray() {
        if (is_null($this->provider_id_array)) {
            $this->provider_id_array = array();
        }
        return $this->provider_id_array;
    }
    
    /**
     * Sets the provider_id_array
     * @var array
     */
    function setProviderIdArray($arg0) {
        $this->provider_id_array = array();
        if (is_array($arg0)) {
            foreach ($arg0 as $arg) {
                if (is_string($arg) && \MongoId::isValid($arg)) {
                    $this->provider_id_array[] = new \MongoId($arg);
                } else if ($arg instanceof \MongoId) {
                    $this->provider_id_array[] = $arg;
                }
            }
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->provider_id_array[] = new \MongoId($arg0);
        } else if ($arg0 instanceof \MongoId) {
            $this->provider_id_array[] = $arg0;
        }
        $this->addModifiedColumn("provider_id_array");
        return $this;
    }
    
    /**
     * Returns the active
     * @return boolean
     */
    function isActive() {
        return ($this->getStatus() == self::STATUS_ACTIVE);
    }
    
    /**
     * Returns the new_password
     * @return string
     */
    function getNewPassword() {
        if (is_null($this->new_password)) {
            $this->new_password = "";
        }
        return $this->new_password;
    }
    
    /**
     * Sets the new_password
     * @var string
     */
    function setNewPassword($arg0) {
        $this->new_password = $arg0;
        return $this;
    }
    
    /**
     * Returns the new_password_confirm
     * @return string
     */
    function getNewPasswordConfirm() {
        if (is_null($this->new_password_confirm)) {
            $this->new_password_confirm = "";
        }
        return $this->new_password_confirm;
    }
    
    /**
     * Sets the new_password_confirm
     * @var string
     */
    function setNewPasswordConfirm($arg0) {
        $this->new_password_confirm = $arg0;
        return $this;
    }
    
    // +------------------------------------------------------------------------+
    // | HELPER METHODS															|
    // +------------------------------------------------------------------------+
    
    /**
     * Returns the user based on the criteria
     * @return Ficus\User
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
     * Updates the password for this user
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
     * @return Ficus\User
     */
    function tryLogin() {
        $user = $this->query(array('username' => $this->getUsername(), 'password' => $this->getPassword(), 'provider.code' => (int)$this->getProvider()->getCode(), 'status' => self::STATUS_ACTIVE), false);
        if ($user === false) {
            throw new \Exception('Your login credentials are not correct.  Please check your username and/or password (st)');
        }
        if (!is_null($user) && \MongoId::isValid($user->getId())) {
            $this->populate($user);
        }
        return $this;
    }
    
    /**
     * Attempts to login the user with a token
     * @return Ficus\User
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