<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Administrator extends MongoForm {
    
    const ADMINISTRATOR_STATUS_ACTIVE = 1;
    const ADMINISTRATOR_STATUS_INACTIVE = 0;
    
    protected $name;
    protected $email;
    protected $password;
    protected $status;
    protected $timezone;
    protected $image_data;
    protected $profile_image_url;
    protected $token;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('administrator');
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
        $this->addModifiedColumn('name');
        return $this;
    }
    
    /**
     * Returns the email
     * @return string
     */
    function getEmail() {
        if (is_null($this->email)) {
            $this->email = "";
        }
        return $this->email;
    }
    
    /**
     * Sets the email
     * @var string
     */
    function setEmail($arg0) {
        $this->email = $arg0;
        $this->addModifiedColumn('email');
        return $this;
    }
    
    /**
     * Returns the username
     * @return string
     */
    function getUsername() {
        return $this->getEmail();
    }
    
    /**
     * Sets the username
     * @param string
     */
    function setUsername($arg0) {
        return $this->setEmail($arg0);
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
     * @return mixed
     */
    public function getProfileImageUrl()
    {
        if (is_null($this->profile_image_url)) {
            $this->profile_image_url = "";
        }
        return $this->profile_image_url;
    }

    /**
     * @param mixed $profile_image_url
     */
    public function setProfileImageUrl($profile_image_url)
    {
        $this->profile_image_url = $profile_image_url;
        $this->addModifiedColumn("profile_image_url");
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
     * Returns the status
     * @return integer
     */
    function getStatus() {
        if (is_null($this->status)) {
            $this->status = self::ADMINISTRATOR_STATUS_ACTIVE;
        }
        return $this->status;
    }
    
    /**
     * Sets the status
     * @var integer
     */
    function setStatus($arg0) {
        $this->status = (int)$arg0;
        $this->addModifiedColumn('status');
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
    
    // +------------------------------------------------------------------------+
    // | HELPER METHODS															|
    // +------------------------------------------------------------------------+
    
    /**
     * Ensures that the mongo indexes are set (should be called once)
     * @return boolean
     */
    public static function ensureIndexes() {
        $user = new self();
        $user->getCollection()->ensureIndex(array('email' => 1), array('unique' => true, 'background' => true));
        $user->getCollection()->ensureIndex(array('status' => 1, "type" => 1), array('background' => true));
        return true;
    }
    
}