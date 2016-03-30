<?php
	/* @var $adl Ficus\Adl */
	$adl = $this->getContext()->getRequest()->getAttribute("adl", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($adl->getId()) ? 'Edit' : 'Add' ?> ADL</h4>
</div>
<form class="" id="adl_form_<?php echo $adl->getId() ?>" method="<?php echo \MongoId::isValid($adl->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/adl" />
	<?php if (\MongoId::isValid($adl->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $adl->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Enter the details for this Activity of Daily Living (ADL)</div>
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter adl's name" value="<?php echo $adl->getName() ?>" />
		</div>

		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Description</label>
			<textarea id="description" name="description" class="form-control" placeholder="Enter a description for this ADL"><?php echo $adl->getDescription() ?></textarea>
		</div>
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Code</label>
			<input type="text" id="code" name="code" class="form-control" placeholder="Enter adl code" readonly value="<?php echo $adl->getCode() ?>" />
		</div>
		
		<div class="form-group">
            <div class="row">
                <div class="col-md-8"><label class="control-label hidden-xs" for="adl_is_primary_1">Assign as ADL Type</label></div>
                <div class="col-md-4 text-right">
                    <input type="hidden" name="is_primary" value="0" />
                    <input type="checkbox" name="is_primary" value="1" id="adl_is_primary_1" <?php echo $adl->getIsPrimary() ? 'checked' : '' ?> />
                </div>
            </div>
		</div>

	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($adl->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Adl" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
	 $('#adl_is_primary_1').bootstrapSwitch({
	        size: 'small',
	        onText: 'primary',
	        offText: 'intermediate'
	    });
	
	$('#adl_form_<?php echo $adl->getId() ?>').form(function(data) {
		$.rad.notify('ADL Updated', 'The adl has been added/updated in the system');
		$('#adl_search_form').trigger('submit');
		$('#edit_adl_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($adl->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this adl from the system?')) {
		$.rad.del({ func: '/admin/adl/<?php echo $adl->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this adl', 'You have deleted this adl.  You will need to refresh this page to see your changes.');
			$('#adl_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>