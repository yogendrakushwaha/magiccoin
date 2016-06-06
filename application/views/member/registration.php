<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			$(function() {
				$.gritter.add({
					// (string | mandatory) the heading of the notification
					title: '<?php echo $this->session->flashdata('info');?>',
					// (string | mandatory) the text inside the notification
					text: 'Hi User , you can use Username : <strong>Username</strong> and Password: <strong>*****</strong> to  access account.'
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
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Associate Registration
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form action="<?php echo site_url('member/register_candidate'); ?>" method="post" class="horizontal-form" id="signupForm">
								<div class="form-body">
									<!--/row-->
									<h3 class="form-section">Introducer Details</h3>
									<div class="row">
										<!--/span-->
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Introducer Associate Id <span class="required"> * </span></label>
												<input type="text" class="form-control empty" name="txtintroducer_id" id="txtintroducer_id" onblur="get_intro_detail()">
												<span id="divtxtintroducer_id" style="color:red"></span>
											</div>
										</div>
										<!--/span-->
										<div id="introducer">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Introducer Associate Name</label>
													<input type="text" class="form-control empty" name="txtintroducer_name" id="txtintroducer_name" readonly >
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Join Leg</label>
												</div>
												<div class="form-group" id="leg">
													<div class="radio-list">
														<label class="radio-inline">
														<input type="radio" name="rbjoin_leg" id="rbjoin_leg1" value="L" onClick="check_leg()">Left</label>
														<label class="radio-inline">
														<input type="radio" name="rbjoin_leg" id="rbjoin_leg2" value="R" onClick="check_leg()" >Right</label>
														<input type="hidden" value="0" id="txtjoin_leg" name="txtjoin_leg" />
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
									</div>
									
									
									<h3 class="form-section">Parent Details</h3>
									<div class="row">
										
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Parent Id <span class="required"> * </span></label>
												<input type="text" class="form-control empty" name="txtparent_id" id="txtparent_id"  readonly onblur="get_parent_detail()">
												<span id="divtxtparent_id" style="color:red"></span>
											</div>
										</div>
										
										<div id="introducer">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Parent Name</label>
													<input type="text" class="form-control empty" name="txtparent_name" id="txtparent_name" readonly >
												</div>
											</div>
										</div>
										
									</div>
									
									
									<h3 class="form-section">Personal Details</h3>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Applicant Name <span class="required"> * </span></label>
												<input type="text" class="form-control empty"  name="txtassociate_name" id="txtassociate_name">
												<span id="divtxtassociate_name" style="color:red"></span>														
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Father/Husband's Name </label>
												<input type="text" class="form-control" name="txtparent" id="txtparent">
												<span id="divtxtparent" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date of Birth</label>									
												<input name="txtdob" id="txtdob" class="form-control default-date-picker empty" data-date-format="yyyy-mm-dd" type="text"/>
												<span id="divtxtdob" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-2" id="gender">
											<div class="form-group">
												<label class="control-label">Gender</label>
												<div class="radio-list">
													<label class="radio-inline">
													<input type="radio" name="rbgender" id="rbgender1" value="1">Male</label>
													<label class="radio-inline">
													<input type="radio" name="rbgender" id="rbgender2" value="0">Female</label>
												</div>
											</div>
										</div>
									</div>
									
									
									<!--/span-->
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Country<span class="required"> * </span></label>
												<select id="ddcountry" name="ddcountry" class="form-control opt">
													<option selected="selected" value="-1">Select Country</option>
													<?php foreach($country->result() as $row)
														{
														?>
														<option value="<?php echo $row->country_id;?>"><?php echo $row->name;?></option>
														<?php
														}
													?>
												</select>
												<span id="divddcountry" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Pincode</label>
												<input type="text" class="form-control" name="txtpincode" id="txtpincode" maxlength="6">
												<span id="divtxtpincode" style="color:red"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label">Address </label>
												<textarea class="form-control" name="txtaddress" id="txtaddress"></textarea>
												<span id="divtxtaddress" style="color:red"></span>
											</div>
										</div>
									</div>
									
									<h3 class="form-section">Contact Details</h3>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Mobile Number<span class="required"> * </span> </label>
												<input type="text" class="form-control" name="txtmobile" id="txtmobile" maxlength="10" onblur="validate_mobile()">	
												<span id="divtxtmobile" style="color:red"></span>															
											</div>
										</div>
										<!--/span-->
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Email Address<span class="required"> * </span></label>
												<input type="text" class="form-control" name="txtemail" id="txtemail" onblur="validate_email()">
												<input type="hidden" name="txtproc" id="txtproc" value="1">
												<span id="divtxtemail" style="color:red"></span>															
											</div>
										</div>
										<!--/span-->
									</div>
									
									
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="checkbox" name="txtterm" id="txtterm" >
												<label class="control-label">By clicking the button below you confirm to have accepted the <?php  echo SITE_NAME; ?> Terms and Conditions and <a href="<?php echo base_url(); ?>index.php/master/view_term_condition" target="_blank">Privacy Policy </a>.</label>
											</div>
										</div>
									</div>
									
								</div>
								<div id="function" class="form-actions right">
									<button class="btn btn-primary" type="button" onclick="conwv('signupForm')" id="sbsubmit">Submit</button>
									<button type="reset" class="btn btn-default">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->	