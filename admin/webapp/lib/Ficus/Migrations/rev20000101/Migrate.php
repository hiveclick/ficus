<?php
namespace Ficus\Migrations\rev20000101;

class Migrate extends \Mojavi\Migration\Migration {
	
	/**
	 * Upgrades to this version
	 * @return boolean
	 */
	function up() {
		// Ensure that all the tables are built correctly
		\Mojavi\Util\StringTools::consoleWrite('   - Index Initialization', 'Building', \Mojavi\Util\StringTools::CONSOLE_COLOR_YELLOW);
		
		// Build User Indexes
		try {
			\Ficus\User::ensureIndexes();
		} catch (\Exception $e) {
			\Mojavi\Util\StringTools::consoleWrite('	 - User', $e->getMessage(), \Mojavi\Util\StringTools::CONSOLE_COLOR_RED, true);
		}

		\Mojavi\Util\StringTools::consoleWrite('   - Index Initialization', 'Done', \Mojavi\Util\StringTools::CONSOLE_COLOR_GREEN, true);
	}

	/**
	 * Downgrades to this version
	 * @return boolean
	 */
	function down() {

	}

}