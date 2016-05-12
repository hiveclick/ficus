<?php
namespace Ficus\Link;

class ClientInsurance extends BaseLink {
    
    protected $primary_insurance;
    protected $secondary_insurance;
    protected $tertiary_insurance;
    
    /**
     * Returns the primary_insurance
     * @return Ficus\Link\Policy
     */
    function getPrimaryInsurance() {
        if (is_null($this->primary_insurance)) {
            $this->primary_insurance = new \Ficus\Link\Policy();
        }
        return $this->primary_insurance;
    }
    
    /**
     * Sets the primary_insurance
     * @var Ficus\Link\Policy
     */
    function setPrimaryInsurance($arg0) {
        if (is_array($arg0)) {
            $this->primary_insurance = new \Ficus\Link\Policy();
            $this->primary_insurance->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Policy) {
            $this->primary_insurance = $arg0;
        }
        $this->addModifiedColumn("primary_insurance");
        return $this;
    }
    
    /**
     * Returns the secondary_insurance
     * @return Ficus\Link\Policy
     */
    function getSecondaryInsurance() {
        if (is_null($this->secondary_insurance)) {
            $this->secondary_insurance = new \Ficus\Link\Policy();
        }
        return $this->secondary_insurance;
    }
    
    /**
     * Sets the secondary_insurance
     * @var Ficus\Link\Policy
     */
    function setSecondaryInsurance($arg0) {
        if (is_array($arg0)) {
            $this->secondary_insurance = new \Ficus\Link\Policy();
            $this->secondary_insurance->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Policy) {
            $this->secondary_insurance = $arg0;
        }
        $this->addModifiedColumn("secondary_insurance");
        return $this;
    }
    
    /**
     * Returns the tertiary_insurance
     * @return Ficus\Link\Policy
     */
    function getTertiaryInsurance() {
        if (is_null($this->tertiary_insurance)) {
            $this->tertiary_insurance = new \Ficus\Link\Policy();
        }
        return $this->tertiary_insurance;
    }
    
    /**
     * Sets the tertiary_insurance
     * @var Ficus\Link\Policy
     */
    function setTertiaryInsurance($arg0) {
        if (is_array($arg0)) {
            $this->tertiary_insurance = new \Ficus\Link\Policy();
            $this->tertiary_insurance->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Policy) {
            $this->tertiary_insurance = $arg0;
        }
        $this->addModifiedColumn("tertiary_insurance");
        return $this;
    }
    
    
}