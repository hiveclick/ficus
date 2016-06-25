<?php
	/* @var $form Ficus\Form */
	$form = $this->getContext()->getRequest()->getAttribute("form", array());
?>
<style>


.element-group {
	border: 1px solid transparent;
	padding: 2px;
}

.element_hover {
	border: 1px dotted black;
	border-radius: 3px;
}
.element_selected {
	border: 1px dotted red;
	border-radius: 3px;
}
.selectize-dropdown-content .optgroup-header {
	font-weight: bold;
	background: #e8e8e8;
	border-bottom: 1px solid #4b646f;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div>
	<aside id="main-sidebar" class="main-sidebar main-sidebar-fullscreen">
		<div class="tab-content">
			<div id="basic-sidebar" class="tab-pane fade in" style="padding:10px;">
				<h2>Step 1</h2>
				<p>Give your form a name and quick description to help you identify it easily.</p>

				<p>Choose which contexts to display the form.  A context allows you to only show
				forms during a task that are associated with that task.</p>
			</div>
			<div id="build-sidebar" class="tab-pane fade in active" style="padding:10px;">
				<h2>Step 2</h2>
				<div style="border-bottom:1px solid #b8c7ce;margin:5px 0px 10px 0px;padding:3px;">Add New Element</div>
				<div style="padding:5px;">
					<div class="input-group">
						<select name="form_element" id="form_element">
							<optgroup label="Text Elements">
								<option value="1">Paragraph</option>
							</optgroup>
							<optgroup label="Standard Form">
								<option value="2">Text box</option>
								<option value="3">Text Area</option>
								<option value="4">Checkbox</option>
								<option value="5">Radio Buttons</option>
								<option value="6">Drop down</option>
								<option value="7">Multiple Drop down</option>
							</optgroup>
							<optgroup label="Enhanced Form">
								<option value="8">Signature</option>
								<option value="9">File Upload</option>
								<option value="10">Date</option>
							</optgroup>
						</select>
						<div id="add_element_btn" class="input-group-addon btn btn-success btn-xs"><i class="fa fa-plus"></i></div>
					</div>
				</div>
				<div style="border-bottom:1px solid #b8c7ce;margin:25px 0px 10px 0px;padding:3px;">Element Properties</div>
				<div style="padding:5px;" id="element_properties">
					<input type="hidden" name="element[id]" class="form-control input-sm" />
					<div class="form-group hidden element_type_2 element_type_3 element_type_4 element_type_6">
						<div class="input-group">
							<span class="input-group-addon">Label</span>
							<input type="text" name="element[label]" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group hidden element_type_2 element_type_3 element_type_4 element_type_6">
						<div class="input-group">
							<span class="input-group-addon">Name</span>
							<input type="text" name="element[name]" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group hidden element_type_2 element_type_3 element_type_4 element_type_6">
						<div class="input-group">
							<span class="input-group-addon">Placeholder</span>
							<input type="text" name="element[placeholder]" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group hidden element_type_1">
						<textarea name="element[placeholder]" class="form-control input-sm" rows="5" placeholder="Enter placeholder text here"></textarea>
					</div>
					<div class="form-group hidden element_type_1">
						<div style="border-bottom:1px solid #b8c7ce;margin:25px 0px 10px 0px;padding:0px;">Formatting</div>
						<div class="btn-group">
							<div class="btn btn-xs btn-default"><i class="fa fa-align-left"></i></div>
							<div class="btn btn-xs btn-default"><i class="fa fa-align-center"></i></div>
							<div class="btn btn-xs btn-default"><i class="fa fa-align-right"></i></div>
							<div class="btn btn-xs btn-default"><i class="fa fa-bold"></i></div>
							<div class="btn btn-xs btn-default"><i class="fa fa-italic"></i></div>
							<div class="btn btn-xs btn-default"><i class="fa fa-underline"></i></div>
						</div>
					</div>
				</div>
				<div style="border-bottom:1px solid #b8c7ce;margin:25px 0px 10px 0px;padding:3px;">Element Values</div>
				<div style="padding:5px;" id="element_values">
					<div class="form-group hidden element_type_4">
						<div class="input-group">
							<span class="input-group-addon">On Label</span>
							<input type="text" name="element[onLabel]" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group hidden element_type_4">
						<div class="input-group">
							<span class="input-group-addon">Off Label</span>
							<input type="text" name="element[offLabel]" class="form-control input-sm" />
						</div>
					</div>
					<div class="form-group hidden element_type_6">
						<div id="element_value_list"></div>
						<div class="btn btn-success" id="add_to_element_value_list"><i class="fa fa-plus"></i></div>
					</div>
				</div>
			</div>
		</div>
	</aside>
</div>

<div class="content-wrapper content-wrapper-fullscreen">
    <div class="container-fluid">
        <form class="" id="client_form_<?php echo $form->getId() ?>" method="<?php echo \MongoId::isValid($form->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
        	<input type="hidden" name="func" value="/client/client" />
            <div class="tab-content">
                <div class="tab-pane fade in" id="basic">
	                <h1 class="hidden-xs">
		                New Form Wizard
		                <span class="small">Add a new signable form that can be assigned to a client.</span>
	                </h1>
            		<div class="form-group">
						<label>Name your form</label>
			            <input type="text" name="name" class="form-control" value="<?php echo $form->getName() ?>" />
		            </div>

	                <div class="form-group">
			            <label>Add a description for your form</label>
			            <textarea name="description" rows="10" class="form-control"><?php echo $form->getDescription() ?></textarea>
            		</div>

	                <div class="form-group">
		                <input type="hidden" name="is_system_form" value="0" />
		                <label><input type="checkbox" name="is_system_form" value="1" /> This form is read-only and cannot be changed</label>
	                </div>

            		<h3>
                        Choose Contexts
                        <div class="small">Choose what contexts this form will be used in.</div>
            		</h3>

            		<div class="form-group">
                        <div class="row">
							<div class="col-md-6">
								<div class="media">
									<div class="media-left">
										<input type="checkbox" name="context[add_client]" id="context_intake_1" value="1" />
									</div>
									<div class="media-body">
										<label for="context_intake_1" style="font-weight:normal;">
											<h4 class="media-heading">Add New Client</h4>
											Show this form as an option when you are doing an intake to add a new client to the system
										</label>
									</div>
								</div>
								<br />
								<div class="media">
									<div class="media-left">
										<input type="checkbox" name="context[discharge_client]" id="context_discharge_1" value="1" />
									</div>
									<div class="media-body">
										<label for="context_discharge_1" style="font-weight:normal;">
											<h4 class="media-heading">Discharge Client</h4>
											Show this form as an option when you are discharging a client from a facility
										</label>
									</div>
								</div>
							</div>
	                        <div class="col-md-6">
		                        <div class="media">
			                        <div class="media-left">
				                        <input type="checkbox" name="context[medication]" id="context_medication_1" value="1" />
			                        </div>
			                        <div class="media-body">
				                        <label for="context_medication_1" style="font-weight:normal;">
					                        <h4 class="media-heading">Administer Medication</h4>
					                        Show this form as an option when a client is administered medication
				                        </label>
			                        </div>
		                        </div>
		                        <br />
		                        <div class="media">
			                        <div class="media-left">
				                        <input type="checkbox" name="context[treatment]" id="context_treatment_1" value="1" />
			                        </div>
			                        <div class="media-body">
				                        <label for="context_treatment_1" style="font-weight:normal;">
					                        <h4 class="media-heading">Therapy Session </h4>
				                            Show this form as an option when a client has been assigned or attended a therapy session
				                        </label>
			                        </div>
		                        </div>
	                        </div>
            			</div>
            		</div>
            	</div>


            	<div class="tab-pane fade in active" id="build">
		            <div class="row">
			            <div class="col-md-12">
				            <h1>
					            Build Form
					            <span class="small">Use the form builder below to customize your form.</span>
				            </h1>
				            <div id="builder" style="border:1px solid black;background:white;padding:10px;"></div>
				            <p />
			            </div>
		            </div>
            	</div>
            	<div class="tab-pane fade in" id="preview">

            	</div>
            	<div class="tab-pane fade in" id="confirmation">

            	</div>
        	</div>
        </form>
    </div>
</div>

<div class="crumbs">
	<div class="row nav nav-tabs" role="tablist">
		<div class="col-xs-3 ">
			<a href="#basic" data-toggle="tab">
				<span class="hidden-xs">Basic&nbsp;Information</span>
				<span class="visible-xs"><i class="fa fa-edit"></i></span>
			</a>
		</div>
		<div class="col-xs-3 active">
			<a href="#build" data-toggle="tab">
				<span class="hidden-xs">Build&nbsp;Form</span>
				<span class="visible-xs"><i class="fa fa-tasks"></i></span>
			</a>
		</div>
		<div class="col-xs-3">
			<a href="#signed_forms" data-toggle="tab">
				<span class="hidden-xs">Preview&nbsp;Forms</span>
				<span class="visible-xs"><i class="fa fa-search"></i></span>
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

<div id="element_controls" class="controls" style="float:right;position:relative;top:-15px;z-index:10000;display:none;">
	<div class="btn-group">
		<div class="btn btn-xs btn-default btn-trash" style="border:1px dotted red;"><i class="fa fa-trash"></i></div>
	</div>
</div>
<script>
//<!--
$(document).ready(function() {
	$('#builder').on('mouseenter', "div.element-group", function() {
		$(this).addClass('element_hover');
	}).on('mouseleave', "div.element-group", function() {
		$(this).removeClass('element_hover');
	}).on('click', "div.btn-trash", function() {
		$(this).closest('.element-group').remove();
	}).on('click', "div.element-group", function() {
		$('.controls', '#builder').hide();
		$('div','#builder').removeClass('element_selected');
		$(this).addClass('element_selected');

		$('.controls', $(this)).show();

		var elem_data = $(this).data('data');
		if (elem_data) {
			$('input[name="element[id]"]').val(elem_data.id || 0);
			$('input[name="element[label]"]').val(elem_data.label || '');
			$('textarea[name="element[placeholder]"]').val(elem_data.placeholder || '');
			$('input[name="element[placeholder]"]').val(elem_data.placeholder || '');
			$('input[name="element[name]"]').val(elem_data.name || '');

			$('#element_properties .form-group').addClass('hidden');
			$('#element_properties .element_type_' + elem_data.type).removeClass('hidden');

			$('#element_values .form-group').addClass('hidden');
			$('#element_values .element_type_' + elem_data.type).removeClass('hidden');
			$('input[name="element[onLabel]"]').val(elem_data.onLabel || '');
			$('input[name="element[offLabel]"]').val(elem_data.offLabel || '');
		}
	}).on('add', function(e, item) {
		var id = 'elem_' + Math.floor((Math.random() * 10000) + 1000);
		var it = $(item);
		elem_options = $.parseJSON(it.attr('data-data'));
		elem_options.id = id;
		it.removeAttr('data-data')
		it.data('data', elem_options);
		it.attr('id', id);
		var controls = $('#element_controls').clone(true, true);
		controls.removeAttr('id');
		it.prepend(controls);
		if (elem_options.type == 4) {
			$('input[type="checkbox"]', it).bootstrapSwitch({
				size: 'small',
				onText: elem_options.onLabel,
				offText: elem_options.offLabel
			});
		} else if (elem_options.type == 6) {
			$('select', it).selectize();
		}

		$(this).append(it);
	});

	$( "#builder" ).sortable();

	$('input[name="element[label]"]').on('change', function() {
		var it = $('#' + $('input[name="element[id]"]').val());
		elem_options = it.data('data');
		elem_options.label = $(this).val();
		it.data('data', elem_options);
		if (elem_options.type == 1) {
			//it.html($(this).val());
		} else if (elem_options.type == 2) {
			$('.form-label', it).html($(this).val());
		} else if (elem_options.type == 3) {
			$('.form-label', it).html($(this).val());
		} else if (elem_options.type == 4) {
			$('.form-label', it).html($(this).val());
		} else if (elem_options.type == 6) {
			$('.form-label', it).html($(this).val());
		}
	});
	$('textarea[name="element[placeholder]"],input[name="element[placeholder]"]').on('change', function() {
		var it = $('#' + $('input[name="element[id]"]').val());
		elem_options = it.data('data');
		elem_options.placeholder = $(this).val();
		it.data('data', elem_options);
		if (elem_options.type == 1) {
			$('.element', it).html($(this).val());
		} else if (elem_options.type == 2) {
			$('input', it).attr('placeholder', $(this).val());
		} else if (elem_options.type == 3) {
			$('textarea', it).attr('placeholder', $(this).val());
		} else if (elem_options.type == 4) {
			$('input', it).attr('placeholder', $(this).val());
		} else if (elem_options.type == 6) {
			$('select', it).attr('placeholder', $(this).val());
		}
	});
	$('input[name="element[name]"]').on('change', function() {
		var it = $('#' + $('input[name="element[id]"]').val());
		elem_options = it.data('data');
		elem_options.placeholder = $(this).val();
		it.data('data', elem_options);
		if (elem_options.type == 1) {
			//it.html($(this).val());
		} else if (elem_options.type == 2) {
			$('input', it).attr('name', $(this).val());
		} else if (elem_options.type == 3) {
			$('textarea', it).attr('name', $(this).val());
		} else if (elem_options.type == 4) {
			$('input', it).attr('name', $(this).val());
		} else if (elem_options.type == 6) {
			$('select', it).attr('name', $(this).val());
		}
	});
	$('input[name="element[onLabel]"]').on('change', function() {
		var it = $('#' + $('input[name="element[id]"]').val());
		elem_options = it.data('data');
		elem_options.onLabel = $(this).val();
		it.data('data', elem_options);
		if (elem_options.type == 1) {
			//it.html($(this).val());
		} else if (elem_options.type == 2) {
			//$('input', it).attr('name', $(this).val());
		} else if (elem_options.type == 3) {
			//$('textarea', it).attr('name', $(this).val());
		} else if (elem_options.type == 4) {
			$('input[type=checkbox]', it).bootstrapSwitch('onText', $(this).val());
		}
	});
	$('input[name="element[offLabel]"]').on('change', function() {
		var it = $('#' + $('input[name="element[id]"]').val());
		elem_options = it.data('data');
		elem_options.offLabel = $(this).val();
		it.data('data', elem_options);
		if (elem_options.type == 1) {
			//it.html($(this).val());
		} else if (elem_options.type == 2) {
			//$('input', it).attr('name', $(this).val());
		} else if (elem_options.type == 3) {
			//$('textarea', it).attr('name', $(this).val());
		} else if (elem_options.type == 4) {
			$('input[type=checkbox]', it).bootstrapSwitch('offText', $(this).val());
		}
	});

	$('#element_value_list').on('click', 'i.fa-trash', function() {
		(this).closest('.form-group').remove();
	});


	$('#add_to_element_value_list').on('click', function() {
		var $row = $('<div class="form-group"><div class="row"><div class="col-md-6"><input type="text" name="element[val_name]" value="" class="form-control" placeholder="name" /></div><div class="col-md-6"><div class="input-group"><input type="text" name="element[val_value]" value="" class="form-control" placeholder="value" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div></div></div>');
		$('#element_value_list').append($row);
	});

	$('#context_treatment_1,#context_intake_1,#context_discharge_1,#context_medication_1').bootstrapSwitch({
		onText: '<i class="fa fa-check">&nbsp;Assigned&nbsp;&nbsp;&nbsp;</i>',
		offText: 'Not&nbsp;Used',
		size: 'small',
		labelWidth: 20
	});

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $('.crumbs div').removeClass('active');
        $(e.target).closest('div').addClass('active');
	    $('#main-sidebar div').removeClass('active');
	    $($(e.target).attr('href') + '-sidebar').closest('div').addClass('active');
  	});

	$('#form_form_<?php echo $form->getId() ?>').form(function(data) {
		$.rad.notify('Form Updated', 'The form has been added/updated in the system');
	}, {keep_form:1});

	var element_add_selectize = $('#form_element').selectize();

	$('#add_element_btn').on('click', function() {
		if (element_add_selectize[0].selectize.getValue() == 1) {
			var elem = '<div class="element-group" data-data="<?php echo htmlentities(json_encode(array('type' => 1, 'label' => 'Form Label', 'name' => '', 'placeholder' => 'Enter your paragraph text here.'))) ?>"><div class="help-block element">Enter your paragraph text here.</div></div>';
			$('#builder').trigger('add', elem);
		} else if (element_add_selectize[0].selectize.getValue() == 2) {
			var elem = '<div class="element-group" data-data="<?php echo htmlentities(json_encode(array('type' => 2, 'label' => 'Form Label', 'name' => '', 'placeholder' => 'placeholder text'))) ?>"><div class="form-group element"><label class="form-label">Form Label</label><input type="text" name="" class="form-control" placeholder="form element placeholder" /></div></div>';
			$('#builder').trigger('add', elem, {});
		} else if (element_add_selectize[0].selectize.getValue() == 3) {
			var elem = '<div class="element-group" data-data="<?php echo htmlentities(json_encode(array('type' => 3, 'label' => 'Form Label', 'name' => '', 'placeholder' => 'placeholder text'))) ?>"><div class="form-group element"><label class="form-label">Form Label</label><textarea name="" class="form-control" placeholder="form element placeholder"></textarea></div></div>';
			$('#builder').trigger('add', elem, {});
		} else if (element_add_selectize[0].selectize.getValue() == 4) {
			var elem = '<div class="element-group" data-data="<?php echo htmlentities(json_encode(array('type' => 4, 'label' => 'Form Label', 'name' => '', 'placeholder' => 'placeholder text', 'onLabel' => 'Yes', 'offLabel' => 'No'))) ?>"><div class="element"><div class="row"><div class="col-md-9"><label class="form-label">Form Label</label></div><div class="col-md-2"><input type="checkbox" name="" class="bootstrap-switch" value="1"></div></div></div></div>';
			$('#builder').trigger('add', elem, {});
		} else if (element_add_selectize[0].selectize.getValue() == 6) {
			var elem = '<div class="element-group" data-data="<?php echo htmlentities(json_encode(array('type' => 6, 'label' => 'Form Label', 'name' => '', 'placeholder' => 'placeholder text', 'value' => array()))) ?>"><div class="element"><div class="row"><div class="col-md-9"><label class="form-label">Form Label</label></div><div class="col-md-2"><select name="" class="selectize" placeholder="select value"></div></div></div></div>';
			$('#builder').trigger('add', elem, {});
		}
	});
});
//-->
</script>