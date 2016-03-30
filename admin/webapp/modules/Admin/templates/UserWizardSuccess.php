<?php
	/* @var $user Ficus\User */
	$user = $this->getContext()->getRequest()->getAttribute("user", array());
	$providers = $this->getContext()->getRequest()->getAttribute("providers", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($user->getId()) ? 'Edit' : 'Add' ?> User</h4>
</div>
<form class="" id="user_form_<?php echo $user->getId() ?>" method="<?php echo \MongoId::isValid($user->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/user" />
	<?php if (\MongoId::isValid($user->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $user->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Manage a user with access to log into the system</div>
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter user's name" value="<?php echo $user->getName() ?>" />
		</div>

		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Username</label>
			<input type="text" id="username" name="username" class="form-control" placeholder="Enter username" value="<?php echo $user->getUsername() ?>" />
		</div>
		
		<?php if (!\MongoId::isValid($user->getId())) { ?>
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
                <div class="col-md-8"><label class="control-label hidden-xs" for="status_1">User Status</label></div>
                <div class="col-md-4 text-right">
                    <input type="hidden" name="status" value="<?php echo \Ficus\User::USER_STATUS_INACTIVE ?>" />
                    <input type="checkbox" name="status" value="<?php echo \Ficus\User::USER_STATUS_ACTIVE ?>" id="status_1" <?php echo $user->isActive() ? 'checked' : '' ?> />
                </div>
            </div>
		</div>
		
		<hr />
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="provider">Provider</label>
			<select name="provider" id="provider">
                <?php
                    /* @var $provider \Ficus\Provider */ 
                    foreach ($providers as $provider) { 
                ?>
                    <option value="<?php echo $provider->getId() ?>" <?php echo $user->getProvider()->getId() == $provider->getId() ? 'selected' : '' ?>><?php echo $provider->getName() ?></option>
                <?php } ?>
			</select>
		</div>

	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($user->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete User" class="small" onclick="javascript:confirmDelete();" />
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

    $('#provider').selectize();
	
	$('#user_form_<?php echo $user->getId() ?>').form(function(data) {
		$.rad.notify('User Updated', 'The user has been added/updated in the system');
		$('#user_search_form').trigger('submit');
		$('#edit_user_modal').modal('hide');
	}, {keep_form:1});

	/*
	$('#user_type').selectize({
		valueField: '_id',
		allowEmptyOption: true,
		labelField: 'name',
		searchField: ['name','description'],
		render: {
			item: function(item, escape) {
				var ret_val = '<div class="item">' +
				'<b>' + escape(item.name) + '</b><br />' +
				(item.description ? '<span class="text-muted small">' + escape(item.description) + ' </span>' : '') +
				'</div>';
				return ret_val;
			},
			option: function(item, escape) {
				var ret_val = '<div class="option">' +
				'<b>' + escape(item.name) + '</b><br />' +
				(item.description ? '<span class="text-muted small">' + escape(item.description) + ' </span>' : '') +
				'</div>';
				return ret_val;
			}
		}
	});	
	*/
});

<?php if (\MongoId::isValid($user->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this user from the system?')) {
		$.rad.del({ func: '/admin/user/<?php echo $user->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this user', 'You have deleted this user.  You will need to refresh this page to see your changes.');
			$('#user_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>