<?php
use Mojavi\Action\BasicRestAction;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class FacilityPhotoAction extends BasicRestAction
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
	 * @return \Ficus\Provider
	 */
	function getInputForm() {
		return new \Ficus\Facility();
	}
	
	/**
	 * Execute any application/business logic for this action.
	 * @return mixed - A string containing the view name associated with this action
	 */
	public function executeGet($input_form)
	{
	    return parent::executeGet($input_form);
	}
	
	/**
	 * Execute any application/business logic for this action.
	 * @return mixed - A string containing the view name associated with this action
	 */
	public function executePost($input_form)
	{
	    // Handle POST Requests
	    $ajax_form = new \Mojavi\Form\AjaxForm();
	    $rows_affected = $input_form->assignPrimaryPhoto();
	    if (isset($rows_affected['n'])) {
	        $ajax_form->setRowsAffected($rows_affected['n']);
	    }
	    $ajax_form->setRecord($input_form);
	
	    return $ajax_form;
	}
	
	/**
	 * Execute any application/business logic for this action.
	 * @return mixed - A string containing the view name associated with this action
	 */
	public function executeDelete($input_form)
	{
	    // Handle DELETE Requests
	    $ajax_form = new \Mojavi\Form\AjaxForm();
	    $rows_affected = $input_form->deletePhoto();
	    if (isset($rows_affected['n'])) {
	        $ajax_form->setRowsAffected($rows_affected['n']);
	    }
	    $ajax_form->setRecord($input_form);
	     
	    return $ajax_form;
	}
}

?>