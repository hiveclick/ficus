<?php
use Mojavi\Action\BasicRestAction;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class CalendarAppointmentStatusAction extends BasicRestAction
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
	    $calendar_appt_statuses = array();
	    if (isset($_REQUEST['calendar_appt_status'])) {
    	    foreach ($_REQUEST['calendar_appt_status'] as $calendar_appt_status) {
    	        $calendar_appt_statuses[] = json_encode($calendar_appt_status);
    	    }
	    }
	    \Ficus\Setting::saveSetting('calendar_appt_status', implode("\t", $calendar_appt_statuses));
	    $ajax_form->setRowsAffected(1);
	    $ajax_form->setRecord($input_form);
	    return $ajax_form;
	}
}

?>