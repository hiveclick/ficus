<?php
	/* @var $staff \Ficus\Staff */
	$staff = $this->getContext()->getRequest()->getAttribute("staff", array());
	$shifts = $this->getContext()->getRequest()->getAttribute("shifts", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage Staff
		<small>Staffs have access to log into the system and make changes</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="/provider/staff-search">Staff</a></li>
		<li class="active"><?php echo $staff->getName() ?></li>
	</ol>
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a href="/provider/staff-image-wizard?_id=<?php echo $staff->getId() ?>" data-toggle="modal" data-target="#edit_staff_img_modal"><img class="profile-user-img img-responsive img-circle" src="<?php echo $staff->getProfileImageUrl() != '' ? $staff->getProfileImageUrl() : '/img/default-profile.png' ?>" id="staff_profile_image" alt="User profile picture"></a>
                    <h3 class="profile-username text-center"><?php echo $staff->getName() ?></h3>
                    <p class="text-muted text-center"><?php echo $staff->getProvider()->getName() ?></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>User Type</b> <a class="pull-right"><?php 
                                if ($staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_ADMINISTRATOR) { 
                                    echo "Administrator";
                                } else if ($staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_GENERAL) {
                                    echo "General User";
                                } else if ($staff->getStaffType() == \Ficus\Staff::STAFF_TYPE_BILLING) {
                                    echo "Billing";
                                } else {
                                    echo "Unknown Type (" . $staff->getStaffType() . ")";
                                }
                            ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Provider Code</b> <a class="pull-right"><?php echo $staff->getProvider()->getCode() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a href="tel:<?php echo $staff->getMailing()->getPhone() ?>" class="pull-right"><?php echo $staff->getMailing()->getPhone() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $staff->getMailing()->getEmail() ?></a>
                        </li>
                    </ul>
                    <a href="/provider/staff-wizard?_id=<?php echo $staff->getId() ?>" data-toggle="modal" data-target="#edit_staff_modal" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                    <p class="text-muted">
                        
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted"><?php echo $staff->getMailing()->getCity() ?>, <?php echo $staff->getMailing()->getState() ?></p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                    
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li><a href="#clients" data-toggle="tab">Clients</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane fade in" id="activity">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="timeline">
                    
                    </div>
                    <div class="tab-pane fade" id="clients">
                    
                    </div>
                    <div class="tab-pane fade" id="settings">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- edit staff modal -->
<div class="modal fade" id="edit_staff_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit staff image modal -->
<div class="modal fade" id="edit_staff_img_modal"><div class="modal-dialog"><div class="modal-content"></div></div></div>


<script>
//<!--
$(document).ready(function() {
	$('#edit_staff_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>