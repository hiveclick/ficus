<?php
	/* @var $carrier \Ficus\Carrier */
	$carrier = $this->getContext()->getRequest()->getAttribute("carrier", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Carriers
		<small>Insurance Carriers can be billed for claims.</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Carriers</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> Carriers</h3>
			<div class="box-tools">
				<form id="carrier_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/admin/carrier">
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
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_carrier_modal" href="/admin/carrier-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Carrier</a></div>
			<div class="help-block">This is the master list of Insurance Carriers.  This list will be used by providers to submit claims.</a></div>
			<div id="carrier-grid"></div>
		</div>
		<div class="box-footer">
			<div id="carrier-pager"></div>
		</div>
	</div>
</section>

<!-- edit carrier modal -->
<div class="modal fade" id="edit_carrier_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'code', name:'code', field:'code', def_value: ' ', sortable:true, hidden: true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_carrier_modal" href="/admin/carrier-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_carrier_modal" href="/admin/carrier-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'description', name:'description', field:'description', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_carrier_modal" href="/admin/carrier-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'website', name:'website', field:'website', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="' + value + '" target="_blank">' + value + '</a>';
		}},
		{id:'insurance_type', name:'type', field:'insurance_type', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value == '<?php echo \Ficus\Carrier::INSURANCE_TYPE_INSURANCE ?>') {
				return "Insurance Company";
			} else if (value == '<?php echo \Ficus\Carrier::INSURANCE_TYPE_GOVERNMENT ?>') {
				return "Government Subsidy";
			} else if (value == '<?php echo \Ficus\Carrier::INSURANCE_TYPE_TPA ?>') {
				return "Third Party Authorizer";
			} else if (value == '<?php echo \Ficus\Carrier::INSURANCE_TYPE_CASHPAY ?>') {
			    return "Cash Pay";
			} else {
			    return "Unknown Type (" + value + ")";
			}
		}}
	];

	slick_grid = $('#carrier-grid').slickGrid({
  		pager: $('#carrier-pager'),
  		form: $('#carrier_search_form'),
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
  			$('#carrier_search_form').trigger('submit');
		}
  	});
	
  	$('#carrier_search_form').trigger('submit');

	$('#edit_carrier_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>