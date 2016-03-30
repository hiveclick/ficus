<?php 
    $geo_array = @geoip_record_by_name($_SERVER['REMOTE_ADDR']);
    $shift = $this->getContext()->getRequest()->getAttribute('shift', new \Ficus\Shift());
	$near_clients = $this->getContext()->getRequest()->getAttribute('near_clients', array());
	$clients = $this->getContext()->getRequest()->getAttribute('clients', array());
	$adls = $this->getContext()->getRequest()->getAttribute('adls', array());
?>
<div class="fs_split">
    <div class="fs_split_pane fs_split_pane_left">
        <div class="container-fluid">
            <div id="ficus_logo"></div>
            <h2>Choose your action</h2>
            <br />
            <?php foreach ($this->getErrors()->getErrors() as $error) { ?>
    			<div class="alert alert-danger">
    				<a class="close" data-dismiss="alert" href="#">x</a><?php echo $error->getMessage() ?>
    			</div>
    		<?php } ?>
    		<div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="<?php echo !\MongoId::isValid($shift->getId()) ? 'active' : '' ?>"><a href="#clockin" aria-controls="clock-in" role="tab" data-toggle="tab">Clock In</a></li>
                    <li role="presentation" class="<?php echo \MongoId::isValid($shift->getId()) ? 'active' : '' ?>"><a href="#clockout" aria-controls="clock-out" role="tab" data-toggle="tab">Clock Out</a></li>
                </ul>
                <br />
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade <?php echo !\MongoId::isValid($shift->getId()) ? 'in active' : '' ?>" id="clockin">
                        <form id="clockin_form" name="clockin_form" method="POST" action="/clock-in">
                    		<input type="hidden" name="forward" value="/<?php echo isset($_REQUEST['module']) ? strtolower($_REQUEST['module']) : 'index' ?><?php echo isset($_REQUEST['action']) ? ('/' . strtolower($_REQUEST['action'])) : '' ?>" />
                    		<input type="hidden" name="clock_in_location[latitude]" id="latitude" value="<?php echo $geo_array['latitude'] ?>" />
                    		<input type="hidden" name="clock_in_location[longitude]" id="longitude" value="<?php echo $geo_array['longitude'] ?>" />
                    		<input type="hidden" name="clock_in_location[accuracy]" id="accuracy" value="50" />
                            <div class="form-group">
                    			<div class="form-label" for="client">Select a <b>Client #</b></div>
                    			<select name="client">
                    			</select>
                    		</div>
                    		<div class="form-group">
                    			<div class="text-center">
                    				<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Clock In for your Shift" />
                    			</div>
                    		</div>
                		</form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade <?php echo \MongoId::isValid($shift->getId()) ? 'in active' : '' ?>" id="clockout">
                        <form id="clockout_form" name="clockout_form" method="POST" action="/clock-out">
                    		<input type="hidden" name="forward" value="/<?php echo isset($_REQUEST['module']) ? strtolower($_REQUEST['module']) : 'index' ?><?php echo isset($_REQUEST['action']) ? ('/' . strtolower($_REQUEST['action'])) : '' ?>" />
                    		<input type="hidden" name="clock_out_location[latitude]" id="latitude" value="<?php echo $geo_array['latitude'] ?>" />
                    		<input type="hidden" name="clock_out_location[longitude]" id="longitude" value="<?php echo $geo_array['longitude'] ?>" />
                    		<input type="hidden" name="clock_out_location[accuracy]" id="accuracy" value="50" />
                    		<input type="hidden" name="_id" value="<?php echo $shift->getId() ?>" />
                            <div class="form-group">
                    			<div class="form-label" for="client">Select a <b>Client #</b></div>
                    			<select name="client">
                                    
                    			</select>
                    		</div>
                            <div class="form-group">
                                <div class="form-label" for="adls">Select <b>ADLs</b></div>
                                <select name="adls[]" id="adls" multiple>
                                    <optgroup label="Primary ADLs">
                                        <?php 
                                            /* @var $adl \Ficus\Adl */
                                            foreach ($adls as $adl) {
                                        ?>
                                            <?php if ($adl->getIsPrimary()) { ?>
                                                <option value="<?php echo $adl->getId() ?>"><?php echo $adl->getName() ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </optgroup>
                                    <optgroup label="Intermediate ADLs">
                                        <?php 
                                            /* @var $adl \Ficus\Adl */
                                            foreach ($adls as $adl) {
                                        ?>
                                            <?php if (!$adl->getIsPrimary()) { ?>
                                                <option value="<?php echo $adl->getId() ?>"><?php echo $adl->getName() ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </optgroup>
                    			</select>
                            </div>
                            <div class="form-group">
                    			<div class="form-label" for="notes">Enter any <b>additional notes</b></div>
                    			<textarea name="notes" class="form-control" rows="4" placeholder="Record any additional notes or observations here..."></textarea>
                    		</div>
                            <div class="form-group">
                    			<div class="text-center">
                    				<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Clock Out of your Shift" />
                    			</div>
                    		</div>
                        </form>
                    </div>
                </div>
            </div>
    	</div>
    </div>
    <div class="fs_split_pane fs_split_pane_right">
        <div class="container-fluid">
			<div class="fs_split_header"></div>
            <div class="fs_split_body" style="padding:240px 25px;">
                <img src="/img/login-step.png" class="img-responsive" />
                <h1>Use Ficus for better claim and time management</h1>
                <div class="help-block">Using Ficus, you can easily manage your shifts and claims whether you have one client or several facilities across the nation.</div>
            </div>
			<div class="fs_split_footer" style="padding:25px 25px;">By proceeding to log into your account and use Ficus, you are agreeing to our Terms of Service and Privacy Policy. If you do not agree, you cannot use Ficus.</div>
		</div>
    </div>
</div>
<script>
//<!--
$(document).ready(function() {
    navigator.geolocation.getCurrentPosition(
        function(geo) {            
            $('#latitude', '#clockout_form').val(geo.coords.latitude);
            $('#longitude', '#clockout_form').val(geo.coords.longitude);
            $('#accuracy', '#clockout_form').val(geo.coords.accuracy);
            $('#latitude', '#clockin_form').val(geo.coords.latitude);
            $('#longitude', '#clockin_form').val(geo.coords.longitude);
            $('#accuracy', '#clockin_form').val(geo.coords.accuracy);

            $.each($('select[name=client]','#clockout_form').selectize()[0].selectize.options, function(i, obj) {
                // Calculate the distance and move the option group if necessary;
            	if (obj.location) {
            		var distance = calculateDistance(obj.location.latitude, obj.location.longitude, geo.coords.latitude, geo.coords.longitude);
            		if (distance > 1) {
                        obj.optgroup = 'all';
                        obj.location.distance = distance;
                    } else {
                    	obj.optgroup = 'near';
                    	obj.location.distance = distance;
                    }
            	} else {
            		obj.optgroup = 'all';
            	}
            });
            $.each($('select[name=client]','#clockin_form').selectize()[0].selectize.options, function(i, obj) {
                // Calculate the distance and move the option group if necessary;
                
                if (obj.location) {
                	var distance = calculateDistance(obj.location.latitude, obj.location.longitude, geo.coords.latitude, geo.coords.longitude);
                    if (distance > 1) {
                        obj.optgroup = 'all';
                        obj.location.distance = distance;
                    } else {
                    	obj.optgroup = 'near';
                    	obj.location.distance = distance;
                    }
                } else {
                	obj.optgroup = 'all';
                }
            });
            
        },
        function(err) {
            
        }
    );

    $('select[name=client]','#clockin_form').selectize({
    	valueField: "_id",
		optgroups: [
			{ label: 'Clients near me', value: 'near'},
			{ label: 'All my clients', value: 'all'}
		],
		items: [
            <?php foreach ($clients as $client) { ?>
            <?php if ($shift->getClient()->getId() == $client->getId()) { ?>
            "<?php echo $client->getId() ?>"
            <?php } ?>
            <?php } ?>
		],
        options: [
            <?php foreach ($clients as $client) { ?>
            <?php echo json_encode($client->toArray()) ?>,
            <?php } ?>
        ],
        lockOptgroupOrder: true,
        render: {
			item: function(item, escape) {
				return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + '</div>';
			},
			option: function(item, escape) {
				if (item.optgroup == 'near') {
					if (parseInt(item.location.distance * 5280) >= 5280) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about a mile away)</span></div>';
					} else if (parseInt(item.location.distance * 5280) >= 3200 && parseInt(item.location.distance * 5280) < 5280) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(<1 mile away)</span></div>';
					} else if (parseInt(item.location.distance * 5280) >= 1500 && parseInt(item.location.distance * 5280) < 3200) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about 1/2 mile away)</span></div>';
					} else if (parseInt(item.location.distance * 5280) > 600 && parseInt(item.location.distance * 5280) < 1500) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about 1/4 mile away)</span></div>';
					} else {
					    return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about ' + parseInt(item.location.distance * 1760) + ' yards away)</span></div>';
					}
				} else {
					return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about ' + parseInt(item.location.distance) + ' miles away)</span></div>';
				}
			}
		}
    });
    $('select[name=client]','#clockout_form').selectize({
    	valueField: "_id",
		optgroups: [
			{ label: 'Clients near me', value: 'near'},
			{ label: 'All my clients', value: 'all'}
		],
		items: [
            <?php foreach ($clients as $client) { ?>
            <?php if ($shift->getClient()->getId() == $client->getId()) { ?>
            "<?php echo $client->getId() ?>"
            <?php } ?>
            <?php } ?>
		],
        options: [
            <?php foreach ($clients as $client) { ?>
            <?php echo json_encode($client->toArray()) ?>,
            <?php } ?>
        ],
        lockOptgroupOrder: true,
        render: {
			item: function(item, escape) {
				return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + '</div>';
			},
			option: function(item, escape) {
				if (item.optgroup == 'near') {
					if (parseInt(item.location.distance * 5280) >= 5280) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about a mile away)</span></div>';
					} else if (parseInt(item.location.distance * 5280) >= 3200 && parseInt(item.location.distance * 5280) < 5280) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(<1 mile away)</span></div>';
					} else if (parseInt(item.location.distance * 5280) >= 1500 && parseInt(item.location.distance * 5280) < 3200) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about 1/2 mile away)</span></div>';
					} else if (parseInt(item.location.distance * 5280) > 600 && parseInt(item.location.distance * 5280) < 1500) {
						return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about 1/4 mile away)</span></div>';
					} else {
					    return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about ' + parseInt(item.location.distance * 1760) + ' yards away)</span></div>';
					}
				} else {
					return '<div>' + escape(item.lastname) + ', ' + escape(item.firstname) + ' <span class="small text-muted">(about ' + parseInt(item.location.distance) + ' miles away)</span></div>';
				}
			}
		}
    });
    $('#adls','#clockout_form').selectize();
});

function calculateDistance(lat1, lon1, lat2, lon2) {
	
	var R = 6371; // km 
	//has a problem with the .toRad() method below.
	var x1 = lat2-lat1;
	var dLat = (x1 * Math.PI / 180);  
	var x2 = lon2-lon1;
	var dLon = (x2 * Math.PI / 180);  
	var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
	                Math.cos((lat1 * Math.PI / 180)) * Math.cos((lat2 * Math.PI / 180)) * 
	                Math.sin(dLon/2) * Math.sin(dLon/2);  
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	var d = R * c; 

	return d * 0.6;
}
//-->
</script>