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
class FacilityWizardAction extends BasicAction
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
		/* @var $facility Ficus\Facility */
		$facility = new \Ficus\Facility();
		$facility->populate($_GET);
		
		if (\MongoId::isValid($facility->getId())) {
			$facility->query();	
		}
		
		$staff = new \Ficus\Staff();
		$staff->setSort('name');
		$staff->setSord('ASC');
		$staff->setIgnorePagination(true);
		$staffs = $staff->queryAll();
		
		$this->getContext()->getRequest()->setAttribute("facility", $facility);
		$this->getContext()->getRequest()->setAttribute("staffs", $staffs);
		
		return View::SUCCESS;
	}
}

?>