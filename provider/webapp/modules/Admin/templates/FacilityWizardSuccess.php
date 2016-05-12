<?php
	/* @var $facility Ficus\Facility */
	$facility = $this->getContext()->getRequest()->getAttribute("facility", array());
	$staffs = $this->getContext()->getRequest()->getAttribute("staffs", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($facility->getId()) ? 'Edit' : 'Add' ?> Facility</h4>
</div>
<form class="" id="facility_form_<?php echo $facility->getId() ?>" method="<?php echo \MongoId::isValid($facility->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/facility" />
	<?php if (\MongoId::isValid($facility->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $facility->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
	    <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Facility</a></li>
                <li><a href="#location" data-toggle="tab">Location</a></li>
                <li><a href="#landlord" data-toggle="tab">Landlord</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
            		<div class="help-block">Enter the location and details about this facility</div>
            		<div class="form-group">
            			<label class="control-label" for="name">Name</label>
            			<input type="text" id="name" name="name" class="form-control" placeholder="Enter facility's name" value="<?php echo $facility->getName() ?>" />
            		</div>
            
            		<hr />
                        		
            		<div class="form-group">
            			<label class="control-label" for="name">Address</label>
            			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter facility's address" value="<?php echo $facility->getMailing()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="name">City</label>
                                <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter facility's city" value="<?php echo $facility->getMailing()->getCity() ?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="name">State</label>
            			        <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter facility's state" value="<?php echo $facility->getMailing()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="name">Zip</label>
            			        <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter facility's zip code" value="<?php echo $facility->getMailing()->getPostalCode() ?>" />
                            </div>
                        </div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="name">House Manager</label>
            			<select name="manager" id="manager">
            			    <optgroup label="Managers">
                                <?php
                                    /* @var $staff \Ficus\Staff */ 
                                    foreach ($staffs as $staff) { 
                                ?>
                                    <?php if ($staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_MANAGER) { ?>
                                        <option value="<?php echo $staff->getId() ?>" <?php echo $facility->getManager()->getId() == $staff->getId() ? 'selected' : '' ?>><?php echo $staff->getName() ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Administrators">
                                <?php
                                    /* @var $staff \Ficus\Staff */ 
                                    foreach ($staffs as $staff) { 
                                ?>
                                    <?php if ($staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_ADMINISTRATOR) { ?>
                                        <option value="<?php echo $staff->getId() ?>" <?php echo $facility->getManager()->getId() == $staff->getId() ? 'selected' : '' ?>><?php echo $staff->getName() ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="Other Users">
                                <?php
                                    /* @var $staff \Ficus\Staff */ 
                                    foreach ($staffs as $staff) { 
                                ?>
                                    <?php if ($staff->getStaffType() != \Ficus\Staff::STAFF_TYPE_ADMINISTRATOR && $staff->getStaffType() != \Ficus\Staff::STAFF_TYPE_MANAGER) { ?>
                                        <option value="<?php echo $staff->getId() ?>" <?php echo $facility->getManager()->getId() == $staff->getId() ? 'selected' : '' ?>><?php echo $staff->getName() ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </optgroup>
            			</select>
            		</div>
        		</div>
        		<div class="tab-pane fade" id="location">
                    <div class="help-block">We can generate a Google map if you enter the latitude and longitude to this facility below</div>
            		<div class="form-group">
            			<label class="control-label" for="latitude">Latitude</label>
            			<input type="text" id="latitude" name="latitude" class="form-control" placeholder="Enter latitude" value="<?php echo $facility->getLatitude() ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="longitude">Longitude</label>
            			<input type="text" id="longitude" name="longitude" class="form-control" placeholder="Enter longitude" value="<?php echo $facility->getLongitude() ?>" />
            		</div>
            		<hr />
            		<iframe width="100%" height="226" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $facility->getLatitude() ?>,<?php echo $facility->getLongitude() ?>&z=17&output=embed"></iframe>
        		</div>
        		<div class="tab-pane fade" id="landlord">
                    <div class="help-block">Enter the contact information for the landlord or property manager below</div>
            		<div class="form-group">
            			<label class="control-label" for="landlord[name]">Name</label>
            			<input type="text" id="landlord_name" name="landlord[name]" class="form-control" placeholder="Enter landlord's name" value="<?php echo $facility->getLandlord()->getName() ?>" />
            		</div>
            
            		<hr />
                        		
            		<div class="form-group">
            			<label class="control-label" for="name">Address</label>
            			<input type="text" id="landlord_address" name="landlord[address]" class="form-control" placeholder="Enter landlord's main address" value="<?php echo $facility->getLandlord()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="name">City</label>
                                <input type="text" id="landlord_city" name="landlord[city]" class="form-control" placeholder="Enter landlord's city" value="<?php echo $facility->getLandlord()->getCity() ?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="name">State</label>
            			        <input type="text" id="landlord_state" name="landlord[state]" class="form-control" placeholder="Enter landlord's state" value="<?php echo $facility->getLandlord()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="name">Zip</label>
            			        <input type="text" id="landlord_postal_code" name="landlord[postal_code]" class="form-control" placeholder="Enter landlord's zip code" value="<?php echo $facility->getLandlord()->getPostalCode() ?>" />
                            </div>
                        </div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="landlord_phone">Phone</label>
            			<input type="text" id="landlord_phone" name="landlord[phone]" class="form-control" placeholder="Enter landlord's main phone" value="<?php echo $facility->getLandlord()->getPhone() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label" for="landlord_email">Email</label>
            			<input type="text" id="landlord_email" name="landlord[email]" class="form-control" placeholder="Enter landlord's main email" value="<?php echo $facility->getLandlord()->getEmail() ?>" />
            		</div>
        		</div>
    		</div>
		</div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($facility->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Facility" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#manager').selectize();
	
	$('#facility_form_<?php echo $facility->getId() ?>').form(function(data) {
		$.rad.notify('Facility Updated', 'The facility has been added/updated in the system');
		$('#facility_search_form').trigger('submit');
		$('#edit_facility_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($facility->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this facility from the system?')) {
		$.rad.del({ func: '/admin/facility/<?php echo $facility->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this facility', 'You have deleted this facility.  You will need to refresh this page to see your changes.');
			$('#facility_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>