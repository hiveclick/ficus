<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Counter extends MongoForm {

    protected $key;
    protected $counter;
    
    /**
     * Constructs new user
     * @return void
     */
    function __construct() {
        $this->setCollectionName('counter');
        $this->setDbName('default');
    }
    
    /**
     * Returns the key
     * @return string
     */
    function getKey() {
        if (is_null($this->key)) {
            $this->key = "";
        }
        return $this->key;
    }
    
    /**
     * Sets the key
     * @var string
     */
    function setKey($arg0) {
        $this->key = strtoupper($arg0);
        $this->addModifiedColumn("key");
        return $this;
    }
    
    /**
     * Returns the counter
     * @return integer
     */
    function getCounter() {
        if (is_null($this->counter)) {
            $this->counter = 0;
        }
        return $this->counter;
    }
    
    /**
     * Sets the counter
     * @var integer
     */
    function setCounter($arg0) {
        $this->counter = (int)$arg0;
        $this->addModifiedColumn("counter");
        return $this;
    }
    
    /**
     * Ensures that the mongo indexes are set (should be called once)
     * @return boolean
     */
    public static function ensureIndexes() {
        $user = new self();
        $user->getCollection()->ensureIndex(array('key' => 1), array('unique' => true, 'background' => true));
        return true;
    }
    
}