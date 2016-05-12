<?php
	/* @var $client Ficus\Client */
	$client = $this->getContext()->getRequest()->getAttribute("client", array());
	$icd_codes = $this->getContext()->getRequest()->getAttribute("icd_codes", array());
?>
<style>
#crumbs {
	text-align: left;
	width: 100%;
	margin-top: -82px;
}

#crumbs div.row {
	margin-left: 0px;
	padding-left: 0px;
}
#crumbs div.row div {
	background: #3498db;
}

#crumbs div.row div {
	display: block;
	float: left;
	height: 80px;
	background: #3498db;
	text-align: center;
	padding: 30px 40px 0 80px;
	position: relative;
	margin: 0 3px 0 0; 
	
	font-size: 20px;
	text-decoration: none;
	color: #fff;
}

#crumbs div.row div a {
	color: #fff;
}

#crumbs div.row div:after {
	content: "";  
	border-top: 40px solid transparent;
	border-bottom: 40px solid transparent;
	border-left: 40px solid #3498db;
	position: absolute; 
	right: -40px; 
	top: 0;
	z-index: 1;
}

#crumbs div.row div:before {
	content: "";  
	border-top: 40px solid transparent;
	border-bottom: 40px solid transparent;
	border-left: 40px solid #ecf0f5;
	position: absolute; 
	left: 0; 
	top: 0;
}

#crumbs div.row div:first-child {
	/*
	border-top-left-radius: 10px; 
	border-bottom-left-radius: 10px;
	*/
}
#crumbs div.row div:first-child:before {
	display: none; 
}

#crumbs div.row div:last-child {
	margin: 0 -30px 0 0;
	/*
	border-top-right-radius: 10px; 
	border-bottom-right-radius: 10px;
	*/
}
#crumbs div.row div:last-child:after {
	display: none; 
}

#crumbs div.row div.active {
	background: #367fa9;
}
#crumbs div.row div.active:after {
	border-left-color: #367fa9;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="padding-bottom:100px;">
    <div class="container-fluid">
        <h1 class="hidden-xs">
            Intake Form
            <span class="small">Add a new client by filling out the form below.</span>
        </h1>
        <form class="" id="client_form_<?php echo $client->getId() ?>" method="<?php echo \MongoId::isValid($client->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
        	<input type="hidden" name="func" value="/client/client" />
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
            		<h3>
                        Personal Information
                        <div class="small">Enter this person's main information below</div>
            		</h3> 
            		<div class="form-group">
            			<div class="row">
                            <div class="col-sm-4">
                                <label class="control-label" for="firstname">First name</label>
                                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter client's firstname" value="<?php echo $client->getFirstname() ?>" />
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label" for="firstname">Last name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter client's lastname" value="<?php echo $client->getLastname() ?>" />
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label" for="ssn">Social Security #</label>
                                <input type="text" id="ssn" name="ssn" class="form-control" placeholder="Enter ssn #" value="<?php echo $client->getSsn() ?>" />
                            </div>
            			</div>
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                    			<label class="control-label" for="dob">DOB</label>
                    			<div class="input-group">
                                    <input type="text" id="dob" name="dob" class="form-control" placeholder="Enter date of birth" value="<?php echo date('m/d/Y', $client->getDob()->sec) ?>" />
                                    <span class="dob_datepicker input-group-addon"><i class="fa fa-calendar"></i></span>
                    			</div>
                			</div>
                			<div class="col-sm-4">
                			    <label class="control-label" for="gender">Gender</label>
                                <select name="gender" id="gender" placeholder="select gender...">
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                			</div>
                			<div class="col-sm-4">
                			    
                			</div>
            			</div>
            		</div>   
            		<br />
            		<h3>
                        Contact Information
                        <div class="small">Enter this person's home address, best contact email and phone number</div>
            		</h3>      		
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                    			<label class="control-label" for="email">Email</label>
                    			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter client's email address" value="<?php echo $client->getMailing()->getEmail() ?>" />
                			</div>
                			<div class="col-sm-4">
                    			<label class="control-label" for="phone">Phone</label>
                    			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter client's phone" value="<?php echo $client->getMailing()->getPhone() ?>" />
                			</div>
                			<div class="col-sm-4">
                    			<label class="control-label" for="mobile">Alt. Phone</label>
                    			<input type="text" id="mobile" name="mailing[mobile]" class="form-control" placeholder="Enter client's mobile" value="<?php echo $client->getMailing()->getMobile() ?>" />
                			</div>
            			</div>
            		</div>
            		            		
            		<div class="form-group">
            			<label class="control-label" for="address">Address</label>
            			<input type="text" id="address" name="mailing[address]" class="form-control" placeholder="Enter client's home address" value="<?php echo $client->getMailing()->getAddress() ?>" />
            		</div>
            		
            		<div class="form-group">
            			<div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="address">City</label>
                                <input type="text" id="city" name="mailing[city]" class="form-control" placeholder="Enter client's city" value="<?php echo $client->getMailing()->getCity() ?>" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="state">State</label>
                                <input type="text" id="state" name="mailing[state]" class="form-control" placeholder="Enter client's state" value="<?php echo $client->getMailing()->getState() ?>" />
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="postal_code">Zip</label>
                                <input type="text" id="postal_code" name="mailing[postal_code]" class="form-control" placeholder="Enter client's zip" value="<?php echo $client->getMailing()->getPostalCode() ?>" />
                            </div>
            			</div>
            		</div>
            		<br />
            		<h3>
                        Emergency Contact
                        <div class="small">Enter this person's emergency contact.  This person will be notified with any problems and will have access to view the patients daily activity log</div>
                    </h3> 
                    
                    <div class="form-group">
            			<div class="row">
                            <div class="col-sm-4">
                                <label class="control-label" for="emergency_contact_firstname">Name</label>
                                <input type="text" id="emergency_contact_firstname" name="emergency_contact[firstname]" class="form-control" placeholder="Enter emergency contact's firstname" value="" />
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label" for="emergency_contact_lastname">Last name</label>
                                <input type="text" id="emergency_contact_lastname" name="emergency_contact[firstname]" class="form-control" placeholder="Enter emergency contact's lastname" value="" />
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label" for="emergency_contact_phone">Phone #</label>
                                <input type="text" id="emergency_contact_phone" name="emergency_contact[phone]" class="form-control" placeholder="Enter primary phone #" value="" />
                            </div>
            			</div>
            		</div>
            	</div>
            	
            	
            	<div class="tab-pane fade in" id="insurance">
                    <h3>
                        Policy Information
                        <div class="small">Enter this person's insurance information below.  If they do not have insurance, you can skip the top section.</div>
            		</h3>
            	    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="control-label" for="policy_number">Policy #</label>
            			        <input type="text" id="policy" name="policy_number" class="form-control" placeholder="Enter client's policy #" value="<?php echo $client->getPolicyNumber() ?>" />    
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="policy_number">Group #</label>
            			        <input type="text" id="policy" name="policy_number" class="form-control" placeholder="Enter client's policy #" value="<?php echo $client->getPolicyNumber() ?>" />
                            </div>
                        </div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-sm-8">
                                <label class="control-label" for="policy_number">Policy #</label>
                                <div class="input-group">
                                    <input type="text" id="insurance_card" name="insurance_card" class="form-control" placeholder="Upload image of insurance card" value="" />
                                    <span class="input-group-addon"><i class="fa fa-camera"></i></span>
                    			</div>
                			</div>
                			<div class="col-sm-4">
                                <img src="/img/default-100x100.png" class="img img-responsive thumbnail" border="0" />
                			</div>
            			</div>
            		</div>
            		<h3>
                        Treatment Plan
                        <div class="small">Select the treatment plan for this patient using the codes below.</div>
            		</h3>
            		
            		<div id="tx_plans">
            		    <div class="tx_plans_list"></div>
            		    <div class="btn btn-success add"><i class="fa fa-plus"></i> Add New TX</div>
            		</div>
            		
            	</div>
            	<div class="tab-pane fade in" id="signed_forms">
                   
            	</div>
            	<div class="tab-pane fade in" id="confirmation">
                   
            	</div>
        	</div>
        </form>
    </div>
</div>

<div id="crumbs">
    <div class="row nav nav-tabs" role="tablist">
        <div class="col-xs-3 active">
            <a href="#basic" data-toggle="tab">
                <span class="hidden-xs">Client&nbsp;Information</span>
                <span class="visible-xs"><i class="fa fa-user"></i></span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="#insurance" data-toggle="tab">
                <span class="hidden-xs">Insurance</span>
                <span class="visible-xs"><i class="fa fa-user-md"></i></span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="#signed_forms" data-toggle="tab">
                <span class="hidden-xs">Signed&nbsp;Forms</span>
                <span class="visible-xs"><i class="fa fa-edit"></i></span>
            </a>
        </div>
        <div class="col-xs-3">
            <a href="#confirmation" data-toggle="tab">
                <span class="hidden-xs">Confirm &amp; Save</span>
                <span class="visible-xs"><i class="fa fa-check"></i></span>
            </a>
        </div>
    </div>
</div>
<script>
//<!--
$(document).ready(function() {
    $('#tx_plans').on('add', function(e, item) {
        var template = $('<div class="form-group"><div class="input-group"><select name="icd[]" class="tx_plan"></select><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>');

        template.appendTo($('.tx_plans_list', $(this)));
        $('.tx_plan', template).selectize({
        	allowEmptyOption: true,
    		valueField: '_id',
    		labelField: 'name',
    		optgroupField: 'category',
    		searchField: ['name', 'code'],
    		optgroups: [
<?php
                $category = ''; 
                foreach ($icd_codes as $icd_code) {  
                    if ($category != $icd_code->getCategory()) { 
                        $category = $icd_code->getCategory();
?>
                { label: '<?php echo str_replace('\'', '', $category) ?>', value: '<?php echo str_replace('\'', '', $category) ?>'},
<?php               }
                } 
?>
    		],
            options: [
                <?php foreach ($icd_codes as $icd_code) { ?>
                <?php echo json_encode($icd_code->toArray()) ?>,
                <?php } ?>
            ]
        });
    }).on('click', '.btn-danger', function() {
    	$('select', $(this).closest('.form-group')).attr('disabled','disabled');
    	$(this).closest('.form-group').remove();
    }).on('click', '.add', function() {
    	$('#tx_plans').trigger('add');
    });

	
    $('#gender').selectize();

    $('#icd').selectize();

    $('.dob_datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        
    }, function(start, end, label) {
        $('#dob').val(start.format('MM/DD/YYYY'));
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $('#crumbs div').removeClass('active');
        $(e.target).closest('div').addClass('active');
  	});
	
	$('#client_form_<?php echo $client->getId() ?>').form(function(data) {
		$.rad.notify('Client Updated', 'The client has been added/updated in the system');
		$('#client_search_form').trigger('submit');
		$('#edit_client_modal').modal('hide');
	}, {keep_form:1});
});
//-->
</script>