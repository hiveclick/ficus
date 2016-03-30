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
class ProviderAction extends BasicAction
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
		/* @var $provider Ficus\Provider */
		$provider = new \Ficus\Provider();
		$provider->populate($_GET);
		
		if (\MongoId::isValid($provider->getId())) {
			$provider->query();	
		}
		
		$this->getContext()->getRequest()->setAttribute("provider", $provider);
		return View::SUCCESS;
	}
}

?>