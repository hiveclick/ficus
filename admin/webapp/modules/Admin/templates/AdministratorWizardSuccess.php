<?php
	/* @var $administrator Ficus\Administrator */
	$administrator = $this->getContext()->getRequest()->getAttribute("administrator", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($administrator->getId()) ? 'Edit' : 'Add' ?> Administrator</h4>
</div>
<form class="" id="administrator_form_<?php echo $administrator->getId() ?>" method="<?php echo \MongoId::isValid($administrator->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/administrator" />
	<?php if (\MongoId::isValid($administrator->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $administrator->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Manage a administrator with access to log into the system</div>
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter administrator's name" value="<?php echo $administrator->getName() ?>" />
		</div>

		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Username</label>
			<input type="text" id="administratorname" name="administratorname" class="form-control" placeholder="Enter administrator name" value="<?php echo $administrator->getUsername() ?>" />
		</div>
		
		<?php if (!\MongoId::isValid($administrator->getId())) { ?>
            <div class="form-group">
                <label class="control-label hidden-xs" for="password">Password</label>
    			<input type="text" id="password" name="password" class="form-control" placeholder="Enter password" value="" />
            </div>
            
            <div class="form-group">
                <label class="control-label hidden-xs" for="password2">Confirm Password</label>
    			<input type="text" id="password2" name="password2" class="form-control" placeholder="Confirm password" value="" />
            </div>
		<?php } ?>
		
		<div class="form-group">
            <div class="row">
                <div class="col-md-8"><label class="control-label hidden-xs" for="status_1">Administrator Status</label></div>
                <div class="col-md-4 text-right">
                    <input type="hidden" name="status" value="<?php echo \Ficus\Administrator::ADMINISTRATOR_STATUS_INACTIVE ?>" />
                    <input type="checkbox" name="status" value="<?php echo \Ficus\Administrator::ADMINISTRATOR_STATUS_ACTIVE ?>" id="status_1" <?php echo $administrator->isActive() ? 'checked' : '' ?> />
                </div>
            </div>
		</div>

	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($administrator->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Administrator" class="small" onclick="javascript:confirmDelete();" />
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
	
	$('#administrator_form_<?php echo $administrator->getId() ?>').form(function(data) {
		$.rad.notify('Administrator Updated', 'The administrator has been added/updated in the system');
		$('#administrator_search_form').trigger('submit');
		$('#edit_administrator_modal').modal('hide');
	}, {keep_form:1});	
});

<?php if (\MongoId::isValid($administrator->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this administrator from the system?')) {
		$.rad.del({ func: '/admin/administrator/<?php echo $administrator->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this administrator', 'You have deleted this administrator.  You will need to refresh this page to see your changes.');
			$('#administrator_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>