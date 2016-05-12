<?php
namespace Ficus\Link;

class Medicine extends BaseLink {
    
    protected $dose;
    protected $frequency;
    protected $max_dosage;
    
    /**
     * Returns the dose
     * @return integer
     */
    function getDose() {
        if (is_null($this->dose)) {
            $this->dose = 0;
        }
        return $this->dose;
    }
    
    /**
     * Sets the dose
     * @var integer
     */
    function setDose($arg0) {
        $this->dose = (int)$arg0;
        $this->addModifiedColumn("dose");
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
     * Returns the max_dosage
     * @return integer
     */
    function getMaxDosage() {
        if (is_null($this->max_dosage)) {
            $this->max_dosage = 0;
        }
        return $this->max_dosage;
    }
    
    /**
     * Sets the max_dosage
     * @var integer
     */
    function setMaxDosage($arg0) {
        $this->max_dosage = $arg0;
        $this->addModifiedColumn("max_dosage");
        return $this;
    }    
}