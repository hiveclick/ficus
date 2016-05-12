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
class ClientWizardAction extends BasicAction
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
		/* @var $client Ficus\Client */
		$client = new \Ficus\Client();
		$client->populate($_GET);
		
		/* @var $icd \Ficus\Icd */
		$icd = new \Ficus\Icd();
		$icd->setIgnorePagination(true);
		$icd->setShowApprovedOnly(true);
		$icd_codes = $icd->queryAll();
		
		$this->getContext()->getRequest()->setAttribute("icd_codes", $icd_codes);
		$this->getContext()->getRequest()->setAttribute("client", $client);
		
		return View::SUCCESS;
	}
}

?>