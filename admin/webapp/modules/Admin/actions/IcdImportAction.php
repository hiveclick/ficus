<?php
use Mojavi\Action\BasicRestAction;
use Mojavi\View\View;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class IcdImportAction extends BasicRestAction
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
		parent::execute();
		return View::SUCCESS;
	}

	/**
	 * Returns the input form to use for this rest action
	 * @return \Ficus\Icd
	 */
	function getInputForm() {
		return new \Ficus\Icd();
	}
	
	/**
	 * Processes a POST request
	 */
	function executePost($input_form) {
	    $ajax_form = new \Mojavi\Form\AjaxForm();
	    \Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . VAR_EXPORT($_FILES, true));
	    if (isset($_FILES['filename']) && isset($_FILES['filename']['tmp_name'])) {
	        $input_form->setFilename($_FILES['filename']['tmp_name']);
            $rows_affected = $input_form->import();
	        $ajax_form->setRowsAffected($rows_affected);
	    } else {
	        $this->getErrors()->addError('error', 'No file was uploaded');
	    }
	    $ajax_form->setRecord($input_form);
	    return $ajax_form;
	}
}

?>