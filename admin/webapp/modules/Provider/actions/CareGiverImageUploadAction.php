<?php
use Mojavi\Action\BasicRestAction;
use Mojavi\Form\AjaxForm;
use Mojavi\Error\Error;
use Mojavi\View\View;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class CareGiverImageUploadAction extends BasicRestAction
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
	    $ajax_form = new AjaxForm();
	    
	    try {
	        $input_form = new \Ficus\CareGiver();
    	    $input_form->populate($_REQUEST);
    	    $input_form->query();

		    if (\MongoId::isValid($input_form->getId())) {
        	    if (isset($_FILES['picture'])) {
        	        $bucket = 'buxbuxcache';
        	        $keyname = $input_form->getId();
        	         
        	        // Instantiate the client.
        	        $s3 = \Aws\S3\S3Client::factory(array(
        	            'credentials' => array(
        	                'key'    => 'AKIAI3KNXYYDYUHGIX3A',
        	                'secret' => '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',
        	            ),
        	            'region' => 'us-west-1',
        	            'version' => '2006-03-01'
        	        ));
        	         
        	        try {
        	            // Upload data.
        	            $result = $s3->putObject(array(
        	                'Bucket' => $bucket,
        	                'Key'    => $keyname,
        	                'SourceFile'   => $_FILES['picture']['tmp_name'],
        	                'ContentType'  => 'image/png',
        	                'ACL'          => 'public-read',
        	                'StorageClass' => 'REDUCED_REDUNDANCY',
        	                'Metadata'     => array(
        	                    'care_giver_id' => $input_form->getId()
        	                )
        	            ));
        	        
        	            if (isset($result['ObjectURL'])) {
        	                $input_form->setProfileImageUrl($result['ObjectURL']);
        	                $input_form->update();
        	            }
        	        } catch (S3Exception $e) {
        	            echo $e->getMessage() . "\n";
        	        }
        	    } else {
        	        throw new \Exception('No picture was uploaded to be saved');
        	    }
    	    } else {
    	        throw new \Exception('Cannot find a care giver to match the id');
    	    }
    	    $ajax_form->setRecord($input_form);
	    } catch (\Exception $e) {
	        $this->getErrors()->addError('error', new Error($e->getMessage()));
	    }
	    $this->getContext()->getRequest()->setAttribute("ajax_form", $ajax_form);
	    
	    return View::SUCCESS;
	    
	}

	/**
	 * Returns the input form to use for this rest action
	 * @return \Ficus\Client
	 */
	function getInputForm() {
		return new \Ficus\Client();
	}
	
	/**
	 * executes a post
	 * @return AjaxForm 
	 */
	function executePost($input_form) {
	    
	}
}

?>