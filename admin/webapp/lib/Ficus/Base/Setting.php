<?php
namespace Ficus\Base;

use \Mojavi\Form\MongoForm;
/**
 * DaoAccount_Form_BaseSetting contains methods to work with the setting table.
 *  
 * @author	Mark Hobson 
 * @since 03/13/2013 6:38 pm 
 */
class Setting extends MongoForm {

	// +------------------------------------------------------------------------+
	// | PRIVATE VARIABLES														|
	// +------------------------------------------------------------------------+

	protected $name;  
	protected $value;  

	// +------------------------------------------------------------------------+
    // | CONSTRUCTOR															|
    // +------------------------------------------------------------------------+
    /**
     * Constructs a new object
     * @return AccountUser
     */
    function __construct() {
     	$this->setCollectionName('setting');
     	$this->setDbName('default');
	}

	/**
	 * Returns the name 
	 * @return	string 
	 */
	public function getName() {
		if (is_null($this->name)) {
			$this->name = "";
		}
		return $this->name;
	}

	/**
	 * Sets the name 
	 * @param	string 
	 * @return	void
	 */
	public function setName($arg0) {
	    if ($arg0 != $this->name) { $this->addModifiedColumn('name'); }
		$this->name = $arg0;
		return $this;
	}

	/**
	 * Returns the value 
	 * @return	string 
	 */
	public function getValue() {
		if (is_null($this->value)) {
			$this->value = "";
		}
		return $this->value;
	}

	/**
	 * Sets the value 
	 * @param	string 
	 * @return	void
	 */
	public function setValue($arg0) {
	    if ($arg0 != $this->value) { $this->addModifiedColumn('value'); }
		$this->value = $arg0;
		return $this;
	}
	
	/**
	 * Ensures the indexes
	 */
	function ensureIndex() {
	    $this->getCollection()->ensureIndex(array('name' => 1), array('unique' => true));
	}
}
?>