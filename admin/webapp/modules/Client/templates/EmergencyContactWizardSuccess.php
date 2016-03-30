<?php
	/* @var $framily Ficus\Framily */
	$framily = $this->getContext()->getRequest()->getAttribute("framily", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($framily->getId()) ? 'Edit' : 'Add' ?> Emergency Contact</h4>
</div>
<form class="" id="framily_form_<?php echo $framily->getId() ?>" method="<?php echo \MongoId::isValid($framily->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/client/framily" />
	<?php if (\MongoId::isValid($framily->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $framily->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Manage a friend or family member with access to log into the family portal</div>
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="<?php echo $framily->getName() ?>" />
		</div>
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Relationship</label>
			<input type="text" id="relationship" name="relationship" class="form-control" placeholder="Enter relationship (spouse, son, daughter, grandchild, neighbor...)" value="<?php echo $framily->getRelationship() ?>" />
		</div>
		
		<hr />
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="email">Email</label>
			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter email address" value="<?php echo $framily->getMailing()->getEmail() ?>" />
		</div>
		
		<hr />
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="address">Address</label>
			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter home address" value="<?php echo $framily->getMailing()->getAddress() ?>" />
		</div>
		
		<div class="form-group">
			<div class="row">
                <div class="col-md-5">
                    <label class="control-label hidden-xs" for="address">City</label>
                    <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter city" value="<?php echo $framily->getMailing()->getCity() ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label hidden-xs" for="state">State</label>
                    <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter state" value="<?php echo $framily->getMailing()->getState() ?>" />
                </div>
                <div class="col-md-4">
                    <label class="control-label hidden-xs" for="postal_code">Zip</label>
                    <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter zip" value="<?php echo $framily->getMailing()->getPostalCode() ?>" />
                </div>
			</div>
		</div>
		
		<hr />
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="phone">Phone</label>
			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter primary phone number" value="<?php echo $framily->getMailing()->getPhone() ?>" />
		</div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($framily->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Emergency Contact" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#status_1').bootstrapSwitch({
        size: 'small',
        onText: 'active',
        offText: 'inactive'
    });
	
	$('#framily_form_<?php echo $framily->getId() ?>').form(function(data) {
		$.rad.notify('Emergency Contact Updated', 'The emergency contact has been added/updated in the system');
		$('#emergency_contact_search_form').trigger('submit');
		$('#edit_emergency_contact_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($framily->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this emergency contact from the system?')) {
		$.rad.del({ func: '/client/framily/<?php echo $framily->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this emergency contact', 'You have deleted this emergency contact.  You will need to refresh this page to see your changes.');
			$('#emergency_contact_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>