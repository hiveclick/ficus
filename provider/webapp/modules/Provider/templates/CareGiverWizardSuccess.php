<?php
	/* @var $care_giver Ficus\CareGiver */
	$care_giver = $this->getContext()->getRequest()->getAttribute("care_giver", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($care_giver->getId()) ? 'Edit' : 'Add' ?> Care Giver</h4>
</div>
<form class="" id="care_giver_form_<?php echo $care_giver->getId() ?>" method="<?php echo \MongoId::isValid($care_giver->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/provider/care-giver" />
	<?php if (\MongoId::isValid($care_giver->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $care_giver->getId() ?>" />
	<?php } ?>
	<input type="hidden" name="provider" value="<?php echo $this->getContext()->getUser()->getUserDetails()->getProvider()->getId() ?>" />
	<div class="modal-body">
	   <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
                <li><a href="#profile" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
            		<div class="help-block">Manage a care giver with access to log into the system</div>
            		<div class="form-group">
            			<label class="control-label" for="name">Name</label>
            			<input type="text" id="name" name="name" class="form-control" placeholder="Enter care giver's name" value="<?php echo $care_giver->getName() ?>" />
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Mailing Address</label>
            			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter care giver's main address" value="<?php echo $care_giver->getMailing()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="name">Mailing City</label>
                                <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter care giver's mailing city" value="<?php echo $care_giver->getMailing()->getCity() ?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="name">Mailing State</label>
            			        <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter care giver's mailing state" value="<?php echo $care_giver->getMailing()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="name">Mailing Zip</label>
            			        <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter care giver's mailing zip code" value="<?php echo $care_giver->getMailing()->getPostalCode() ?>" />
                            </div>
                        </div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Primary Email Address</label>
            			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter care giver's main email address" value="<?php echo $care_giver->getMailing()->getEmail() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Primary Phone Number</label>
            			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter care giver's main phone number" value="<?php echo $care_giver->getMailing()->getPhone() ?>" />
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="username">Username</label>
            			<input type="text" id="username" name="username" class="form-control" placeholder="Enter care giver's username" value="<?php echo $care_giver->getUsername() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Password</label>
            			<input type="text" id="password" name="password" class="form-control" placeholder="Enter care giver's password" value="<?php echo $care_giver->getPassword() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-8"><label class="control-label" for="status_1">Care Giver Status</label></div>
                            <div class="col-md-4 text-right">
                                <input type="hidden" name="status" value="<?php echo \Ficus\CareGiver::STATUS_INACTIVE ?>" />
                                <input type="checkbox" name="status" value="<?php echo \Ficus\CareGiver::STATUS_ACTIVE ?>" id="status_1" <?php echo $care_giver->getStatus() == \Ficus\CareGiver::STATUS_ACTIVE ? 'checked' : '' ?> />
                            </div>
                        </div>
            		</div>
        		</div>
        		<div class="tab-pane fade in" id="profile">
                    <div class="help-block">Provide a profile for this care giver to share their education, skills, and past history</div>
            		<div class="form-group">
            			<label class="control-label" for="education">Education</label>
            			<textarea id="education" name="education" class="form-control" placeholder="Enter education and certifications..."><?php echo $care_giver->getEducation() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="skills">Skills</label>
            			<input type="text" name="skills" id="skills" placeholder="Enter specific skills and disciplines..." value="<?php echo implode(",", $care_giver->getSkills()) ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="notes">Notes</label>
            			<textarea id="notes" name="notes" class="form-control" placeholder="Enter any additional notes about this care giver..."><?php echo $care_giver->getNotes() ?></textarea>
            		</div>
        		</div>
            </div>
        </div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($care_giver->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Care Giver" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#skills').selectize({
    	delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });
	
    $('#status_1').bootstrapSwitch({
        size: 'small',
        onText: 'active',
        offText: 'inactive'
    });

    <?php if ($care_giver->getUsername() == '') { ?>
        $('#email').keyDown(function() {
           	$('#username').val($('#email').val());
        });
    <?php } ?>
	
	$('#care_giver_form_<?php echo $care_giver->getId() ?>').form(function(data) {
		$.rad.notify('Care Giver Updated', 'The care giver has been added/updated in the system');
		$('#care_giver_search_form').trigger('submit');
		$('#edit_care_giver_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($care_giver->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this care_giver from the system?')) {
		$.rad.del({ func: '/provider/care_giver/<?php echo $care_giver->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this care giver', 'You have deleted this care giver.  You will need to refresh this page to see your changes.');
			$('#care_giver_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>