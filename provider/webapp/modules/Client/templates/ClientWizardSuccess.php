<?php
	/* @var $client Ficus\Client */
	$client = $this->getContext()->getRequest()->getAttribute("client", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($client->getId()) ? 'Edit' : 'Add' ?> Client</h4>
</div>
<form class="" id="client_form_<?php echo $client->getId() ?>" method="<?php echo \MongoId::isValid($client->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/client/client" />
	<?php if (\MongoId::isValid($client->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $client->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
	   <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
                <li><a href="#physician" data-toggle="tab">Physician</a></li>
                <li><a href="#history" data-toggle="tab">Health History</a></li>
                <li><a href="#extra" data-toggle="tab">Hobbies &amp; Pets</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
                    <div class="help-block">Manage a client with access to log into the system</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="firstname">Name</label>
            			<div class="row">
                            <div class="col-md-6"><input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter client's firstname" value="<?php echo $client->getFirstname() ?>" /></div>
                            <div class="col-md-6"><input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter client's lastname" value="<?php echo $client->getLastname() ?>" /></div>
            			</div>
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="email">Email</label>
            			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter client's email address" value="<?php echo $client->getMailing()->getEmail() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label hidden-xs" for="phone">Phone</label>
                    			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter client's phone" value="<?php echo $client->getMailing()->getPhone() ?>" />
                			</div>
                			<div class="col-md-6">
                    			<label class="control-label hidden-xs" for="mobile">Alt. Phone</label>
                    			<input type="text" id="mobile" name="mailing[mobile]" class="form-control" placeholder="Enter client's mobile" value="<?php echo $client->getMailing()->getMobile() ?>" />
                			</div>
            			</div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="address">Address</label>
            			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter client's home address" value="<?php echo $client->getMailing()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<div class="row">
                            <div class="col-md-5">
                                <label class="control-label hidden-xs" for="address">City</label>
                                <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter client's city" value="<?php echo $client->getMailing()->getCity() ?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label hidden-xs" for="state">State</label>
                                <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter client's state" value="<?php echo $client->getMailing()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs" for="postal_code">Zip</label>
                                <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter client's zip" value="<?php echo $client->getMailing()->getPostalCode() ?>" />
                            </div>
            			</div>
            		</div>
            		
            		<hr />
            
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="policy_number">Policy #</label>
            			<input type="text" id="policy" name="policy_number" class="form-control" placeholder="Enter client's policy #" value="<?php echo $client->getPolicyNumber() ?>" />
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="physician">
                    <div class="help-block">Enter this person's Primary Care Physician</div>
            	    <div class="form-group">
            			<label class="control-label hidden-xs" for="name">Name</label>
            			<input type="text" id="name" name="physician[name]" class="form-control" placeholder="Enter physician's name" value="<?php echo $client->getPcp()->getName() ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="email">Email</label>
            			<input type="text" id="email" name="physician[mailing][email]" class="form-control" placeholder="Enter physician's email" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getEmail() ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="phone">Phone</label>
            			<input type="text" id="phone" name="physician[mailing][phone]" class="form-control" placeholder="Enter physician's phone" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getPhone() ?>" />
            		</div>
            		<hr />
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="name">Address</label>
            			<input type="text" id="name" name="physician[mailing][address]" class="form-control" placeholder="Enter physician's address" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getAddress() ?>" />
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label hidden-xs" for="city">City</label>
                                <input type="text" id="city" name="physician[mailing][city]" class="form-control" placeholder="Enter physician's city" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getCity() ?>" />    
                            </div>
                            <div class="col-md-3">
                                <label class="control-label hidden-xs" for="state">State</label>
                                <input type="text" id="state" name="physician[mailing][state]" class="form-control" placeholder="Enter physician's state" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getState() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs" for="zip">Zip</label>
                                <input type="text" id="zip" name="physician[mailing][postal_code]" class="form-control" placeholder="Enter physician's zip" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getPostalCode() ?>" />    
                            </div>
                        </div>
            		</div>
            		<hr />
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label hidden-xs" for="license">License</label>
                                <input type="text" id="license" name="physician[license]" class="form-control" placeholder="Enter physician's license #" value="<?php echo $client->getPcp()->getPhysician()->getLicense() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs" for="npi">NPI #</label>
                                <input type="text" id="npi" name="physician[npi]" class="form-control" placeholder="Enter physician's NPI #" value="<?php echo $client->getPcp()->getPhysician()->getNpi() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs" for="upin">UPIN #</label>
                                <input type="text" id="upin" name="physician[upin]" class="form-control" placeholder="Enter physician's UPIN #" value="<?php echo $client->getPcp()->getPhysician()->getUpin() ?>" />    
                            </div>
                        </div>
            		</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="notes">Additional Notes</label>
            			<textarea id="notes" name="physician[notes]" class="form-control" placeholder="Enter any additional notes"><?php echo $client->getPcp()->getPhysician()->getNotes() ?></textarea>
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="history">
                    <div class="help-block">Enter this person's health profile</div>
            	    <div class="form-group">
            			<label class="control-label hidden-xs" for="diagnosis">Diagnosis</label>
            			<textarea id="diagnosis" name="clinical[diagnosis]" class="form-control" placeholder="Enter diagnosis..."><?php echo $client->getClinical()->getDiagnosis() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="care_notes">Care Notes</label>
            			<textarea id="care_notes" name="clinical[care_notes]" class="form-control" placeholder="Enter care notes..."><?php echo $client->getClinical()->getCareNotes() ?></textarea>
            		</div>
            		<hr />
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label hidden-xs" for="weight">Weight</label>
                    			<div class="input-group">
                                    <input type="text" id="weight" name="clinical[weight]" class="form-control" placeholder="Enter weight" value="<?php echo $client->getClinical()->getWeight() ?>" />
                                    <span class="input-group-addon">lbs</span>
                                </div>
                			</div>
                			<div class="col-md-6">
                    			<label class="control-label hidden-xs" for="height_ft">Height</label>
                    			<div class="input-group">
                                    <input type="text" id="height_ft" name="clinical[height_ft]" class="form-control" placeholder="FT" value="<?php echo $client->getClinical()->getHeightFt() ?>" />
                                    <span class="input-group-addon">ft</span>
                                    <input type="text" id="height_in" name="clinical[height_in]" class="form-control" placeholder="IN" value="<?php echo $client->getClinical()->getHeightIn() ?>" />
                                    <span class="input-group-addon">in</span>
                                </div>
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="smoker_1">Smoker</label>
                    			<div class="small help-block">Does this person smoke cigarettes, cigar, a pipe, chew tobacco, or vape?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="smoker_0" name="clinical[smoker]" value="0" />
                    			<input type="checkbox" id="smoker_1" name="clinical[smoker]" class="form-control" value="1" <?php echo $client->getClinical()->getSmoker() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="live_alone_1">Lives Alone</label>
                    			<div class="small help-block">Does this person live alone or do they have a spouse or roommate?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="live_alone_0" name="clinical[live_alone]" value="0" />
                    			<input type="checkbox" id="live_alone_1" name="clinical[live_alone]" class="form-control" value="1" <?php echo $client->getClinical()->getLiveAlone() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="has_dnr_1">Has DNR</label>
                    			<div class="small help-block">Does this person have a signed Do Not Resuscitate form?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="has_dnr_0" name="clinical[has_dnr]" value="0" />
                    			<input type="checkbox" id="has_dnr_1" name="clinical[has_dnr]" class="form-control" value="1" <?php echo $client->getClinical()->getHasDnr() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="is_fullcode_1">Full Code</label>
                    			<div class="small help-block">Is this person a full code?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="is_fullcode_0" name="clinical[is_fullcode]" value="0" />
                    			<input type="checkbox" id="is_fullcode_1" name="clinical[is_fullcode]" class="form-control" value="1" <?php echo $client->getClinical()->getIsFullcode() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="extra">
                    <div class="help-block">You can enter any additional information that will help you with this person</div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="occupation">Occupation</label>
                    			<input type="text" id="occupation" name="extra[occupation]" class="form-control" value="<?php echo $client->getExtra()->getOccupation() ?>" />
                			</div>
                			<div class="col-md-6">
                    			<label class="control-label" for="wedding_anniversary">Wedding Anniversary</label>
                    			<input type="text" id="wedding_anniversary" name="extra[wedding_anniversary]" class="form-control" value="<?php echo date('m/d/Y', $client->getExtra()->getWeddingAnniversary()->sec) ?>" />
                			</div>
            			</div>
            		</div>
                    <div class="form-group">
            			<label class="control-label hidden-xs" for="hobbies">Hobbies</label>
            			<textarea id="hobbies" name="extra[hobbies]" class="form-control" placeholder="Enter hobbies, past times, likes and dislikes..."><?php echo $client->getExtra()->getHobbies() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="pets">Pets</label>
            			<textarea id="pets" name="extra[pets]" class="form-control" placeholder="Enter pets, pet names, and pet care..."><?php echo $client->getExtra()->getPetNotes() ?></textarea>
            		</div>
            	</div>
            	
            </div>
        </div>
    </div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($client->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Client" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#smoker_1,#live_alone_1,#has_dnr_1,#is_fullcode_1').bootstrapSwitch({
        size: 'small',
        onText: 'yes',
        offText: 'no'
    });
	
	$('#client_form_<?php echo $client->getId() ?>').form(function(data) {
		$.rad.notify('Client Updated', 'The client has been added/updated in the system');
		$('#client_search_form').trigger('submit');
		$('#edit_client_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($client->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this client from the system?')) {
		$.rad.del({ func: '/admin/client/<?php echo $client->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this client', 'You have deleted this client.  You will need to refresh this page to see your changes.');
			$('#client_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>