<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			$(function() {
				$.gritter.add({
					// (string | mandatory) the heading of the notification
					title: 'Massage',
					// (string | mandatory) the text inside the notification
					text: '<?php echo $this->session->flashdata('info');?>'
				});
				return false;
			});
		<?php } ?>
	});
</script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Update Password
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" action="<?php echo site_url('userprofile/update_password'); ?>" method="post" id="signupForm">
								
								<div class="form-group">
									<label class="col-md-3 control-label">Old Password<span class="required"> * </span></label>
									<div class="col-md-9"> 
										<input type="password" id="txtoldpassword" name="txtoldpassword" class="form-control" placeholder="Enter Old Password." value="" onblur="validte_password();">
										<span id="divtxtoldpassword" style="color:red"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">New Password<span class="required"> * </span></label>
									<div class="col-md-9"> 
										<input type="password" id="txtpassword" name="txtpassword" class="form-control"  placeholder="Enter New Password.">
										<span id="divtxtpassword" style="color:red"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Confirm New Password<span class="required"> * </span></label>
									<div class="col-md-9"> 
										<input type="password" id="txtrepassword" name="txtrepassword" class="form-control" placeholder="Confirm New Password.">
										<span id="divtxtrepassword" style="color:red"></span>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
										<button type="button" class="btn btn-primary" onclick="conwv('signupForm')">Update</button>
										<button class="btn btn-default" type="reset">Cancel</button>
									</div>
								</div>
							</form>
							
						</div>
					</div>
				</div>
				
				
				
				
				
				
				<div class="col-lg-6">
					<section class="panel">
						<header class="panel-heading">
							Update Pin Password
							<span class="tools pull-right">
								<a class="fa fa-chevron-down" href="javascript:;"></a>
								<a class="fa fa-cog" href="javascript:;"></a>
								<a class="fa fa-times" href="javascript:;"></a>
							</span>
						</header>
						<div class="panel-body">
							<div class="form">
								<form class="form-horizontal" action="<?php echo site_url('userprofile/update_pin_password'); ?>" method="post" id="insert_data1">
									
									<div class="form-group">
										<label class="col-md-3 control-label">Old Password<span class="required"> * </span></label>
										<div class="col-md-9"> 
											<input type="password" id="txtoldppassword" name="txtoldppassword" class="form-control" placeholder="Enter Old Password." value="" onblur="validte_pin_password()">
											<span id="divtxtoldppassword" style="color:red"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">New Password<span class="required"> * </span></label>
										<div class="col-md-9"> 
											<input type="password" id="txtpassword" name="txtpassword" class="form-control"  placeholder="Enter New Password.">
											<span id="divtxtpassword" style="color:red"></span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-3 control-label">Confirm New Password<span class="required"> * </span></label>
										<div class="col-md-9"> 
											<input type="password" id="txtrepassword" name="txtrepassword" class="form-control" placeholder="Confirm New Password.">
											<span id="divtxtrepassword" style="color:red"></span>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-lg-offset-3 col-lg-6">
											<button type="button" class="btn btn-primary" onclick="conwv('insert_data1')">Update</button>
											<button class="btn btn-default" type="reset">Cancel</button>
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</section>
	</div>
</div>
<!-- page end-->
</section>
</section>
<!--main content end-->