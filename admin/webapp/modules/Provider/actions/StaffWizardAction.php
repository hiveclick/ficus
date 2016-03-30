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
class StaffWizardAction extends BasicAction
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
		/* @var $staff Ficus\Staff */
		$staff = new \Ficus\Staff();
		$staff->populate($_GET);
		
		if (\MongoId::isValid($staff->getId())) {
			$staff->query();	
		}
		
		$provider = new \Ficus\Provider();
		$provider->setSort('name');
		$provider->setSord('ASC');
		$provider->setIgnorePagination(true);
		$providers = $provider->queryAll();
		
		$this->getContext()->getRequest()->setAttribute("providers", $providers);
		$this->getContext()->getRequest()->setAttribute("staff", $staff);
		
		return View::SUCCESS;
	}
}

?>