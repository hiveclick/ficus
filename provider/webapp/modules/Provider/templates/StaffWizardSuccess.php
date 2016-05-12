<?php
	/* @var $staff Ficus\Staff */
	$staff = $this->getContext()->getRequest()->getAttribute("staff", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($staff->getId()) ? 'Edit' : 'Add' ?> Staff</h4>
</div>
<form class="" id="staff_form_<?php echo $staff->getId() ?>" method="<?php echo \MongoId::isValid($staff->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/provider/staff" />
	<?php if (\MongoId::isValid($staff->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $staff->getId() ?>" />
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
            		<div class="help-block">Manage a staff with access to log into the system</div>
            		<div class="form-group">
            			<label class="control-label" for="name">Name</label>
            			<input type="text" id="name" name="name" class="form-control" placeholder="Enter staff's name" value="<?php echo $staff->getName() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" for="staff_type">Type</label>
            			<select name="staff_type" id="staff_type">
                            <option value="<?php echo \Ficus\Staff::STAFF_TYPE_ADMINISTRATOR ?>" <?php echo $staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_ADMINISTRATOR ? 'selected' : '' ?>>Administrator</option>
                            <option value="<?php echo \Ficus\Staff::STAFF_TYPE_MANAGER ?>" <?php echo $staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_MANAGER ? 'selected' : '' ?>>House Manager</option>
                            <option value="<?php echo \Ficus\Staff::STAFF_TYPE_GENERAL ?>" <?php echo $staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_GENERAL ? 'selected' : '' ?>>General User</option>
                            <option value="<?php echo \Ficus\Staff::STAFF_TYPE_BILLING ?>" <?php echo $staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_BILLING ? 'selected' : '' ?>>Billing User</option>
            			</select>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Mailing Address</label>
            			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter staff's main address" value="<?php echo $staff->getMailing()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="name">Mailing City</label>
                    			<input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter staff's mailing city" value="<?php echo $staff->getMailing()->getCity() ?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="name">Mailing State</label>
            			        <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter staff's mailing state" value="<?php echo $staff->getMailing()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="name">Mailing Zip</label>
            			        <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter staff's mailing zip code" value="<?php echo $staff->getMailing()->getPostalCode() ?>" />
                            </div>                        
                        </div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Primary Email Address</label>
            			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter staff's main email address" value="<?php echo $staff->getMailing()->getEmail() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Primary Phone Number</label>
            			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter staff's main phone number" value="<?php echo $staff->getMailing()->getPhone() ?>" />
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="username">Username</label>
            			<input type="text" id="username" name="username" class="form-control" placeholder="Enter care giver's username" value="<?php echo $staff->getUsername() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" for="name">Password</label>
            			<input type="text" id="password" name="password" class="form-control" placeholder="Enter staff's password" value="<?php echo $staff->getPassword() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-8"><label class="control-label" for="status_1">Staff Status</label></div>
                            <div class="col-md-4 text-right">
                                <input type="hidden" name="status" value="<?php echo \Ficus\Staff::STATUS_INACTIVE ?>" />
                                <input type="checkbox" name="status" value="<?php echo \Ficus\Staff::STATUS_ACTIVE ?>" id="status_1" <?php echo $staff->getStatus() == \Ficus\CareGiver::STATUS_ACTIVE ? 'checked' : '' ?> />
                            </div>
                        </div>
            		</div>
        		</div>
        		<div class="tab-pane fade" id="profile">
                    <div class="help-block">You can add additional information to this staff member.</div>
            		<div class="form-group">
            			<label class="control-label" for="education">Education</label>
            			<textarea class="form-control" name="education" placeholder="Enter education, certifications, and other qualifications..."><?php echo $staff->getEducation() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="skills">Skills</label>
            			<textarea class="form-control" name="skills" placeholder="Enter specialized skills or talents..."><?php echo $staff->getSkills() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="notes">Notes</label>
            			<textarea class="form-control" name="notes" placeholder="Enter any additional notes about this staff member..."><?php echo $staff->getNotes() ?></textarea>
            		</div>
        		</div>
            </div>
        </div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($staff->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Staff" class="small" onclick="javascript:confirmDelete();" />
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

    $('#staff_type').selectize();
	
    $('#status_1').bootstrapSwitch({
        size: 'small',
        onText: 'active',
        offText: 'inactive'
    });
	
	$('#staff_form_<?php echo $staff->getId() ?>').form(function(data) {
		$.rad.notify('Staff Updated', 'The staff has been added/updated in the system');
		$('#staff_search_form').trigger('submit');
		$('#edit_staff_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($staff->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this staff from the system?')) {
		$.rad.del({ func: '/provider/staff/<?php echo $staff->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this staff', 'You have deleted this staff.  You will need to refresh this page to see your changes.');
			$('#staff_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>