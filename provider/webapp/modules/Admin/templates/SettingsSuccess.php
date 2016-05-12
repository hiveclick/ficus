<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Global Settings
		<small>These settings affect the different dropdowns, settings, and tabs within the system.</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Settings</li>
	</ol>
</div>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#preadmission_tab" data-toggle="tab">Preadmission</a></li>
            <li><a href="#discharge_tab" data-toggle="tab">Discharge</a></li>
            <li><a href="#diet_tab" data-toggle="tab">Diets</a></li>
            <li><a href="#marital_tab" data-toggle="tab">Marital Status</a></li>
            <li><a href="#condition_tab" data-toggle="tab">Property Conditions</a></li>
            <li><a href="#loc_tab" data-toggle="tab">Levels of Care</a></li>
            <li><a href="#patient_program_tab" data-toggle="tab">Patient Programs</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane fade in" id="preadmission_tab">
                <!-- Preadmission status box -->
                <form action="/api" method="POST" id="preadmission_form"> 
                    <input type="hidden" name="func" value="/admin/preadmission-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Pre-admission Status
                            <span class="small">Statuses used when adding a new patient during the intake process</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                
                <script>
                //<!--
                $(document).ready(function() {
                	$('#preadmission_form').on('add', function(e, value) {
                        value = (value == undefined ? '' : value);
                        var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="preadmission_status[]" placeholder="enter preadmission status name" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                        $(template).appendTo($('.box-body', $(this)));
                    }).on('click', '.btn-danger', function() {
                    	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').remove();
                    }).on('change', 'input[type=text]', function() { 
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                            $(this).removeClass("has-success");
                            $(this).dequeue();
                        });
                    }).on('click', '.add', function() {
                    	$(this).closest('form').trigger('add');
                    }).form(function(data) {},{
                    	keep_form:1, 
                    	indicator: {
                    	    start: function() {
                        	    $('.wait', '#preadmission_form').removeClass('hidden');
                    	    },
                    	    stop: function() {
                    	    	$('.wait', '#preadmission_form').addClass('hidden');
                    	    }            	
                        }
                    });
                    
                    <?php
                        foreach (explode("\t", \Ficus\Setting::getSetting('preadmission_status')) as $status) { 
                    ?>
                    $('#preadmission_form').trigger('add', '<?php echo $status ?>');
                    <?php } ?>
                });
                //-->
                </script>
            </div>
            <div class="tab-pane fade" id="discharge_tab">
                <!-- Discharge status box -->
                <form action="/api" method="POST" id="discharge_form"> 
                    <input type="hidden" name="func" value="/admin/discharge-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Discharge Status
                            <span class="small">Statuses used when discharging a client from the facility during the outtake process</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                //<!--
                $(document).ready(function() {
                	$('#discharge_form').on('add', function(e, value) {
                        value = (value == undefined ? '' : value);
                        var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="discharge_status[]" placeholder="enter discharge status name" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                        $(template).appendTo($('.box-body', $(this)));
                    }).on('click', '.btn-danger', function() {
                    	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').remove();
                    }).on('change', 'input[type=text]', function() { 
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                            $(this).removeClass("has-success");
                            $(this).dequeue();
                        });
                    }).on('click', '.add', function() {
                    	$(this).closest('form').trigger('add');
                    }).form(function(data) {},{
                    	keep_form:1, 
                    	indicator: {
                    	    start: function() {
                        	    $('.wait', '#discharge_form').removeClass('hidden');
                    	    },
                    	    stop: function() {
                    	    	$('.wait', '#discharge_form').addClass('hidden');
                    	    }            	
                        }
                    });
                    
                    <?php
                        foreach (explode("\t", \Ficus\Setting::getSetting('discharge_status')) as $status) { 
                    ?>
                    $('#discharge_form').trigger('add', '<?php echo $status ?>');
                    <?php } ?>
                });
                //-->
                </script>
            </div>
            <div class="tab-pane fade" id="diet_tab">
            
                <!-- Diets Form -->
                <form action="/api" method="POST" id="diet_form"> 
                    <input type="hidden" name="func" value="/admin/diet-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Diets
                            <span class="small">Specify special dietary needs that can be assigned to a client</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                //<!--
                $(document).ready(function() {
                	$('#diet_form').on('add', function(e, value) {
                        value = (value == undefined ? '' : value);
                        var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="diet_status[]" placeholder="enter diet name and description" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                        $(template).appendTo($('.box-body', $(this)));
                    }).on('click', '.btn-danger', function() {
                    	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').remove();
                    }).on('change', 'input[type=text]', function() { 
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                            $(this).removeClass("has-success");
                            $(this).dequeue();
                        });
                    }).on('click', '.add', function() {
                    	$(this).closest('form').trigger('add');
                    }).form(function(data) {},{
                    	keep_form:1, 
                    	indicator: {
                    	    start: function() {
                        	    $('.wait', '#diet_form').removeClass('hidden');
                    	    },
                    	    stop: function() {
                    	    	$('.wait', '#diet_form').addClass('hidden');
                    	    }            	
                        }
                    });
                    
                    <?php
                        foreach (explode("\t", \Ficus\Setting::getSetting('diet_status')) as $status) { 
                    ?>
                    $('#diet_form').trigger('add', '<?php echo $status ?>');
                    <?php } ?>
                });
                //-->
                </script>
            </div>
            
            <div class="tab-pane fade" id="marital_tab">
                <!-- Marital status box -->
                <form action="/api" method="POST" id="marital_form"> 
                    <input type="hidden" name="func" value="/admin/marital-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Marital Status
                            <span class="small">Used when adding a new client during the intake process</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                //<!--
                $(document).ready(function() {
                	$('#marital_form').on('add', function(e, value) {
                        value = (value == undefined ? '' : value);
                        var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="marital_status[]" placeholder="enter marital status name" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                        $(template).appendTo($('.box-body', $(this)));
                    }).on('click', '.btn-danger', function() {
                    	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').remove();
                    }).on('change', 'input[type=text]', function() { 
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                            $(this).removeClass("has-success");
                            $(this).dequeue();
                        });
                    }).on('click', '.add', function() {
                    	$(this).closest('form').trigger('add');
                    }).form(function(data) {},{
                    	keep_form:1, 
                    	indicator: {
                    	    start: function() {
                        	    $('.wait', '#marital_form').removeClass('hidden');
                    	    },
                    	    stop: function() {
                    	    	$('.wait', '#marital_form').addClass('hidden');
                    	    }            	
                        }
                    });
                    
                    <?php
                        foreach (explode("\t", \Ficus\Setting::getSetting('marital_status')) as $status) { 
                    ?>
                    $('#marital_form').trigger('add', '<?php echo $status ?>');
                    <?php } ?>
                });
                //-->
                </script>
            </div>
            
            <div class="tab-pane fade" id="condition_tab">
                <!-- Patient Property Condition -->
                <form action="/api" method="POST" id="property_condition_form"> 
                    <input type="hidden" name="func" value="/admin/property-condition-status" />
                    <div class="box-header">
                        <h3 class="box-title">
                            Patient Property Condition
                            <span class="small">Define the condition of items taken from a client and stored in during their stay</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                //<!--
                $(document).ready(function() {
                	$('#property_condition_form').on('add', function(e, value) {
                        value = (value == undefined ? '' : value);
                        var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="property_condition_status[]" placeholder="enter property condition name" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                        $(template).appendTo($('.box-body', $(this)));
                    }).on('click', '.btn-danger', function() {
                    	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').remove();
                    }).on('change', 'input[type=text]', function() { 
                    	$(this).closest('form').trigger('submit');
                    	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                            $(this).removeClass("has-success");
                            $(this).dequeue();
                        });
                    }).on('click', '.add', function() {
                    	$(this).closest('form').trigger('add');
                    }).form(function(data) {},{
                    	keep_form:1, 
                    	indicator: {
                    	    start: function() {
                        	    $('.wait', '#property_condition_form').removeClass('hidden');
                    	    },
                    	    stop: function() {
                    	    	$('.wait', '#property_condition_form').addClass('hidden');
                    	    }            	
                        }
                    });
                    
                    <?php
                        foreach (explode("\t", \Ficus\Setting::getSetting('property_condition_status')) as $status) { 
                    ?>
                    $('#property_condition_form').trigger('add', '<?php echo $status ?>');
                    <?php } ?>
                });
                //-->
                </script>
            </div>
            
            <div class="tab-pane fade" id="loc_tab">
                <!-- Levels of Care -->
                <form action="/api" method="POST" id="care_level_form"> 
                    <input type="hidden" name="func" value="/admin/care-level-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Levels of Care
                            <span class="small">Specify the different levels of care that your facilities can provide to patients</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#care_level_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="care_level_status[]" placeholder="enter care level name" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#care_level_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#care_level_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('care_level_status')) as $status) { 
                        ?>
                        $('#care_level_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            
            <div class="tab-pane fade" id="patient_program_tab">
                <!-- Patient Programs -->
                <form action="/api" method="POST" id="patient_program_form"> 
                    <input type="hidden" name="func" value="/admin/patient-program" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Patient Programs
                            <span class="small">Specify the different programs your facilities offer to patients</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#patient_program_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            counter = 0;
                            counter_array = $('input[name=counter]', '#patient_program_form').map(function() {
                                if ($(this).val() > counter) { return $(this).val(); } else { return counter; }
                            });
                            counter = Math.max.apply(Math, counter_array);
                            counter++;
                            var template = $('<div class="form-group"><div class="row"><div class="col-md-4"><input type="hidden" name="counter" value="' + counter + '" /><div class="input-group colorpicker-element"><input type="text" class="form-control patient_program" name="patient_programs[' + counter + '][color]" placeholder="enter color" value="' + (value.color ? value.color : "") + '" /><span class="input-group-addon"><i></i></span></div></div><div class="col-md-8"><div class="input-group"><input type="text" class="form-control" name="patient_programs[' + counter + '][name]" placeholder="enter name" value="' + (value.name ? value.name : "") + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div></div>');
                            template.appendTo($('.box-body', $(this)));
                            $('.colorpicker-element', template).colorpicker();
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#patient_program_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#patient_program_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('patient_programs')) as $status) { 
                        ?>
                        $('#patient_program_form').trigger('add', <?php echo json_encode(json_decode($status)) ?>);
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
        </div>
    </div>
    
    <h2 class="page-header">Calendaring
        <small>These settings are used in the calendar and for scheduling</small>
    </h2>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#calendar_appointment_type_tab" data-toggle="tab">Types of Appointments</a></li>
            <li><a href="#calendar_appointment_status_tab" data-toggle="tab">Appointment Status</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane fade in" id="calendar_appointment_type_tab">
                <!-- Calendar Appointment Types -->
                <form action="/api" method="POST" id="calendar_appointment_type_form"> 
                    <input type="hidden" name="func" value="/admin/calendar-appointment-type" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Types of Calendar Appointments
                            <span class="small">Choose colors and category names for different calendar appointments</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#calendar_appointment_type_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            counter = 0;
                            counter_array = $('input[name=counter]', '#calendar_appointment_type_form').map(function() {
                                if ($(this).val() > counter) { return $(this).val(); } else { return counter; }
                            });
                            counter = Math.max.apply(Math, counter_array);
                            counter++;
                            var template = $('<div class="form-group"><div class="row"><div class="col-md-4"><input type="hidden" name="counter" value="' + counter + '" /><div class="input-group colorpicker-element"><input type="text" class="form-control patient_program" name="calendar_appt_types[' + counter + '][color]" placeholder="enter color" value="' + (value.color ? value.color : "") + '" /><span class="input-group-addon"><i></i></span></div></div><div class="col-md-8"><div class="input-group"><input type="text" class="form-control" name="calendar_appt_types[' + counter + '][name]" placeholder="enter name" value="' + (value.name ? value.name : "") + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div></div>');
                            template.appendTo($('.box-body', $(this)));
                            $('.colorpicker-element', template).colorpicker();
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#calendar_appointment_type_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#calendar_appointment_type_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('calendar_appt_types')) as $status) { 
                        ?>
                        $('#calendar_appointment_type_form').trigger('add', <?php echo json_encode(json_decode($status)) ?>);
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            
            <div class="tab-pane fade" id="calendar_appointment_status_tab">
                <!-- Calendar Appointment Types -->
                <form action="/api" method="POST" id="calendar_appointment_status_form"> 
                    <input type="hidden" name="func" value="/admin/calendar-appointment-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Types of Calendar Appointments
                            <span class="small">Choose colors and category names for different status levels for appointments</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#calendar_appointment_status_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            counter = 0;
                            counter_array = $('input[name=counter]', '#calendar_appointment_status_form').map(function() {
                                if ($(this).val() > counter) { return $(this).val(); } else { return counter; }
                            });
                            counter = Math.max.apply(Math, counter_array);
                            counter++;
                            var template = $('<div class="form-group"><div class="row"><div class="col-md-4"><input type="hidden" name="counter" value="' + counter + '" /><div class="input-group colorpicker-element"><input type="text" class="form-control" name="calendar_appt_status[' + counter + '][color]" placeholder="enter color" value="' + (value.color ? value.color : "") + '" /><span class="input-group-addon"><i></i></span></div></div><div class="col-md-8"><div class="input-group"><input type="text" class="form-control" name="calendar_appt_status[' + counter + '][name]" placeholder="enter name" value="' + (value.name ? value.name : "") + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div></div>');
                            template.appendTo($('.box-body', $(this)));
                            $('.colorpicker-element', template).colorpicker();
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#calendar_appointment_status_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#calendar_appointment_status_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('calendar_appt_status')) as $status) { 
                        ?>
                        $('#calendar_appointment_status_form').trigger('add', <?php echo json_encode(json_decode($status)) ?>);
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
        </div>
    </div>
    
    <h2 class="page-header">Insurance
        <small>These settings are used when recording insurance information for clients</small>
    </h2>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#insurance_type_tab" data-toggle="tab">Insurance Types</a></li>
            <li><a href="#insurance_plan_tab" data-toggle="tab">Insurance Plan Types</a></li>
            <li><a href="#insurance_relationship_tab" data-toggle="tab">Insurance Subscriber Relationships</a></li>
            <li><a href="#ur_frequency_tab" data-toggle="tab">Utilization Review Frequencies</a></li>
            <li><a href="#payment_method_tab" data-toggle="tab">Payment Methods</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane fade in" id="insurance_type_tab">
                <!-- Insurance Types -->
                <form action="/api" method="POST" id="insurance_type_form"> 
                    <input type="hidden" name="func" value="/admin/insurance-type-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Insurance Types
                            <span class="small">Enter the different types of insurance that you accept</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#insurance_type_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="insurance_type[]" placeholder="enter type of insurance" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#insurance_type_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#insurance_type_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('insurance_type')) as $status) { 
                        ?>
                        $('#insurance_type_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            <div class="tab-pane fade" id="insurance_plan_tab">
                <!-- Insurance Plans -->
                <form action="/api" method="POST" id="insurance_plan_form"> 
                    <input type="hidden" name="func" value="/admin/insurance-plan-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Insurance Plan Types
                            <span class="small">Enter the different insurance plans that you accept</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#insurance_plan_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="insurance_plan[]" placeholder="enter insurance plan name" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#insurance_plan_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#insurance_plan_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('insurance_plan')) as $status) { 
                        ?>
                        $('#insurance_plan_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            <div class="tab-pane fade" id="insurance_relationship_tab">
                <!-- Insurance Relationship -->
                <form action="/api" method="POST" id="insurance_relationship_form"> 
                    <input type="hidden" name="func" value="/admin/insurance-relationship-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Insurance Subscriber Relationships
                            <span class="small">Set relationship of client to the primary holder of insurance.  Used during the intake process and utilization review.</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#insurance_relationship_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="insurance_relationship[]" placeholder="enter subscriber relationship" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#insurance_relationship_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#insurance_relationship_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('insurance_relationship')) as $status) { 
                        ?>
                        $('#insurance_relationship_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            <div class="tab-pane fade" id="ur_frequency_tab">
                 <!-- Insurance Relationship -->
                <form action="/api" method="POST" id="ur_frequency_form"> 
                    <input type="hidden" name="func" value="/admin/utilization-review-frequency" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Utilization Review Frequencies
                            <span class="small">Specify the frequencies that a Utilizatio Review should be performed.</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#ur_frequency_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="utilization_review_frequency[]" placeholder="enter frequency" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#ur_frequency_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#ur_frequency_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('utilization_review_frequency')) as $status) { 
                        ?>
                        $('#ur_frequency_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            <div class="tab-pane fade" id="payment_method_tab">
                 <!-- Payment Methods -->
                <form action="/api" method="POST" id="payment_method_form"> 
                    <input type="hidden" name="func" value="/admin/payment-method" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Payment Methods
                            <span class="small">Set how a client will be paying your for their care.</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                        $('.payment_method', '#payment_method_form').selectize();
                        
                    	$('#payment_method_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            counter = 0;
                            counter_array = $('input[name=counter]', '#payment_method_form').map(function() {
                                if ($(this).val() > counter) { return $(this).val(); } else { return counter; }
                            });
                            counter = Math.max.apply(Math, counter_array);
                            counter++;
                            var template = $('<div class="row form-group"><div class="col-md-4"><input type="hidden" name="counter" value="' + counter + '" /><select class="payment_method" name="payment_methods[' + counter + '][type]" placeholder="select type"><option value="1" ' + (value.type && value.type == "1" ? "selected" : "") + '>No Insurance</option><option value="2"' + (value.type && value.type == "2" ? "selected" : "") + '>Government Insurance</option><option value="3"' + (value.type && value.type == "3" ? "selected" : "") + '>Private Insurance</option><option value="4"' + (value.type && value.type == "4" ? "selected" : "") + '>Private Pay</option></select></div><div class="col-md-8"><div class="input-group"><input type="text" class="form-control" name="payment_methods[' + counter + '][name]" placeholder="enter name" value="' + (value.name ? value.name : "") + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>');
                            template.appendTo($('.box-body', $(this)));
                            $('.payment_method', template).selectize();
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$('select', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#payment_method_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#payment_method_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('payment_methods')) as $status) { 
                        ?>
                        $('#payment_method_form').trigger('add', <?php echo json_encode(json_decode($status)) ?>);
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
        </div>
    </div>
    
    
    <h2 class="page-header">Patient Contacts
        <small>These settings are used adding family members, friends, and legal counsel as authorized viewers of client information</small>
    </h2>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#framily_relationship_tab" data-toggle="tab">Relationships</a></li>
            <li><a href="#framily_type_status" data-toggle="tab">Contact Types</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane fade in" id="framily_relationship_tab">
                <!-- Patient Contact Relationship -->
                <form action="/api" method="POST" id="framily_relationship_form"> 
                    <input type="hidden" name="func" value="/admin/framily-relationship-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Relationships
                            <span class="small">Used when adding a approved family or friend to a client that can contact them or view their daily log</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#framily_relationship_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="framily_relationship_status[]" placeholder="enter relationship to patient" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#framily_relationship_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#framily_relationship_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('framily_relationship_status')) as $status) { 
                        ?>
                        $('#framily_relationship_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            <div class="tab-pane fade" id="framily_type_status">
                <form action="/api" method="POST" id="framily_type_form"> 
                    <input type="hidden" name="func" value="/admin/framily_type-status" />
                    <div class="box-header">
                        <h3 class="box-title with-border">
                            Contact Types
                            <span class="small">Defines the type of contact a friend or family member can be associated with.</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#framily_type_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="framily_type_status[]" placeholder="enter type of contact" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#framily_type_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#framily_type_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('framily_type_status')) as $status) { 
                        ?>
                        $('#framily_type_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
        </div>
    </div>
    
    
    <h2 class="page-header">
        Processes, Medication, Treatment Plans, and Diagnoses
        <small>These settings are used when prescribing medications, treatment plans, and other diagnoses in the system</small>
    </h2>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#medication_routes_tab" data-toggle="tab">Medication Routes</a></li>
            <li><a href="#treatment_plans_tab" data-toggle="tab">Treatment Plans</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane fade in" id="medication_routes_tab">
                <form action="/api" method="POST" id="medication_routes_form"> 
                    <input type="hidden" name="func" value="/admin/medication-route-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Medication Routes
                            <span class="small">Specify the different routes medication can be taken.</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#medication_routes_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="medication_routes[]" placeholder="enter medication route" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#medication_routes_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#medication_routes_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('medication_routes')) as $status) { 
                        ?>
                        $('#medication_routes_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
            <div class="tab-pane fade" id="treatment_plans_tab">
                <form action="/api" method="POST" id="treatment_plans_form"> 
                    <input type="hidden" name="func" value="/admin/treatment-plan-status" />
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Treatment Plan
                            <span class="small">Specify the different treatment plans offered at your facilities.</span>
                        </h3>
                        <div class="box-tools pull-right">
                            <div class="btn btn-box-tool wait hidden"><i class="fa fa-spinner fa-spin"></i></div>
                            <div class="btn btn-box-tool add"><i class="fa fa-plus"></i> add</div>
                        </div>
                    </div>
                    <div class="box-body"></div>
                </form>
                <script>
                    //<!--
                    $(document).ready(function() {
                    	$('#treatment_plans_form').on('add', function(e, value) {
                            value = (value == undefined ? '' : value);
                            var template = '<div class="form-group"><div class="input-group"><input type="text" class="form-control" name="treatment_plans[]" placeholder="enter treatment plan" value="' + value + '" /><span class="input-group-addon btn btn-danger"><i class="fa fa-trash"></i></span></div></div>';
                            $(template).appendTo($('.box-body', $(this)));
                        }).on('click', '.btn-danger', function() {
                        	$('input[type=text]', $(this).closest('.form-group')).attr('disabled','disabled');
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').remove();
                        }).on('change', 'input[type=text]', function() { 
                        	$(this).closest('form').trigger('submit');
                        	$(this).closest('.form-group').addClass('has-success').delay(3000).queue(function() {
                                $(this).removeClass("has-success");
                                $(this).dequeue();
                            });
                        }).on('click', '.add', function() {
                        	$(this).closest('form').trigger('add');
                        }).form(function(data) {},{
                        	keep_form:1, 
                        	indicator: {
                        	    start: function() {
                            	    $('.wait', '#treatment_plans_form').removeClass('hidden');
                        	    },
                        	    stop: function() {
                        	    	$('.wait', '#treatment_plans_form').addClass('hidden');
                        	    }            	
                            }
                        });
                        
                        <?php
                            foreach (explode("\t", \Ficus\Setting::getSetting('treatment_plans')) as $status) { 
                        ?>
                        $('#treatment_plans_form').trigger('add', '<?php echo $status ?>');
                        <?php } ?>
                    });
                    //-->
                </script>
            </div>
        </div>
    </div>
</section>
<script>
//<!--
$(document).ready(function() {
   
});
//-->
</script>