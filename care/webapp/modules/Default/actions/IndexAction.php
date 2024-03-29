<?php
use Mojavi\Action\BasicAction;
use Mojavi\View\View;
use Mojavi\Request\Request;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class IndexAction extends BasicAction
{

	// +-----------------------------------------------------------------------+
	// | METHODS															   |
	// +-----------------------------------------------------------------------+

	/**
	 * Execute any application/business logic for this action.
	 *
	 * @return mixed - A string containing the view name associated with this action
	 */
	public function execute ()
	{	    
	    if (isset($_REQUEST['shift']) && \MongoId::isValid($_REQUEST['shift'])) {
	        $shift = new \Ficus\Shift();
	        $shift->setId($_REQUEST['shift']);
	        $shift->query();
	        
	        if (\MongoId::isValid($shift->getId())) {
	            $this->getContext()->getRequest()->setAttribute('shift', $shift);
	        } else {
	            $this->getContext()->getRequest()->setAttribute('shift', new \Ficus\Shift());
	        }
	    } else {
	        $this->getContext()->getRequest()->setAttribute('shift', new \Ficus\Shift());
	    }
        
		return View::SUCCESS;
	}
	
	/**
	 * Indicates that this action requires security.
	 *
	 * @return bool true, if this action requires security, otherwise false.
	 */
	public function isSecure ()
	{
	
		return TRUE;
	
	}
}

?>