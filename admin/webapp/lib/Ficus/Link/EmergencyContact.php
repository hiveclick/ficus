<?php
namespace Ficus\Link;

class EmergencyContact extends BaseLink {
    
    protected $mailing;
    protected $relationship;
    
    /**
     * Returns the relationship
     * @return string
     */
    function getRelationship() {
        if (is_null($this->relationship)) {
            $this->relationship = "";
        }
        return $this->relationship;
    }
    
    /**
     * Sets the relationship
     * @var string
     */
    function setRelationship($arg0) {
        $this->relationship = $arg0;
        $this->addModifiedColumn("relationship");
        return $this;
    }
    
    /**
     * Returns the mailing
     * @return Mailing
     */
    function getMailing() {
        if (is_null($this->mailing)) {
            $this->mailing = new \Ficus\Link\Contact();
        }
        return $this->mailing;
    }
    
    /**
     * Sets the mailing
     * @var Mailing
     */
    function setMailing($arg0) {
        if ($arg0 instanceof \Ficus\Link\Contact) {
            $this->mailing = $arg0;
        } else if (is_array($arg0)) {
            $this->mailing = new \Ficus\Link\Contact();
            $this->mailing->populate($arg0);
        }
        $this->addModifiedColumn("mailing");
        return $this;
    }
    
}