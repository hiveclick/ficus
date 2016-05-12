<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Framily extends MongoForm {
    
    protected $name;
    protected $is_family_member;
    protected $relationship;
    protected $clients;
    protected $mailing;
    protected $password;
    protected $last_login_time;
    protected $notify_posts;
    protected $notify_caregiver;
    protected $notify_notes;
    protected $is_emergency_contact;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('framily');
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
    
    /**
     * Returns the is_family_member
     * @return boolean
     */
    function getIsFamilyMember() {
        if (is_null($this->is_family_member)) {
            $this->is_family_member = false;
        }
        return $this->is_family_member;
    }
    
    /**
     * Sets the is_family_member
     * @var boolean
     */
    function setIsFamilyMember($arg0) {
        $this->is_family_member = (boolean)$arg0;
        $this->addModifiedColumn("is_family_member");
        return $this;
    }
    
    /**
     * Returns the relationship
     * @return string
     */
    function getRelationship() {
        if (is_null($this->relationship)) {
            $this->relationship = "";
        }
        return $this->relationship;
    }
    
    /**
     * Sets the relationship
     * @var string
     */
    function setRelationship($arg0) {
        $this->relationship = $arg0;
        $this->addModifiedColumn("relationship");
        return $this;
    }
    
    /**
     * Returns the password
     * @return string
     */
    function getPassword() {
        if (is_null($this->password)) {
            $this->password = "";
        }
        return $this->password;
    }
    
    /**
     * Sets the password
     * @var string
     */
    function setPassword($arg0) {
        $this->password = $arg0;
        $this->addModifiedColumn("password");
        return $this;
    }
    
    /**
     * Returns the clients
     * @return array
     */
    function getClients() {
        if (is_null($this->clients)) {
            $this->clients = array();
        }
        return $this->clients;
    }
    
    /**
     * Sets the clients
     * @var array
     */
    function setClients($arg0) {
        $this->clients = array();
        if (is_array($arg0)) {
            foreach ($arg0 as $arg) {
                if ($arg instanceof \Ficus\Link\ClientAuth) {
                    $this->clients[] = $arg;
                } else if (is_array($arg)) {
                    $new_client = new \Ficus\Link\ClientAuth();
                    $new_client->populate($arg);
                    $this->clients[] = $new_client;
                } else if (is_string($arg) && \MongoId::isValid($arg)) {
                    $new_client = new \Ficus\Link\ClientAuth();
                    $new_client->setId($arg);
                    $this->clients[] = $new_client;
                }
            }
        } else if ($arg0 instanceof \Ficus\Link\ClientAuth) {
            $this->clients[] = $arg0;
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $new_client = new \Ficus\Link\ClientAuth();
            $new_client->setId($arg0);
            $this->clients[] = $new_client;
        }
        $this->addModifiedColumn("clients");
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
        } else if ($arg0 instanceof \Ficus\Link\Contact) {
            $this->mailing = $arg0;
        }
        $this->addModifiedColumn("mailing");
        return $this;
    }
    
    /**
     * Returns the last_login_time
     * @return \MongoDate
     */
    function getLastLoginTime() {
        if (is_null($this->last_login_time)) {
            $this->last_login_time = new \MongoDate();
        }
        return $this->last_login_time;
    }
    
    /**
     * Sets the last_login_time
     * @var \MongoDate
     */
    function setLastLoginTime($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->last_login_time = $arg0;
        } else if (is_int($arg0)) {
            $this->last_login_time = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            $this->last_login_time = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("last_login_time");
        return $this;
    }
    
    /**
     * Returns the notify_posts
     * @return boolean
     */
    function getNotifyPosts() {
        if (is_null($this->notify_posts)) {
            $this->notify_posts = false;
        }
        return $this->notify_posts;
    }
    
    /**
     * Sets the notify_posts
     * @var boolean
     */
    function setNotifyPosts($arg0) {
        $this->notify_posts = (boolean)$arg0;
        $this->addModifiedColumn("notify_posts");
        return $this;
    }
    
    /**
     * Returns the notify_caregiver
     * @return boolean
     */
    function getNotifyCaregiver() {
        if (is_null($this->notify_caregiver)) {
            $this->notify_caregiver = false;
        }
        return $this->notify_caregiver;
    }
    
    /**
     * Sets the notify_caregiver
     * @var boolean
     */
    function setNotifyCaregiver($arg0) {
        $this->notify_caregiver = (boolean)$arg0;
        $this->addModifiedColumn("notify_caregiver");
        return $this;
    }
    
    /**
     * Returns the notify_notes
     * @return boolean
     */
    function getNotifyNotes() {
        if (is_null($this->notify_notes)) {
            $this->notify_notes = false;
        }
        return $this->notify_notes;
    }
    
    /**
     * Sets the notify_notes
     * @var boolean
     */
    function setNotifyNotes($arg0) {
        $this->notify_notes = (boolean)$arg0;
        $this->addModifiedColumn("notify_notes");
        return $this;
    }    
}