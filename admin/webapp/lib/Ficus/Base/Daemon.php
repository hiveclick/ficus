<?php
namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Daemon extends MongoForm {
	
	const DAEMON_STATUS_ACTIVE = 1;
	const DAEMON_STATUS_INACTIVE = 2;
	
	const DAEMON_RUN_STATUS_ACTIVE = 1;
	const DAEMON_RUN_STATUS_INACTIVE = 2;
	
	protected $name;
	protected $description;
	protected $type;
	protected $class_name;
	protected $threads;
	protected $pid;
	protected $start_time;
	protected $status;
	protected $run_status;
	protected $children;
	protected $pending_records;
	
	/**
	 * Constructs new user
	 * @return void
	 */
	function __construct() {
		$this->setCollectionName('daemon');
		$this->setDbName('default');
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
		$this->name = $arg0;
		$this->addModifiedColumn('name');
		return $this;
	}
	
	/**
	 * Returns the description
	 * @return string
	 */
	function getDescription() {
		if (is_null($this->description)) {
			$this->description = "";
		}
		return $this->description;
	}
	
	/**
	 * Sets the description
	 * @var string
	 */
	function setDescription($arg0) {
		$this->description = $arg0;
		$this->addModifiedColumn("description");
		return $this;
	}
	
	/**
	 * Returns the type
	 * @return string
	 */
	function getType() {
		if (is_null($this->type)) {
			$this->type = "";
		}
		return $this->type;
	}
	
	/**
	 * Sets the type
	 * @var string
	 */
	function setType($arg0) {
		$this->type = $arg0;
		$this->addModifiedColumn('type');
		return $this;
	}
	
	/**
	 * Returns the class_name
	 * @return string
	 */
	function getClassName() {
		if (is_null($this->class_name)) {
			$this->class_name = "";
		}
		return $this->class_name;
	}
	
	/**
	 * Sets the class_name
	 * @var string
	 */
	function setClassName($arg0) {
		$this->class_name = $arg0;
		$this->addModifiedColumn('class_name');
		return $this;
	}
	
	/**
	 * Returns the threads
	 * @return integer
	 */
	function getThreads() {
		if (is_null($this->threads)) {
			$this->threads = null;
		}
		return $this->threads;
	}
	
	/**
	 * Sets the threads
	 * @var integer
	 */
	function setThreads($arg0) {
		$this->threads = (int)$arg0;
		$this->addModifiedColumn('threads');
		return $this;
	}
	
	/**
	 * Returns the pid
	 * @return integer
	 */
	function getPid() {
		if (is_null($this->pid)) {
			$this->pid = null;
		}
		return $this->pid;
	}
	
	/**
	 * Sets the pid
	 * @var integer
	 */
	function setPid($arg0) {
		$this->pid = (int)$arg0;
		$this->addModifiedColumn('pid');
		return $this;
	}
	
	/**
	 * Returns the start_time
	 * @return MongoDate
	 */
	function getStartTime() {
		if (is_null($this->start_time)) {
			$this->start_time = null;
		}
		return $this->start_time;
	}
	
	/**
	 * Sets the start_time
	 * @var string|MongoDate
	 */
	function setStartTime($arg0) {
		if ($arg0 instanceof \MongoDate) {
			$this->start_time = $arg0;
		} else if (is_string($arg0)) {
			$this->start_time = new \MongoDate(strtotime($arg0));
		}
		$this->addModifiedColumn('start_time');
		return $this;
	}
	
	/**
	 * Returns the status
	 * @return integer
	 */
	function getStatus() {
		if (is_null($this->status)) {
			$this->status = null;
		}
		return $this->status;
	}
	
	/**
	 * Sets the status
	 * @var integer
	 */
	function setStatus($arg0) {
		$this->status = (int)$arg0;
		$this->addModifiedColumn('status');
		return $this;
	}
	
	/**
	 * Returns the run_status
	 * @return integer
	 */
	function getRunStatus() {
		if (is_null($this->run_status)) {
			$this->run_status = null;
		}
		return $this->run_status;
	}
	
	/**
	 * Sets the run_status
	 * @var integer
	 */
	function setRunStatus($arg0) {
		$this->run_status = (int)$arg0;
		$this->addModifiedColumn('run_status');
		return $this;
	}
	
	/**
	 * Returns the children
	 * @return array
	 */
	function getChildren() {
		if (is_null($this->children)) {
			$this->children = array();
		}
		return $this->children;
	}
	
	/**
	 * Sets the children
	 * @var string|array
	 */
	function setChildren($arg0) {
		if (is_array($arg0)) {
			$this->children = $arg0;
		} else if (is_string($arg0)) {
			if (strpos($arg0, ',')) {
				$this->children = explode(",", $arg0);
			} else {
				$this->children = array($arg0);
			}
		}
		$this->addModifiedColumn('children');
		return $this;
	}
	
	/**
	 * Returns the pending_records
	 * @return integer
	 */
	function getPendingRecords() {
		if (is_null($this->pending_records)) {
			$this->pending_records = 0;
		}
		return $this->pending_records;
	}
	
	/**
	 * Sets the pending_records
	 * @var integer
	 */
	function setPendingRecords($arg0) {
		$this->pending_records = (int)$arg0;
		$this->addModifiedColumn('pending_records');
		return $this;
	}
	
	// +------------------------------------------------------------------------+
	// | HELPER METHODS															|
	// +------------------------------------------------------------------------+
	
	/**
	 * Ensures that the mongo indexes are set (should be called once)
	 * @return boolean
	 */
	public static function ensureIndexes() {
		$daemon = new self();
		$daemon->getCollection()->ensureIndex(array('type' => 1), array('background' => true, 'unique' => true));
		return true;
	}
}
