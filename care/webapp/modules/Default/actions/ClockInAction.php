<?php
use Mojavi\Action\BasicAction;
use Mojavi\View\View;
use Mojavi\Error\Error;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class ClockInAction extends BasicAction
{

	// +-----------------------------------------------------------------------+
	// | METHODS															   |
	// +-----------------------------------------------------------------------+
	const DEBUG = MO_DEBUG;
	/**
	 * Execute any application/business logic for this action.
	 *
	 * @return mixed - A string containing the view name associated with this
	 *				 action, or...
	 *			   - An array with three indices:
	 *				 0. The parent module of the view that will be executed.
	 *				 1. The parent action of the view that will be executed.
	 *				 2. The view that will be executed.
	 */
	public function execute ()
	{
	    try {
    		/* @var $shift Ficus\Shift */
    		$shift = new \Ficus\Shift();
    		$shift->populate($_REQUEST);
    		$shift->setClockInTime(new \MongoDate());
    		$shift->setIsOpened(true);
    		$shift->setCareGiver($this->getContext()->getUser()->getUserDetails()->getId());
    		$shift->insert();
    		
    		// Also update the location on the client
    		$client = $shift->getClient()->getClient();
    		$client->setLocation($shift->getClockInLocation());
    		$client->update();
    		
    		$this->getContext()->getRequest()->setAttribute('shift', $shift);
    		return View::SUCCESS;
	    } catch (\Exception $e) {
	        \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . $e->getMessage());
	        $this->getErrors()->addError('error', new \Mojavi\Error\Error($e->getMessage()));
	    }
		return View::ERROR;
	}

	// -------------------------------------------------------------------------

	/**
	 * Retrieve the default view to be executed when a given request is not
	 * served by this action.
	 *
	 * @return mixed - A string containing the view name associated with this
	 *				 action, or...
	 *			   - An array with three indices:
	 *				 0. The parent module of the view that will be executed.
	 *				 1. The parent action of the view that will be executed.
	 *				 2. The view that will be executed.
	 */
	public function getDefaultView ()
	{
		return View::SUCCESS;
	}
	
	/**
	 * Indicates that this action requires security.
	 *
	 * @return bool true, if this action requires security, otherwise false.
	 */
	public function isSecure ()
	{
	
		return true;
	
	}

}

?>
