<?php
	/* @var $client \Ficus\Client */
	$client = $this->getContext()->getRequest()->getAttribute("client", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Clients
		<small>Clients are serviced by care givers and can also grant access to the Family Portal</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Clients</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> Clients</h3>
			<div class="box-tools">
				<form id="client_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/client/client">
					<input type="hidden" name="format" value="json" />
					<input type="hidden" id="page" name="page" value="1" />
					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
					<input type="hidden" id="sort" name="sort" value="name" />
					<input type="hidden" id="sord" name="sord" value="asc" />
					<div class="has-feedback">
						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
						<span class="fa fa-search form-control-feedback"></span>
					</div>
				</form>
			</div>
		</div>
		<div class="box-body">
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_client_modal" href="/client/client-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Client</a></div>
			<div class="help-block">The clients have policies that have been claimed.  Clients are serviced by care givers and can also grant access to the Family Portal</div>
			<div id="client-grid"></div>
		</div>
		<div class="box-footer">
			<div id="client-pager"></div>
		</div>
	</div>
</section>

<!-- edit client modal -->
<div class="modal fade" id="edit_client_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
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
		{id:'name', name:'name', field:'lastname', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="/client/client?_id=' + dataContext._id + '">' + dataContext.firstname + ' ' + dataContext.lastname + '</a>';
		}},
		{id:'policy_number', name:'policy #', field:'policy_number', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="/client/client?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'status', name:'status', field:'status', def_value: ' ', cssClass: 'text-center', maxWidth:68, width:68, minWidth:68, sortable:false, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value) {
				return '<div class="text-success">Active</div>';
			} else {
				return '<div class="text-muted">Inactive</div>';
			}
		}}
	];

	slick_grid = $('#client-grid').slickGrid({
  		pager: $('#client-pager'),
  		form: $('#client_search_form'),
  		columns: columns,
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

	$("#txtSearch").keyup(function(e) {
  		// clear on Esc
  		if (e.which == 27) {
  			this.value = "";
  		} else if (e.which == 13) {
  			$('#client_search_form').trigger('submit');
		}
  	});
	
  	$('#client_search_form').trigger('submit');

	$('#edit_client_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>