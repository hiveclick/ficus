<?php
use Mojavi\Action\BasicRestAction;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class DischargeStatusAction extends BasicRestAction
{

	// +-----------------------------------------------------------------------+
	// | METHODS															   |
	// +-----------------------------------------------------------------------+

	/**
	 * Execute any application/business logic for this action.
	 * @return mixed - A string containing the view name associated with this action
	 */
	public function execute ()
	{
		return parent::execute();
	}

	/**
	 * Returns the input form to use for this rest action
	 * @return \Ficus\Adl
	 */
	function getInputForm() {
		return new \Ficus\Setting();
	}
	
	/**
	 * Executes a POST
	 */
	function executePost($input_form) {
	    $ajax_form = new \Mojavi\Form\AjaxForm();
	    if (isset($_REQUEST['discharge_status'])) {
	       \Ficus\Setting::saveSetting('discharge_status', implode("\t", $_REQUEST['discharge_status']));
	    } else {
	        \Ficus\Setting::saveSetting('discharge_status', '');
	    }
	    $ajax_form->setRowsAffected(1);
	    $ajax_form->setRecord($input_form);
	    return $ajax_form;
	}
}

?>