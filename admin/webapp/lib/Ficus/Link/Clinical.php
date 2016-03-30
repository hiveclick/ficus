<?php
namespace Ficus\Link;

class Clinical extends BaseLink {
    
    protected $diagnosis;
    protected $care_notes;
    protected $weight;
    protected $height_ft;
    protected $height_in;
    protected $live_alone;
    protected $smoker;
    protected $has_dnr;
    protected $is_fullcode;
    
    /**
     * Returns the diagnosis
     * @return string
     */
    function getDiagnosis() {
        if (is_null($this->diagnosis)) {
            $this->diagnosis = "";
        }
        return $this->diagnosis;
    }
    
    /**
     * Sets the diagnosis
     * @var string
     */
    function setDiagnosis($arg0) {
        $this->diagnosis = $arg0;
        $this->addModifiedColumn("diagnosis");
        return $this;
    }
    
    /**
     * Returns the care_notes
     * @return string
     */
    function getCareNotes() {
        if (is_null($this->care_notes)) {
            $this->care_notes = "";
        }
        return $this->care_notes;
    }
    
    /**
     * Sets the care_notes
     * @var string
     */
    function setCareNotes($arg0) {
        $this->care_notes = $arg0;
        $this->addModifiedColumn("care_notes");
        return $this;
    }
    
    /**
     * Returns the weight
     * @return integer
     */
    function getWeight() {
        if (is_null($this->weight)) {
            $this->weight = 0;
        }
        return $this->weight;
    }
    
    /**
     * Sets the weight
     * @var integer
     */
    function setWeight($arg0) {
        $this->weight = (integer)$arg0;
        $this->addModifiedColumn("weight");
        return $this;
    }
    
    /**
     * Returns the height_ft
     * @return integer
     */
    function getHeightFt() {
        if (is_null($this->height_ft)) {
            $this->height_ft = 0;
        }
        return $this->height_ft;
    }
    
    /**
     * Sets the height_ft
     * @var integer
     */
    function setHeightFt($arg0) {
        $this->height_ft = (integer)$arg0;
        $this->addModifiedColumn("height_ft");
        return $this;
    }
    
    /**
     * Returns the height_in
     * @return integer
     */
    function getHeightIn() {
        if (is_null($this->height_in)) {
            $this->height_in = 0;
        }
        return $this->height_in;
    }
    
    /**
     * Sets the height_in
     * @var integer
     */
    function setHeightIn($arg0) {
        $this->height_in = (integer)$arg0;
        $this->addModifiedColumn("height_in");
        return $this;
    }
    
    /**
     * Returns the live_alone
     * @return boolean
     */
    function getLiveAlone() {
        if (is_null($this->live_alone)) {
            $this->live_alone = false;
        }
        return $this->live_alone;
    }
    
    /**
     * Sets the live_alone
     * @var boolean
     */
    function setLiveAlone($arg0) {
        $this->live_alone = (boolean)$arg0;
        $this->addModifiedColumn("live_alone");
        return $this;
    }
    
    /**
     * Returns the smoker
     * @return boolean
     */
    function getSmoker() {
        if (is_null($this->smoker)) {
            $this->smoker = false;
        }
        return $this->smoker;
    }
    
    /**
     * Sets the smoker
     * @var boolean
     */
    function setSmoker($arg0) {
        $this->smoker = (boolean)$arg0;
        $this->addModifiedColumn("smoker");
        return $this;
    }
    
    /**
     * Returns the has_dnr
     * @return boolean
     */
    function getHasDnr() {
        if (is_null($this->has_dnr)) {
            $this->has_dnr = false;
        }
        return $this->has_dnr;
    }
    
    /**
     * Sets the has_dnr
     * @var boolean
     */
    function setHasDnr($arg0) {
        $this->has_dnr = (boolean)$arg0;
        $this->addModifiedColumn("has_dnr");
        return $this;
    }
    
    /**
     * Returns the is_fullcode
     * @return boolean
     */
    function getIsFullcode() {
        if (is_null($this->is_fullcode)) {
            $this->is_fullcode = false;
        }
        return $this->is_fullcode;
    }
    
    /**
     * Sets the is_fullcode
     * @var boolean
     */
    function setIsFullcode($arg0) {
        $this->is_fullcode = (boolean)$arg0;
        $this->addModifiedColumn("is_fullcode");
        return $this;
    }    
}