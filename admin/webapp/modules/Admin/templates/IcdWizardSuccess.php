<?php
	/* @var $icd Ficus\Icd */
	$icd = $this->getContext()->getRequest()->getAttribute("icd", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($icd->getId()) ? 'Edit' : 'Add' ?> ICD-10 Code</h4>
</div>
<form class="" id="icd_form_<?php echo $icd->getId() ?>" method="<?php echo \MongoId::isValid($icd->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/icd" />
	<?php if (\MongoId::isValid($icd->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $icd->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Enter the details for this ICD-10 Code</div>
		<div class="form-group">
			<label class="control-label" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="<?php echo $icd->getName() ?>" />
		</div>

		<div class="form-group">
			<label class="control-label" for="name">Category</label>
			<input type="text" id="category" name="category" class="form-control" placeholder="Enter a description for this ICD-10 code" value="<?php echo $icd->getCategory() ?>" />
		</div>
		
		<div class="form-group">
			<label class="control-label" for="name">Code</label>
			<input type="text" id="code" name="code" class="form-control" placeholder="Enter ICD-10 Code" value="<?php echo $icd->getCode() ?>" />
		</div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($icd->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Code" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {	
	$('#icd_form_<?php echo $icd->getId() ?>').form(function(data) {
		$.rad.notify('ICD-10 Code Updated', 'The code has been added/updated in the system');
		$('#icd_search_form').trigger('submit');
		$('#edit_icd_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($icd->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this ICD-10 code from the system?')) {
		$.rad.del({ func: '/admin/icd/<?php echo $icd->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this ICD-10 code', 'You have deleted this code.  You will need to refresh this page to see your changes.');
			$('#icd_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>