<?php
	/* @var $carrier Ficus\Carrier */
	$carrier = $this->getContext()->getRequest()->getAttribute("carrier", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($carrier->getId()) ? 'Edit' : 'Add' ?> Insurance Carrier</h4>
</div>
<form class="" id="carrier_form_<?php echo $carrier->getId() ?>" method="<?php echo \MongoId::isValid($carrier->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/carrier" />
	<?php if (\MongoId::isValid($carrier->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $carrier->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
		<div class="help-block">Enter the details for this Insurance Carrier</div>
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Name</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Enter carrier's name" value="<?php echo $carrier->getName() ?>" />
		</div>

		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Description</label>
			<textarea id="description" name="description" class="form-control" placeholder="Enter a description for this ADL"><?php echo $carrier->getDescription() ?></textarea>
		</div>
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="website">Website</label>
			<input type="text" id="website" name="website" class="form-control" placeholder="Enter carrier website" value="<?php echo $carrier->getWebsite() ?>" />
		</div>
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="insurance_type">Type</label>
			<select name="insurance_type" id="insurance_type">
                <option value="<?php echo \Ficus\Carrier::INSURANCE_TYPE_INSURANCE ?>" <?php echo $carrier->getInsuranceType() == \Ficus\Carrier::INSURANCE_TYPE_INSURANCE ? 'selected' : '' ?>>Insurance Company</option>
                <option value="<?php echo \Ficus\Carrier::INSURANCE_TYPE_TPA ?>" <?php echo $carrier->getInsuranceType() == \Ficus\Carrier::INSURANCE_TYPE_TPA ? 'selected' : '' ?>>Third Party Authorizor</option>
                <option value="<?php echo \Ficus\Carrier::INSURANCE_TYPE_GOVERNMENT ?>" <?php echo $carrier->getInsuranceType() == \Ficus\Carrier::INSURANCE_TYPE_GOVERNMENT ? 'selected' : '' ?>>Government Subsidy</option>
                <option value="<?php echo \Ficus\Carrier::INSURANCE_TYPE_CASHPAY ?>" <?php echo $carrier->getInsuranceType() == \Ficus\Carrier::INSURANCE_TYPE_CASHPAY ? 'selected' : '' ?>>Cash Pay</option>
			</select>
		</div>
		
		<hr />
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Mailing Address</label>
			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter care giver's main address" value="<?php echo $carrier->getMailing()->getAddress() ?>" />
		</div>
		
		<div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label class="control-label hidden-xs" for="name">Mailing City</label>
                    <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter carrier's mailing city" value="<?php echo $carrier->getMailing()->getCity() ?>" />
                </div>
                <div class="col-md-3">
                    <label class="control-label hidden-xs" for="name">Mailing State</label>
			        <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter carrier's mailing state" value="<?php echo $carrier->getMailing()->getState() ?>" />
                </div>
                <div class="col-md-4">
                    <label class="control-label hidden-xs" for="name">Mailing Zip</label>
			        <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter carrier's mailing zip code" value="<?php echo $carrier->getMailing()->getPostalCode() ?>" />
                </div>
            </div>
		</div>
		
		<hr />
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Primary Email Address</label>
			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter carrier's main email address" value="<?php echo $carrier->getMailing()->getEmail() ?>" />
		</div>
		
		<div class="form-group">
			<label class="control-label hidden-xs" for="name">Primary Phone Number</label>
			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter carrier's main phone number" value="<?php echo $carrier->getMailing()->getPhone() ?>" />
		</div>

	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($carrier->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Carrier" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {	
    $('#insurance_type').selectize();
	
	$('#carrier_form_<?php echo $carrier->getId() ?>').form(function(data) {
		$.rad.notify('Carrier Updated', 'The carrier has been added/updated in the system');
		$('#carrier_search_form').trigger('submit');
		$('#edit_carrier_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($carrier->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this carrier from the system?')) {
		$.rad.del({ func: '/admin/carrier/<?php echo $carrier->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this carrier', 'You have deleted this carrier.  You will need to refresh this page to see your changes.');
			$('#carrier_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>