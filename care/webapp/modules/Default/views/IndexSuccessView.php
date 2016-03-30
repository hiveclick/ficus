<?php
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'DefaultIndexView.php');

class IndexSuccessView extends DefaultIndexView
{

	// +-----------------------------------------------------------------------+
	// | METHODS															   |
	// +-----------------------------------------------------------------------+

	/**
	 * Execute any presentation logic and set template attributes.
	 *
	 * @return void
	 */
	public function execute ()
	{
	    /* @var $client \Ficus\Client */
	    $client = new \Ficus\Client();
	    $client->setSort('lastname');
	    $client->setSord('ASC');
	    $clients = $client->queryAll();
	     
	    $this->getContext()->getRequest()->setAttribute('clients', $clients);
	    
	    /* @var $adl \Ficus\Adl */
	    $adl = new \Ficus\Adl();
	    $adl->setSort('name');
	    $adl->setSord('ASC');
	    $adls = $adl->queryAll();
	     
	    $this->getContext()->getRequest()->setAttribute('adls', $adls);
	    
		parent::execute();
		$this->setTemplate('IndexSuccess.php');
	}

}