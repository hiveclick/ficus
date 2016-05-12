<?php
	/* @var $staff Ficus\Staff */
	$staff = $this->getContext()->getRequest()->getAttribute("staff", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Upload Picture</h4>
</div>
<form id="staff_image_form_<?php echo $staff->getId() ?>" method="POST" action="/provider/staff-image-upload" autocomplete="off" role="form" enctype="multipart/form-data">
	<input type="hidden" name="_id" value="<?php echo $staff->getId() ?>" />
	<div class="modal-body">
		<div class="help-block">Upload a picture for this staff</div>
		<div class="form-group">
            <img src="<?php echo $staff->getProfileImageUrl() ?>" border="0" id="preview" class="profile-user-img img-responsive img-circle" />
			<label class="control-label" for="picture">Picture</label>
			<input type="file" name="picture" accept="image/*" id="picture" capture="camera">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {	
	$('#staff_image_form_<?php echo $staff->getId() ?>').form(function(data) {
		$.rad.notify('Image Updated', 'The image has been added/updated in the system');
		$('#staff_image_search_form').trigger('submit');
		$('#edit_staff_image_modal').modal('hide');
		if (data.record && data.record.profile_image_url) {
		    $('#staff_profile_image').attr('src', data.record.profile_image_url);
		}
	}, {keep_form:1});

	$("#picture").change(function(){
	    readURL(this);
	});
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//-->
</script>