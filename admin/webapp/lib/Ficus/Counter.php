<?php
namespace Ficus;

class Counter extends Base\Counter {
    
    /**
     * Returns the next increment in the counter
     * This will increment the counter whether you use it or not
     * If $key does not exist, it will be created
     * @param string $key
     * @param boolean $create_if_not_exists
     * @return integer
     */
    static function getNextCounter($key, $create_if_not_exists = true) {
        $counter = new self();
        $ret_val = $counter->findAndModify(array('key' => strtoupper($key)), array('$inc' => array('counter' => 1)), array('counter' => true), array('new' => true, 'upsert' => $create_if_not_exists), true);
        return $ret_val->getCounter();
    }
    
    /**
     * Resets the counter to 0 or to the value specified
     * If $key does not exist, it will be created
     * @param string $key
     * @param integer $reset_to
     * @param boolean $create_if_not_exists
     * @return integer
     */
    static function resetCounter($key, $reset_to = 0, $create_if_not_exists = true) {
        $counter = new self();
        $ret_val = $counter->findAndModify(array('key' => strtoupper($key)), array('$set' => array('counter' => $reset_to)), array('counter' => true), array('new' => true, 'upsert' => $create_if_not_exists), true);
        return $ret_val->getCounter();
    }
}