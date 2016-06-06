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
					<header class="panel-heading"> TRANSFER In Team <span class="tools pull-right"> <a class="fa fa-chevron-down" href="javascript:;"></a> <a class="fa fa-cog" href="javascript:;"></a> <a class="fa fa-times" href="javascript:;"></a> </span> </header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" action="<?php echo site_url('userprofile/transfer_to_user_amt'); ?>" method="post" id="signupForm">
								<div class="form-group">
									<label class="col-md-3 control-label">User Id<span class="required"> * </span></label>
									<div class="col-md-9">
										<input type="text" id="txtuser" name="txtuser" class="form-control empty" placeholder="User Id." value="<?php echo $this->session->userdata('user_id') ?>" readonly>
									<span id="divtxtuser" style="color:red"></span> </div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Recipient Login Id<span class="required"> * </span></label>
									<div class="col-md-9">
										<input type="text" id="txtrecipent" name="txtrecipent" class="form-control empty" placeholder="Enter Recipient Login Id" onblur="get_recipent_details()">
									<span id="divtxtrecipent" style="color:red"></span> </div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Amount<span class="required"> * </span></label>
									<div class="col-md-9">
										<input type="text" id="txtamount" name="txtamount" class="form-control empty" placeholder="Enter amount">
									<span id="divtxtamount" style="color:red"></span> </div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label">Password<span class="required"> * </span></label>
									<div class="col-md-9">
										<input type="password" id="txtpinpwd" name="txtpinpwd" class="form-control empty" placeholder="Password." onblur="validte_password();">
									<span id="divtxtpinpwd" style="color:red"></span> </div>
								</div>
								
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
										<button type="button" class="btn btn-primary" onclick="conwv('signupForm')">Transfer</button>
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