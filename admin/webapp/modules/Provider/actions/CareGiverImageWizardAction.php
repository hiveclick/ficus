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
class CareGiverImageWizardAction extends BasicAction
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
		/* @var $care_giver Ficus\CareGiver */
		$care_giver = new \Ficus\CareGiver();
		$care_giver->populate($_GET);
		
		if (\MongoId::isValid($care_giver->getId())) {
			$care_giver->query();	
		}
		
		$this->getContext()->getRequest()->setAttribute("care_giver", $care_giver);
		
		return View::SUCCESS;
	}
}

?>