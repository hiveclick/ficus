<?php
	/* @var $client \Ficus\Client */
	$client = $this->getContext()->getRequest()->getAttribute("client", array());
	$shifts = $this->getContext()->getRequest()->getAttribute("shifts", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage Client
		<small>Clients are serviced by care givers and can also grant access to the Family Portal</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="/client/client-search">Clients</a></li>
		<li class="active"><?php echo $client->getName() ?></li>
	</ol>
</div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a href="/client/client-image-wizard?_id=<?php echo $client->getId() ?>" data-toggle="modal" data-target="#edit_client_image_modal"><img class="profile-user-img img-responsive img-circle" src="<?php echo $client->getProfileImageUrl() != '' ? $client->getProfileImageUrl() : '/img/default-profile.png' ?>" alt="User profile picture" id="client_profile_image"></a>
                    <h3 class="profile-username text-center"><?php echo $client->getName() ?></h3>
                    <p class="text-muted text-center"></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Policy #</b> <a class="pull-right"><?php echo $client->getPolicyNumber() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a href="tel:<?php echo $client->getMailing()->getPhone() ?>" class="pull-right"><?php echo $client->getMailing()->getPhone() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $client->getMailing()->getEmail() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Provider</b> <a class="pull-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>Care Giver</b> <a class="pull-right"></a>
                        </li>
                    </ul>
                    <a href="/client/client-wizard?_id=<?php echo $client->getId() ?>" data-toggle="modal" data-target="#edit_client_modal" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About <?php echo $client->getFirstname() ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-tree margin-r-5"></i>  Past times</strong>
                    <p class="text-muted">
                        <?php echo $client->getExtra()->getHobbies() ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted">
                        <?php echo $client->getMailing()->getAddress() ?><br />
                        <?php echo $client->getMailing()->getCity() ?>, <?php echo $client->getMailing()->getState() ?> <?php echo $client->getMailing()->getPostalCode() ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-calendar margin-r-5"></i> Important Dates</strong>
                    <p class="text-muted">
                        <?php echo date('m/d/Y', $client->getExtra()->getWeddingAnniversary()->sec) ?> - Wedding Anniversary
                    </p>
                    <hr>
                    <strong><i class="fa fa-user-md margin-r-5"></i> Diagnosis</strong>
                    <p class="text-muted">
                        <?php echo $client->getClinical()->getDiagnosis() ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    <p class="text-muted">
                        <?php echo $client->getClinical()->getCareNotes() ?>
                    </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li><a href="#policy" data-toggle="tab">Policy</a></li>
                    <li><a href="#emergency" data-toggle="tab">Emergency Contacts</a></li>
                    <li><a href="#framily" data-toggle="tab">Family Portal</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="activity">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <?php
                                $date = ''; 
                                foreach ($shifts as $shift) {
                            ?>
                                <?php if ($date != date("m/d/Y", $shift->getClockInTime()->sec)) { ?>
                                    <?php $date = date("m/d/Y", $shift->getClockInTime()->sec) ?>
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-aqua">
                                            <?php echo date("d, M Y", $shift->getClockInTime()->sec) ?>
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                <?php } ?>
                                <!-- timeline item -->
                                <?php
                                    // Only show the not closed warning if the shift is not closed and it has been longer than 1 day
                                    if (!$shift->getIsClosed() && (strtotime('now') - $shift->getClockInTime()->sec) > 86400) { 
                                ?>
                                    <li>
                                        <i class="fa fa-exclamation bg-red"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('g:i a', $shift->getClockInTime()->sec) ?></span>
                                            <h3 class="timeline-header"><a href="/provider/care-giver?_id=<?php echo $shift->getCareGiver()->getId() ?>"><?php echo $shift->getCareGiver()->getName() ?></a> did not clock out of their shift with <a href="/client/client?_id=<?php echo $shift->getClient()->getId() ?>"><?php echo $shift->getClient()->getName() ?></a></h3>
                                        </div>
                                    </li>
                                <?php } ?>
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('g:i a', $shift->getClockInTime()->sec) ?> - <?php echo date('g:i a', $shift->getClockOutTime()->sec) ?></span>
                                        <h3 class="timeline-header"><a href="/provider/care-giver?_id=<?php echo $shift->getCareGiver()->getId() ?>"><?php echo $shift->getCareGiver()->getName() ?></a> Clocked In for <a href="/client/client?_id=<?php echo $shift->getClient()->getId() ?>"><?php echo $shift->getClient()->getName() ?></a></h3>
                                        <div class="timeline-body">
                                            <?php echo $shift->getNotes() ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <?php foreach ($shift->getAdls() as $adl) { ?>
                                                <a class="btn btn-primary btn-flat btn-xs"><?php echo $adl->getName() ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </li>
                                 <!-- END timeline item -->
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="active tab-pane fade in" id="timeline">
                    
                    </div>
                    <div class="tab-pane fade" id="policy">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>$<?php echo number_format($client->getPolicy()->getMda(), 2, null, ',') ?></h3>
                                        <p>Maximum amount that can be billed each day in services</p>
                                        <div class="icon"><i class="fa fa-user-md"></i></div>
                                    </div>
                                    <div class="small-box-footer">Maximum Daily Benefit</div>
                                </div><!-- /.small-box -->
                            </div><!-- /.col -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3><?php echo $client->getPolicy()->getMultiplier() ?>x</h3>
                                        <p>Maximum number of days you can be on claim</p>
                                        <div class="icon"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <div class="small-box-footer">Multiplier</div>
                                </div><!-- /.small-box -->
                            </div><!-- /.col -->
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>$<?php echo number_format($client->getPolicy()->getBenefit(), 2, null, ',') ?></h3>
                                        <p>Maximum amount the insurer will pay out in services rendered</p>
                                        <div class="icon"><i class="fa fa-usd"></i></div>
                                    </div>
                                    <div class="small-box-footer">Maximum Benefit Amount</div>
                                </div><!-- /.small-box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <hr />
                        <h3>Insurance</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><b><?php echo $client->getName() ?></b></p>
                                <p><?php echo $client->getMailing()->getAddress() ?></p>
                                <p><?php echo $client->getMailing()->getCity() ?>, <?php echo $client->getMailing()->getState() ?>, <?php echo $client->getMailing()->getPostalCode() ?></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Insurer: <?php echo $client->getInsurer() ?></p>
                                <p>Policy #: <?php echo $client->getPolicyNumber() ?></p>
                                <p>TPA Client #: <?php echo $client->getTpaClientId() ?></p>
                            </div>
                        </div>
                        <hr />
                        <h3>Plan of Care</h3>
                    </div>
                    <div class="tab-pane fade" id="emergency">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-7 col-md-8 col-lg-9">
        							<form id="emergency_contact_search_form" method="GET" action="/api">
                    					<input type="hidden" name="func" value="/client/emergency-contact">
                    					<input type="hidden" name="format" value="json" />
                    					<input type="hidden" id="page" name="page" value="1" />
                    					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
                    					<input type="hidden" id="sort" name="sort" value="name" />
                    					<input type="hidden" id="sord" name="sord" value="asc" />
                    					<input type="hidden" id="client_id_array" name="client_id_array[]" value="<?php echo $client->getId() ?>" />
                    					<div class="has-feedback">
                    						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
                    						<span class="fa fa-search form-control-feedback"></span>
                    					</div>
                    				</form>
                				</div>
                				<div class="col-sm-5 col-md-4 col-lg-3 text-right">
                                    <a href="/client/emergency-contact-wizard?clients=<?php echo $client->getId() ?>" data-toggle="modal" data-target="#edit_emergency_contact_modal" class="btn btn-sm btn-success">Add Emergency Contact</a>
                                </div>
                            </div>
						</div>
                        <div class="box-body">
							<div class="help-block">These are the emergency contacts assigned to this client.  Emergency contacts should be contacted immediately.  Other family members and friends can be added in the family portal.</div>
                            <div id="emergency-grid"></div>
						</div>
						<div class="box-footer">
							<div id="emergency-pager"></div>
						</div>
                    </div>
                    <div class="tab-pane fade" id="framily">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-7 col-md-8 col-lg-9">
        							<form id="framily_search_form" method="GET" action="/api">
                    					<input type="hidden" name="func" value="/client/framily">
                    					<input type="hidden" name="format" value="json" />
                    					<input type="hidden" id="page" name="page" value="1" />
                    					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
                    					<input type="hidden" id="sort" name="sort" value="name" />
                    					<input type="hidden" id="sord" name="sord" value="asc" />
                    					<input type="hidden" id="client_id_array" name="client_id_array[]" value="<?php echo $client->getId() ?>" />
                    					<div class="has-feedback">
                    						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
                    						<span class="fa fa-search form-control-feedback"></span>
                    					</div>
                    				</form>
                				</div>
                				<div class="col-sm-5 col-md-4 col-lg-3 text-right">
                                    <a href="/client/framily-wizard?clients=<?php echo $client->getId() ?>" data-toggle="modal" data-target="#edit_framily_modal" class="btn btn-sm btn-success">Add Friend or Family Member</a>
                                </div>
                            </div>
						</div>
                        <div class="box-body">
							<div class="help-block">These are the friends and family members that have access to the family portal.  Each friend or family member will need authorization granted by the patient to view the information.</div>
                            <div id="framily-grid"></div>
						</div>
						<div class="box-footer">
							<div id="framily-pager"></div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- edit client modal -->
<div class="modal fade" id="edit_client_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit client image modal -->
<div class="modal fade" id="edit_client_image_modal"><div class="modal-dialog"><div class="modal-content"></div></div></div>
<!-- edit client modal -->
<div class="modal fade" id="edit_emergency_contact_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit framily modal -->
<div class="modal fade" id="edit_framily_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		if ($(e.target).attr('href') == '#framily') {
			loadFramily();
		} else if ($(e.target).attr('href') == '#emergency') {
			loadEmergency();
		}
	});
});

function loadEmergency() {
	var emergency_columns = [
  		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
  			return value;
  		}},
  		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_emergency_contact_modal" href="/client/emergency-contact-wizard?_id=' + dataContext._id + '">' + dataContext.name + '</a>';
  		}},
  		{id:'email', name:'email', field:'mailing.email', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_emergency_contact_modal" href="/client/emergency-contact-wizard?_id=' + dataContext._id + '">' + dataContext.mailing.email + '</a>';
  		}},
  		{id:'relationship', name:'relationship', field:'relationship', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_emergency_contact_modal" href="/client/emergency-contact-wizard?_id=' + dataContext._id + '">' + value + '</a>';
  		}}
  	];

	emergency_slick_grid = $('#emergency-grid').slickGrid({
		pager: $('#emergency-pager'),
		form: $('#emergency_contact_search_form'),
		columns: framily_columns,
		useFilter: false,
		cookie: '<?php echo $_SERVER['PHP_SELF'] ?>',
		pagingOptions: {
			pageSize: <?php echo \Ficus\Setting::getSetting('items_per_page', 25) ?>,
			pageNum: 1
		},
		slickOptions: {
			defaultColumnWidth: 150,
			forceFitColumns: true,
			enableCellNavigation: false,
			width: 800,
			rowHeight: 48
		}
	});

    $('#emergency_contact_search_form').trigger('submit');
}

function loadFramily() {
	var framily_columns = [
  		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
  			return value;
  		}},
  		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_framily_modal" href="/client/framily-wizard?_id=' + dataContext._id + '">' + dataContext.name + '</a>';
  		}},
  		{id:'email', name:'email', field:'mailing.email', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_framily_modal" href="/client/framily-wizard?_id=' + dataContext._id + '">' + dataContext.mailing.email + '</a>';
  		}},
  		{id:'relationship', name:'relationship', field:'relationship', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_framily_modal" href="/client/framily-wizard?_id=' + dataContext._id + '">' + value + '</a>';
  		}}
  	];

    framily_slick_grid = $('#framily-grid').slickGrid({
		pager: $('#framily-pager'),
		form: $('#framily_search_form'),
		columns: framily_columns,
		useFilter: false,
		cookie: '<?php echo $_SERVER['PHP_SELF'] ?>',
		pagingOptions: {
			pageSize: <?php echo \Ficus\Setting::getSetting('items_per_page', 25) ?>,
			pageNum: 1
		},
		slickOptions: {
			defaultColumnWidth: 150,
			forceFitColumns: true,
			enableCellNavigation: false,
			width: 800,
			rowHeight: 48
		}
	});

    $('#framily_search_form').trigger('submit');
}
//-->
</script>