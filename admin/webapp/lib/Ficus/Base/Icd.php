<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Icd extends MongoForm {
    
    protected $code;
    protected $name;
    protected $category;
    protected $description;
    protected $approved;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('icd');
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
     * Returns the category
     * @return string
     */
    function getCategory() {
        if (is_null($this->category)) {
            $this->category = "";
        }
        return $this->category;
    }
    
    /**
     * Sets the category
     * @var string
     */
    function setCategory($arg0) {
        $this->category = $arg0;
        $this->addModifiedColumn("category");
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
     * Returns the approved
     * @return boolean
     */
    function getApproved() {
        if (is_null($this->approved)) {
            $this->approved = false;
        }
        return $this->approved;
    }
    
    /**
     * Sets the approved
     * @var boolean
     */
    function setApproved($arg0) {
        $this->approved = (boolean)$arg0;
        $this->addModifiedColumn("approved");
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
        $icd = new self();
        $icd->getCollection()->ensureIndex(array('code' => 1), array('unique' => true, 'background' => true));
        return true;
    }
}