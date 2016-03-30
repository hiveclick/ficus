<?php
	/* @var $provider \Ficus\Provider */
	$provider = $this->getContext()->getRequest()->getAttribute("provider", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Providers
		<small>Providers have access to log into the system and make changes</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Providers</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> Providers</h3>
			<div class="box-tools">
				<form id="provider_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/provider/provider">
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
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_provider_modal" href="/provider/provider-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Provider</a></div>
			<div class="help-block">The providers below have access to the provider portal.  They can add care givers and approve time cards.</div>
			<div id="provider-grid"></div>
		</div>
		<div class="box-footer">
			<div id="provider-pager"></div>
		</div>
	</div>
</section>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="/provider/provider?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'email', name:'email', field:'mailing.email', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="/provider/provider?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'status', name:'status', field:'status', def_value: ' ', cssClass: 'text-center', maxWidth:68, width:68, minWidth:68, sortable:false, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value) {
				return '<div class="text-success">Active</div>';
			} else {
				return '<div class="text-muted">Inactive</div>';
			}
		}}
	];

	slick_grid = $('#provider-grid').slickGrid({
  		pager: $('#provider-pager'),
  		form: $('#provider_search_form'),
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
  			$('#provider_search_form').trigger('submit');
		}
  	});
	
  	$('#provider_search_form').trigger('submit');
});
//-->
</script>