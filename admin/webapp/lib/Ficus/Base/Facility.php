<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Facility extends MongoForm {
    
    protected $primary_photo;
    protected $mailing;
    protected $name;
    protected $latitude;
    protected $longitude;
    
    protected $amenities;
    protected $manager;
    
    protected $landlord;
    
    protected $photos;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('facility');
        $this->setDbName('default');
    }
    
    /**
     * Returns the primary_photo
     * @return string
     */
    function getPrimaryPhoto() {
        if (is_null($this->primary_photo)) {
            $this->primary_photo = "";
        }
        return $this->primary_photo;
    }
    
    /**
     * Sets the primary_photo
     * @var string
     */
    function setPrimaryPhoto($arg0) {
        $this->primary_photo = $arg0;
        $this->addModifiedColumn("primary_photo");
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
        $this->addModifiedColumn("name");
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
     * Returns the latitude
     * @return float
     */
    function getLatitude() {
        if (is_null($this->latitude)) {
            $this->latitude = 0.0;
        }
        return $this->latitude;
    }
    
    /**
     * Sets the latitude
     * @var float
     */
    function setLatitude($arg0) {
        $this->latitude = (float)$arg0;
        $this->addModifiedColumn("latitude");
        return $this;
    }
    
    /**
     * Returns the longitude
     * @return float
     */
    function getLongitude() {
        if (is_null($this->longitude)) {
            $this->longitude = 0.0;
        }
        return $this->longitude;
    }
    
    /**
     * Sets the longitude
     * @var float
     */
    function setLongitude($arg0) {
        $this->longitude = (float)$arg0;
        $this->addModifiedColumn("longitude");
        return $this;
    }
    
    /**
     * Returns the amenities
     * @return string
     */
    function getAmenities() {
        if (is_null($this->amenities)) {
            $this->amenities = "";
        }
        return $this->amenities;
    }
    
    /**
     * Sets the amenities
     * @var string
     */
    function setAmenities($arg0) {
        $this->amenities = $arg0;
        $this->addModifiedColumn("amenities");
        return $this;
    }
    
    /**
     * Returns the manager
     * @return Ficus\Staff
     */
    function getManager() {
        if (is_null($this->manager)) {
            $this->manager = new \Ficus\Link\Staff();
        }
        return $this->manager;
    }
    
    /**
     * Sets the manager
     * @var Ficus\Staff
     */
    function setManager($arg0) {
        if ($arg0 instanceof \Ficus\Link\Staff) {
            $this->manager = $arg0;
        } else if ($arg0 instanceof \MongoId) {
            $this->manager = new \Ficus\Link\Staff();
            $this->manager->setId($arg0);
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->manager = new \Ficus\Link\Staff();
            $this->manager->setId($arg0);
        } else if (is_array($arg0)) {
            $this->manager = new \Ficus\Link\Staff();
            $this->manager->populate($arg0);
        }
        $this->addModifiedColumn("manager");
        return $this;
    }    
    
    /**
     * Returns the landlord
     * @return \Ficus\Link\Contact
     */
    function getLandlord() {
        if (is_null($this->landlord)) {
            $this->landlord = new \Ficus\Link\Contact();
        }
        return $this->landlord;
    }
    
    /**
     * Sets the landlord
     * @var \Ficus\Link\Contact
     */
    function setLandlord($arg0) {
        if (is_array($arg0)) {
            $this->landlord = new \Ficus\Link\Contact();
            $this->landlord->populate($arg0);
        } else if ($arg0 instanceof \Flux\Link\Contact) {
            $this->landlord = $arg0;
        }
        $this->addModifiedColumn("landlord");
        return $this;
    }
    
    /**
     * Returns the photos
     * @return array
     */
    function getPhotos() {
        if (is_null($this->photos)) {
            $this->photos = array();
        }
        return $this->photos;
    }
    
    /**
     * Sets the photos
     * @var array
     */
    function setPhotos($arg0) {
        if (is_array($arg0)) {
            $this->photos = $arg0;
            array_walk($this->photos, function($value) { $value = trim($value); });
        } else if (is_string($arg0)) {
            if (strpos($arg0,",") !== false) {
                $this->photos = explode(",", $arg0);
                array_walk($this->photos, function($value) { $value = trim($value); });
            } else if (strpos($arg0,"\n") !== false) {
                $this->photos = explode("\n", $arg0);
                array_walk($this->photos, function($value) { $value = trim($value); });
            } else {
                $this->photos = array(trim($arg0));
            }
        }
        $this->addModifiedColumn("photos");
        return $this;
    }
}