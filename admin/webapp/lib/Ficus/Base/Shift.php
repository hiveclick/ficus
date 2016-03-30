<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Shift extends MongoForm {

    protected $care_giver;
    protected $client;
    protected $clock_in_time;
    protected $clock_out_time;
    
    protected $is_opened;
    protected $is_closed;
    protected $adls;
    
    protected $notes;
    protected $clock_in_location;
    protected $clock_out_location;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('shift');
        $this->setDbName('default');
    }
    
    /**
     * Returns the care_giver
     * @return Ficus\Link\CareGiver
     */
    function getCareGiver() {
        if (is_null($this->care_giver)) {
            $this->care_giver = new \Ficus\Link\CareGiver();
        }
        return $this->care_giver;
    }
    
    /**
     * Sets the care_giver
     * @var Ficus\Link\CareGiver
     */
    function setCareGiver($arg0) {
        if (is_array($arg0)) {
            $this->care_giver = new \Ficus\Link\CareGiver();
            $this->care_giver->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\CareGiver) {
            $this->care_giver = $arg0;
        } else if ($arg0 instanceof \MongoId) {
            $this->care_giver = new \Ficus\Link\CareGiver();
            $this->care_giver->setId($arg0);
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->care_giver = new \Ficus\Link\CareGiver();
            $this->care_giver->setId(new \MongoId($arg0));
        }
        $this->addModifiedColumn("care_giver");
        return $this;
    }
    
    /**
     * Returns the client
     * @return \Ficus\Link\Client
     */
    function getClient() {
        if (is_null($this->client)) {
            $this->client = new \Ficus\Link\Client();
        }
        return $this->client;
    }
    
    /**
     * Sets the client
     * @var \Ficus\Link\Client
     */
    function setClient($arg0) {
        if (is_array($arg0)) {
            $this->client = new \Ficus\Link\Client();
            $this->client->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Client) {
            $this->client = $arg0;
        } else if ($arg0 instanceof \MongoId) {
            $this->client = new \Ficus\Link\Client();
            $this->client->setId($arg0);
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->client = new \Ficus\Link\Client();
            $this->client->setId(new \MongoId($arg0));
        }
        $this->addModifiedColumn("client");
        return $this;
    }
    
    /**
     * Returns the clock_in_time
     * @return \MongoDate
     */
    function getClockInTime() {
        if (is_null($this->clock_in_time)) {
            $this->clock_in_time = new \MongoDate();
        }
        return $this->clock_in_time;
    }
    
    /**
     * Sets the clock_in_time
     * @var \MongoDate
     */
    function setClockInTime($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->clock_in_time = $arg0;
        } else if (is_int($arg0)) {
            $this->clock_in_time = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            if (strtotime($arg0) < 86400) {
                $arg0 = date('m/d/Y ' . $arg0);
            }
            $this->clock_in_time = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("clock_in_time");
        return $this;
    }
    
    /**
     * Returns the clock_out_time
     * @return \MongoDate
     */
    function getClockOutTime() {
        if (is_null($this->clock_out_time)) {
            $this->clock_out_time = new \MongoDate();
        }
        return $this->clock_out_time;
    }
    
    /**
     * Sets the clock_out_time
     * @var \MongoDate
     */
    function setClockOutTime($arg0) {
        if ($arg0 instanceof \MongoDate) {
            $this->clock_out_time = $arg0;
        } else if (is_int($arg0)) {
            $this->clock_out_time = new \MongoDate($arg0);
        } else if (is_string($arg0)) {
            if (strtotime($arg0) < 86400) {
                $arg0 = date('m/d/Y ' . $arg0);
            }
            $this->clock_out_time = new \MongoDate(strtotime($arg0));
        }
        $this->addModifiedColumn("clock_out_time");
        return $this;
    }
    
    /**
     * Returns the clock_in_location
     * @return \Ficus\Link\Location
     */
    function getClockInLocation() {
        if (is_null($this->clock_in_location)) {
            $this->clock_in_location = new \Ficus\Link\Location();
        }
        return $this->clock_in_location;
    }
    
    /**
     * Sets the clock_in_location
     * @var \Ficus\Link\Location
     */
    function setClockInLocation($arg0) {
        if (is_array($arg0)) {
            $this->clock_in_location = new \Ficus\Link\Location();
            $this->clock_in_location->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Location) {
            $this->clock_in_location = $arg0;
        }
        $this->addModifiedColumn("clock_in_location");
        return $this;
    }
    
    /**
     * Returns the clock_out_location
     * @return \Ficus\Link\Location
     */
    function getClockOutLocation() {
        if (is_null($this->clock_out_location)) {
            $this->clock_out_location = new \Ficus\Link\Location();
        }
        return $this->clock_out_location;
    }
    
    /**
     * Sets the clock_out_location
     * @var \Ficus\Link\Location
     */
    function setClockOutLocation($arg0) {
        if (is_array($arg0)) {
            $this->clock_out_location = new \Ficus\Link\Location();
            $this->clock_out_location->populate($arg0);
        } else if ($arg0 instanceof \Ficus\Link\Location) {
            $this->clock_out_location = $arg0;
        }
        $this->addModifiedColumn("clock_out_location");
        return $this;
    }
    
    /**
     * Returns the adls
     * @return array
     */
    function getAdls() {
        if (is_null($this->adls)) {
            $this->adls = array();
        }
        return $this->adls;
    }
    
    /**
     * Sets the adls
     * @var array
     */
    function setAdls($arg0) {
        $this->adls = array();
        if (is_array($arg0)) {
            foreach ($arg0 as $adl) {
                if (is_array($adl)) {
                    $new_adl = new \Ficus\Link\Adl();
                    $new_adl->populate($adl);
                    $this->adls[] = $new_adl;
                } else if ($adl instanceof \Ficus\Link\Adl) {
                    $this->adls[] = $adl;
                } else if ($adl instanceof \MongoId) {
                    $new_adl = new \Ficus\Link\Adl();
                    $new_adl->setId($adl);
                    $this->adls[] = $new_adl;
                } else if (is_string($adl) && \MongoId::isValid($adl)) {
                    $new_adl = new \Ficus\Link\Adl();
                    $new_adl->setId($adl);
                    $this->adls[] = $new_adl;
                }
            }
        } else if ($arg0 instanceof \Ficus\Link\Adl) {
            $this->adls[] = $arg0;
        } else if ($adl instanceof \MongoId) {
            $new_adl = new \Ficus\Link\Adl();
            $new_adl->setId($adl);
            $this->adls[] = $new_adl;
        } else if (is_string($adl) && \MongoId::isValid($adl)) {
            $new_adl = new \Ficus\Link\Adl();
            $new_adl->setId($adl);
            $this->adls[] = $new_adl;
        }
        $this->addModifiedColumn("adls");
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
     * Returns the is_closed
     * @return boolean
     */
    function getIsClosed() {
        if (is_null($this->is_closed)) {
            $this->is_closed = false;
        }
        return $this->is_closed;
    }
    
    /**
     * Sets the is_closed
     * @var boolean
     */
    function setIsClosed($arg0) {
        $this->is_closed = (boolean)$arg0;
        $this->addModifiedColumn("is_closed");
        return $this;
    }
    
    /**
     * Returns the is_opened
     * @return boolean
     */
    function getIsOpened() {
        if (is_null($this->is_opened)) {
            $this->is_opened = false;
        }
        return $this->is_opened;
    }
    
    /**
     * Sets the is_opened
     * @var boolean
     */
    function setIsOpened($arg0) {
        $this->is_opened = (boolean)$arg0;
        $this->addModifiedColumn("is_opened");
        return $this;
    }
    
}