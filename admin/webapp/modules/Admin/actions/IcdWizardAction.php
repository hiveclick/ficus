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
class IcdWizardAction extends BasicAction
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
		/* @var $icd Ficus\Icd */
		$icd = new \Ficus\Icd();
		$icd->populate($_GET);
		
		if (\MongoId::isValid($icd->getId())) {
			$icd->query();	
		}
		
		$this->getContext()->getRequest()->setAttribute("icd", $icd);
		
		return View::SUCCESS;
	}
}

?>