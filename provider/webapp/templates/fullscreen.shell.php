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
    <body class="skin-blue sidebar-collapse" data-spy="scroll" data-target="#scrollspy">
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

	        
            	<!-- Insert body here -->
				<?php echo $template["content"] ?>
	        
		</div>
		
    </body>
    <!-- AdminLTE App -->
    <script>
		var AdminLTEOptions = {
			//Enable sidebar expand on hover effect for sidebar mini
			//This option is forced to true if both the fixed layout and sidebar mini
			//are used together
			sidebarExpandOnHover: false,
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