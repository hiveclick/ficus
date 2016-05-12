<?php
namespace Ficus\Base; 

use Mojavi\Form\MongoForm;

class Bed extends MongoForm {
    
    const BED_TYPE_TWIN = 1;
    const BED_TYPE_DOUBLE = 2;
    const BED_TYPE_QUEEN = 3;
    const BED_TYPE_KING = 4;
    
    protected $name;
    protected $description;
    protected $facility;
    protected $bed_type;
    protected $room;
    
    protected $private_bath;
    protected $private_room;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('bed');
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
     * Returns the bed_type
     * @return integer
     */
    function getBedType() {
        if (is_null($this->bed_type)) {
            $this->bed_type = self::BED_TYPE_QUEEN;
        }
        return $this->bed_type;
    }
    
    /**
     * Sets the bed_type
     * @var integer
     */
    function setBedType($arg0) {
        $this->bed_type = (int)$arg0;
        $this->addModifiedColumn("bed_type");
        return $this;
    }
    
    /**
     * Returns the private_bath
     * @return boolean
     */
    function getPrivateBath() {
        if (is_null($this->private_bath)) {
            $this->private_bath = false;
        }
        return $this->private_bath;
    }
    
    /**
     * Sets the private_bath
     * @var boolean
     */
    function setPrivateBath($arg0) {
        $this->private_bath = (boolean)$arg0;
        $this->addModifiedColumn("private_bath");
        return $this;
    }
    
    /**
     * Returns the private_room
     * @return boolean
     */
    function getPrivateRoom() {
        if (is_null($this->private_room)) {
            $this->private_room = false;
        }
        return $this->private_room;
    }
    
    /**
     * Sets the private_room
     * @var boolean
     */
    function setPrivateRoom($arg0) {
        $this->private_room = (boolean)$arg0;
        $this->addModifiedColumn("private_room");
        return $this;
    }
    
    /**
     * Returns the room
     * @return string
     */
    function getRoom() {
        if (is_null($this->room)) {
            $this->room = "";
        }
        return $this->room;
    }
    
    /**
     * Sets the room
     * @var string
     */
    function setRoom($arg0) {
        $this->room = $arg0;
        $this->addModifiedColumn("room");
        return $this;
    }   

    /**
     * Returns the facility
     * @return \Fiucs\Link\Facility
     */
    function getFacility() {
        if (is_null($this->facility)) {
            $this->facility = new \Ficus\Link\Facility();
        }
        return $this->facility;
    }
    
    /**
     * Sets the facility
     * @var \Fiucs\Link\Facility
     */
    function setFacility($arg0) {
        if (is_array($arg0)) {
            $this->facility = new \Ficus\Link\Facility();
            $this->facility->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Facility) {
            $this->facility = $arg0;
        } else if ($arg0 instanceof \MongoId) {
            $this->facility = new \Ficus\Link\Facility();
            $this->facility->setId($arg0);
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->facility = new \Ficus\Link\Facility();
            $this->facility->setId($arg0);
        }
        $this->addModifiedColumn("facility");
        return $this;
    }
    
    
}