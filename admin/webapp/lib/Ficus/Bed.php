<?php
namespace Ficus;

class Bed extends Base\Bed {
    
    private $facility_id_array;
    
    /**
     * Returns the facility_id_array
     * @return array
     */
    function getFacilityIdArray() {
        if (is_null($this->facility_id_array)) {
            $this->facility_id_array = array();
        }
        return $this->facility_id_array;
    }
    
    /**
     * Sets the facility_id_array
     * @var array
     */
    function setFacilityIdArray($arg0) {
        $this->facility_id_array = array();
        if (is_array($arg0)) {
            foreach ($arg0 as $arg) {
                if ($arg instanceof \MongoId) {
                    $this->facility_id_array[] = $arg;
                } else if (is_string($arg) && \MongoId::isValid($arg)) {
                    $this->facility_id_array[] = new \MongoId($arg);
                }
            }
        } else if ($arg0 instanceof \MongoId) {
            $this->facility_id_array[] = $arg0;
        } else if (is_string($arg0) && \MongoId::isValid($arg0)) {
            $this->facility_id_array[] = new \MongoId($arg0);
        }
        $this->addModifiedColumn("facility_id_array");
        return $this;
    }
    
    /**
     * Queries all the beds by facility
     * @return array
     */
    function queryAll(array $criteria = array(), array $fields = array(), $hydrate = true, $timeout = 30000) {
        if (count($this->getFacilityIdArray()) > 0) {
            $criteria['facility._id'] = array('$in' => $this->getFacilityIdArray());
        }
        if (trim($this->getName()) != '') {
            $criteria['name'] = new \MongoRegex("/" . $this->getName() . "/i");
        }
        return parent::queryAll($criteria, $fields, $hydrate, $timeout);
    }
    
    /**
     * Queries a list of the unique tag names
     * @return array
     */
    static function queryUniqueRoomNames() {
        $ret_val = array();
        $bed = new self();
        $results = $bed->getCollection()->aggregate(array(array('$group' => array('_id' => array('room' => '$room', 'facility' => '$facility._id'), 'room_name' => array('$max' => '$room'), 'facility_id' => array('$max' => '$facility._id'), 'facility_name' => array('$max' => '$facility.name')))), array('allowDiskUse' => true, 'maxTimeMS' => 1200000));
        if (isset($results['result'])) {
            foreach ($results['result'] as $result) {
                $ret_val[] = array('_id' => ($result['room_name'] . '_' . $result['facility_id']), 'room_name' => $result['room_name'], 'facility_name' => $result['facility_name']);
            }
            asort($ret_val);
            return $ret_val;
        } else {
            return $ret_val;
        }
    }
    
}