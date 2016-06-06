<?php
	require_once( BASEPATH.'database/DB'.EXT );
	$db =& DB();
	$CI =& get_instance();
	$system = array(
	'log_heading'=>$heading,
	'log_action'=>'',
	'log_severity'=>'',
	'log_message'=>$message,
	'log_filename'=>'',
	'log_line'=>'',
	'log_date'=>CURR_DATE
	);
	$db->insert('system_log',$system);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo DESCRIPTION; ?>">
		<meta name="author" content="<?php echo WEBSITE_NAME; ?>">
		<link rel="shortcut icon" href="images/favicon.png">
		
		<title>Error</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap-reset.css" rel="stylesheet">
		<!--external css-->
		<link href="<?php echo base_url(); ?>application/third_party/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>application/third_party/assets/css/style-responsive.css" rel="stylesheet" />
	</head>
	
	<body class="body-500">
		
		<div class="error-head"> </div>
		
		<div class="container ">
			
			<section class="error-wrapper text-center">
				<h1><img src="<?php echo base_url(); ?>application/third_party/assets/images/500.png" alt=""></h1>
				<div class="error-desk">
					<h2>OOOPS!!!</h2>
					<p class="nrml-txt-alt">Something went wrong.</p>
					<p>Why not try refreshing you page? Or you can <a href="#" class="sp-link">contact our support</a> if the problem persists.</p>
				</div>
				<a href="javascript:;" class="back-btn" onclick="history.back();"><i class="fa fa-home"></i> Back To Home</a>
			</section>
			
		</div>
		
		
	</body>
</html>