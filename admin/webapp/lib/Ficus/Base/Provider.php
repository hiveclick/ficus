<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;
class Provider extends MongoForm {
    
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    
    protected $name;
    
    /* mailing, primary and billing contacts */
    protected $mailing;    
    protected $primary;
    protected $billing;
    
    protected $profile_image_url;
    
    protected $code;
    
    protected $status;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('provider');
        $this->setDbName('default');
    }
    
    /**
     * Returns the name
     * @return string
     */
    function getName() {
        if (is_null($this->name)) {
            $this->name = "";
        }
        return $this->name;
    }
    
    /**
     * Sets the name
     * @var string
     */
    function setName($arg0) {
        $this->name = $arg0;
        $this->addModifiedColumn("name");
        return $this;
    }
    
    /**
     * Returns the profile_image_url
     * @return string
     */
    function getProfileImageUrl() {
        if (is_null($this->profile_image_url)) {
            $this->profile_image_url = "";
        }
        return $this->profile_image_url;
    }
    
    /**
     * Sets the profile_image_url
     * @var string
     */
    function setProfileImageUrl($arg0) {
        $this->profile_image_url = $arg0;
        $this->addModifiedColumn("profile_image_url");
        return $this;
    }
    
    /**
     * Returns the primary
     * @return \Ficus\Link\Contact
     */
    function getPrimary() {
        if (is_null($this->primary)) {
            $this->primary = new \Ficus\Link\Contact();
        }
        return $this->primary;
    }
    
    /**
     * Sets the primary
     * @var \Ficus\Link\Contact
     */
    function setPrimary($arg0) {
        if (is_array($arg0)) {
            $this->primary = new \Ficus\Link\Contact();
            $this->primary->populate($arg0);
        } else if ($arg0 instanceof \Flux\Link\Contact) {
            $this->primary = $arg0;
        }
        $this->addModifiedColumn("primary");
        return $this;
    }
    
    /**
     * Returns the billing
     * @return \Ficus\Link\Contact
     */
    function getBilling() {
        if (is_null($this->billing)) {
            $this->billing = new \Ficus\Link\Contact();
        }
        return $this->billing;
    }
    
    /**
     * Sets the billing
     * @var \Ficus\Link\Contact
     */
    function setBilling($arg0) {
        if (is_array($arg0)) {
            $this->billing = new \Ficus\Link\Contact();
            $this->billing->populate($arg0);
        } else if ($arg0 instanceof \Flux\Link\Contact) {
            $this->billing = $arg0;
        }
        $this->addModifiedColumn("billing");
        return $this;
    }
    
    /**
     * Returns the mailing
     * @return \Ficus\Link\Contact
     */
    function getMailing() {
        if (is_null($this->mailing)) {
            $this->mailing = new \Ficus\Link\Contact();
        }
        return $this->mailing;
    }
    
    /**
     * Sets the mailing
     * @var \Ficus\Link\Contact
     */
    function setMailing($arg0) {
        if (is_array($arg0)) {
            $this->mailing = new \Ficus\Link\Contact();
            $this->mailing->populate($arg0);
        } else if ($arg0 instanceof \Flux\Link\Contact) {
            $this->mailing = $arg0;
        }
        $this->addModifiedColumn("mailing");
        return $this;
    }
    
    /**
     * Returns the code
     * @return string
     */
    function getCode() {
        if (is_null($this->code)) {
            $this->code = "";
        }
        return $this->code;
    }
    
    /**
     * Sets the code
     * @var string
     */
    function setCode($arg0) {
        $this->code = $arg0;
        $this->addModifiedColumn("code");
        return $this;
    }
    
    /**
     * Returns the status
     * @return boolean
     */
    function getStatus() {
        if (is_null($this->status)) {
            $this->status = self::STATUS_ACTIVE;
        }
        return $this->status;
    }
    
    /**
     * Sets the status
     * @var boolean
     */
    function setStatus($arg0) {
        $this->status = (int)$arg0;
        $this->addModifiedColumn("status");
        return $this;
    }
    
    /**
     * Inserts a new provider (and possibly user)
     * @return boolean
     */
    function insert() {
        $this->setCode(\Ficus\Counter::getNextCounter('PROVIDER'));
        if (($ret_val = parent::insert()) !== false) {
            $staff = new \Ficus\Staff();
            $staff->populate($_REQUEST);
            $staff->setStatus(\Ficus\Staff::USER_STATUS_ACTIVE);
            $staff->setProvider($ret_val);
            $staff->setStaffType(\Ficus\Staff::STAFF_TYPE_ADMINISTRATOR);
            $staff->insert();
        }
        return $ret_val;
    }
}