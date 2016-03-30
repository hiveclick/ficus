<?php
namespace Ficus\Link;

class ClientAuth extends Client {
    
    protected $authorization_requested;
    protected $authorization_requested_time;
    
    protected $authorization_approved;
    protected $authorization_approved_time;
    
    protected $is_emergency_contact;
    
    /**
     * Returns the authorization_requested
     * @return boolean
     */
    function getAuthorizationRequested() {
        if (is_null($this->authorization_requested)) {
            $this->authorization_requested = false;
        }
        return $this->authorization_requested;
    }
    
    /**
     * Sets the authorization_requested
     * @var boolean
     */
    function setAuthorizationRequested($arg0) {
        $this->authorization_requested = $arg0;
        $this->addModifiedColumn("authorization_requested");
        return $this;
    }
    
    /**
     * Returns the authorization_approved
     * @return boolean
     */
    function getAuthorizationApproved() {
        if (is_null($this->authorization_approved)) {
            $this->authorization_approved = false;
        }
        return $this->authorization_approved;
    }
    
    /**
     * Sets the authorization_approved
     * @var boolean
     */
    function setAuthorizationApproved($arg0) {
        $this->authorization_approved = $arg0;
        $this->addModifiedColumn("authorization_approved");
        return $this;
    }
    
    /**
     * Returns the authorization_requested_time
     * @return \MongoDate
     */
    function getAuthorizationRequestedTime() {
        if (is_null($this->authorization_requested_time)) {
            $this->authorization_requested_time = new \MongoDate();
        }
        return $this->authorization_requested_time;
    }
    
    /**
     * Sets the authorization_requested_time
     * @var \MongoDate
     */
    function setAuthorizationRequestedTime($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->authorization_requested_time = $arg0;
        } else if (is_int($arg0)) {
            $this->authorization_requested_time = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            $this->authorization_requested_time = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("authorization_requested_time");
        return $this;
    }
    
    /**
     * Returns the authorization_approved_time
     * @return \MongoDate
     */
    function getAuthorizationApprovedTime() {
        if (is_null($this->authorization_approved_time)) {
            $this->authorization_approved_time = new \MongoDate();
        }
        return $this->authorization_approved_time;
    }
    
    /**
     * Sets the authorization_approved_time
     * @var \MongoDate
     */
    function setAuthorizationApprovedTime($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->authorization_approved_time = $arg0;
        } else if (is_int($arg0)) {
            $this->authorization_approved_time = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            $this->authorization_approved_time = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("authorization_approved_time");
        return $this;
    }
    
    /**
     * Returns the is_emergency_contact
     * @return boolean
     */
    function getIsEmergencyContact() {
        if (is_null($this->is_emergency_contact)) {
            $this->is_emergency_contact = false;
        }
        return $this->is_emergency_contact;
    }
    
    /**
     * Sets the is_emergency_contact
     * @var boolean
     */
    function setIsEmergencyContact($arg0) {
        $this->is_emergency_contact = $arg0;
        $this->addModifiedColumn("is_emergency_contact");
        return $this;
    }
}