<?php
use Mojavi\Action\BasicRestAction;
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
		return parent::execute();
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
	    if (isset($_FILES['filename']) && isset($_FILES['filename']['tmpname'])) {
	        $input_form->setFilename($_FILES['filename']['tmpname']);
	        try {
                $rows_affected = $input_form->import();
                $ajax_form->setRowsAffected($rows_affected);
	        } catch (\Exception $e) {
	            $this->getErrors()->addError('error', $e->getMessage());
	        }
	    } else {
	        $this->getErrors()->addError('error', 'No file was uploaded');
	    }
	    $ajax_form->setRecord($input_form);
	    return $ajax_form;
	}
}

?>