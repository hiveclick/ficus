<?php
	/* @var $icd Ficus\Icd */
	$icd = $this->getContext()->getRequest()->getAttribute("icd", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Import ICD-10 Codes</h4>
</div>
<form class="" id="icd_import_form_<?php echo $icd->getId() ?>" method="POST" action="/admin/icd-import" autocomplete="off" role="form" enctype="multipart/form-data">
	<div class="modal-body">
		<div class="help-block">You can import the official ICD-10 codes file.  This file will be named <code>icd10cm_codes_<i>2016</i>.txt</code> (the year may change).  Alternately, you can upload the <i>order</i> file which contains the codes and also header categories and a long description.</div>
		<div class="form-group">
			<label class="control-label" for="filename">Name</label>
			<input type="file" id="filename" name="filename" class="form-control" placeholder="Upload icd10cm_codes_yyyy.txt file" value="" />
		</div>
		<div class="form-group">
		    <input type="hidden" name="is_order_file" value="0" />
		    <label class="control-label" for="is_order_file_1">
                <input type="checkbox" name="is_order_file" id="is_order_file_1" value="1" />
			    This file is an <code>icd10cm_order_<i>yyyy</i></code> file and contains headers and long descriptions
		    </label>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary" id="import_btn">Import Codes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {	
	$('#icd_import_form_<?php echo $icd->getId() ?>').form(function(data) {
		$.rad.notify('ICD-10 Codes Imported', 'The codes have been imported into the system.');
		$('#icd_search_form').trigger('submit');
		$('#import_icd_modal').modal('hide');
	}, {
		keep_form: 1,
		prepare: function() {
			//$('#import_btn', '#icd_import_form_<?php echo $icd->getId() ?>').html('<i class="fa fa-spin fa-spinner"></i> Importing...').addClass('btn-warning').removeClass('btn-primary');
		},
		indicator: {
    	    start: function() {
        	    $('#import_btn', '#icd_import_form_<?php echo $icd->getId() ?>').html('<i class="fa fa-spin fa-spinner"></i> Importing...').addClass('btn-warning').removeClass('btn-primary');
    	    },
    	    stop: function() {
    	    	$('#import_btn', '#icd_import_form_<?php echo $icd->getId() ?>').html('Import Codes').removeClass('btn-warning').addClass('btn-primary');
    	    }            	
        },
        onerror: function(data) {
            console.log(data)
        }
	});
});
//-->
</script>