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
class EmergencyContactWizardAction extends BasicAction
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
		/* @var $framily Ficus\Framily */
		$framily = new \Ficus\Framily();
		$framily->populate($_GET);
		
		if (\MongoId::isValid($framily->getId())) {
			$framily->query();	
		}
		
		$this->getContext()->getRequest()->setAttribute("framily", $framily);
		
		return View::SUCCESS;
	}
}

?>