<?php
	/* @var $provider Ficus\Provider */
	$provider = $this->getContext()->getRequest()->getAttribute("provider", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($provider->getId()) ? 'Edit' : 'Add' ?> Provider</h4>
</div>
<form class="" id="provider_form_<?php echo $provider->getId() ?>" method="<?php echo \MongoId::isValid($provider->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/provider/provider" />
	<?php if (\MongoId::isValid($provider->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $provider->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
        <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
                <li><a href="#company" data-toggle="tab">Company Settings</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
            		<div class="help-block">Manage a provider with access to log into the system</div>
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="name">Name</label>
            			<input type="text" id="name" name="name" class="form-control" placeholder="Enter provider's name" value="<?php echo $provider->getName() ?>" />
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="name">Mailing Address</label>
            			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter provider's main address" value="<?php echo $provider->getMailing()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label hidden-xs" for="name">Mailing City</label>
            			        <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter provider's mailing city" value="<?php echo $provider->getMailing()->getCity() ?>" />    
                            </div>
                            <div class="col-md-3">
                                <label class="control-label hidden-xs" for="name">Mailing State</label>
                    			<input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter provider's mailing state" value="<?php echo $provider->getMailing()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label hidden-xs" for="name">Mailing Zip</label>
            			        <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter provider's mailing zip code" value="<?php echo $provider->getMailing()->getPostalCode() ?>" />
                            </div>
                        </div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="name">Primary Email Address</label>
            			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter provider's main email address" value="<?php echo $provider->getMailing()->getEmail() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<label class="control-label hidden-xs" for="name">Primary Phone Number</label>
            			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter provider's main phone number" value="<?php echo $provider->getMailing()->getPhone() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-8"><label class="control-label hidden-xs" for="status_1">Provider Status</label></div>
                            <div class="col-md-4 text-right">
                                <input type="hidden" name="status" value="<?php echo \Ficus\Provider::STATUS_INACTIVE ?>" />
                                <input type="checkbox" name="status" value="<?php echo \Ficus\Provider::STATUS_ACTIVE ?>" id="status_1" <?php echo $provider->getStatus() == \Ficus\Provider::STATUS_ACTIVE ? 'checked' : '' ?> />
                            </div>
                        </div>
            		</div>
            		
            		<?php if (!\MongoId::isValid($provider->getId())) { ?>
                        <hr />
                        <div class="help-block">You can setup an initial user for this provider that they can use to log into the Provider Portal</div>
                        <div class="form-group">
                			<label class="control-label" for="username">Enter username</label>
                			<input type="text" id="username" name="username" class="form-control" placeholder="Enter username for provider's main account" value="" />
                		</div>
                		
                		<div class="form-group">
                			<label class="control-label" for="password">Enter password</label>
                			<input type="text" id="password" name="password" class="form-control" placeholder="Enter password for provider's main account" value="" />
                		</div>
                		
                		<div class="form-group">
                			<label class="control-label" for="password2">Confirm password</label>
                			<input type="text" id="password2" name="password2" class="form-control" placeholder="Confirm password for provider's main account" value="" />
                		</div>
            		<?php } ?>
        		</div>
        		<div class="tab-pane fade in" id="company">
                    <div class="help-block">These are the company settings that can be set for this provider</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="name">Hourly Billing</label>
                                <div class="small text-muted">Choose how you want to calculate the hours when generating invoices</div>
                            </div>
                            <div class="col-md-4">
                                <select name="hour_calculation" id="hour_calculation">
                                    <option value="actual">Use Actual Hours</option>
                                    <option value="rounded">Use Rounded Hours</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="hour_rounding" id="hour_rounding" disabled>
                                    <option value="5">Round to 5 minutes</option>
                                    <option value="10">Round to 10 minutes</option>
                                    <option value="15">Round to 15 minutes</option>
                                    <option value="20">Round to 20 minutes</option>
                                </select>
                            </div>
                        </div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="name">Mileage Rate</label>
                                <div class="small text-muted">Set how much you will pay for travel and the maximum you will pay on</div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" name="mileage" class="form-control" placeholder="enter mileage rate" value="" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="mileage_max" class="form-control" placeholder="maximum allowed miles" value="" />
                                    <span class="input-group-addon">miles</span>
                                </div>
                            </div>
                        </div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label" for="name">Timezone</label>
                                <div class="small text-muted">Set your timezone across the site</div>
                            </div>
                            <div class="col-md-6">
                                <select name="timezone" id="timezone">
                                    <?php for ($i=-12;$i<13;$i++) {?>
                                        <option value="<?php echo $i ?>">GMT<?php echo $i>0 ? '+' : '' ?><?php echo $i!=0 ? $i . ':00' : '' ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
            		</div>
        		</div>
    		</div>
		</div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($provider->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Provider" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#hour_calculation').selectize({}).on('change', function(e) {
        if ($(e.currentTarget).val() == 'actual') {
            $('#hour_rounding').attr('disabled', 'disabled');
            $('#hour_rounding').selectize()[0].selectize.disable();
        } else {
        	$('#hour_rounding').removeAttr('disabled');
        	$('#hour_rounding').selectize()[0].selectize.enable();
        }
    });

    $('#hour_rounding,#timezone').selectize({});
	
    $('#status_1').bootstrapSwitch({
        size: 'small',
        onText: 'active',
        offText: 'inactive'
    });
	
	$('#provider_form_<?php echo $provider->getId() ?>').form(function(data) {
		$.rad.notify('Provider Updated', 'The provider has been added/updated in the system');
		$('#provider_search_form').trigger('submit');
		$('#edit_provider_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($provider->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this provider from the system?')) {
		$.rad.del({ func: '/provider/provider/<?php echo $provider->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this provider', 'You have deleted this provider.  You will need to refresh this page to see your changes.');
			$('#provider_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>