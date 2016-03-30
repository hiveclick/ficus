<?php
namespace Ficus;

class Administrator extends Base\Administrator {
    
    private $new_password;
    private $new_password_confirm;
    
    /**
     * Returns the active
     * @return boolean
     */
    function isActive() {
        return ($this->getStatus() == self::ADMINISTRATOR_STATUS_ACTIVE);
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
     * @return Ficus\Administrator
     */
    function tryLogin() {
        $administrator = $this->query(array('email' => $this->getEmail(), 'password' => $this->getPassword(), 'status' => self::ADMINISTRATOR_STATUS_ACTIVE), false);
        if ($administrator === false) {
            throw new \Exception('Your login credentials are not correct.  Please check your username and/or password');
        }
        if (!is_null($administrator) && \MongoId::isValid($administrator->getId())) {
            $this->populate($administrator);
        }
        return $this;
    }
    
    /**
     * Attempts to login the user with a token
     * @return Ficus\Administrator
     */
    function tryTokenLogin() {
        $administrator = $this->query(array('token' => $this->getToken(), 'status' => self::ADMINISTRATOR_STATUS_ACTIVE), false);
        if ($administrator === false) {
            throw new \Exception('Your login credentials are not correct.  Please check your username and/or password');
        }
        if (!is_null($administrator) && \MongoId::isValid($administrator->getId())) {
            $this->populate($administrator);
        }
        return $this;
    }
}