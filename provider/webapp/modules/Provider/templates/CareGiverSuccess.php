<?php
	/* @var $care_giver \Ficus\Care Giver */
	$care_giver = $this->getContext()->getRequest()->getAttribute("care_giver", array());
	$shifts = $this->getContext()->getRequest()->getAttribute("shifts", array());
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<h1>Manage Care Giver
		<small>Care Givers have access to log into the system and make changes</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="/provider/care-giver-search">Care Givers</a></li>
		<li class="active"><?php echo $care_giver->getName() ?></li>
	</ol>
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <a href="/provider/care-giver-image-wizard?_id=<?php echo $care_giver->getId() ?>" data-toggle="modal" data-target="#edit_care_giver_img_modal"><img class="profile-user-img img-responsive img-circle" src="<?php echo $care_giver->getProfileImageUrl() != '' ? $care_giver->getProfileImageUrl() : '/img/default-profile.png' ?>" id="care_giver_profile_image" alt="User profile picture"></a>
                    <h3 class="profile-username text-center"><?php echo $care_giver->getName() ?></h3>
                    <p class="text-muted text-center"><?php echo $care_giver->getProvider()->getName() ?></p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Clients</b> <a class="pull-right">5</a>
                        </li>
                        <li class="list-group-item">
                            <b>Provider Code</b> <a class="pull-right"><?php echo $care_giver->getProvider()->getCode() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a href="tel:<?php echo $care_giver->getMailing()->getPhone() ?>" class="pull-right"><?php echo $care_giver->getMailing()->getPhone() ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo $care_giver->getMailing()->getEmail() ?></a>
                        </li>
                    </ul>
                    <a href="/provider/care-giver-wizard?_id=<?php echo $care_giver->getId() ?>" data-toggle="modal" data-target="#edit_care_giver_modal" class="btn btn-primary btn-block"><b>Edit</b></a>
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
                        <?php if (trim($care_giver->getEducation()) != '') { ?>
                            <?php echo $care_giver->getEducation() ?>
                        <?php } else { ?>
                            -- not entered yet --
                        <?php } ?>
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted"><?php echo $care_giver->getMailing()->getCity() ?>, <?php echo $care_giver->getMailing()->getState() ?></p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                    <?php if (count($care_giver->getSkills()) > 0) { ?>
                        <p>
                        <?php foreach ($care_giver->getSkills() as $skill) { ?>
                            <span class="label label-danger"><?php echo $skill ?></span>
                        <?php } ?>
                        </p>
                    <?php } else { ?>
                        <p class="text-muted">-- no skills entered --</p>
                    <?php } ?>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    
                    <?php if (trim($care_giver->getNotes()) != '') { ?>
                        <p><?php echo $care_giver->getNotes() ?></p>
                    <?php } else { ?>
                        <p class="text-muted">-- no notes --</p>
                    <?php } ?>
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
                            <?php
                                $date = ''; 
                                foreach ($shifts as $shift) {
                            ?>
                                <?php if ($date != date("m/d/Y", $shift->getClockInTime()->sec)) { ?>
                                    <?php $date = date("m/d/Y", $shift->getClockInTime()->sec) ?>
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-aqua">
                                            <?php echo date("d, M Y", $shift->getClockInTime()->sec) ?>
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                <?php } ?>
                                <!-- timeline item -->
                                <?php
                                    // Only show the not closed warning if the shift is not closed and it has been longer than 1 day
                                    if (!$shift->getIsClosed() && (strtotime('now') - $shift->getClockInTime()->sec) > 86400) { 
                                ?>
                                    <li>
                                        <i class="fa fa-exclamation bg-red"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('g:i a', $shift->getClockInTime()->sec) ?></span>
                                            <h3 class="timeline-header"><a href="#"><?php echo $shift->getCareGiver()->getName() ?></a> did not clock out of their shift with <a href="/client/client?_id=<?php echo $shift->getClient()->getId() ?>"><?php echo $shift->getClient()->getName() ?></a></h3>
                                        </div>
                                    </li>
                                <?php } ?>
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('g:i a', $shift->getClockInTime()->sec) ?> - <?php echo date('g:i a', $shift->getClockOutTime()->sec) ?></span>
                                        <h3 class="timeline-header"><a href="#"><?php echo $shift->getCareGiver()->getName() ?></a> Clocked In for <a href="/client/client?_id=<?php echo $shift->getClient()->getId() ?>"><?php echo $shift->getClient()->getName() ?></a></h3>
                                        <div class="timeline-body">
                                            <?php echo $shift->getNotes() ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <?php foreach ($shift->getAdls() as $adl) { ?>
                                                <a class="btn btn-primary btn-flat btn-xs"><?php echo $adl->getName() ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                 </li>
                                 <!-- END timeline item -->
                            <?php } ?>
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

<!-- edit care giver modal -->
<div class="modal fade" id="edit_care_giver_modal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
<!-- edit client image modal -->
<div class="modal fade" id="edit_care_giver_img_modal"><div class="modal-dialog"><div class="modal-content"></div></div></div>

<script>
//<!--
$(document).ready(function() {
	$('#edit_care_giver_modal').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});
//-->
</script>