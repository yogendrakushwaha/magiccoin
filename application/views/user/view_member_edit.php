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
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Associate Edit Details
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							
							<?php
								foreach($info->result() as $rinfo)
								{
								?>
								<!-- BEGIN FORM-->
								<hr>
								<form action="<?php echo site_url('userprofile/update_candidate'); ?>" class="horizontal-form"  id="signupForm1" method="post" enctype="multipart/form-data">
									<div class="form-body">
										<!--/row-->
										<h3 class="form-section">Introducer Details</h3>
										<div class="row">
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Introducer Associate Id <span class="required"> * </span></label>
													<input type="text" class="form-control alpha_numeric" name="txtintroducer_id" id="txtintroducer_id" value="<?php echo $rinfo->USER_INTROUSER;?>" readonly>
													<input type="hidden" name="txtregid" id="txtregid" value="<?php echo $rinfo->USER_REGID;?>" readonly>
													<span id="divtxtintroducer_id" style="color:red"></span>		
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Introducer Associate Name</label>
													<input type="text" class="form-control" name="txtintroducer_name" id="txtintroducer_name" value="<?php echo $rinfo->USER_INTRONAME;?>" readonly  >
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Profile Image</label>
													<input type="file" name="userfile" id="userfile" class="default" accept="image/*" />
												</div>
											</div>
											
										</div>
										<!--/row-->
										
										<h3 class="form-section">Personal Details</h3>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Applicant Name <span class="required"> * </span></label>
												</div>
												<div class="form-group">
													<input type="text" class="form-control empty"  name="txtassociate_name" id="txtassociate_name" value="<?php echo $rinfo->USER_NAME;?>">	
													<span id="divtxtassociate_name" style="color:red"></span>														
												</div>
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Father/Husband's Name <span class="required"> * </span></label>
												</div>
												<div class="form-group"><input type="text" class="form-control" name="txtparent" id="txtparent" value="<?php echo $rinfo->USER_PARNT;?>">
													<span id="divtxtparent" style="color:red"></span>
												</div>
											</div>
											
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Date of Birth</label>
												</div>
												<div class="form-group">										
													<input name="txtdob" id="txtdob" class="form-control default-date-picker empty" data-date-format="yyyy-mm-dd" type="text" value="<?php echo $rinfo->USER_DOB;?>"/>
												</div>
											</div>
											<div class="col-2" id="gender">
												<div class="form-group">
													<label class="control-label">Gender</label>
												</div>
												<div class="form-group">
													<div class="radio-list">
														<label class="radio-inline">
														<input type="radio" name="rbgender" id="rbgender1" value="1" <?php echo ($rinfo->USER_GENDER=='1')?'checked':''; ?>>Male</label>
														<label class="radio-inline">
														<input type="radio" name="rbgender" id="rbgender2" value="0" <?php echo ($rinfo->USER_GENDER=='0')?'checked':''; ?>>Female</label>
													</div>
												</div>
											</div>
										</div>
										
										
										<div class="row">
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Country<span class="required"> * </span></label>
													<div id="state">
														<select id="ddcountry" name="ddcountry" class="form-control opt">
															<option value="-1">Select State</option>
															<?php 
																foreach($country->result() as $row)
																{
																?>
																<option value="<?php echo $row->country_id; ?>" <?php if($row->country_id==$rinfo->USER_COUNTRY){echo 'selected';} ?>><?php echo $row->name; ?></option>
																<?php
																}
															?>
														</select>
														<span id="divddcountry" style="color:red"></span>
													</div>
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Pincode</label>
													<input type="text" class="form-control" name="txtpincode" id="txtpincode" maxlength="6" value="<?php echo $rinfo->USER_PINCODE;?>">										
												</div>
											</div>
										</div>
										
										<!--row-->
										
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<label class="control-label">Address </label>
													<textarea class="form-control" name="txtaddress" id="txtaddress"><?php echo $rinfo->USER_ADDRESS;?></textarea>
												</div>
											</div>
											
											<!--/span-->
										</div>
										
										<!--row-->
										<h3 class="form-section">Contact Details</h3>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Mobile Number<span class="required"> * </span> </label>
													<input type="text" class="form-control" name="txtmobile" id="txtmobile" maxlength="10" value="<?php echo $rinfo->USER_MOBILE;?>">	
													<span id="divtxtphone" style="color:red"></span>															
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Email Address<span class="required"> * </span></label>
													<input type="text" class="form-control" name="txtemail" id="txtemail" value="<?php echo $rinfo->USER_EMAIL;?>">
													<input type="hidden" name="txtproc" id="txtproc" value="2">
													<span id="divtxtemail" style="color:red"></span>															
												</div>
											</div>
											<!--/span-->
										</div>
										
									</div>
									<div id="function" class="form-actions right">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm1')">Update</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>
									
								</form>
								<!-- END FORM-->
								<?php
								}
							?>
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