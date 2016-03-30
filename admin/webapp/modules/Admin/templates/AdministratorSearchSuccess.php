<?php
	/* @var $administrator \Ficus\Administrator */
	$administrator = $this->getContext()->getRequest()->getAttribute("user", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Administrators
		<small>Administrators have access to log into the system and make changes</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Administrators</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> Administrators</h3>
			<div class="box-tools">
				<form id="administrator_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/admin/administrator">
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
			<div class="pull-right"><a data-toggle="modal" data-target="#edit_administrator_modal" href="/admin/administrator-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Administrator</a></div>
			<div class="help-block">The users below have access to this backend administration interface.  You can manage client accounts <a href="/account/account-search">here</a></div>
			<div id="administrator-grid"></div>
		</div>
		<div class="box-footer">
			<div id="administrator-pager"></div>
		</div>
	</div>
</section>

<!-- edit user modal -->
<div class="modal fade" id="edit_administrator_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'username', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_administrator_modal" href="/admin/administrator-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'password', name:'password', field:'password', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_administrator_modal" href="/admin/administrator-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'status', name:'status', field:'status', def_value: ' ', cssClass: 'text-center', maxWidth:68, width:68, minWidth:68, sortable:false, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value) {
				return '<div class="text-success">Active</div>';
			} else {
				return '<div class="text-muted">Inactive</div>';
			}
		}}
	];

	slick_grid = $('#administrator-grid').slickGrid({
  		pager: $('#administrator-pager'),
  		form: $('#administrator_search_form'),
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
  			$('#administrator_search_form').trigger('submit');
		}
  	});
	
  	$('#administrator_search_form').trigger('submit');

	$('#edit_administrator_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>