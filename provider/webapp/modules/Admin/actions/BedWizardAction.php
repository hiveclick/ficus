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
class BedWizardAction extends BasicAction
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
		/* @var $bed Ficus\Bed */
		$bed = new \Ficus\Bed();
		$bed->populate($_GET);
		
		if (\MongoId::isValid($bed->getId())) {
			$bed->query();	
		}
		
		$facility = new \Ficus\Facility();
		$facility->setSort('name');
		$facility->setSord('ASC');
		$facility->setIgnorePagination(true);
		$facilities = $facility->queryAll();
		
		// Pull in the list of unique room names
		$rooms = $bed->queryUniqueRoomNames();
		
		$this->getContext()->getRequest()->setAttribute("rooms", $rooms);
		$this->getContext()->getRequest()->setAttribute("facilities", $facilities);
		$this->getContext()->getRequest()->setAttribute("bed", $bed);
				
		return View::SUCCESS;
	}
}

?>