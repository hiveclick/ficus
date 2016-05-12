<?php
namespace Ficus;

class Facility extends Base\Facility {
    
    protected $photo;
    
    /**
     * Returns the photo
     * @return string
     */
    function getPhoto() {
        if (is_null($this->photo)) {
            $this->photo = "";
        }
        return $this->photo;
    }
    
    /**
     * Sets the photo
     * @var string
     */
    function setPhoto($arg0) {
        $this->photo = urldecode($arg0);
        return $this;
    }  
    
    /**
     * Removes a photo from the list
     * @return boolean
     */
    function assignPrimaryPhoto() {
        if (trim($this->getPhoto()) != '') {
            return parent::update(array(), array('$set' => array('primary_photo' => $this->getPhoto())));
        }
        return false;
    }

    /**
     * Removes a photo from the list
     * @return boolean
     */
    function deletePhoto() {
        if (trim($this->getPhoto()) != '') {
            return parent::update(array(), array('$pull' => array('photos' => $this->getPhoto())));
        }
        return false;
    }
}