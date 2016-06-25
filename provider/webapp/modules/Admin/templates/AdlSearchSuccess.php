<?php
	/* @var $adl \Ficus\Adl */
	$adl = $this->getContext()->getRequest()->getAttribute("adl", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All ADLs
		<small>Activities of Daily Living are used when care givers clock out and provide reports of the care provided</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Adls</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> ADLs</h3>
			<div class="box-tools">
				<form id="adl_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/admin/adl">
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
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_adl_modal" href="/admin/adl-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Adl</a></div>
			<div class="help-block">This is the master list of Activities of Daily Living (ADLs).  This list will be used by care givers when they report their shifts.</a></div>
			<div id="adl-grid"></div>
		</div>
		<div class="box-footer">
			<div id="adl-pager"></div>
		</div>
	</div>
</section>

<!-- edit adl modal -->
<div class="modal fade" id="edit_adl_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'code', name:'code', field:'code', def_value: ' ', sortable:true, hidden: true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_adl_modal" href="/admin/adl-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_adl_modal" href="/admin/adl-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'description', name:'description', field:'description', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_adl_modal" href="/admin/adl-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'is_primary', name:'type', field:'is_primary', def_value: ' ', cssClass: 'text-center', maxWidth:80, width:80, minWidth:80, sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value) {
				return '<div class="text-success">Primary</div>';
			} else {
				return '<div class="text-muted">Intermediate</div>';
			}
		}}
	];

	$('#adl-grid').slickGrid({
  		pager: $('#adl-pager'),
  		form: $('#adl_search_form'),
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
  			$('#adl_search_form').trigger('submit');
		}
  	});
	
  	$('#adl_search_form').trigger('submit');

	$('#edit_adl_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>