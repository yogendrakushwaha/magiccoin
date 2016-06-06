<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<h1 style="font-size: 30px;" class="fontsforweb_fontid_17281"> 
        	<a href="<?php echo base_url();?>" title="<?php echo SITE_NAME; ?>" style="text-decoration:none;"> 
            	<span style="color:#FFFFFF;"><?php echo SITE_NAME; ?></span>
			</a>
		</h1>
		<h6 style="margin-top:-20px;  margin-left:-42px; font-size:9px; color:#FFF;"></h6>
		
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN REGISTRATION FORM -->
		<form class="login-form">
		<?php
		if($msg==1)
		{
		?>
			<h3>Thankyou...!</h3>
			<h4>Welcome To <?php echo SITE_NAME; ?> Your UID is <?php echo $row->or_login_id; ?> and PASS <?php echo $row->or_login_pwd; ?> <br>
			Thanks for Choosing <?php echo WEBSITE; ?></h4>
			Your Account Successfully Activated. Welcome to <?php echo WEBSITE; ?></h4>
		<?php
		}
		else
		{
		?>
			<h3>Thankyou...!</h3>
			<h4>Your Account Already Activated.</h4>
		<?php
		}
		?>
		</form>
		<!-- END REGISTRATION FORM -->
	</div>
<!-- END LOGIN -->