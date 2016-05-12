<?php
namespace Ficus\Link;

class Employer extends BaseLink {
    
    protected $mailing;
    
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