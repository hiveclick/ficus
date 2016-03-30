<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Carrier extends MongoForm {

    const INSURANCE_TYPE_INSURANCE = 1;
    const INSURANCE_TYPE_TPA = 2;
    const INSURANCE_TYPE_GOVERNMENT = 3;
    const INSURANCE_TYPE_CASHPAY = 4;
   
    
    protected $name;
    protected $website;
    protected $description;
    
    protected $profile_image_url;
    protected $mailing;
    
    protected $insurance_type;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('carrier');
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
     * Returns the website
     * @return string
     */
    function getWebsite() {
        if (is_null($this->website)) {
            $this->website = "";
        }
        return $this->website;
    }
    
    /**
     * Sets the website
     * @var string
     */
    function setWebsite($arg0) {
        $this->website = $arg0;
        $this->addModifiedColumn("website");
        return $this;
    }
    
    /**
     * Returns the insurance_type
     * @return integer
     */
    function getInsuranceType() {
        if (is_null($this->insurance_type)) {
            $this->insurance_type = self::INSURANCE_TYPE_INSURANCE;
        }
        return $this->insurance_type;
    }
    
    /**
     * Sets the insurance_type
     * @var integer
     */
    function setInsuranceType($arg0) {
        $this->insurance_type = (int)$arg0;
        $this->addModifiedColumn("insurance_type");
        return $this;
    }
    
    
    
    /**
     * Returns the description
     * @return string
     */
    function getDescription() {
        if (is_null($this->description)) {
            $this->description = "";
        }
        return $this->description;
    }
    
    /**
     * Sets the description
     * @var string
     */
    function setDescription($arg0) {
        $this->description = $arg0;
        $this->addModifiedColumn("description");
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
     * Ensures that the mongo indexes are set (should be called once)
     * @return boolean
     */
    public static function ensureIndexes() {
        $user = new self();
        $user->getCollection()->ensureIndex(array('name' => 1), array('background' => true));
        return true;
    }    
}