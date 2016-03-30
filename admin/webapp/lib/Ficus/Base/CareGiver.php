<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class CareGiver extends \Ficus\Staff {
    
    protected $education;
    protected $skills;
    protected $notes;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('caregiver');
        $this->setDbName('default');
    }
    
    /**
     * Returns the education
     * @return string
     */
    function getEducation() {
        if (is_null($this->education)) {
            $this->education = "";
        }
        return $this->education;
    }
    
    /**
     * Sets the education
     * @var string
     */
    function setEducation($arg0) {
        $this->education = $arg0;
        $this->addModifiedColumn("education");
        return $this;
    }
    
    /**
     * Returns the skills
     * @return array
     */
    function getSkills() {
        if (is_null($this->skills)) {
            $this->skills = array();
        }
        return $this->skills;
    }
    
    /**
     * Sets the skills
     * @var array
     */
    function setSkills($arg0) {
        if (is_array($arg0)) {
            $this->skills = $arg0;
            array_walk($this->skills, function(&$value) { $value = trim($value); });
        } else if (is_string($arg0)) {
            if (strpos($arg0, ',') !== false) {
                $this->skills = explode(",", $arg0);
                array_walk($this->skills, function(&$value) { $value = trim($value); });
            } else {
                $this->skills = array(trim($arg0));
            }
        }
        $this->addModifiedColumn("skills");
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
    
    /**
     * Inserts a new Care Giver and sets the token counter
     */
    function insert() {
        if (!\MongoId::isValid($this->getProvider()->getId())) {
            if ($this->getContext()->getUser()->isAuthenticated()) {
                $provider = $this->getContext()->getUser()->getUserDetails()->getProvider()->getId();
                if (\MongoId::isValid($provider->getId())) {
                    $this->setProvider($provider);
                } else {
                    throw new \Exception("Cannot assign staff member to the current provider.  Please log out and try again.");
                }
            }
        }
        if (trim($this->getUsername()) == '') {
            $this->setUsername(\Ficus\Counter::getNextCounter('CAREGIVER'));
        }
        return parent::insert();
    }
    
    /**
     * Ensures that the mongo indexes are set (should be called once)
     * @return boolean
     */
    public static function ensureIndexes() {
        $user = new self();
        $user->getCollection()->ensureIndex(array('username' => 1, 'provider._id' => 1), array('unique' => true, 'background' => true));
        $user->getCollection()->ensureIndex(array('name' => 1), array('background' => true));
        return true;
    }
    
}