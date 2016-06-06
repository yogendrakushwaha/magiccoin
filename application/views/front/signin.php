<div class="parallax_sec3" style="background:url(<?php echo base_url(); ?>application/libraries/images/para-bg51.jpg); background-size:cover;">
	<h2>You May Login <span> By Filling The Form </span></h2>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-12">
			</div>
			<div class="col-md-8 col-sm-6 col-xs-12">
				<div class="contact-feedback-form" id="main">
					<h3>Login your account credentials</h3>
					<form method="post" id="form-signin" action='javascript:;'>
						<div class="col-md-6 col-xs-12">
							<input type="text" name="txtlogin" placeholder="Enter Usereid" id="txtlogin" readonly>
						</div>
						<div class="col-md-6 col-xs-12">
							<input type="password" name="txtpwd" id="txtpwd" placeholder="Enter Password" required>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="row">
								
								<div class="col-md-3 col-xs-12">
									<p id="mainCaptcha" class="capcha-new"></p>
								</div>
								<div class="col-md-3 col-xs-12">
								<p><a href="javascript:;" id="refresh" onclick="Captcha()" /><i class="fa fa-refresh fa-1x"></i></a></p>
							</div>
							<div class="col-md-6 col-xs-12">
								<input type="text" id="txtInput" name="txtInput" placeholder="Enter Captcha"/>				
							</div>
							
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<button type="button" name="submit-form" class="btn btn-danger" onclick="return ValidCaptcha();" id="login_submit">Access Account</button>
						<a href="<?php echo base_url(); ?>welcome/forget_password" class="pull-right">Forget Password ?</a>
					</div>
				</form>
				
			</div>						
		</div>
		<div class="col-md-2 col-sm-2 col-xs-12">
		</div>
	</div>
</div>
</div>