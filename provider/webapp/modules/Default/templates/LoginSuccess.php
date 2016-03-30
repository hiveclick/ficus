<?php 
	$user = $this->getContext()->getRequest()->getAttribute('user', new \Ficus\User());
?>
<div class="fs_split">
    <div class="fs_split_pane fs_split_pane_left">
        <div class="container-fluid">
            <div id="ficus_logo"></div>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <h2>Login to your account</h2>
            <br />
            <form name="login_form" method="POST" action="/login">
        		<input type="hidden" name="forward" value="/<?php echo isset($_REQUEST['module']) ? strtolower($_REQUEST['module']) : 'index' ?><?php echo isset($_REQUEST['action']) ? ('/' . strtolower($_REQUEST['action'])) : '' ?>" />
        		<div class="form-group">
        			<div class="form-label" for="name">Enter your <b>e-mail address</b></div>
        			<div class="">
        				<input type="text" id="username" class="form-control input-lg" name="username" value="<?php echo $user->getUsername() ?>" placeholder="you@yourdomain.com" />
        			</div>
        		</div>
        		<br />
        		<div class="form-group">
        			<div class="form-label" for="name">Enter your <b>password</b></div>
        			<div class="">
        				<input type="password" id="password" class="form-control input-lg" name="password" placeholder="***********" />
        			</div>
        		</div>
        		<br />
        		<div class="form-group">
        			<div class="form-label" for="name">Enter your <b>provider code</b></div>
        			<div class="">
        				<input type="text" id="code" class="form-control input-lg" name="provider[code]" placeholder="12345" />
        			</div>
        		</div>
        		<br />
        		<?php foreach ($this->getErrors()->getErrors() as $error) { ?>
        			<div class="alert alert-warning">
        				<a class="close" data-dismiss="alert" href="#">x</a><?php echo $error->getMessage() ?>
        			</div>
        		<?php } ?>
        		<div class="form-group">
        			<div class="text-center">
        				<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Sign in to your account" />
        			</div>
        		</div>
        	</form>
    	</div>
    </div>
    <div class="fs_split_pane fs_split_pane_right">
        <div class="container-fluid">
			<div class="fs_split_header"></div>
            <div class="fs_split_body" style="padding:240px 25px;">
                <img src="/img/login-step.png" class="img-responsive" />
                <h1>Use Ficus for better claim and time management</h1>
                <div class="help-block">Using Ficus, you can easily manage your shifts and claims whether you have one client or several facilities across the nation.</div>
            </div>
			<div class="fs_split_footer" style="padding:25px 25px;">By proceeding to log into your account and use Ficus, you are agreeing to our Terms of Service and Privacy Policy. If you do not agree, you cannot use Ficus.</div>
		</div>
    </div>
</div>