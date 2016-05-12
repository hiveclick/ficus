<?php
namespace Ficus\Link;

class Policy extends BaseLink {
    
    protected $carrier_id;
    protected $carrier_name;
    
    protected $policy_number;
    protected $member_number;
    protected $group_number;
    protected $plan_name;
    
    protected $relationship_to_insured;
    protected $insured_authorization;
    protected $deductible;
    protected $copayment;
    
    protected $expiration;
    
    protected $insured_firstname;
    protected $insured_lastname;
    protected $insured_middlename;
    
        
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
     * Returns the carrier_id
     * @return string
     */
    function getCarrierId() {
        if (is_null($this->carrier_id)) {
            $this->carrier_id = "";
        }
        return $this->carrier_id;
    }
    
    /**
     * Sets the carrier_id
     * @var string
     */
    function setCarrierId($arg0) {
        $this->carrier_id = $arg0;
        $this->addModifiedColumn("carrier_id");
        return $this;
    }
    
    /**
     * Returns the carrier_name
     * @return string
     */
    function getCarrierName() {
        if (is_null($this->carrier_name)) {
            $this->carrier_name = "";
        }
        return $this->carrier_name;
    }
    
    /**
     * Sets the carrier_name
     * @var string
     */
    function setCarrierName($arg0) {
        $this->carrier_name = $arg0;
        $this->addModifiedColumn("carrier_name");
        return $this;
    }
    
    /**
     * Returns the group_number
     * @return string
     */
    function getGroupNumber() {
        if (is_null($this->group_number)) {
            $this->group_number = "";
        }
        return $this->group_number;
    }
    
    /**
     * Sets the group_number
     * @var string
     */
    function setGroupNumber($arg0) {
        $this->group_number = $arg0;
        $this->addModifiedColumn("group_number");
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
     * Returns the plan_name
     * @return string
     */
    function getPlanName() {
        if (is_null($this->plan_name)) {
            $this->plan_name = "";
        }
        return $this->plan_name;
    }
    
    /**
     * Sets the plan_name
     * @var string
     */
    function setPlanName($arg0) {
        $this->plan_name = $arg0;
        $this->addModifiedColumn("plan_name");
        return $this;
    }
    
    /**
     * Returns the relationship_to_insured
     * @return string
     */
    function getRelationshipToInsured() {
        if (is_null($this->relationship_to_insured)) {
            $this->relationship_to_insured = "";
        }
        return $this->relationship_to_insured;
    }
    
    /**
     * Sets the relationship_to_insured
     * @var string
     */
    function setRelationshipToInsured($arg0) {
        $this->relationship_to_insured = $arg0;
        $this->addModifiedColumn("relationship_to_insured");
        return $this;
    }
    
    /**
     * Returns the insured_authorization
     * @return string
     */
    function getInsuredAuthorization() {
        if (is_null($this->insured_authorization)) {
            $this->insured_authorization = false;
        }
        return $this->insured_authorization;
    }
    
    /**
     * Sets the insured_authorization
     * @var string
     */
    function setInsuredAuthorization($arg0) {
        $this->insured_authorization = (boolean)$arg0;
        $this->addModifiedColumn("insured_authorization");
        return $this;
    }
    
    /**
     * Returns the deductible
     * @return float
     */
    function getDeductible() {
        if (is_null($this->deductible)) {
            $this->deductible = 0;
        }
        return $this->deductible;
    }
    
    /**
     * Sets the deductible
     * @var float
     */
    function setDeductible($arg0) {
        $this->deductible = (float)$arg0;
        $this->addModifiedColumn("deductible");
        return $this;
    }
    
    /**
     * Returns the copayment
     * @return float
     */
    function getCopayment() {
        if (is_null($this->copayment)) {
            $this->copayment = 0;
        }
        return $this->copayment;
    }
    
    /**
     * Sets the copayment
     * @var float
     */
    function setCopayment($arg0) {
        $this->copayment = (float)$arg0;
        $this->addModifiedColumn("copayment");
        return $this;
    }
    
    /**
     * Returns the insured_firstname
     * @return string
     */
    function getInsuredFirstname() {
        if (is_null($this->insured_firstname)) {
            $this->insured_firstname = "";
        }
        return $this->insured_firstname;
    }
    
    /**
     * Sets the insured_firstname
     * @var string
     */
    function setInsuredFirstname($arg0) {
        $this->insured_firstname = $arg0;
        $this->addModifiedColumn("insured_firstname");
        return $this;
    }
    
    /**
     * Returns the insured_lastname
     * @return string
     */
    function getInsuredLastname() {
        if (is_null($this->insured_lastname)) {
            $this->insured_lastname = "";
        }
        return $this->insured_lastname;
    }
    
    /**
     * Sets the insured_lastname
     * @var string
     */
    function setInsuredLastname($arg0) {
        $this->insured_lastname = $arg0;
        $this->addModifiedColumn("insured_lastname");
        return $this;
    }
    
    /**
     * Returns the insured_middlename
     * @return string
     */
    function getInsuredMiddlename() {
        if (is_null($this->insured_middlename)) {
            $this->insured_middlename = "";
        }
        return $this->insured_middlename;
    }
    
    /**
     * Sets the insured_middlename
     * @var string
     */
    function setInsuredMiddlename($arg0) {
        $this->insured_middlename = $arg0;
        $this->addModifiedColumn("insured_middlename");
        return $this;
    }
}