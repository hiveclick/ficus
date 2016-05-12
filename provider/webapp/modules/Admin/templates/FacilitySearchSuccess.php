<?php
	/* @var $facility \Ficus\Facility */
	$facility = $this->getContext()->getRequest()->getAttribute("facility", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Facilities
		<small>Manage your available beds and multiple facilities directly from here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Facilities</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> Facilities</h3>
			<div class="box-tools">
				<form id="facility_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/admin/facility">
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
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_facility_modal" href="/admin/facility-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Facility</a></div>
			<div class="help-block">Whether you have a single home or multiple care facilities, you can manage them all here</div>
			<div id="facility-grid"></div>
		</div>
		<div class="box-footer">
			<div id="facility-pager"></div>
		</div>
	</div>
</section>

<!-- edit facility modal -->
<div class="modal fade" id="edit_facility_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="/admin/facility?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'location', name:'location', field:'mailing', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return value.address;
		}},
		{id:'manager', name:'manager', field: 'manager', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return value.name;
		}},
		{id:'landlord', name:'landlord', field:'landlord', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return value.name;
		}}
	];

	slick_grid = $('#facility-grid').slickGrid({
  		pager: $('#facility-pager'),
  		form: $('#facility_search_form'),
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
  			rowHeight: 48
  		}
  	});

	$("#txtSearch").keyup(function(e) {
  		// clear on Esc
  		if (e.which == 27) {
  			this.value = "";
  		} else if (e.which == 13) {
  			$('#facility_search_form').trigger('submit');
		}
  	});
	
  	$('#facility_search_form').trigger('submit');

	$('#edit_facility_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>