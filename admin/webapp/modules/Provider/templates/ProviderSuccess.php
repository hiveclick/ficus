<?php
	/* @var $provider \Ficus\Provider */
	$provider = $this->getContext()->getRequest()->getAttribute("provider", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage Provider
		<small>Providers have access to log into the system and manage care givers</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="/provider/provider-search">Providers</a></li>
		<li class="active"><?php echo $provider->getName() ?></li>
	</ol>
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a href="/provider/provider-image-wizard?_id=<?php echo $provider->getId() ?>" data-toggle="modal" data-target="#edit_provider_img_modal"><img class="profile-user-img img-responsive img-circle" src="<?php echo $provider->getProfileImageUrl() != '' ? $provider->getProfileImageUrl() : '/img/default-profile.png' ?>" id="provider_profile_image" alt="Provider profile picture"></a>
                    <h3 class="profile-username text-center"><?php echo $provider->getName() ?></h3>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Care Givers</b> <a class="pull-right">5</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a href="tel:<?php echo $provider->getMailing()->getPhone() ?>" class="pull-right"><?php echo $provider->getMailing()->getPhone() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $provider->getMailing()->getEmail() ?></a>
                        </li>
                    </ul>
                    <a href="/provider/provider-wizard?_id=<?php echo $provider->getId() ?>" data-toggle="modal" data-target="#edit_provider_modal" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Company Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted"><?php echo $provider->getMailing()->getCity() ?>, <?php echo $provider->getMailing()->getState() ?></p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#clients" data-toggle="tab">Clients</a></li>
                    <li><a href="#caregivers" data-toggle="tab">Care Givers</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="activity">
                        
                    </div>
                    <div class="tab-pane fade" id="clients">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-7 col-md-8 col-lg-9">
        							<form id="client_search_form" method="GET" action="/api">
                    					<input type="hidden" name="func" value="/client/client">
                    					<input type="hidden" name="format" value="json" />
                    					<input type="hidden" id="page" name="page" value="1" />
                    					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
                    					<input type="hidden" id="sort" name="sort" value="name" />
                    					<input type="hidden" id="sord" name="sord" value="asc" />
                    					<input type="hidden" id="provider_id_array" name="provider_id_array[]" value="<?php echo $provider->getId() ?>" />
                    					<div class="has-feedback">
                    						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
                    						<span class="fa fa-search form-control-feedback"></span>
                    					</div>
                    				</form>
                				</div>
                				<div class="col-sm-5 col-md-4 col-lg-3 text-right">
                                    <a href="/client/client-wizard?provider=<?php echo $provider->getId() ?>" data-toggle="modal" data-target="#edit_client_modal" class="btn btn-sm btn-success">Add Client</a>
                                </div>
                            </div>
						</div>
                        <div class="box-body">
							<div class="help-block">These are the clients associated with this provider.  The provider has access to accept new clients and share them with care givers.</div>
                            <div id="client-grid"></div>
						</div>
						<div class="box-footer">
							<div id="client-pager"></div>
						</div>
                    </div>
                    <div class="tab-pane fade" id="caregivers">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-7 col-md-8 col-lg-9">
        							<form id="care_giver_search_form" method="GET" action="/api">
                    					<input type="hidden" name="func" value="/provider/care-giver">
                    					<input type="hidden" name="format" value="json" />
                    					<input type="hidden" id="page" name="page" value="1" />
                    					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
                    					<input type="hidden" id="sort" name="sort" value="name" />
                    					<input type="hidden" id="sord" name="sord" value="asc" />
                    					<input type="hidden" id="provider_id_array" name="provider_id_array[]" value="<?php echo $provider->getId() ?>" />
                    					<div class="has-feedback">
                    						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
                    						<span class="fa fa-search form-control-feedback"></span>
                    					</div>
                    				</form>
                				</div>
                				<div class="col-sm-5 col-md-4 col-lg-3 text-right">
                                    <a href="/provider/care-giver-wizard?provider=<?php echo $provider->getId() ?>" data-toggle="modal" data-target="#edit_care_giver_modal" class="btn btn-sm btn-success">Add Care Giver</a>
                                </div>
                            </div>
						</div>
                        <div class="box-body">
							<div class="help-block">These are the care givers associated with this provider.  The provider has access to create new care givers and grant them access to the Care Giver Portal.</div>
                            <div id="care_giver-grid"></div>
						</div>
						<div class="box-footer">
							<div id="care_giver-pager"></div>
						</div>
                    </div>
                    <div class="tab-pane fade" id="settings">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- edit provider modal -->
<div class="modal fade" id="edit_provider_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit provider image modal -->
<div class="modal fade" id="edit_provider_img_modal"><div class="modal-dialog"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		if ($(e.target).attr('href') == '#caregivers') {
			loadCareGivers();
		} else if ($(e.target).attr('href') == '#clients') {
			loadClients();
		}
	});
	
	$('#edit_provider_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});

function loadCareGivers() {
	var care_giver_columns = [
  		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
  			return value;
  		}},
  		{id:'profile_image_url', name:'', field:'profile_image_url', def_value: ' ', cssClass: 'text-center', maxWidth:68, width:68, minWidth:68, sortable:false, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value == '' || value == null) {
				return '<img class="profile-user-img img-responsive img-circle" src="/img/default-profile.png" alt="User profile picture">';
			} else {
				return '<img class="profile-user-img img-responsive img-circle" src="' + value + '" alt="User profile picture">';
			}
		}},
  		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a href="/provider/care-giver?_id=' + dataContext._id + '">' + dataContext.name + '</a>';
  		}},
  		{id:'email', name:'email', field:'mailing.email', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a href="/provider/care-giver?_id=' + dataContext._id + '">' + dataContext.mailing.email + '</a>';
  		}},
  		{id:'username', name:'username', field:'username', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a href="/provider/care-giver?_id=' + dataContext._id + '">' + value + '</a>';
  		}}
  	];

	care_giver_slick_grid = $('#care_giver-grid').slickGrid({
		pager: $('#care_giver-pager'),
		form: $('#care_giver_search_form'),
		columns: care_giver_columns,
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
			rowHeight: 68
		}
	});

    $('#care_giver_search_form').trigger('submit');
}

function loadClients() {
	var client_columns = [
  		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
  			return value;
  		}},
  		{id:'profile_image_url', name:'', field:'profile_image_url', def_value: ' ', cssClass: 'text-center', maxWidth:68, width:68, minWidth:68, sortable:false, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value == '' || value == null) {
				return '<img class="profile-user-img img-responsive img-circle" src="/img/default-profile.png" alt="User profile picture">';
			} else {
				return '<img class="profile-user-img img-responsive img-circle" src="' + value + '" alt="User profile picture">';
			}
		}},
  		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a href="/client/client?_id=' + dataContext._id + '">' + dataContext.firstname + ' ' + dataContext.lastname + '</a>';
  		}},
  		{id:'email', name:'email', field:'mailing.email', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a href="/client/client?_id=' + dataContext._id + '">' + dataContext.mailing.email + '</a>';
  		}},
  		{id:'policy_number', name:'policy #', field:'policy_number', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a href="/client/client?_id=' + dataContext._id + '">' + value + '</a>';
  		}}
  	];

	client_slick_grid = $('#client-grid').slickGrid({
		pager: $('#client-pager'),
		form: $('#client_search_form'),
		columns: client_columns,
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
			rowHeight: 68
		}
	});

    $('#client_search_form').trigger('submit');
}
//-->
</script>