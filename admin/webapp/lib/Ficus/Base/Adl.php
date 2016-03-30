<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Adl extends MongoForm {
    
    protected $code;
    protected $name;
    protected $description;
    
    protected $is_primary;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('adl');
        $this->setDbName('default');
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
     * Returns the is_primary
     * @return boolean
     */
    function getIsPrimary() {
        if (is_null($this->is_primary)) {
            $this->is_primary = false;
        }
        return $this->is_primary;
    }
    
    /**
     * Sets the is_primary
     * @var boolean
     */
    function setIsPrimary($arg0) {
        $this->is_primary = (boolean)$arg0;
        $this->addModifiedColumn("is_primary");
        return $this;
    }    
    
    /**
     * Inserts a new Adl and sets the code counter
     */
    function insert() {
        $this->setCode(\Ficus\Counter::getNextCounter('ADL'));
        return parent::insert();
    }
}