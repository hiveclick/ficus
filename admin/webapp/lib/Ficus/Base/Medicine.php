<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Medicine extends MongoForm {
    
    const METHOD_ORAL = 1;
    const METHOD_RECTAL = 2;
    const METHOD_TOPICAL = 3;
    const METHOD_TRANSDERMAL = 4;
    const METHOD_INJECTION = 5;
    const METHOD_OCULAR = 6;
    const METHOD_AURAL = 7;
    const METHOD_VAGINAL = 8;
    const METHOD_INHALATION = 9;
    const METHOD_SUBLINGUAL = 10;
    
    protected $name;
    protected $notes;
    protected $dose;
    protected $frequency;
    protected $max_dosage;
    protected $quantity;
    protected $date_purchased;
    protected $method;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('medicine');
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
     * Returns the notes
     * @return string
     */
    function getNotes() {
        if (is_null($this->notes)) {
            $this->notes = "";
        }
        return $this->notes;
    }
    
    /**
     * Sets the notes
     * @var string
     */
    function setNotes($arg0) {
        $this->notes = $arg0;
        $this->addModifiedColumn("notes");
        return $this;
    }
    
    /**
     * Returns the dose
     * @return string
     */
    function getDose() {
        if (is_null($this->dose)) {
            $this->dose = "";
        }
        return $this->dose;
    }
    
    /**
     * Sets the dose
     * @var string
     */
    function setDose($arg0) {
        $this->dose = (int)$arg0;
        $this->addModifiedColumn("dose");
        return $this;
    }
    
    /**
     * Returns the max_dosage
     * @return string
     */
    function getMaxDosage() {
        if (is_null($this->max_dosage)) {
            $this->max_dosage = 0;
        }
        return $this->max_dosage;
    }
    
    /**
     * Sets the max_dosage
     * @var string
     */
    function setMaxDosage($arg0) {
        $this->max_dosage = (int)$arg0;
        $this->addModifiedColumn("max_dosage");
        return $this;
    }
    
    /**
     * Returns the frequency
     * @return integer
     */
    function getFrequency() {
        if (is_null($this->frequency)) {
            $this->frequency = 1;
        }
        return $this->frequency;
    }
    
    /**
     * Sets the frequency
     * @var integer
     */
    function setFrequency($arg0) {
        $this->frequency = (int)$arg0;
        $this->addModifiedColumn("frequency");
        return $this;
    }
    
    /**
     * Returns the quantity
     * @return integer
     */
    function getQuantity() {
        if (is_null($this->quantity)) {
            $this->quantity = 0;
        }
        return $this->quantity;
    }
    
    /**
     * Sets the quantity
     * @var integer
     */
    function setQuantity($arg0) {
        $this->quantity = (int)$arg0;
        $this->addModifiedColumn("quantity");
        return $this;
    }
    
    /**
     * Returns the date_purchased
     * @return \MongoDate
     */
    function getDatePurchased() {
        if (is_null($this->date_purchased)) {
            $this->date_purchased = new \MongoDate();
        }
        return $this->date_purchased;
    }
    
    /**
     * Sets the date_purchased
     * @var \MongoDate
     */
    function setDatePurchased($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->date_purchased = $arg0;
        } else if (is_int($arg0)) {
            $this->date_purchased = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            $this->date_purchased = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("date_purchased");
        return $this;
    }    
    
    /**
     * Returns the method
     * @return integer
     */
    function getMethod() {
        if (is_null($this->method)) {
            $this->method = self::METHOD_ORAL;
        }
        return $this->method;
    }
    
    /**
     * Sets the method
     * @var integer
     */
    function setMethod($arg0) {
        $this->method = (int)$arg0;
        $this->addModifiedColumn("method");
        return $this;
    }
}