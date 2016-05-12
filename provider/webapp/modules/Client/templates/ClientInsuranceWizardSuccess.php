<?php
	/* @var $client Ficus\Client */
	$client = $this->getContext()->getRequest()->getAttribute("client", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Edit Client Insurance</h4>
</div>
<form class="" id="client_insurance_form_<?php echo $client->getId() ?>" method="PUT" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/client/client-insurance" />
	<input type="hidden" name="_id" value="<?php echo $client->getId() ?>" />
	<div class="modal-body">
	   <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#primaryinsurance" data-toggle="tab">Primary Insurance</a></li>
                <li><a href="#secondaryinsurance" data-toggle="tab">Secondary Insurance</a></li>
                <li><a href="#tertiaryinsurance" data-toggle="tab">Tertiary Insurance</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="primaryinsurance">
                    <div class="help-block">Enter the patient's primary insurance information below</div>
            		<div class="form-group">
            			<label class="control-label" for="insurance_company">Insurance Company</label>
            			<div class="row">
                            <div class="col-md-4"><input type="text" id="carrier_id" name="policy[primary_insurance][carrier_id]" class="form-control" placeholder="Select insurance company id" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getCarrierId() ?>" /></div>
                            <div class="col-md-8"><input type="text" readonly id="carrier_name" name="policy[primary_insurance][carrier_name]" class="form-control" placeholder="Insurance Company Name" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getCarrierName() ?>" /></div>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="insurance_company">Primary Insured</label>
            			<div class="row">
                            <div class="col-md-4"><input type="text" id="policy_number" name="policy[primary_insurance][policy_number]" class="form-control" placeholder="Enter Policy Number" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getPolicyNumber() ?>" /></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" readonly id="insured_firstname" name="policy[primary_insurance][insured_firstname]" class="form-control" placeholder="Insured Firstname" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getInsuredFirstname() ?>" />        
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" readonly id="insured_middlename" name="policy[primary_insurance][insured_middlename]" class="form-control" placeholder="M.I." value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getInsuredMiddlename() ?>" />        
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" readonly id="insured_lastname" name="policy[primary_insurance][insured_lastname]" class="form-control" placeholder="Insured Lastname" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getInsuredLastname() ?>" />        
                                    </div>
                                </div>
                            </div>
            			</div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
                        <label class="control-label" for="relationship">Relationship to Insured</label>
                        <select name="policy[primary_insurance][relationship_to_insured]" id="relationship_to_insured">
                            <option value="self" <?php echo $client->getPolicy()->getPrimaryInsurance()->getRelationshipToInsured() == 'self' ? 'selected' : '' ?>>Self</option>
                            <option value="spouse" <?php echo $client->getPolicy()->getPrimaryInsurance()->getRelationshipToInsured() == 'spouse' ? 'selected' : '' ?>>Spouse</option>
                            <option value="child" <?php echo $client->getPolicy()->getPrimaryInsurance()->getRelationshipToInsured() == 'child' ? 'selected' : '' ?>>Child</option>
                            <option value="other" <?php echo $client->getPolicy()->getPrimaryInsurance()->getRelationshipToInsured() == 'other' ? 'selected' : '' ?>>Other</option>
                        </select>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                    			<label class="control-label" for="subscriber_id">Subscriber #</label>
                                <input type="text" id="subscriber_id" name="policy[primary_insurance][member_number]" class="form-control" placeholder="Subscriber Id #" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getMemberNumber() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="group_id">Group #</label>
                                <input type="text" id="group_id" name="policy[primary_insurance][group_number]" class="form-control" placeholder="Group #" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getGroupNumber() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="plan_name">Plan Name</label>
                                <input type="text" id="plan_name" name="policy[primary_insurance][plan_name]" class="form-control" placeholder="Plan Name" value="<?php echo $client->getPolicy()->getPrimaryInsurance()->getPlanName() ?>" />
                			</div>
            			</div>
            		</div>  
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                    			<label class="control-label" for="insured_authorization">Authorization</label><br />
                    			<input type="hidden" name="policy[primary_insurance][insured_authorization]" value="0">
                    			<input type="checkbox" name="policy[primary_insurance][insured_authorization]" id="insured_authorization_1" value="1" <?php echo $client->getPolicy()->getPrimaryInsurance()->getInsuredAuthorization() ? 'checked' : '' ?>>
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="deductible">Deductible</label>
                			    <div class="input-group">
                			        <span class="input-group-addon">$</span>
                                    <input type="text" id="deductible" name="policy[primary_insurance][deductible]" class="form-control" placeholder="0.00" value="<?php echo number_format($client->getPolicy()->getPrimaryInsurance()->getDeductible(), 2) ?>" />
                                </div>
                			</div>
                			<div class="col-md-5">
                			    <label class="control-label" for="copayment">Co-Payment</label>
                			    <div class="input-group">
                			        <span class="input-group-addon">$</span>
                                    <input type="text" id="copayment" name="policy[primary_insurance][copayment]" class="form-control" placeholder="0.00" value="<?php echo number_format($client->getPolicy()->getPrimaryInsurance()->getCopayment(), 2) ?>" />
                                </div>
                			</div>
            			</div>
            		</div>
            	</div>
            	<div class="tab-pane fade" id="secondaryinsurance">
                    <div class="help-block">Enter the patient's secondary insurance information below</div>
            		<div class="form-group">
            			<label class="control-label" for="insurance_company_2">Insurance Company</label>
            			<div class="row">
                            <div class="col-md-4"><input type="text" id="insurance_company_id_2" name="policy[secondary_insurance][carrier_id]" class="form-control" placeholder="Select insurance company id" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getCarrierId() ?>" /></div>
                            <div class="col-md-8"><input type="text" readonly id="insurance_company_name_2" name="policy[secondary_insurance][carrier_name]" class="form-control" placeholder="Insurance Company Name" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getCarrierName() ?>" /></div>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="insurance_company">Primary Insured</label>
            			<div class="row">
                            <div class="col-md-4"><input type="text" id="policy_number_2" name="policy[secondary_insurance][policy_number]" class="form-control" placeholder="Enter Policy Number" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getPolicyNumber() ?>" /></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" readonly id="insured_firstname_2" name="policy[secondary_insurance][insured_firstname]" class="form-control" placeholder="Insured Firstname" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getInsuredFirstname() ?>" />        
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" readonly id="insured_middlename_2" name="policy[secondary_insurance][insured_middlename]" class="form-control" placeholder="M.I." value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getInsuredMiddlename() ?>" />        
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" readonly id="insured_lastname_2" name="policy[secondary_insurance][insured_lastname]" class="form-control" placeholder="Insured Lastname" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getInsuredLastname() ?>" />        
                                    </div>
                                </div>
                            </div>
            			</div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
                        <label class="control-label" for="relationship_2">Relationship to Insured</label>
                        <select name="policy[secondary_insurance][relationship_to_insured]" id="relationship_to_insured_2">
                            <option value="self" <?php echo $client->getPolicy()->getSecondaryInsurance()->getRelationshipToInsured() == 'self' ? 'selected' : '' ?>>Self</option>
                            <option value="spouse" <?php echo $client->getPolicy()->getSecondaryInsurance()->getRelationshipToInsured() == 'spouse' ? 'selected' : '' ?>>Spouse</option>
                            <option value="child" <?php echo $client->getPolicy()->getSecondaryInsurance()->getRelationshipToInsured() == 'child' ? 'selected' : '' ?>>Child</option>
                            <option value="other" <?php echo $client->getPolicy()->getSecondaryInsurance()->getRelationshipToInsured() == 'other' ? 'selected' : '' ?>>Other</option>
                        </select>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                    			<label class="control-label" for="subscriber_id_2">Subscriber #</label>
                                <input type="text" id="subscriber_id_2" name="policy[secondary_insurance][member_number]" class="form-control" placeholder="Subscriber Id #" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getMemberNumber() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="group_id_2">Group #</label>
                                <input type="text" id="group_id_2" name="policy[secondary_insurance][group_number]" class="form-control" placeholder="Group #" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getGroupNumber() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="plan_name_2">Plan Name</label>
                                <input type="text" id="plan_name_2" name="policy[secondary_insurance][plan_name]" class="form-control" placeholder="Plan Name" value="<?php echo $client->getPolicy()->getSecondaryInsurance()->getPlanName() ?>" />
                			</div>
            			</div>
            		</div>  
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                    			<label class="control-label" for="insured_authorization_2">Authorization</label><br />
                    			<input type="hidden" name="policy[secondary_insurance][insured_authorization]" value="0">
                    			<input type="checkbox" name="policy[secondary_insurance][insured_authorization]" id="insured_authorization_2_1" value="1" <?php echo $client->getPolicy()->getSecondaryInsurance()->getInsuredAuthorization() ? 'checked' : '' ?>>
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="deductible_2">Deductible</label>
                			    <div class="input-group">
                			        <span class="input-group-addon">$</span>
                                    <input type="text" id="deductible_2" name="policy[secondary_insurance][deductible]" class="form-control" placeholder="0.00" value="<?php echo number_format($client->getPolicy()->getSecondaryInsurance()->getDeductible(), 2) ?>" />
                                </div>
                			</div>
                			<div class="col-md-5">
                			    <label class="control-label" for="copayment_2">Co-Payment</label>
                			    <div class="input-group">
                			        <span class="input-group-addon">$</span>
                                    <input type="text" id="copayment_2" name="policy[secondary_insurance][copayment]" class="form-control" placeholder="0.00" value="<?php echo number_format($client->getPolicy()->getSecondaryInsurance()->getCopayment(), 2) ?>" />
                                </div>
                			</div>
            			</div>
            		</div>
            	</div>
            	<div class="tab-pane fade" id="tertiaryinsurance">
            	    <div class="help-block">Enter the patient's tertiary insurance information below</div>
            		<div class="form-group">
            			<label class="control-label" for="insurance_company_3">Insurance Company</label>
            			<div class="row">
                            <div class="col-md-4"><input type="text" id="insurance_company_id_3" name="policy[tertiary_insurance][carrier_id]" class="form-control" placeholder="Select insurance company id" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getCarrierId() ?>" /></div>
                            <div class="col-md-8"><input type="text" readonly id="insurance_company_name_3" name="policy[tertiary][carrier_name]" class="form-control" placeholder="Insurance Company Name" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getCarrierName() ?>" /></div>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="insurance_company">Primary Insured</label>
            			<div class="row">
                            <div class="col-md-4"><input type="text" id="policy_number_3" name="policy[tertiary_insurance][policy_number]" class="form-control" placeholder="Enter Policy Number" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getPolicyNumber() ?>" /></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" readonly id="insured_firstname_3" name="policy[tertiary_insurance][insured_firstname]" class="form-control" placeholder="Insured Firstname" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getInsuredFirstname() ?>" />        
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" readonly id="insured_middlename_3" name="policy[tertiary_insurance][insured_middlename]" class="form-control" placeholder="M.I." value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getInsuredMiddlename() ?>" />        
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" readonly id="insured_lastname_3" name="policy[tertiary_insurance][insured_lastname]" class="form-control" placeholder="Insured Lastname" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getInsuredLastname() ?>" />        
                                    </div>
                                </div>
                            </div>
            			</div>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
                        <label class="control-label" for="relationship_3">Relationship to Insured</label>
                        <select name="policy[tertiary_insurance][relationship_to_insured]" id="relationship_to_insured_3">
                            <option value="self" <?php echo $client->getPolicy()->getTertiaryInsurance()->getRelationshipToInsured() == 'self' ? 'selected' : '' ?>>Self</option>
                            <option value="spouse" <?php echo $client->getPolicy()->getTertiaryInsurance()->getRelationshipToInsured() == 'spouse' ? 'selected' : '' ?>>Spouse</option>
                            <option value="child" <?php echo $client->getPolicy()->getTertiaryInsurance()->getRelationshipToInsured() == 'child' ? 'selected' : '' ?>>Child</option>
                            <option value="other" <?php echo $client->getPolicy()->getTertiaryInsurance()->getRelationshipToInsured() == 'other' ? 'selected' : '' ?>>Other</option>
                        </select>
            		</div>
            		
            		<hr />
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                    			<label class="control-label" for="subscriber_id_3">Subscriber #</label>
                                <input type="text" id="subscriber_id_3" name="policy[tertiary_insurance][member_number]" class="form-control" placeholder="Subscriber Id #" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getMemberNumber() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="group_id_3">Group #</label>
                                <input type="text" id="group_id_3" name="policy[tertiary_insurance][group_number]" class="form-control" placeholder="Group #" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getGroupNumber() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="plan_name_3">Plan Name</label>
                                <input type="text" id="plan_name_3" name="policy[tertiary_insurance][plan_name]" class="form-control" placeholder="Plan Name" value="<?php echo $client->getPolicy()->getTertiaryInsurance()->getPlanName() ?>" />
                			</div>
            			</div>
            		</div>  
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                    			<label class="control-label" for="insured_authorization_3">Authorization</label><br />
                    			<input type="hidden" name="policy[tertiary_insurance][insured_authorization]" value="0">
                    			<input type="checkbox" name="policy[tertiary_insurance][insured_authorization]" id="insured_authorization_3_1" value="1" <?php echo $client->getPolicy()->getTertiaryInsurance()->getInsuredAuthorization() ? 'checked' : '' ?>>
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="deductible_3">Deductible</label>
                			    <div class="input-group">
                			        <span class="input-group-addon">$</span>
                                    <input type="text" id="deductible_3" name="policy[tertiary_insurance][deductible]" class="form-control" placeholder="0.00" value="<?php echo number_format($client->getPolicy()->getTertiaryInsurance()->getDeductible(), 2) ?>" />
                                </div>
                			</div>
                			<div class="col-md-5">
                			    <label class="control-label" for="copayment_3">Co-Payment</label>
                			    <div class="input-group">
                			        <span class="input-group-addon">$</span>
                                    <input type="text" id="copayment_3" name="policy[tertiary_insurance][copayment]" class="form-control" placeholder="0.00" value="<?php echo number_format($client->getPolicy()->getTertiaryInsurance()->getCopayment(), 2) ?>" />
                                </div>
                			</div>
            			</div>
            		</div>
            	</div>
            </div>
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
	$('#insured_authorization_1,#insured_authorization_2_1,#insured_authorization_3_1').bootstrapSwitch({
        size: 'small',
        onText: 'yes',
        offText: 'no'
    });

    $('#relationship_to_insured,#insured_authorization,#relationship_to_insured_2,#insured_authorization_2,#relationship_to_insured_3,#insured_authorization_3').selectize();
	
	$('#client_insurance_form_<?php echo $client->getId() ?>').form(function(data) {
		$.rad.notify('Client Updated', 'The client has been added/updated in the system');
		$('#edit_client_insurance_modal').modal('hide');
	}, {keep_form:1});
});
//-->
</script>