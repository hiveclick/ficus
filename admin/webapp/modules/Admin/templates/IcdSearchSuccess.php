<?php
	/* @var $icd \Ficus\Icd */
	$icd = $this->getContext()->getRequest()->getAttribute("icd", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage All ICD-10 Codes
		<small>ICD-10 Codes are used when assigning treatment plans to patients during intake</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">ICDs</li>
	</ol>
</div>
<!-- Content Body (Main Pane) -->
<section class="content">
	<div class="box box-default color-palette-box">
		<div class="box-header with-border">
			<h3 class="box-title"><i class="fa fa-tag"></i> ICD-10 Codes</h3>
			<div class="box-tools">
				<form id="icd_search_form" method="GET" action="/api">
					<input type="hidden" name="func" value="/admin/icd">
					<input type="hidden" name="format" value="json" />
					<input type="hidden" id="page" name="page" value="1" />
					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
					<input type="hidden" id="sort" name="sort" value="name" />
					<input type="hidden" id="sord" name="sord" value="asc" />
					<div class="btn btn-box-tool">
                        <input type="checkbox" id="show_approved_only_1" name="show_approved_only" value="1" />
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
                <a data-toggle="modal" data-target="#edit_icd_modal" href="/admin/icd-wizard" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> Add New ICD-10 Code</a>
                <a data-toggle="modal" data-target="#import_icd_modal" href="/admin/icd-import-wizard" class="btn btn-info btn-sm"><span class="fa fa-upload"></span> Import ICD-10 Codes</a>
            </div>
			<div class="help-block">This is the master list of ICD-10 Codes.  This list will be used to assign treatment plans to patients.</div>
			<div id="icd-grid"></div>
		</div>
		<div class="box-footer">
			<div id="icd-pager"></div>
		</div>
	</div>
</section>

<!-- edit icd modal -->
<div class="modal fade" id="edit_icd_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- import icd modal -->
<div class="modal fade" id="import_icd_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var columns = [
		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}},
		{id:'code', name:'code', field:'code', def_value: ' ', sortable:true, cssClass: 'text-center',minWidth:90,width:90,maxWidth:90, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return '<a data-toggle="modal" data-target="#edit_icd_modal" href="/admin/icd-wizard?_id=' + dataContext._id + '">' + value + '</a>';
		}},
		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-left', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
		    ret_val = '<div style="line-height:20px;">';
		    ret_val += '<div><a data-toggle="modal" data-target="#edit_icd_modal" href="/admin/icd-wizard?_id=' + dataContext._id + '">' + value + '</a></div>';
		    ret_val += '<div class="text-muted">' + dataContext.description + '</div>';
		    ret_val += '</div>';
			return ret_val;
		}},
		{id:'approved', name:'approved', field:'approved', def_value: ' ', sortable:true, minWidth:80,width:80,maxWidth:80, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			if (value) {
				return '<span class="text-success">Approved</span>';
			} else {
			    return '<span class="text-muted">No</span>';
			}
		}},
		{id:'category', name:'category', field:'category', def_value: ' ', cssClass: 'text-center', sortable:true, type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
			return value;
		}}
	];

	slick_grid = $('#icd-grid').slickGrid({
  		pager: $('#icd-pager'),
  		form: $('#icd_search_form'),
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

	$('#show_approved_only_1').bootstrapSwitch({
  	    onText: 'Approved Only',
  	    offText: 'All Codes',
  	    size: 'mini',
    	labelWidth: 15,
  	    onSwitchChange: function() {
  	    	$('#icd_search_form').trigger('submit');
    	}
  	});

	$("#txtSearch").keyup(function(e) {
  		// clear on Esc
  		if (e.which == 27) {
  			this.value = "";
  		} else if (e.which == 13) {
  			$('#icd_search_form').trigger('submit');
		}
  	});
	
  	$('#icd_search_form').trigger('submit');

	$('#edit_icd_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>