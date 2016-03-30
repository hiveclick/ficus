<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $this->getTitle() ?></title>
		<link rel="icon" href="favicon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Bootstrap and jQuery base classes -->
		<link href="/css/bootstrap.css" rel="stylesheet" />
		<link href="/css/AdminLTE.min.css" rel="stylesheet" />
		<link href="/css/skins/_all-skins.min.css" rel="stylesheet" />
		<link href="/css/skins/skin-green-light.min.css" rel="stylesheet" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		
		<!-- Font Awesome library -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />

		<!-- Cookie plugin for storing column information in slickgrid -->
		
		
		<!-- RAD plugins used for ajax requests, notifications, and form submission -->
		<link href="/scripts/pnotify/pnotify.custom.min.css" rel="stylesheet" type="text/css" />
		<script src="/scripts/pnotify/pnotify.custom.min.js" type="text/javascript" ></script>
		<script src="/scripts/rad/jquery.rad.js" type="text/javascript"></script>
		
		<!-- Slick Grid plugins -->
		<script type="text/javascript" src="/scripts/slick-grid-1.4/lib/jquery.number.min.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/lib/jquery.cookie.min.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/lib/jquery.event.drag.min.2.0.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/slick.model.rad.min.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/slick.pager.rad.min.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/slick.columnpicker.rad.min.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/slick.grid.rad.min.js"></script>
		<script type="text/javascript" src="/scripts/slick-grid-1.4/jquery.slickgrid.rad.min.js"></script>
		<link rel="stylesheet" href="/scripts/slick-grid-1.4/css/slick.columnpicker.css"></link>
		<link rel="stylesheet" href="/scripts/slick-grid-1.4/css/slick.pager.css"></link>
		<link rel="stylesheet" href="/scripts/slick-grid-1.4/css/slick.ui.css"></link>
		<link rel="stylesheet" href="/scripts/slick-grid-1.4/css/slick.grid.css"></link>
		
		<!-- Bootstrap color picker -->
		<!-- 
		<link href="/scripts/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
		<script src="/scripts/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js" type="text/javascript" ></script>
		-->
		
		<!-- Selectize plugin for select boxes and comma-delimited fields -->
		<link href="/scripts/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
		<script src="/scripts/selectize/js/standalone/selectize.min.js" type="text/javascript"></script>

		<!-- Bootstrap dropdown plugin -->
		<script src="/scripts/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		
		<!-- Moment plugin for formatting dates -->
		<script type="text/javascript" src="/scripts/moment.min.js"></script>
		
		<!-- Bootstrap switch for checkboxes and radiobuttons -->
		<link href="/scripts/switch/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
		<script src="/scripts/switch/bootstrap-switch.min.js" type="text/javascript" ></script>
		
		<!-- Datetime picker used on the reports -->
		<!-- 
		<link href="/scripts/datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
		<script src="/scripts/datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
		-->

		<!-- Number format plugin for formatting currency and numbers -->
		
		
		<!-- Number format plugin for formatting currency and numbers -->
		<script src="/scripts/jshashtable-2.1.js" type="text/javascript" ></script>
		
		<!-- Smart resize plugin used for chart redrawing -->
		<script src="/scripts/jquery.smartresize.js" type="text/javascript" ></script>

		<!-- Timers used for firing events -->
		<script src="/scripts/timers/jquery.timers-1.2.js" type="text/javascript" ></script>
		
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
        <script src="/js/app.min.js" type="text/javascript"></script>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
    			<a href="index2.html" class="logo">
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><img src="/images/logo-brand-sm.png" /></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><img src="/images/logo-brand.png" /></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                  </a>
    			<!-- Header Navbar: style can be found in header.less -->
    				<!-- Navbar Right Menu -->
    				<div class="navbar-custom-menu">
    					<ul class="nav navbar-nav">
    						<!-- Messages: style can be found in dropdown.less-->
    						<li class="dropdown messages-menu">
    							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    								<i class="fa fa-envelope-o"></i>
    								<span class="label label-success">4</span>
    							</a>
    							<ul class="dropdown-menu">
    								<li class="header">You have 4 messages</li>
    								<li>
    									<!-- inner menu: contains the actual data -->
    									<ul class="menu">
    										<li><!-- start message -->
    											<a href="#">
    												<div class="pull-left">
    													<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    												</div>
    												<h4>
    													Sender Name
    													<small><i class="fa fa-clock-o"></i> 5 mins</small>
    												</h4>
    												<p>Message Excerpt</p>
    											</a>
    										</li><!-- end message -->
    										...
    									</ul>
    								</li>
    								<li class="footer"><a href="#">See All Messages</a></li>
    							</ul>
    						</li>
    						<!-- Notifications: style can be found in dropdown.less -->
    						<li class="dropdown notifications-menu">
    							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    								<i class="fa fa-bell-o"></i>
    								<span class="label label-warning">10</span>
    							</a>
    							<ul class="dropdown-menu">
    								<li class="header">You have 10 notifications</li>
    								<li>
    									<!-- inner menu: contains the actual data -->
    									<ul class="menu">
    										<li>
    											<a href="#">
    												<i class="ion ion-ios-people info"></i> Notification title
    											</a>
    										</li>
    										...
    									</ul>
    								</li>
    								<li class="footer"><a href="#">View all</a></li>
    							</ul>
    						</li>
    						<!-- Tasks: style can be found in dropdown.less -->
    						<li class="dropdown tasks-menu">
    							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    								<i class="fa fa-flag-o"></i>
    								<span class="label label-danger">9</span>
    							</a>
    							<ul class="dropdown-menu">
    								<li class="header">You have 9 tasks</li>
    								<li>
    									<!-- inner menu: contains the actual data -->
    									<ul class="menu">
    										<li><!-- Task item -->
    											<a href="#">
    												<h3>
    													Design some buttons
    													<small class="pull-right">20%</small>
    												</h3>
    												<div class="progress xs">
    													<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
    														<span class="sr-only">20% Complete</span>
    													</div>
    												</div>
    											</a>
    										</li><!-- end task item -->
    										...
    									</ul>
    								</li>
    								<li class="footer">
    									<a href="#">View all tasks</a>
    								</li>
    							</ul>
    						</li>
    						<!-- User Account: style can be found in dropdown.less -->
    						<li class="dropdown user user-menu">
    							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    								<img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
    								<span class="hidden-xs">Alexander Pierce</span>
    							</a>
    							<ul class="dropdown-menu">
    								<!-- User image -->
    								<li class="user-header">
    									<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    									<p>
    										Alexander Pierce - Web Developer
    										<small>Member since Nov. 2012</small>
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
    										<a href="#" class="btn btn-default btn-flat">Profile</a>
    									</div>
    									<div class="pull-right">
    										<a href="#" class="btn btn-default btn-flat">Sign out</a>
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
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="label label-primary pull-right">4</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <small class="label pull-right bg-red">3</small>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">12</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">		
		<div>
			<?php if (!$this->getErrors()->isEmpty()) { ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<?php echo $this->getErrors()->getAllErrors(); ?>
				</div>
			<?php } ?>
			<!-- Insert body here -->
			<?php echo $template["content"] ?>
		</div>
		<div class="footer small hidden-xs">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="/default/index">dashboard</a></li>
					<li><a href="/report/dashboard">reports</a></li>
					<li><a href="/default/logout">logout</a></li>
				</ul>
				<p class="navbar-text navbar-right">Ficus Lead Manager. All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;</p>
			</div>
		</div>
	</section>
</div>
</body>
</html>
<script>
//<!--
$(document).ready(function() {
	$('#nav_search').selectize({
		valueField: 'url',
		labelField: 'name',
		searchField: ['description','name'],
		options: [],
		dropdownWidthOffset: 100,
		optgroupField: 'optgroup',
		optgroups: [
			{ label: 'leads', value: 'leads' },
			{ label: 'offers', value: 'offers' },
			{ label: 'campaigns', value: 'campaigns'},
			{ label: 'fulfillments', value: 'fulfillments'},
			{ label: 'lead splits', value: 'lead splits'}
		],
		create: false,
		render: {
			optgroup_header: function(item, escape) {
				return '<b class="optgroup-header">' +
					escape(item.label) +
					'</b>';
			 },
			option: function(item, escape) {
				return '<div>' +
					'<a href="' + escape(item.url) + '">' +
					'<span class="title">' +
						'<span class="name">' + escape(item.name) + '</span>' +
					'</span>' +
					'<span class="description">' + escape(item.description) + '</span>' +
					'<span class="description">' + escape(item.meta) + '</span>' +
					'</a>' +
				'</div>';
			}
		},
		load: function(query, callback) {
			if (!query.length) return callback();
			this.clearOptions();
			$.ajax({
				url: '/api',
				type: 'GET',
				dataType: 'json',
				data: {
					func: '/search',
					keywords: query
				},
				error: function() {
					callback();
				},
				success: function(res) {
					callback(res.entries);
				}
			});
		},
		onItemAdd: function(value,item) {
			// Redirect to whatever was selected
			location.replace(value);
		}
	});
});
//-->
</script>