<?php
namespace Ficus\Link;

class ClientExtra extends BaseLink {
    
    protected $hobbies;
    protected $wedding_anniversary;
    protected $occupation;
    protected $pet_notes;
    
    /**
     * Returns the hobbies
     * @return string
     */
    function getHobbies() {
        if (is_null($this->hobbies)) {
            $this->hobbies = "";
        }
        return $this->hobbies;
    }
    
    /**
     * Sets the hobbies
     * @var string
     */
    function setHobbies($arg0) {
        $this->hobbies = $arg0;
        $this->addModifiedColumn("hobbies");
        return $this;
    }
    
    /**
     * Returns the wedding_anniversary
     * @return \MongoDate
     */
    function getWeddingAnniversary() {
        if (is_null($this->wedding_anniversary)) {
            $this->wedding_anniversary = new \MongoDate();
        }
        return $this->wedding_anniversary;
    }
    
    /**
     * Sets the wedding_anniversary
     * @var \MongoDate
     */
    function setWeddingAnniversary($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->wedding_anniversary = $arg0;
        } else if (is_int($arg0)) {
            $this->wedding_anniversary = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            $this->wedding_anniversary = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("wedding_anniversary");
        return $this;
    }
    
    /**
     * Returns the occupation
     * @return string
     */
    function getOccupation() {
        if (is_null($this->occupation)) {
            $this->occupation = "";
        }
        return $this->occupation;
    }
    
    /**
     * Sets the occupation
     * @var string
     */
    function setOccupation($arg0) {
        $this->occupation = $arg0;
        $this->addModifiedColumn("occupation");
        return $this;
    }
    
    /**
     * Returns the pet_notes
     * @return string
     */
    function getPetNotes() {
        if (is_null($this->pet_notes)) {
            $this->pet_notes = "";
        }
        return $this->pet_notes;
    }
    
    /**
     * Sets the pet_notes
     * @var string
     */
    function setPetNotes($arg0) {
        $this->pet_notes = $arg0;
        $this->addModifiedColumn("pet_notes");
        return $this;
    }    
}