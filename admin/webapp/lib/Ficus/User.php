<?php
namespace Ficus;

class User extends Staff {
    
	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+
    
	/**
	 * Attempts to login the user
	 * @return Ficus\User
	 */
	function tryLogin() {
	    /* @var $staff \Ficus\Staff */
	    $login_exception = null;
	    $staff = new \Ficus\Staff();
	    try {
	        $staff->setUsername($this->getUsername());
	        $staff->getProvider()->setCode($this->getProvider()->getCode());
	        $staff->setPassword($this->getPassword());
	        $staff->tryLogin();
	        return $staff;
	    } catch (\Exception $e) {
	        $login_exception = $e;
	    }
	    
	    /* @var $care_giver \Ficus\CareGiver */
	    $care_giver = new \Ficus\CareGiver();
	    try {
	        $care_giver->setUsername($this->getUsername());
	        $care_giver->getProvider()->setCode($this->getProvider()->getCode());
	        $care_giver->setPassword($this->getPassword());
	        $care_giver->tryLogin();
	        return $care_giver;
	    } catch (\Exception $e) {
	        $login_exception = $e;
	    }
	    throw $login_exception;
	}
	
	/**
	 * Attempts to login the user
	 * @return Ficus\User
	 */
	function tryTokenLogin() {
	    /* @var $staff \Ficus\Staff */
	    $login_exception = null;
	    $staff = new \Ficus\Staff();
	    try {
	        $staff->setToken($this->getToken());
	        $staff->tryTokenLogin();
	        return $staff;
	    } catch (\Exception $e) {
	        $login_exception = $e;
	    }
	     
	    /* @var $care_giver \Ficus\CareGiver */
	    $care_giver = new \Ficus\CareGiver();
	    try {
	        $care_giver->setToken($this->getToken());
	        $care_giver->tryTokenLogin();
	        return $care_giver;
	    } catch (\Exception $e) {
	        $login_exception = $e;
	    }
	    throw $login_exception;
	}
}
