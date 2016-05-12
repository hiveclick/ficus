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
        <script src="/js/main.min.js"></script>
        
        <!-- Default site css -->        
        <link href="/css/main.min.css" rel="stylesheet">
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
</html>