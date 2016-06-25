<?php
/**
 * Created by PhpStorm.
 * User: hobby
 * Date: 5/16/16
 * Time: 4:31 PM
 */

namespace Ficus\Base;

use Mojavi\Form\MongoForm;

class Form extends MongoForm
{
	protected $name;
	protected $description;
	protected $author;
	protected $is_system_form;
	protected $last_modified;

	protected $container;

	/**
	 * Constructs new form
	 * @return void
	 */
	function __construct() {
		$this->setCollectionName('form');
		$this->setDbName('default');
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		if (is_null($this->name)) {
			$this->name = "";
		}
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
		$this->addModifiedColumn("name");
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		if (is_null($this->description)) {
			$this->description = "";
		}
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		$this->addModifiedColumn("description");
	}

	/**
	 * @return mixed
	 */
	public function getAuthor()
	{
		if (is_null($this->author)) {
			$this->author = "";
		}
		return $this->author;
	}

	/**
	 * @param mixed $author
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
		$this->addModifiedColumn("author");
	}

	/**
	 * @return boolean
	 */
	public function getIsSystemForm()
	{
		if (is_null($this->is_system_form)) {
			$this->is_system_form = false;
		}
		return $this->is_system_form;
	}

	/**
	 * @param boolean $is_system_form
	 */
	public function setIsSystemForm($is_system_form)
	{
		$this->is_system_form = (boolean)$is_system_form;
		$this->addModifiedColumn("is_system_form");
	}

	/**
	 * @return \MongoDate
	 */
	public function getLastModified()
	{
		if (is_null($this->last_modified)) {
			$this->last_modified = new \MongoDate();
		}
		return $this->last_modified;
	}

	/**
	 * @param \MongoDate $last_modified
	 */
	public function setLastModified($last_modified)
	{
		if ($last_modified instanceof \MongoDate) {
			$this->last_modified = $last_modified;
		} else if (is_int($last_modified)) {
			$this->last_modified = new \MongoDate($last_modified);
		} else if (is_string($last_modified)) {
			$this->last_modified = new \MongoDate(strtotime($last_modified));
		}
		$this->addModifiedColumn("last_modified");
	}

	/**
	 * @return mixed
	 */
	public function getContainer()
	{
		if (is_null($this->container)) {
			$this->container = array();
		}
		return $this->container;
	}

	/**
	 * @param mixed $container
	 */
	public function setContainer($container)
	{
		if (is_array($container)) {
			$this->container = $container;
		}
		$this->addModifiedColumn("container");
	}
}