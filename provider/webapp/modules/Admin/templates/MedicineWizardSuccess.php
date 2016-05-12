<?php
	/* @var $medicine Ficus\Medicine */
	$medicine = $this->getContext()->getRequest()->getAttribute("medicine", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($medicine->getId()) ? 'Edit' : 'Add' ?> Medication</h4>
</div>
<form class="" id="medicine_form_<?php echo $medicine->getId() ?>" method="<?php echo \MongoId::isValid($medicine->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/provider/medicine" />
	<?php if (\MongoId::isValid($medicine->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $medicine->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Enter the details for this medication</div>
		<div class="form-group">
			<label class="control-label" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter medicine's name" value="<?php echo $medicine->getName() ?>" />
		</div>

		<div class="form-group">
			<label class="control-label" for="name">Notes</label>
			<textarea id="notes" name="notes" class="form-control" placeholder="Enter a description for this ADL"><?php echo $medicine->getNotes() ?></textarea>
		</div>
		
		<div class="form-group">
			<label class="control-label" for="name">Quantity</label>
			<input type="text" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" value="<?php echo $medicine->getQuantity() ?>" />
		</div>
		
		<div class="form-group">
			<label class="control-label" for="method">Method</label>
			<select name="method" id="method">
                <option value="<?php echo \Ficus\Medicine::METHOD_ORAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_ORAL ? 'selected' : '' ?>>Oral</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_RECTAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_RECTAL ? 'selected' : '' ?>>Rectal</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_TOPICAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_TOPICAL ? 'selected' : '' ?>>Topical</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_TRANSDERMAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_TRANSDERMAL ? 'selected' : '' ?>>Transdermal</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_INJECTION ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_INJECTION ? 'selected' : '' ?>>Injection</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_OCULAR ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_OCULAR ? 'selected' : '' ?>>Ocular</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_AURAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_AURAL ? 'selected' : '' ?>>Aural</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_VAGINAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_VAGINAL ? 'selected' : '' ?>>Vaginal</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_INHALATION ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_INHALATION ? 'selected' : '' ?>>Inhalation</option>
                <option value="<?php echo \Ficus\Medicine::METHOD_SUBLINGUAL ?>" <?php echo $medicine->getMethod() == \Ficus\Medicine::METHOD_SUBLINGUAL ? 'selected' : '' ?>>Sublingual</option>
			</select>
		</div>
		
		<hr />
		<div class="help-block">Enter the recommended and maximum dosage for this medication</div>
		
		<div class="row">
            <div class="col-md-4">
                <div class="form-group">
        			<label class="control-label" for="dose">Dose</label>
        			<div class="input-group">
                        <input type="text" id="dose" name="dose" class="form-control" placeholder="100, 200, 300" value="<?php echo $medicine->getDose() ?>" />
                        <span class="input-group-addon">mg</span>
        			</div>
        		</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
        			<label class="control-label" for="frequency">Frequency</label>
        			<div class="input-group">
                        <input type="text" id="frequency" name="frequency" class="form-control" placeholder="1, 2, 4, 6, etc" value="<?php echo $medicine->getFrequency() ?>" />
                        <span class="input-group-addon">/day</span>
        			</div>
        		</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
        			<label class="control-label" for="frequency">Max. Dosage</label>
        			<div class="input-group">
                        <input type="text" id="max_dosage" name="max_dosage" class="form-control" placeholder="1000, 2000, etc" value="<?php echo $medicine->getMaxDosage() ?>" />
                        <span class="input-group-addon">mg</span>
        			</div>
        		</div>
            </div>
		</div>
		
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($medicine->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Medication" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {	
    $('#method').selectize();
	
	$('#medicine_form_<?php echo $medicine->getId() ?>').form(function(data) {
		$.rad.notify('Medication Updated', 'The medicine has been added/updated in the system');
		$('#medicine_search_form').trigger('submit');
		$('#edit_medicine_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($medicine->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this medicine from the system?')) {
		$.rad.del({ func: '/provider/medicine/<?php echo $medicine->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this medicine', 'You have deleted this medicine.  You will need to refresh this page to see your changes.');
			$('#medicine_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>