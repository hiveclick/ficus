<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Physician extends MongoForm {
    
    protected $name;
    protected $mailing;
    protected $license;
    protected $npi;
    protected $upin;
    protected $notes;
    
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
    
    /**
     * Returns the license
     * @return string
     */
    function getLicense() {
        if (is_null($this->license)) {
            $this->license = "";
        }
        return $this->license;
    }
    
    /**
     * Sets the license
     * @var string
     */
    function setLicense($arg0) {
        $this->license = $arg0;
        $this->addModifiedColumn("license");
        return $this;
    }
    
    /**
     * Returns the npi
     * @return string
     */
    function getNpi() {
        if (is_null($this->npi)) {
            $this->npi = "";
        }
        return $this->npi;
    }
    
    /**
     * Sets the npi
     * @var string
     */
    function setNpi($arg0) {
        $this->npi = $arg0;
        $this->addModifiedColumn("npi");
        return $this;
    }
    
    /**
     * Returns the upin
     * @return string
     */
    function getUpin() {
        if (is_null($this->upin)) {
            $this->upin = "";
        }
        return $this->upin;
    }
    
    /**
     * Sets the upin
     * @var string
     */
    function setUpin($arg0) {
        $this->upin = $arg0;
        $this->addModifiedColumn("upin");
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
    
    
}