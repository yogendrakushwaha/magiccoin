<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo DESCRIPTION; ?>">
		<meta name="author" content="<?php echo WEBSITE_NAME; ?>">
		<link rel="shortcut icon" href="images/favicon.png">
		
		<title><?php echo SITE_NAME; ?></title>
		
		<!--Core CSS -->
		<link href="<?php echo base_url(); ?>application/third_party/assets/bs3/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>application/third_party/assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap-reset.css" rel="stylesheet">
		<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/clndr.css" rel="stylesheet">
		<!--clock css-->
		<link href="<?php echo base_url(); ?>application/third_party/assets/js/css3clock/css/style.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/<?php echo THEME; ?>.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/style-responsive.css" rel="stylesheet" />
		<!--external css-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/third_party/assets/js/gritter/css/jquery.gritter.css" />
		<!--dynamic table-->
		<link href="<?php echo base_url(); ?>application/third_party/assets/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/third_party/assets/js/bootstrap-datepicker/css/datepicker.css" />
		<?php 
			if($this->router->fetch_method() == "view_mainconfig")
			{
			?>
			<link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap-switch.css" />
			<?php
			}
		?>
		
		<!--Core js-->
		<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>application/third_party/assets/bs3/js/bootstrap.min.js"></script>
		<!--Core js-->
		<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
		
	</head>	