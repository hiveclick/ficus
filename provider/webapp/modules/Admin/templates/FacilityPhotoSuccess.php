<?php
	/* @var $facility Ficus\Facility */
	$facility = $this->getContext()->getRequest()->getAttribute("facility", array());
	$photo = isset($_GET['photo']) ? $_GET['photo'] : '';
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Facility Photo</h4>
</div>
<form class="" id="facility_photo_form_<?php echo $facility->getId() ?>" method="POST" action="/api" autocomplete="off" role="form">
    <input type="hidden" name="_id" value="<?php echo $facility->getId() ?>" />
    <input type="hidden" name="photo" value="<?php echo $photo ?>" />
    <input type="hidden" name="func" value="/admin/facility-photo" />
	<div class="modal-body">
	    <img src="<?php echo $photo ?>" class="img-responsive" />
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($facility->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Photo" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Assign as Primary</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {	
	$('#facility_photo_form_<?php echo $facility->getId() ?>').form(function(data) {
		$.rad.notify('Facility Updated', 'The facility has been added/updated in the system');
		$('#edit_facility_photo_modal').modal('hide');
	    $('#facility_profile_image').attr('src', '<?php echo $photo ?>');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($facility->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this photo from the system?')) {
		$.rad.del({ func: '/admin/facility-photo/<?php echo $facility->getId() ?>', 'photo': '<?php echo urlencode($photo) ?>' }, function(data) {
			$.rad.notify('You have deleted this photo', 'You have deleted this photo.  You will need to refresh this page to see your changes.');
			$('#edit_facility_photo_modal').modal('hide');
			$('#facility_photo_<?php echo md5(urlencode($photo)) ?>').fadeOut();	
		});
	}
}
<?php } ?>
//-->
</script>