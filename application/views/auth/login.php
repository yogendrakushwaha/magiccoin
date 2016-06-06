<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
	});
</script>

<body class="login-body">
	
    <div class="container" id="main">
		
		<form class="form-signin" id="form-signin">
			<h2 class="form-signin-heading"><i class="ico-signup"></i> sign in now</h2>
			<div class="login-wrap">
				<div class="user-login-info">
					<input type="text" class="form-control" placeholder="User ID" name="txtlogin" id="txtlogin" autofocus>
					<input type="password" class="form-control" placeholder="Password" name="txtpwd" id="txtpwd">
				</div>
				<label class="checkbox">
					<input type="checkbox" value="remember-me"> Remember me
				</label>
				<button class="btn btn-lg btn-login btn-block" type="submit" id="login_submit">Sign in</button>
				
			</div>
		</form>
		
		<!-- Modal -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="post" action="<?php echo site_url('auth/resetpassword'); ?>">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Forgot Password ?</h4>
						</div>
						<div class="modal-body">
							<p>Enter your e-mail address below to reset your password.</p>
							<input type="text" name="txtemail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
							
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
							<button class="btn btn-success" type="button">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- modal -->
		
		
		
	</div>		