<?php
	/* @var $client Ficus\Client */
	$client = $this->getContext()->getRequest()->getAttribute("client", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($client->getId()) ? 'Edit' : 'Add' ?> Client</h4>
</div>
<form class="" id="client_form_<?php echo $client->getId() ?>" method="<?php echo \MongoId::isValid($client->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/client/client" />
	<?php if (\MongoId::isValid($client->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $client->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
	   <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Basic</a></li>
                <li><a href="#employment" data-toggle="tab">Employment</a></li>
                <li><a href="#physician" data-toggle="tab">Physician</a></li>
                <li><a href="#history" data-toggle="tab">Health History</a></li>
                <li><a href="#extra" data-toggle="tab">Additional Information</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
                    <div class="help-block">Manage a client with access to log into the system</div>
            		<div class="form-group">
            			<label class="control-label" for="firstname">Name</label>
            			<div class="row">
                            <div class="col-md-6"><input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter client's firstname" value="<?php echo $client->getFirstname() ?>" /></div>
                            <div class="col-md-6"><input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter client's lastname" value="<?php echo $client->getLastname() ?>" /></div>
            			</div>
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                    			<label class="control-label" for="dob">DOB</label>
                    			<div class="input-group">
                                    <input type="text" id="dob" name="dob" class="form-control" placeholder="Enter date of birth" value="<?php echo date('m/d/Y', $client->getDob()->sec) ?>" />
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    			</div>
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="ssn">Social Security #</label>
                                <input type="text" id="ssn" name="ssn" class="form-control" placeholder="Enter ssn #" value="<?php echo $client->getSsn() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="gender">Gender</label>
                                <select name="gender" id="gender" placeholder="select gender...">
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                			</div>
            			</div>
            		</div>            		
            		
            		<div class="form-group">
            			<label class="control-label" for="email">Email</label>
            			<input type="text" id="email" name="mailing[email]" class="form-control" placeholder="Enter client's email address" value="<?php echo $client->getMailing()->getEmail() ?>" />
            		</div>
            		
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="phone">Phone</label>
                    			<input type="text" id="phone" name="mailing[phone]" class="form-control" placeholder="Enter client's phone" value="<?php echo $client->getMailing()->getPhone() ?>" />
                			</div>
                			<div class="col-md-6">
                    			<label class="control-label" for="mobile">Alt. Phone</label>
                    			<input type="text" id="mobile" name="mailing[mobile]" class="form-control" placeholder="Enter client's mobile" value="<?php echo $client->getMailing()->getMobile() ?>" />
                			</div>
            			</div>
            		</div>
            		
            		<hr />
            		
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
            		
            		<hr />
            
            		<div class="form-group">
            			<label class="control-label" for="policy_number">Policy #</label>
            			<input type="text" id="policy" name="policy_number" class="form-control" placeholder="Enter client's policy #" value="<?php echo $client->getPolicyNumber() ?>" />
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="employment">
            	    <div class="help-block">Enter this person's employer information</div>
            	    <div class="form-group">
            	        <label class="control-label" for="employment_status">Employment Status</label>
                        <select name="employment_status" id="employment_status" placeholder="Choose employment status...">
                            <option value="unemployed">Unemployed</option>
                            <option value="employed">Employed</option>
                            <option value="self-employed">Self-Employed</option>
                            <option value="retired">Retired</option>
                        </select>
            	    </div>
            	    <div class="form-group">
            			<label class="control-label" for="name">Employer Name</label>
            			<input type="text" id="name" name="employer[name]" class="form-control" placeholder="Enter employer's name" value="<?php echo $client->getEmployer()->getName() ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="phone">Phone</label>
            			<input type="text" id="phone" name="employer[mailing][phone]" class="form-control" placeholder="Enter employer's phone" value="<?php echo $client->getEmployer()->getMailing()->getPhone() ?>" />
            		</div>
            		<hr />
            		<div class="form-group">
            			<label class="control-label" for="name">Address</label>
            			<input type="text" id="name" name="employer[mailing][address]" class="form-control" placeholder="Enter employer's address" value="<?php echo $client->getEmployer()->getMailing()->getAddress() ?>" />
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="city">City</label>
                                <input type="text" id="city" name="employer[mailing][city]" class="form-control" placeholder="Enter employer's city" value="<?php echo $client->getEmployer()->getMailing()->getCity() ?>" />    
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="state">State</label>
                                <input type="text" id="state" name="employer[mailing][state]" class="form-control" placeholder="Enter employer's state" value="<?php echo $client->getEmployer()->getMailing()->getState() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="zip">Zip</label>
                                <input type="text" id="zip" name="employer[mailing][postal_code]" class="form-control" placeholder="Enter employer's zip" value="<?php echo $client->getEmployer()->getMailing()->getPostalCode() ?>" />    
                            </div>
                        </div>
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="physician">
                    <div class="help-block">Enter this person's Primary Care Physician</div>
            	    <div class="form-group">
            			<label class="control-label" for="name">Name</label>
            			<input type="text" id="name" name="physician[name]" class="form-control" placeholder="Enter physician's name" value="<?php echo $client->getPcp()->getName() ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="email">Email</label>
            			<input type="text" id="email" name="physician[mailing][email]" class="form-control" placeholder="Enter physician's email" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getEmail() ?>" />
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="phone">Phone</label>
            			<input type="text" id="phone" name="physician[mailing][phone]" class="form-control" placeholder="Enter physician's phone" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getPhone() ?>" />
            		</div>
            		<hr />
            		<div class="form-group">
            			<label class="control-label" for="name">Address</label>
            			<input type="text" id="name" name="physician[mailing][address]" class="form-control" placeholder="Enter physician's address" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getAddress() ?>" />
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label" for="city">City</label>
                                <input type="text" id="city" name="physician[mailing][city]" class="form-control" placeholder="Enter physician's city" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getCity() ?>" />    
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="state">State</label>
                                <input type="text" id="state" name="physician[mailing][state]" class="form-control" placeholder="Enter physician's state" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getState() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="zip">Zip</label>
                                <input type="text" id="zip" name="physician[mailing][postal_code]" class="form-control" placeholder="Enter physician's zip" value="<?php echo $client->getPcp()->getPhysician()->getMailing()->getPostalCode() ?>" />    
                            </div>
                        </div>
            		</div>
            		<hr />
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label" for="license">License</label>
                                <input type="text" id="license" name="physician[license]" class="form-control" placeholder="Enter physician's license #" value="<?php echo $client->getPcp()->getPhysician()->getLicense() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="npi">NPI #</label>
                                <input type="text" id="npi" name="physician[npi]" class="form-control" placeholder="Enter physician's NPI #" value="<?php echo $client->getPcp()->getPhysician()->getNpi() ?>" />    
                            </div>
                            <div class="col-md-4">
                                <label class="control-label" for="upin">UPIN #</label>
                                <input type="text" id="upin" name="physician[upin]" class="form-control" placeholder="Enter physician's UPIN #" value="<?php echo $client->getPcp()->getPhysician()->getUpin() ?>" />    
                            </div>
                        </div>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="notes">Additional Notes</label>
            			<textarea id="notes" name="physician[notes]" class="form-control" placeholder="Enter any additional notes"><?php echo $client->getPcp()->getPhysician()->getNotes() ?></textarea>
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="history">
                    <div class="help-block">Enter this person's health profile</div>
            	    <div class="form-group">
            			<label class="control-label" for="diagnosis">Diagnosis</label>
            			<textarea id="diagnosis" name="clinical[diagnosis]" class="form-control" placeholder="Enter diagnosis..."><?php echo $client->getClinical()->getDiagnosis() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="care_notes">Care Notes</label>
            			<textarea id="care_notes" name="clinical[care_notes]" class="form-control" placeholder="Enter care notes..."><?php echo $client->getClinical()->getCareNotes() ?></textarea>
            		</div>
            		<hr />
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="weight">Weight</label>
                    			<div class="input-group">
                                    <input type="text" id="weight" name="clinical[weight]" class="form-control" placeholder="Enter weight" value="<?php echo $client->getClinical()->getWeight() ?>" />
                                    <span class="input-group-addon">lbs</span>
                                </div>
                			</div>
                			<div class="col-md-6">
                    			<label class="control-label" for="height_ft">Height</label>
                    			<div class="input-group">
                                    <input type="text" id="height_ft" name="clinical[height_ft]" class="form-control" placeholder="FT" value="<?php echo $client->getClinical()->getHeightFt() ?>" />
                                    <span class="input-group-addon">ft</span>
                                    <input type="text" id="height_in" name="clinical[height_in]" class="form-control" placeholder="IN" value="<?php echo $client->getClinical()->getHeightIn() ?>" />
                                    <span class="input-group-addon">in</span>
                                </div>
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="smoker_1">Smoker</label>
                    			<div class="small help-block">Does this person smoke cigarettes, cigar, a pipe, chew tobacco, or vape?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="smoker_0" name="clinical[smoker]" value="0" />
                    			<input type="checkbox" id="smoker_1" name="clinical[smoker]" class="form-control" value="1" <?php echo $client->getClinical()->getSmoker() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="live_alone_1">Lives Alone</label>
                    			<div class="small help-block">Does this person live alone or do they have a spouse or roommate?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="live_alone_0" name="clinical[live_alone]" value="0" />
                    			<input type="checkbox" id="live_alone_1" name="clinical[live_alone]" class="form-control" value="1" <?php echo $client->getClinical()->getLiveAlone() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="has_dnr_1">Has DNR</label>
                    			<div class="small help-block">Does this person have a signed Do Not Resuscitate form?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="has_dnr_0" name="clinical[has_dnr]" value="0" />
                    			<input type="checkbox" id="has_dnr_1" name="clinical[has_dnr]" class="form-control" value="1" <?php echo $client->getClinical()->getHasDnr() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            		<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                    			<label class="control-label" for="is_fullcode_1">Full Code</label>
                    			<div class="small help-block">Is this person a full code?</div>
                			</div>
                			<div class="col-md-6 text-right">
                    			<input type="hidden" id="is_fullcode_0" name="clinical[is_fullcode]" value="0" />
                    			<input type="checkbox" id="is_fullcode_1" name="clinical[is_fullcode]" class="form-control" value="1" <?php echo $client->getClinical()->getIsFullcode() ? 'checked' : '' ?> />
                			</div>
            			</div>
            		</div>
            	</div>
            	<div class="tab-pane fade in" id="extra">
                    <div class="help-block">You can enter any additional information that will help you with this person</div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                    			<label class="control-label" for="race">Race</label>
                                <select name="race" id="race">
                                    <optgroup label="Common Races">
                                        <option value="caucasian" <?php echo $client->getExtra()->getRace() == "caucasian" ? 'selected' : '' ?>>Caucasian (European, American)</option>
                                        <option value="asian" <?php echo $client->getExtra()->getRace() == "asian" ? 'selected' : '' ?>>Asian (Mongol, Tibetan, Korean Japanese, etc)</option>
                                        <option value="chinese" <?php echo $client->getExtra()->getRace() == "chinese" ? 'selected' : '' ?>>South East Asian (Chinese, Thai, Malay, Filipino, etc)</option>
                                        <option value="black" <?php echo $client->getExtra()->getRace() == "black" ? 'selected' : '' ?>>Black (African American, West African, Bushmen, Ethiopian)</option>
                                        <option value="pacific" <?php echo $client->getExtra()->getRace() == "pacific" ? 'selected' : '' ?>>Pacific (Polynesian, Micronesian, etc)</option>
                                    </optgroup>
                                    <optgroup label="Other Races">
                                        <option value="mixed" <?php echo $client->getExtra()->getRace() == "mixed" ? 'selected' : '' ?>>Mixed Race</option>
                                        <option value="arctic" <?php echo $client->getExtra()->getRace() == "arctic" ? 'selected' : '' ?>>Arctic (Siberian, Eskimo)</option>
                                        <option value="indian" <?php echo $client->getExtra()->getRace() == "indian" ? 'selected' : '' ?>>Caucasian (Indian)</option>
                                        <option value="middle_east" <?php echo $client->getExtra()->getRace() == "middle_east" ? 'selected' : '' ?>>Caucasian (Middle East)</option>
                                        <option value="north_african" <?php echo $client->getExtra()->getRace() == "north_african" ? 'selected' : '' ?>>Caucasian (North African, Other)</option>
                                        <option value="aboriginee" <?php echo $client->getExtra()->getRace() == "aboriginee" ? 'selected' : '' ?>>Indigenous Australian</option>
                                        <option value="native_american" <?php echo $client->getExtra()->getRace() == "native_american" ? 'selected' : '' ?>>Native American</option>
                                        <option value="other" <?php echo $client->getExtra()->getRace() == "other" ? 'selected' : '' ?>>Other Race</option>
                                    </optgroup>
                                </select>
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="religion">Religion</label>
                                <select name="religion" id="religion">
                                    <optgroup label="Common Religions">
                                        <option value="Agnostic" <?php echo $client->getExtra()->getReligion() == "Agnostic" ? 'selected' : '' ?>>Agnostic</option>
                                        <option value="Buddhism" <?php echo $client->getExtra()->getReligion() == "Buddhism" ? 'selected' : '' ?>>Buddhism</option>
                                        <option value="Christianity" <?php echo $client->getExtra()->getReligion() == "Christianity" ? 'selected' : '' ?>>Christianity</option>
                                        <option value="Hinduism" <?php echo $client->getExtra()->getReligion() == "Hinduism" ? 'selected' : '' ?>>Hinduism</option>
                                        <option value="Islam" <?php echo $client->getExtra()->getReligion() == "Islam" ? 'selected' : '' ?>>Islam</option>
                                        <option value="Judaism" <?php echo $client->getExtra()->getReligion() == "Judaism" ? 'selected' : '' ?>>Judaism</option>
                                        <option value="Mormonism" <?php echo $client->getExtra()->getReligion() == "Mormonism" ? 'selected' : '' ?>>Mormonism</option>
                                        <option value="Other" <?php echo $client->getExtra()->getReligion() == "Other" ? 'selected' : '' ?>>Other</option>
                                    </optgroup>
                                    <optgroup label="All Religions">
                                        <option value="African Traditional & Diasporic" <?php echo $client->getExtra()->getReligion() == "African Traditional & Diasporic" ? 'selected' : '' ?>>African Traditional & Diasporic</option>
                                        <option value="Agnostic" <?php echo $client->getExtra()->getReligion() == "Agnostic" ? 'selected' : '' ?>>Agnostic</option>
                                        <option value="Atheist" <?php echo $client->getExtra()->getReligion() == "Atheist" ? 'selected' : '' ?>>Atheist</option>
                                        <option value="Baha'i" <?php echo $client->getExtra()->getReligion() == "Baha'i" ? 'selected' : '' ?>>Baha'i</option>
                                        <option value="Buddhism" <?php echo $client->getExtra()->getReligion() == "Buddhism" ? 'selected' : '' ?>>Buddhism</option>
                                        <option value="Cao Dai" <?php echo $client->getExtra()->getReligion() == "Cao Dai" ? 'selected' : '' ?>>Cao Dai</option>
                                        <option value="Chinese traditional religion" <?php echo $client->getExtra()->getReligion() == "Chinese traditional religion" ? 'selected' : '' ?>>Chinese traditional religion</option>
                                        <option value="Jainism" <?php echo $client->getExtra()->getReligion() == "Jainism" ? 'selected' : '' ?>>Jainism</option>
                                        <option value="Juche" <?php echo $client->getExtra()->getReligion() == "Juche" ? 'selected' : '' ?>>Juche</option>
                                        <option value="Neo-Paganism" <?php echo $client->getExtra()->getReligion() == "Neo-Paganism" ? 'selected' : '' ?>>Neo-Paganism</option>
                                        <option value="Nonreligious" <?php echo $client->getExtra()->getReligion() == "Nonreligious" ? 'selected' : '' ?>>Nonreligious</option>
                                        <option value="Rastafarianism" <?php echo $client->getExtra()->getReligion() == "Rastafarianism" ? 'selected' : '' ?>>Rastafarianism</option>
                                        <option value="Secular" <?php echo $client->getExtra()->getReligion() == "Secular" ? 'selected' : '' ?>>Secular</option>
                                        <option value="Shinto" <?php echo $client->getExtra()->getReligion() == "Shinto" ? 'selected' : '' ?>>Shinto</option>
                                        <option value="Sikhism" <?php echo $client->getExtra()->getReligion() == "Sikhism" ? 'selected' : '' ?>>Sikhism</option>
                                        <option value="Spiritism" <?php echo $client->getExtra()->getReligion() == "Spiritism" ? 'selected' : '' ?>>Spiritism</option>
                                        <option value="Tenrikyo" <?php echo $client->getExtra()->getReligion() == "Tenrikyo" ? 'selected' : '' ?>>Tenrikyo</option>
                                        <option value="Unitarian-Universalism" <?php echo $client->getExtra()->getReligion() == "Unitarian-Universalism" ? 'selected' : '' ?>>Unitarian-Universalism</option>
                                        <option value="Zoroastrianism" <?php echo $client->getExtra()->getReligion() == "Zoroastrianism" ? 'selected' : '' ?>>Zoroastrianism</option>
                                        <option value="Primal-Indigenous" <?php echo $client->getExtra()->getReligion() == "Primal-Indigenous" ? 'selected' : '' ?>>Primal-Indigenous</option>
                                    </optgroup>
                                </select>
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="preferred_language">Preferred Language</label>
                                <select name="preferred_language" id="preferred_language" placeholder="select preferred language...">
                                    <option value="english" <?php echo $client->getExtra()->getPreferredLanguage() == "english" ? 'selected' : '' ?>>English</option>
                                    <option value="spanish" <?php echo $client->getExtra()->getPreferredLanguage() == "spanish" ? 'selected' : '' ?>>Espanol</option>
                                    <option value="french" <?php echo $client->getExtra()->getPreferredLanguage() == "french" ? 'selected' : '' ?>>Francais</option>
                                    <option value="german" <?php echo $client->getExtra()->getPreferredLanguage() == "german" ? 'selected' : '' ?>>Deutsche</option>
                                    <option value="japanese" <?php echo $client->getExtra()->getPreferredLanguage() == "japanese" ? 'selected' : '' ?>>Japanese</option>
                                    <option value="chinese" <?php echo $client->getExtra()->getPreferredLanguage() == "chinese" ? 'selected' : '' ?>>Chinese</option>
                                </select>
                			</div>
            			</div>
            		</div>
            		<hr />
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                    			<label class="control-label" for="occupation">Occupation</label>
                    			<input type="text" id="occupation" name="extra[occupation]" class="form-control" value="<?php echo $client->getExtra()->getOccupation() ?>" />
                			</div>
                			<div class="col-md-4">
                			    <label class="control-label" for="marital_status">Marital Status</label>
                                <select name="marital_status" id="marital_status" placeholder="Choose marital status...">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widow">Widow/Widower</option>
                                </select>
                			</div>
                			<div class="col-md-4">
                    			<label class="control-label" for="wedding_anniversary">Wedding Anniversary</label>
                    			<input type="text" id="wedding_anniversary" name="extra[wedding_anniversary]" class="form-control" value="<?php echo date('m/d/Y', $client->getExtra()->getWeddingAnniversary()->sec) ?>" />
                			</div>
            			</div>
            		</div>
                    <div class="form-group">
            			<label class="control-label" for="hobbies">Hobbies</label>
            			<textarea id="hobbies" name="extra[hobbies]" class="form-control" placeholder="Enter hobbies, past times, likes and dislikes..."><?php echo $client->getExtra()->getHobbies() ?></textarea>
            		</div>
            		<div class="form-group">
            			<label class="control-label" for="pets">Pets</label>
            			<textarea id="pets" name="extra[pets]" class="form-control" placeholder="Enter pets, pet names, and pet care..."><?php echo $client->getExtra()->getPetNotes() ?></textarea>
            		</div>
            	</div>
            	
            </div>
        </div>
    </div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($client->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Client" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#smoker_1,#live_alone_1,#has_dnr_1,#is_fullcode_1').bootstrapSwitch({
        size: 'small',
        onText: 'yes',
        offText: 'no'
    });

    $('#gender,#marital_status,#employment_status,#race,#religion,#preferred_language').selectize();
	
	$('#client_form_<?php echo $client->getId() ?>').form(function(data) {
		$.rad.notify('Client Updated', 'The client has been added/updated in the system');
		$('#client_search_form').trigger('submit');
		$('#edit_client_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($client->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this client from the system?')) {
		$.rad.del({ func: '/client/client/<?php echo $client->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this client', 'You have deleted this client.  You will need to refresh this page to see your changes.');
			$('#client_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>