<?php
	/* @var $form \Ficus\Form */
	$form = $this->getContext()->getRequest()->getAttribute("form", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All Forms
		<small>Forms are generated questions or tasks that can be assigned to a client or job</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Forms</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tasks"></i> All System Forms</h3>
			<div class="box-tools">
				<form id="form_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/admin/form">
					<input type="hidden" name="format" value="json" />
					<input type="hidden" id="page" name="page" value="1" />
					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
					<input type="hidden" id="sort" name="sort" value="name" />
					<input type="hidden" id="sord" name="sord" value="asc" />
					<div class="btn btn-box-tool">
                        <input type="checkbox" id="show_system_only_1" name="show_system_only" value="1" />
					</div>
					<div class="btn btn-box-tool">
    					<div class="has-feedback">
    						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
    						<span class="fa fa-search form-control-feedback"></span>
    					</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box-body">
			<div class="pull-right">
                <a href="/admin/form-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New Form</a>
                <a data-toggle="modal" data-target="#import_form_modal" href="/admin/form-import-wizard" class="btn btn-info btn-sm"><span class="fa fa-upload"></span> Import Forms</a>
            </div>
			<div class="help-block">This is the master list of internal forms.  A form can be added to a client and represents a signed, completed task for that client.</div>
			<div id="form-grid"></div>
		</div>
		<div class="box-footer">
			<div id="form-pager"></div>
		</div>
	</div>
</section>

<!-- import form modal -->
<div class="modal fade" id="import_form_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'code', name:'code', field:'code', def_value: ' ', sortable:true, cssClass: 'text-center',minWidth:90,width:90,maxWidth:90, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a href="/admin/form?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-left', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
		    ret_val = '<div style="line-height:20px;">';
		    ret_val += '<div><a href="/admin/form?_id=' + dataContext._id + '">' + value + '</a></div>';
		    ret_val += '<div class="text-muted">' + dataContext.description + '</div>';
		    ret_val += '</div>';
			return ret_val;
		}},
		{id:'approved', name:'approved', field:'approved', def_value: ' ', sortable:true, minWidth:80,width:80,maxWidth:80, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value) {
				return '<span class="text-muted">System Form</span>';
			} else {
			    return '<span class="text-warning">Custom Form</span>';
			}
		}},
		{id:'category', name:'category', field:'category', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}}
	];

	slick_grid = $('#form-grid').slickGrid({
  		pager: $('#form-pager'),
  		form: $('#form_search_form'),
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

	$('#show_system_only_1').bootstrapSwitch({
  	    onText: 'System Only',
  	    offText: 'All Forms',
  	    size: 'mini',
    	labelWidth: 15,
  	    onSwitchChange: function() {
  	    	$('#form_search_form').trigger('submit');
    	}
  	});

	$("#txtSearch").keyup(function(e) {
  		// clear on Esc
  		if (e.which == 27) {
  			this.value = "";
  		} else if (e.which == 13) {
  			$('#form_search_form').trigger('submit');
		}
  	});
	
  	$('#form_search_form').trigger('submit');
});
//-->
</script>