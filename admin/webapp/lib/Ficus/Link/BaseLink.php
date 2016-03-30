<?php
namespace Ficus\Link;

use Mojavi\Form\CommonForm;
class BaseLink extends CommonForm {
    
    protected $name;
    
    /**
     * Sets the _id
     * @see \Mojavi\Form\Form::setId()
     */
    function setId($arg0) {
        if (is_string($arg0) && \MongoId::isValid($arg0)) {
        	parent::setId(new \MongoId($arg0));
        } else if ($arg0 instanceof \MongoId) {
        	parent::setId($arg0);
        } else if (is_null($arg0)) {
        	parent::setId($arg0);
        } else if (is_string($arg0) && trim($arg0) == '') {
        	parent::setId(null);
        } else {
        	try {
        		throw new \Exception('Invalid ID set: ' . var_export($arg0, true));
        	} catch (\Exception $e) {
        		\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . $e->getTraceAsString());
        		throw $e;
        	}
        }        
    }
    
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
    	if ($arg0 != $this->name) { $this->addModifiedColumn("name"); }
    	$this->name = $arg0;
    	return $this;
    }    
}