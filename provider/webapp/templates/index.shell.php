<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo $this->getTitle() ?></title>
        <link rel="icon" href="favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- JQuery Plugins -->
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        
        <!-- Bootstrap base classes -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <!-- Font Awesome icons -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Datatables plugins for table sorting and filtering 
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/colvis/1.1.0/css/dataTables.colVis.css"">
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script type="text/javascript" charset="utf8" src="/js/datatables/dataTables.colReorder.js"></script>
        <script type="text/javascript" charset="utf8" src="/js/datatables/dataTables.pageCache.js"></script>
        -->
        <!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/colvis/1.1.0/js/dataTables.colVis.min.js"></script> -->

        <!-- Cookie plugin for storing column information in slickgrid -->
        <script src="/js/jquery.cookie.js" type="text/javascript" ></script>
        
        <!-- RAD plugins used for ajax requests, notifications, and form submission -->
        <link href="/js/pnotify/pnotify.custom.min.css" rel="stylesheet" type="text/css" />
        <script src="/js/pnotify/pnotify.custom.min.js" type="text/javascript" ></script>
        <script src="/js/rad/jquery.rad.js" type="text/javascript"></script>
        
		<!-- Slick Grid plugins -->
		<script type="text/javascript" src="/js/slick-grid-1.4/lib/jquery.event.drag.min.2.0.js"></script>
		<script type="text/javascript" src="/js/slick-grid-1.4/slick.model.rad.js"></script>
		<script type="text/javascript" src="/js/slick-grid-1.4/slick.pager.rad.js"></script>
		<script type="text/javascript" src="/js/slick-grid-1.4/slick.columnpicker.rad.js"></script>
		<script type="text/javascript" src="/js/slick-grid-1.4/slick.grid.rad.js"></script>
		<script type="text/javascript" src="/js/slick-grid-1.4/jquery.slickgrid.rad.js"></script>
		<link rel="stylesheet" href="/js/slick-grid-1.4/css/slick.columnpicker.css"></link>
		<link rel="stylesheet" href="/js/slick-grid-1.4/css/slick.pager.css"></link>
		<link rel="stylesheet" href="/js/slick-grid-1.4/css/slick.ui.css"></link>
		<link rel="stylesheet" href="/js/slick-grid-1.4/css/slick.grid.css"></link>
        
        <!-- Bootstrap color picker -->
        <link href="/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
        <script src="/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript" ></script>
        
        <!-- Selectize plugin for select boxes and comma-delimited fields -->
        <link href="/js/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        <script src="/js/selectize/js/standalone/selectize.min.js" type="text/javascript"></script>

        <!-- Bootstrap dropdown plugin -->
		<script src="/js/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
        
        <!-- Moment plugin for formatting dates -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        
        <!-- Bootstrap switch for checkboxes and radiobuttons -->
        <link href="/js/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <script src="/js/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript" ></script>
        
        <!-- Include Date Range Picker -->
		<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

        <!-- Number format plugin for formatting currency and numbers -->
        <script src="/js/jquery.number.min.js" type="text/javascript" ></script>
        
        
        <!-- Number format plugin for formatting currency and numbers -->
        <!-- 
        <script src="/js/jshashtable-2.1.js" type="text/javascript" ></script>
        <script src="/js/jquery.numberformatter-1.2.1.js" type="text/javascript" ></script>
         -->
        
        <!-- Smart resize plugin used for chart redrawing -->
        <script src="/js/jquery.smartresize.js" type="text/javascript" ></script>

        <!-- Timers used for firing events -->
        <!-- 
        <script src="/js/timers/jquery.timers-1.2.js" type="text/javascript" ></script>
        -->
        
        <!-- Default site css -->
        <link href="/css/AdminLTE.css" rel="stylesheet">
        
        <link href="/css/skins/skin-blue.css" rel="stylesheet">
        <link href="/css/skins/_all-skins.css" rel="stylesheet">
    </head>
    <body class="skin-blue" data-spy="scroll" data-target="#scrollspy">
		<div class="wrapper">
			<header class="main-header">
	        	<a href="/" class="logo">
	          		<!-- mini logo for sidebar mini 50x50 pixels -->
	          		<span class="logo-mini"><b>F</b>B</span>
	          		<!-- logo for regular state and mobile devices -->
	          		<span class="logo-lg"><img src="/img/logo-brand.png" border="0" /></span>
	        	</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo $this->getContext()->getUser()->getUserDetails()->getProfileImageUrl() ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php  echo $this->getContext()->getUser()->getUserDetails()->getName() ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo $this->getContext()->getUser()->getUserDetails()->getProfileImageUrl() ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php if ($this->getContext()->getUser()->getUserDetails() instanceof \Ficus\CareGiver) { ?>
                                                <?php echo $this->getContext()->getUser()->getUserDetails()->getName() ?> - Care Giver
                                            <?php } else if ($this->getContext()->getUser()->getUserDetails() instanceof \Ficus\Staff) { ?>
                                                <?php echo $this->getContext()->getUser()->getUserDetails()->getName() ?> - <?php 
                                                    if ($this->getContext()->getUser()->getUserDetails()->getStaffType() == \Ficus\Staff::STAFF_TYPE_ADMINISTRATOR) { 
                                                        echo "Administrator";   
                                                    } else if ($this->getContext()->getUser()->getUserDetails()->getStaffType() == \Ficus\Staff::STAFF_TYPE_GENERAL) {
                                                        echo "General User";
                                                    } else if ($this->getContext()->getUser()->getUserDetails()->getStaffType() == \Ficus\Staff::STAFF_TYPE_BILLING) {
                                                        echo "Billing User";
                                                    }
                                                ?>
                                            <?php } else { ?>
                                                <?php echo $this->getContext()->getUser()->getUserDetails()->getName() ?>
                                            <?php } ?>    
                                            <small><?php echo $this->getContext()->getUser()->getUserDetails()->getProvider()->getName() ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php if ($this->getContext()->getUser()->getUserDetails() instanceof \Ficus\CareGiver) { ?>
                                                <a href="/provider/care-giver?_id=<?php echo $this->getContext()->getUser()->getUserDetails()->getId() ?>" class="btn btn-default btn-flat">Profile</a>
                                            <?php } else if ($this->getContext()->getUser()->getUserDetails() instanceof \Ficus\Staff) { ?>
                                                <a href="/provider/staff?_id=<?php echo $this->getContext()->getUser()->getUserDetails()->getId() ?>" class="btn btn-default btn-flat">Profile</a>
                                            <?php } ?>
                                        </div>
                                        <div class="pull-right">
                                            <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
		        <!-- sidebar: style can be found in sidebar.less -->
		        <div class="sidebar" id="scrollspy">
		            <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $this->getContext()->getUser()->getUserDetails()->getProfileImageUrl() ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->getContext()->getUser()->getUserDetails()->getName() ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
					<?php if ($this->getMenu() !== null) { ?>
						<ul class="nav sidebar-menu">
							<li class="header">MAIN NAVIGATION</li>
							<?php if (count($this->getMenu()->getPages()) > 0) { ?>
							<?php
								/* @var $page Zend\Navigation\Page */
								foreach ($this->getMenu()->getPages() as $page) {
							?>
								<?php if ($page->hasPages(true)) { ?>
									<li class="treeview <?php echo $page->getClass() ?>" id="scrollspy-components">
										<a href="javascript:;"><i class="fa <?php echo $page->getClass() == 'active' ? 'fa fa-circle' : 'fa fa-circle-o' ?>"></i> <?php echo $page->getLabel() ?></a>
										<ul class="nav treeview-menu">
										<?php
											/* @var $child_page \Zend\Navigation\Page */
											foreach ($page->getPages() as $child_page) {
										?>
											<?php if ($child_page->getLabel() != '') { ?>
												<li class="<?php echo $child_page->getClass() ?>"><a href="<?php echo $child_page->getHref() ?>"><?php echo $child_page->getLabel() ?></a></li>
											<?php } else { ?>
												<li class="divider"></li>
											<?php } ?>
										<?php } ?>
										</ul>
									</li>
								<?php } else { ?>
									<li class="<?php echo $page->getClass() ?>"><a href="<?php echo $page->getHref() ?>"><i class="fa <?php echo $page->getClass() == 'active' ? 'fa fa-circle' : 'fa fa-circle-o' ?>"></i> <?php echo $page->getLabel() ?></a></li>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</aside>
			
			
			
	        <!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
            	<!-- Insert body here -->
				<?php echo $template["content"] ?>
	        </div>
        	<footer class="main-footer">
                <ul class="nav navbar-nav">
                    <li><a href="/default/index">dashboard</a></li>
                    <li><a href="/admin/setting">settings</a></li>
                    <li><a href="/default/logout">logout</a></li>
                </ul>
                <p class="navbar-text navbar-right">Ficus version 1.0.1-<?php echo \Ficus\Preferences::getPreference('migration_version') ?>. All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <div class="clearfix"></div>
			</footer>
		</div>
		
    </body>
    <!-- AdminLTE App -->
    <script>
		var AdminLTEOptions = {
			//Enable sidebar expand on hover effect for sidebar mini
			//This option is forced to true if both the fixed layout and sidebar mini
			//are used together
			sidebarExpandOnHover: true,
			//BoxRefresh Plugin
			enableBoxRefresh: true,
			//Bootstrap.js tooltip
			enableBSToppltip: true
		};
	</script>
	<!-- FastClick -->
    <script src="/js/plugins/fastclick/fastclick.min.js"></script>
    <script src="/js/app.min.js"></script>
</html>