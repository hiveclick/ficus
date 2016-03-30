<?php 
	$shift = $this->getContext()->getRequest()->getAttribute('shift', new \Ficus\CareGiver());
?>
<div class="fs_split">
    <div class="fs_split_pane fs_split_pane_left">
        <div class="container-fluid">
            <div id="ficus_logo"></div>
            <h2>Clock Out Successful</h2>
            <br />
            <div class="alert alert-warning">You will be returned to the clock-in/clock-out screen in 5 seconds.</div>
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
<script>
//<!--
$(document).ready(function() {
    setTimeout(function() {
        location.href = '/';
    }, 5000)
});
//-->
</script>