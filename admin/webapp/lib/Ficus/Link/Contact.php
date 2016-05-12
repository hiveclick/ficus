<?php
namespace Ficus\Link;

class Contact extends BaseLink {
        
    protected $address;
    protected $address2;
    protected $city;
    protected $state;
    protected $postal_code;
    protected $country;
    
    protected $phone;
    protected $mobile;
    
    protected $email;
    
    /**
     * Returns the address
     * @return string
     */
    function getAddress() {
        if (is_null($this->address)) {
            $this->address = "";
        }
        return $this->address;
    }
    
    /**
     * Sets the address
     * @var string
     */
    function setAddress($arg0) {
        $this->address = $arg0;
        if ($arg0 != $this->address) { $this->addModifiedColumn("address"); }
        return $this;
    }
    
    /**
     * Returns the address2
     * @return string
     */
    function getAddress2() {
        if (is_null($this->address2)) {
            $this->address2 = "";
        }
        return $this->address2;
    }
    
    /**
     * Sets the address2
     * @var string
     */
    function setAddress2($arg0) {
        $this->address2 = $arg0;
        if ($arg0 != $this->address2) { $this->addModifiedColumn("address2"); }
        return $this;
    }
    
    /**
     * Returns the city
     * @return string
     */
    function getCity() {
        if (is_null($this->city)) {
            $this->city = "";
        }
        return $this->city;
    }
    
    /**
     * Sets the city
     * @var string
     */
    function setCity($arg0) {
        $this->city = $arg0;
        if ($arg0 != $this->city) { $this->addModifiedColumn("city"); }
        return $this;
    }
    
    /**
     * Returns the state
     * @return string
     */
    function getState() {
        if (is_null($this->state)) {
            $this->state = "";
        }
        return $this->state;
    }
    
    /**
     * Sets the state
     * @var string
     */
    function setState($arg0) {
        $this->state = $arg0;
        if ($arg0 != $this->state) { $this->addModifiedColumn("state"); }
        return $this;
    }
    
    /**
     * Returns the postal_code
     * @return string
     */
    function getPostalCode() {
        if (is_null($this->postal_code)) {
            $this->postal_code = "";
        }
        return $this->postal_code;
    }
    
    /**
     * Sets the postal_code
     * @var string
     */
    function setPostalCode($arg0) {
        $this->postal_code = $arg0;
        if ($arg0 != $this->postal_code) { $this->addModifiedColumn("postal_code"); }
        return $this;
    }
    
    /**
     * Returns the country
     * @return string
     */
    function getCountry() {
        if (is_null($this->country)) {
            $this->country = "";
        }
        return $this->country;
    }
    
    /**
     * Sets the country
     * @var string
     */
    function setCountry($arg0) {
        $this->country = $arg0;
        if ($arg0 != $this->country) { $this->addModifiedColumn("country"); }
        return $this;
    }
    
    /**
     * Returns the phone
     * @return string
     */
    function getPhone() {
        if (is_null($this->phone)) {
            $this->phone = "";
        }
        return $this->phone;
    }
    
    /**
     * Sets the phone
     * @var string
     */
    function setPhone($arg0) {
        $this->phone = $arg0;
        if ($arg0 != $this->phone) { $this->addModifiedColumn("phone"); }
        return $this;
    }
    
    /**
     * Returns the mobile
     * @return string
     */
    function getMobile() {
        if (is_null($this->mobile)) {
            $this->mobile = "";
        }
        return $this->mobile;
    }
    
    /**
     * Sets the mobile
     * @var string
     */
    function setMobile($arg0) {
        $this->mobile = $arg0;
        if ($arg0 != $this->mobile) { $this->addModifiedColumn("mobile"); }
        return $this;
    }
    
    /**
     * Returns the email
     * @return string
     */
    function getEmail() {
        if (is_null($this->email)) {
            $this->email = "";
        }
        return $this->email;
    }
    
    /**
     * Sets the email
     * @var string
     */
    function setEmail($arg0) {
        $this->email = $arg0;
        if ($arg0 != $this->email) { $this->addModifiedColumn("email"); }
        return $this;
    }    
}