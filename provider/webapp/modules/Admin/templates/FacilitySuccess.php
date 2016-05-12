<?php
	/* @var $facility \Ficus\Facility */
	$facility = $this->getContext()->getRequest()->getAttribute("facility", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage Facility
		<small>Manage the beds and rooms within this facility</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="/admin/facility-search">Facilities</a></li>
		<li class="active"><?php echo $facility->getName() ?></li>
	</ol>
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-square" src="<?php echo trim($facility->getPrimaryPhoto()) != "" ? $facility->getPrimaryPhoto() : "/img/default-profile.png" ?>" id="facility_profile_image" alt="Facility profile picture" />
                    <h3 class="profile-username text-center"><?php echo $facility->getName() ?></h3>
                    <p class="text-muted text-center"><?php echo $facility->getMailing()->getName() ?></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Landlord</b> <a class="pull-right"><?php echo $facility->getLandlord()->getName() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a href="tel:<?php echo $facility->getLandlord()->getPhone() ?>" class="pull-right"><?php echo $facility->getLandlord()->getPhone() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $facility->getLandlord()->getEmail() ?></a>
                        </li>
                    </ul>
                    <a href="/admin/facility-wizard?_id=<?php echo $facility->getId() ?>" data-toggle="modal" data-target="#edit_facility_modal" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>  Manager</strong>
                    <p class="text-muted">
                        <?php echo $facility->getManager()->getName() ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted">
                        <?php echo $facility->getMailing()->getAddress() ?><br />
                        <?php echo $facility->getMailing()->getCity() ?>, <?php echo $facility->getMailing()->getState() ?> <?php echo $facility->getMailing()->getPostalCode() ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Amenities</strong>
                    <p class="text-muted">
                        <?php echo $facility->getAmenities() ?>
                    </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#rooms" data-toggle="tab">Rooms</a></li>
                    <li><a href="#photos" data-toggle="tab">Photos</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="rooms">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-sm-7 col-md-8 col-lg-9">
        							<form id="bed_search_form" method="GET" action="/api">
                    					<input type="hidden" name="func" value="/admin/bed">
                    					<input type="hidden" name="format" value="json" />
                    					<input type="hidden" id="page" name="page" value="1" />
                    					<input type="hidden" id="items_per_page" name="items_per_page" value="500" />
                    					<input type="hidden" id="sort" name="sort" value="name" />
                    					<input type="hidden" id="sord" name="sord" value="asc" />
                    					<input type="hidden" id="facility_id_array" name="facility_id_array[]" value="<?php echo $facility->getId() ?>" />
                    					<div class="has-feedback">
                    						<input type="text" class="form-control input-sm" placeholder="Search..." size="35" id="txtSearch" name="name" value="" />
                    						<span class="fa fa-search form-control-feedback"></span>
                    					</div>
                    				</form>
                				</div>
                				<div class="col-sm-5 col-md-4 col-lg-3 text-right">
                                    <a href="/admin/bed-wizard?facility=<?php echo $facility->getId() ?>" data-toggle="modal" data-target="#edit_bed_modal" class="btn btn-sm btn-success">Add Room</a>
                                </div>
                            </div>
						</div>
                        <div class="box-body">
							<div class="help-block">These are the beds available in this facility.  A bed can be shared or private.</div>
                            <div id="bed-grid"></div>
						</div>
						<div class="box-footer">
							<div id="bed-pager"></div>
						</div>
                    </div>
                    <div class="tab-pane fade" id="photos">
                        <div class="box-header with-border">
                            <div id="dropbox">
                                <span class="message">Drop images here to upload. <br /><i>(maximum image size is 2MB)</i></span>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div id="photos_<?php echo $facility->getId() ?>">
                                    <?php 
                                        foreach ($facility->getPhotos() as $photo) { 
                                    ?>
                                        <div class="preview col-md-3" id="facility_photo_<?php echo md5(urlencode($photo)) ?>">
                                            <span class="imageHolder">
                                        	   <a data-toggle="modal" data-target="#edit_facility_photo_modal" href="/admin/facility-photo?_id=<?php echo $facility->getId() ?>&photo=<?php echo urlencode($photo) ?>"><img src="<?php echo $photo ?>" class="img img-responsive thumbnail" /></a>
                                            </span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- edit staff modal -->
<div class="modal fade" id="edit_facility_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit staff image modal -->
<div class="modal fade" id="edit_facility_img_modal"><div class="modal-dialog"><div class="modal-content"></div></div></div>
<!-- edit room modal -->
<div class="modal fade" id="edit_bed_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit photo modal -->
<div class="modal fade" id="edit_facility_photo_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	var dropbox = $('#dropbox'),
	message = $('.message', dropbox);

	dropbox.filedrop({
		// The name of the $_FILES entry:
		paramname:'photo',
		data: { '_id': '<?php echo $facility->getId() ?>' },
		maxfiles: 25,
    	maxfilesize: 2, // in mb
		url: '/admin/facility-photo-upload',
		uploadFinished:function(i,file,response){
			$.data(file).addClass('done');
			if (response.record && response.record.photo) {
				$.data(file).html(function(i, oldHTML) {
				    oldHTML = oldHTML.replace(/%photo%/g, response.record.photo);
					return oldHTML;
				});
			}
			// response is the JSON object that post_file.php returns
			$.data(file).find('.progressHolder').fadeOut();
		},
    	error: function(err, file) {
			switch(err) {
				case 'BrowserNotSupported':
					showMessage('Your browser does not support HTML5 file uploads!');
					break;
				case 'TooManyFiles':
					alert('Too many files! Please select 5 at most!');
					break;
				case 'FileTooLarge':
					alert(file.name + ' is too large! Please upload files up to 2MB.');
					break;
				default:
					break;
			}
		},
		// Called before each upload is started
		beforeEach: function(file){
			if(!file.type.match(/^image\//)){
				alert('Only images are allowed!');
				// Returning false will cause the
				// file to be rejected
				return false;
			}
		},
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		progressUpdated: function(i, file, progress) {
			$.data(file).find('.progress').width(progress);
		}
	});

	
	$('#edit_facility_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});

	$('#edit_bed_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});

	$('#edit_facility_photo_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});

	loadBeds();
});

var template = '<div class="preview col-md-3">'+
'<span class="imageHolder">'+
	'<a data-toggle="modal" data-target="#edit_facility_photo_modal" href="/admin/facility-photo?_id=<?php echo $facility->getId() ?>&photo=%photo%"><img class="img img-responsive img-thumbnail" /></a>'+
'</span>'+
'<div class="progressHolder">'+
	'<div class="progress"></div>'+
'</div>'+
'</div>'; 

function createImage(file){
    var preview = $(template),
    image = $('img', preview);

    var reader = new FileReader();

    image.width = 100;
    image.height = 100;

    reader.onload = function(e){
        // e.target.result holds the DataURL which
        // can be used as a source of the image:

        image.attr('src',e.target.result);
    };

    // Reading the file as a DataURL. When finished,
    // this will trigger the onload function above:
    reader.readAsDataURL(file);

    preview.appendTo($('#photos_<?php echo $facility->getId() ?>'));

    // Associating a preview container
    // with the file, using jQuery's $.data():

    $.data(file,preview);
}

function showMessage(msg){
	$('.message', '#dropbox').html(msg);
}

function loadBeds() {
	var bed_columns = [
  		{id:'_id', name:'id', field:'_id', def_value: ' ', sortable:true, type: 'string', hidden:true, formatter: function(row, cell, value, columnDef, dataContext) {
  			return value;
  		}},
  		{id:'name', name:'name', field:'name', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			return '<a data-toggle="modal" data-target="#edit_bed_modal" href="/admin/bed-wizard?_id=' + dataContext._id + '">' + dataContext.name + '</a>';
  		}},
  		{id:'room', name:'room', field:'room', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  		    if (value != null) {
    		      if (value.indexOf('_') !== false) {
  		    	    return '<a data-toggle="modal" data-target="#edit_bed_modal" href="/admin/bed-wizard?_id=' + dataContext._id + '">' + dataContext.room.substr(0, dataContext.room.indexOf('_')) + '</a>';
    		      } else {
    		    	  return '<a data-toggle="modal" data-target="#edit_bed_modal" href="/admin/bed-wizard?_id=' + dataContext._id + '">' + dataContext.room + '</a>';
    		      }
  		    } else {
    		      return '- not assigned -';
  		    }
  		}},
  		{id:'private_bath', name:'bath', field:'private_bath', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			if (value) {
  			    return '<span class="text-danger">Private</span>';
  			} else {
  				return '<span class="text-success">Shared</span>';
  			}
  		}},
  		{id:'private_room', name:'privacy', field:'private_room', def_value: ' ', sortable:true, cssClass: 'text-center', type: 'string', formatter: function(row, cell, value, columnDef, dataContext) {
  			if (value) {
  			    return '<span class="text-danger">Private</span>';
  			} else {
  				return '<span class="text-success">Shared</span>';
  			}
  		}}
  	];

    bed_slick_grid = $('#bed-grid').slickGrid({
		pager: $('#bed-pager'),
		form: $('#bed_search_form'),
		columns: bed_columns,
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

    $('#bed_search_form').trigger('submit');
}
//-->
</script>