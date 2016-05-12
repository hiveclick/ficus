<?php
require_once(MO_MODULE_DIR . DIRECTORY_SEPARATOR . '/Default/views/DefaultIndexView.php');

class FacilityPhotoUploadSuccessView extends DefaultIndexView
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
		parent::execute();

		$this->setDecoratorTemplate('blank.shell.php');
	}

}
