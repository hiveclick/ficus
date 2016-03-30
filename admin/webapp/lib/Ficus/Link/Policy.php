<?php
namespace Ficus\Link;

class Policy extends BaseLink {
    
    protected $policy_number;
    protected $carrier;
    protected $member_number;
    
    protected $expiration;
    
    protected $mda;
    protected $multiplier;
    
    protected $benefit;
    protected $remaining_benefit;
    
    protected $has_premium_suspension;
    protected $has_benefit_reinstatement;
    protected $benefit_reinstatement_wait;
    
    /**
     * Returns the policy_number
     * @return string
     */
    function getPolicyNumber() {
        if (is_null($this->policy_number)) {
            $this->policy_number = "";
        }
        return $this->policy_number;
    }
    
    /**
     * Sets the policy_number
     * @var string
     */
    function setPolicyNumber($arg0) {
        $this->policy_number = $arg0;
        $this->addModifiedColumn("policy_number");
        return $this;
    }
    
    /**
     * Returns the carrier
     * @return string
     */
    function getCarrier() {
        if (is_null($this->carrier)) {
            $this->carrier = "";
        }
        return $this->carrier;
    }
    
    /**
     * Sets the carrier
     * @var string
     */
    function setCarrier($arg0) {
        $this->carrier = $arg0;
        $this->addModifiedColumn("carrier");
        return $this;
    }
    
    /**
     * Returns the member_number
     * @return string
     */
    function getMemberNumber() {
        if (is_null($this->member_number)) {
            $this->member_number = "";
        }
        return $this->member_number;
    }
    
    /**
     * Sets the member_number
     * @var string
     */
    function setMemberNumber($arg0) {
        $this->member_number = $arg0;
        $this->addModifiedColumn("member_number");
        return $this;
    }
    
    /**
     * Returns the maximum daily allocation for benefit calculations
     * @return float
     */
    function getMda() {
        if (is_null($this->mda)) {
            $this->mda = 0;
        }
        return $this->mda;
    }
    
    /**
     * Sets the maximum daily allocation for benefit calculations
     * @var float
     */
    function setMda($arg0) {
        $this->mda = (float)$arg0;
        $this->addModifiedColumn("mda");
        return $this;
    }
    
    /**
     * Returns the multiplier
     * @return integer
     */
    function getMultiplier() {
        if (is_null($this->multiplier)) {
            $this->multiplier = 0;
        }
        return $this->multiplier;
    }
    
    /**
     * Sets the multiplier
     * @var integer
     */
    function setMultiplier($arg0) {
        $this->multiplier = (int)$arg0;
        $this->addModifiedColumn("multiplier");
        return $this;
    }
    
    /**
     * Returns the benefit
     * @return float
     */
    function getBenefit() {
        if (is_null($this->benefit)) {
            $this->benefit = 0;
        }
        if ($this->benefit == 0) {
            $this->benefit = ($this->getMda() * $this->getMultiplier());
        }
        return $this->benefit;
    }
    
    /**
     * Sets the benefit
     * @var float
     */
    function setBenefit($arg0) {
        $this->benefit = (float)$arg0;
        $this->addModifiedColumn("benefit");
        return $this;
    }
    
    /**
     * Returns the remaining_benefit
     * @return float
     */
    function getRemainingBenefit() {
        if (is_null($this->remaining_benefit)) {
            $this->remaining_benefit = 0;
        }
        return $this->remaining_benefit;
    }
    
    /**
     * Sets the remaining_benefit
     * @var float
     */
    function setRemainingBenefit($arg0) {
        $this->remaining_benefit = (float)$arg0;
        $this->addModifiedColumn("remaining_benefit");
        return $this;
    }
    
    /**
     * Returns the has_premium_suspension
     * @return boolean
     */
    function getHasPremiumSuspension() {
        if (is_null($this->has_premium_suspension)) {
            $this->has_premium_suspension = false;
        }
        return $this->has_premium_suspension;
    }
    
    /**
     * Sets the has_premium_suspension
     * @var boolean
     */
    function setHasPremiumSuspension($arg0) {
        $this->has_premium_suspension = (boolean)$arg0;
        $this->addModifiedColumn("has_premium_suspension");
        return $this;
    }
    
    /**
     * Returns the has_benefit_reinstatement
     * @return boolean
     */
    function getHasBenefitReinstatement() {
        if (is_null($this->has_benefit_reinstatement)) {
            $this->has_benefit_reinstatement = false;
        }
        return $this->has_benefit_reinstatement;
    }
    
    /**
     * Sets the has_benefit_reinstatement
     * @var boolean
     */
    function setHasBenefitReinstatement($arg0) {
        $this->has_benefit_reinstatement = (boolean)$arg0;
        $this->addModifiedColumn("has_benefit_reinstatement");
        return $this;
    }
    
    /**
     * Returns the benefit_reinstatement_wait
     * @return integer
     */
    function getBenefitReinstatementWait() {
        if (is_null($this->benefit_reinstatement_wait)) {
            $this->benefit_reinstatement_wait = 180; // 6 months by default
        }
        return $this->benefit_reinstatement_wait;
    }
    
    /**
     * Sets the benefit_reinstatement_wait
     * @var integer
     */
    function setBenefitReinstatementWait($arg0) {
        $this->benefit_reinstatement_wait = (int)$arg0;
        $this->addModifiedColumn("benefit_reinstatement_wait");
        return $this;
    }    
}