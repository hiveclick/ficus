<?php
use \Mojavi\Action\BasicRestAction;
use Mojavi\Form\AjaxForm;
/**
* SettingAction goes to a page allowing you to use REST verbs for the setting table.
*  
* @author Mark Hobson 
* @since 02/10/2012 10:36 pm 
*/
class UpdateProgressAction extends BasicRestAction {

	const DEBUG = MO_DEBUG;

	/**
	 * Returns the form to use for this rest request
	 * @return Form
	 */
	public function getInputForm() {
		return new \Ficus\Updater();
	}

	/**
	 * Perform any execution code for this action
	 * @return integer (View::SUCCESS, View::ERROR, View::NONE)
	 */
	public function execute ()
	{
		return parent::execute();
	}
	
	/**
	 * Executes a GET request
	 * @return \Mojavi\Form\AjaxForm
	 */
	function executeGet($input_form) {
		// Handle GET Requests
		
		$ajax_form = new AjaxForm();
		try {
			$input_form->checkProgress();
		} catch (\Exception $e) {
			$this->getErrors()->addError('error', $e->getMessage());
		}
		$ajax_form->setRecord($input_form);
		return $ajax_form;
	}
} 
?>