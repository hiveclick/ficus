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
class ClockOutAction extends BasicAction
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
    		if (isset($_REQUEST['_id']) && \MongoId::isValid($_REQUEST['_id'])) {
    		    $shift->setId($_REQUEST['_id']);
    		    $shift->query();
    		    if (\MongoId::isValid($shift->getId())) {
    		        if ($shift->getIsClosed() && $shift->getIsOpened()) {
    		            throw new \Exception('You have already clocked out of this shift.  Please clock in again for this client.');
    		        }
    		        $shift->populate($_REQUEST);
    		        $shift->setClockOutTime(new \MongoDate());
    		        if (!$shift->getIsOpened()) {
    		            $shift->setIsOpened(true);
    		        }
            		$shift->setIsClosed(true);
            		$shift->setCareGiver($this->getContext()->getUser()->getUserDetails()->getId());
            		$shift->update();
            		$this->getContext()->getRequest()->setAttribute('shift', $shift);
            		return View::SUCCESS;
    		    }
    		}
    		
    		// Attempt to find a clocked in shift with this client
    		unset($_REQUEST['_id']);
    		$shift->populate($_REQUEST);
    		$open_shift = $shift->query(array('care_giver._id' => $this->getContext()->getUser()->getUserDetails()->getId(), 'client._id' => $shift->getClient()->getId(), 'is_opened' => true, 'is_closed' => false), false);
    		if ($open_shift !== false) {
    		    if (\MongoId::isValid($open_shift->getId())) {
    		        $open_shift->populate($_REQUEST);
    		        $open_shift->setClockOutTime(new \MongoDate());
    		        $open_shift->setIsClosed(true);
    		        $open_shift->setCareGiver($this->getContext()->getUser()->getUserDetails()->getId());
    		        $open_shift->update();
    		        $this->getContext()->getRequest()->setAttribute('shift', $open_shift);
    		        return View::SUCCESS;
    		    }
    		}
    		
    		
    		$shift->populate($_REQUEST);
    		$shift->setClockOutTime(new \MongoDate());
    		$shift->setIsClosed(true);
    		$shift->setCareGiver($this->getContext()->getUser()->getUserDetails()->getId());
    		$shift_id = $shift->insert();
    		$shift->setId($shift_id);
    		$this->getContext()->getRequest()->setAttribute('shift', $shift);
    		return View::INPUT;
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
