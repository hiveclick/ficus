<?php
namespace Ficus\Link;

class Location extends BaseLink {
    
    protected $latitude;
    protected $longitude;
    protected $accuracy;
    protected $distance;
    
    /**
     * Returns the latitude
     * @return float
     */
    function getLatitude() {
        if (is_null($this->latitude)) {
            $this->latitude = 0;
        }
        return $this->latitude;
    }
    
    /**
     * Sets the latitude
     * @var float
     */
    function setLatitude($arg0) {
        $this->latitude = (float)$arg0;
        $this->addModifiedColumn("latitude");
        return $this;
    }
    
    /**
     * Returns the longitude
     * @return float
     */
    function getLongitude() {
        if (is_null($this->longitude)) {
            $this->longitude = 0;
        }
        return $this->longitude;
    }
    
    /**
     * Sets the longitude
     * @var float
     */
    function setLongitude($arg0) {
        $this->longitude = (float)$arg0;
        $this->addModifiedColumn("longitude");
        return $this;
    }
    
    /**
     * Returns the accuracy
     * @return float
     */
    function getAccuracy() {
        if (is_null($this->accuracy)) {
            $this->accuracy = 0;
        }
        return $this->accuracy;
    }
    
    /**
     * Sets the accuracy
     * @var float
     */
    function setAccuracy($arg0) {
        $this->accuracy = (float)$arg0;
        $this->addModifiedColumn("accuracy");
        return $this;
    }
    
    /**
     * Returns the distance
     * @return integer
     */
    function getDistance() {
        if (is_null($this->distance)) {
            $this->distance = 100;
        }
        return $this->distance;
    }
    
    /**
     * Sets the distance
     * @var integer
     */
    function setDistance($arg0) {
        $this->distance = $arg0;
        $this->addModifiedColumn("distance");
        return $this;
    }
    
    
    
}