<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Staff extends MongoForm {
    
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_TRAINING = 2;
    
    const STAFF_TYPE_ADMINISTRATOR = 1;
    const STAFF_TYPE_BILLING = 2;
    const STAFF_TYPE_GENERAL = 3;
    
    protected $provider;
    
    protected $name;
    protected $username;
    protected $password;
    protected $status;
    protected $profile_image_url;
    
    protected $user_type;
    protected $timezone;
    protected $image_data;
    protected $token;
    
    protected $mailing;
    protected $staff_type;
        
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('staff');
        $this->setDbName('default');
    }
    
    /**
     * Returns the staff_type
     * @return integer
     */
    function getStaffType() {
        if (is_null($this->staff_type)) {
            $this->staff_type = self::STAFF_TYPE_GENERAL;
        }
        return $this->staff_type;
    }
    
    /**
     * Sets the staff_type
     * @var integer
     */
    function setStaffType($arg0) {
        $this->staff_type = $arg0;
        $this->addModifiedColumn("staff_type");
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
     * Returns the status
     * @return integer
     */
    function getStatus() {
        if (is_null($this->status)) {
            $this->status = self::STATUS_ACTIVE;
        }
        return $this->status;
    }
    
    /**
     * Sets the status
     * @var integer
     */
    function setStatus($arg0) {
        $this->status = (int)$arg0;
        $this->addModifiedColumn("status");
        return $this;
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
        $this->addModifiedColumn('name');
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
     * Returns the username
     * @return string
     */
    function getUsername() {
        if (is_null($this->username)) {
            $this->username = "";
        }
        return $this->username;
    }
    
    /**
     * Sets the username
     * @var string
     */
    function setUsername($arg0) {
        $this->username = $arg0;
        $this->addModifiedColumn("username");
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
        $this->addModifiedColumn('password');
        return $this;
    }
    
    /**
     * Returns the image_data
     * @return string
     */
    function getImageData() {
        if (is_null($this->image_data)) {
            $this->image_data = "";
        }
        return $this->image_data;
    }
    
    /**
     * Sets the image_data
     * @var string
     */
    function setImageData($arg0) {
        $this->image_data = $arg0;
        $this->addModifiedColumn('image_data');
        return $this;
    }    
    
    /**
     * Returns the timezone
     * @return string
     */
    function getTimezone() {
        if (is_null($this->timezone)) {
            $this->timezone = "US/Pacific";
        }
        return $this->timezone;
    }
    
    /**
     * Sets the timezone
     * @var string
     */
    function setTimezone($arg0) {
        $this->timezone = $arg0;
        $this->addModifiedColumn('timezone');
        return $this;
    }
    
    /**
     * Returns the token
     * @return string
     */
    function getToken() {
        if (is_null($this->token)) {
            $this->token = "";
        }
        return $this->token;
    }
    
    /**
     * Sets the token
     * @var string
     */
    function setToken($arg0) {
        $this->token = $arg0;
        $this->addModifiedColumn("token");
        return $this;
    }
    
    /**
     * Returns the provider
     * @return \Ficus\Link\Provider
     */
    function getProvider() {
        if (is_null($this->provider)) {
            $this->provider = new \Ficus\Link\Provider();
        }
        return $this->provider;
    }
    
    /**
     * Sets the provider
     * @var \Ficus\Link\Provider
     */
    function setProvider($arg0) {
        if ($arg0 instanceof \Ficus\Link\Provider) {
            $this->provider = $arg0;
        } else if (is_array($arg0)) {
            $this->provider = new \Ficus\Link\Provider();
            $this->provider->populate($arg0);
        } else if ($arg0 instanceof \MongoId) {
            $this->provider = new \Ficus\Link\Provider();
            $this->provider->setId($arg0);
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->provider = new \Ficus\Link\Provider();
            $this->provider->setId($arg0);
        }
        $this->addModifiedColumn("provider");
        return $this;
    }
    
    
    
    // +------------------------------------------------------------------------+
    // | HELPER METHODS															|
    // +------------------------------------------------------------------------+
    
    /**
     * Ensures that the mongo indexes are set (should be called once)
     * @return boolean
     */
    public static function ensureIndexes() {
        $user = new self();
        $user->getCollection()->ensureIndex(array('username' => 1, 'provider._id' => 1), array('unique' => true, 'background' => true));
        $user->getCollection()->ensureIndex(array('status' => 1, 'staff_type' => 1), array('background' => true));
        return true;
    }
    
    /**
     * Inserts a new Staff member and sets the token counter
     */
    function insert() {
        if (!\MongoId::isValid($this->getProvider()->getId())) {
            if ($this->getContext()->getUser()->isAuthenticated()) {
                $provider = $this->getContext()->getUser()->getUserDetails()->getProvider()->getId();
                if (\MongoId::isValid($provider->getId())) {
                    $this->setProvider($provider);
                } else {
                    throw new \Exception("Cannot assign staff member to the current provider.  Please log out and try again.");
                }
            }
        }
        if (trim($this->getUsername()) == '') {
            $this->setUsername(\Ficus\Counter::getNextCounter('STAFF'));
        }
        return parent::insert();
    }
    
}