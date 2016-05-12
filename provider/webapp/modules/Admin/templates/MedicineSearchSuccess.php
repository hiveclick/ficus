<?php
	/* @var $medicine \Ficus\Medicine */
	$medicine = $this->getContext()->getRequest()->getAttribute("medicine", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Medications
		<small>Medications need to be closely monitored and controlled.  Manage your stock of medications here</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Medications</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> Medications</h3>
			<div class="box-tools">
				<form id="medicine_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/provider/medicine">
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
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_medicine_modal" href="/admin/medicine-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Medication</a></div>
			<div class="help-block">This is your own medication cabinet.  Control and manage the various medications that you have in stock.</div>
			<div id="medicine-grid"></div>
		</div>
		<div class="box-footer">
			<div id="medicine-pager"></div>
		</div>
	</div>
</section>

<!-- edit medicine modal -->
<div class="modal fade" id="edit_medicine_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_medicine_modal" href="/admin/medicine-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'quantity', name:'quantity', field:'quantity', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_medicine_modal" href="/admin/medicine-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'dose', name:'dose', field:'dose', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<b>' + value + 'mg</b> <i class="text-muted">up to</i> <b>' + dataContext.frequency + 'x/day</b>';
		}},
		{id:'max_dosage', name:'max_dosage', field: 'max_dosage', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return value + 'mg';
		}},
		{id:'date_purchased', name:'purchased', field:'date_purchased', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return moment.unix(value.sec).calendar();
		}}
	];

	slick_grid = $('#medicine-grid').slickGrid({
  		pager: $('#medicine-pager'),
  		form: $('#medicine_search_form'),
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
  			$('#medicine_search_form').trigger('submit');
		}
  	});
	
  	$('#medicine_search_form').trigger('submit');

	$('#edit_medicine_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>