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
							<li><a href="#"><?php echo $this->getContext()->getUser()->getUserDetails()->getName() ?></a></li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
		        <!-- sidebar: style can be found in sidebar.less -->
		        <div class="sidebar" id="scrollspy">
					<?php if ($this->getMenu() !== null) { ?>
						<ul class="nav sidebar-menu">
							<li class="header">MAIN NAV</li>
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