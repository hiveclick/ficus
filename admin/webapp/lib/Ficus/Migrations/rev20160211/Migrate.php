<?php
namespace Ficus\Migrations\rev20160211;

class Migrate extends \Mojavi\Migration\Migration {
	
	/**
	 * Upgrades to this version
	 * @return boolean
	 */
	function up() {
		// Ensure that all the tables are built correctly
		\Mojavi\Util\StringTools::consoleWrite('   - Data Initialization', 'Building', \Mojavi\Util\StringTools::CONSOLE_COLOR_YELLOW);
		
	    // Check if we have a first time user yet
		$administrator = new \Ficus\Administrator();
		$active_user = $administrator->query(array('status' => \Ficus\Administrator::ADMINISTRATOR_STATUS_ACTIVE), false);
		if ($active_user === false) {
			// we don't have a user yet, let's create one
			/* @var $user \Ficus\Administrator */
			$user = new \Ficus\Administrator();
			$user->setName('Admin User');
			$user->setEmail('admin');
			$user->setPassword('admin');
			$user->setStatus(\Ficus\Administrator::ADMINISTRATOR_STATUS_ACTIVE);
			$user->setTimezone('America/Los_Angeles');
			$user->insert();
		}

		\Mojavi\Util\StringTools::consoleWrite('   - Data Initialization', 'Done', \Mojavi\Util\StringTools::CONSOLE_COLOR_GREEN, true);
	}

	/**
	 * Downgrades to this version
	 * @return boolean
	 */
	function down() {

	}

}