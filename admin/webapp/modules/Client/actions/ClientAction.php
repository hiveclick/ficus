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
class ClientAction extends BasicAction
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
		
		if (\MongoId::isValid($client->getId())) {
			$client->query();	
		}
		
		/* @var $shift \Ficus\Shift */
		$shift = new \Ficus\Shift();
		$shift->setClient($client->getId());
		$shift->setSort('clock_in_time');
		$shift->setSord('DESC');
		$shift->setIgnorePagination(true);
		$shifts = $shift->queryAll();
		
		$this->getContext()->getRequest()->setAttribute("shifts", $shifts);
		
		$this->getContext()->getRequest()->setAttribute("client", $client);
		return View::SUCCESS;
	}
}

?>