<?php
use Mojavi\Action\BasicRestAction;
use Mojavi\View\View;
use Mojavi\Request\Request;
// +----------------------------------------------------------------------------+
// | This file is part of the Flux package.									  |
// |																			|
// | For the full copyright and license information, please view the LICENSE	|
// | file that was distributed with this source code.						   |
// +----------------------------------------------------------------------------+
class FacilityPhotoUploadAction extends BasicRestAction
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
     * @return \Ficus\Adl
     */
    function getInputForm() {
        return new \Ficus\Facility();
    }
    
    /**
     * Execute any application/business logic for this action.
     * @return mixed - A string containing the view name associated with this action
     */
    public function executePost($input_form)
    {
        try {
            $ajax_form = new \Mojavi\Form\AjaxForm();
    		
            $facility = new \Ficus\Facility();
            $facility->setId($input_form->getId());
            $facility->query();
            
    		if (\MongoId::isValid($facility->getId())) {
    			// Save the photo to amazon
    		    if (array_key_exists('photo',$_FILES) && $_FILES['photo']['error'] == 0) {
    		    
    		        $pic = $_FILES['photo'];
    		        $bucket = 'buxbuxcache';
    		        $keyname = md5($pic['name']);
    		        
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
    		                'SourceFile'   => $pic['tmp_name'],
    		                'ContentType'  => 'image/png',
    		                'ACL'          => 'public-read',
    		                'StorageClass' => 'REDUCED_REDUNDANCY',
    		                'Metadata'     => array(
    		                    'facility_id' => $facility->getId(),
    		                    'image_url' => $pic['name']
    		                )
    		            ));
    		            
    		             
    		            if (isset($result['ObjectURL'])) {
    		                $facility->getCollection()->update(array(), array('$push' => array('photos' => $result['ObjectURL'])));
    		                $facility->setPhoto($result['ObjectURL']);
    		            }
    		        } catch (S3Exception $e) {
    		            $this->getErrors()->addError('error', $e->getMessage());
    		        } catch (\Exception $e) {
    		            $this->getErrors()->addError('error', $e->getMessage());
    		        }
    		        
    		        $ajax_form->setRecord($facility);
    		    } else {
    		        throw new \Exception("photo key not found in FILES array");
    		    }
    		} else {
    		    throw new \Exception("facility id is not valid");
    		}
        } catch (\Exception $e) {
            $this->getErrors()->addError('error', $e->getMessage());
        }
		\Mojavi\Logging\LoggerManager::error(__METHOD__ . " :: " . var_export($ajax_form->toArray(), true));
		return $ajax_form;
    }
}

?>