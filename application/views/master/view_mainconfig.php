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
<?php
	foreach($config->result() as $row)
	{
		break;
	}
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Software Settings
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="cmxform form-horizontal" id="signupForm" method="post" action="<?php echo base_url()."master/update_mainconfig/".$row->m00_id; ?>">
								<div class="form-group ">
									<div class="row">
										<div class="col-lg-4">
											<label for="firstname" class="control-label col-lg-4">Project Name</label>
											<div class="col-lg-8">
												<input type="text" id="txtprojname" name="txtprojname" class="form-control empty" placeholder="Enter Project Name." value="<?php echo $row->m00_sitename;?>">
												<span id="divtxtprojname" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="firstname" class="control-label col-lg-4">Website Name</label>
											<div class="col-lg-8">
												<input type="text" id="txtwebsite" name="txtwebsite" class="form-control empty" placeholder="Enter Website Name." value="<?php echo $row->m00_website_name;?>">
												<span id="divtxtwebsite" style="color:red"></span>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="form-group ">
									<div class="row">
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">Email Address</label>
											<div class="col-lg-8">
												<input type="text" id="txtemail" name="txtemail" readonly="true" class="form-control" placeholder="Enter Email Address." value="<?php echo $row->m00_email;?>">
												<span id="divtxtemail" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">Email Password</label>
											<div class="col-lg-8">
												<input type="password" id="txtemailpwd" name="txtemailpwd" readonly="true" class="form-control empty" placeholder="Enter Email Address." value="<?php echo $row->m00_email_password;?>">
												<span id="divtxtemailpwd" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">Email Status</label>
											<div class="col-lg-8">
												<div class="m-bot20">
													<input type="checkbox" id="chkemail" name="chkemail" <?php echo ($row->m00_email_send==1)?'checked':'';?> value="1">
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="form-group ">
									<div class="row">
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">SMS Account Id</label>
											<div class="col-lg-8">
												<input type="text" id="txtsmsacc" name="txtsmsacc" class="form-control empty" placeholder="Enter Account Id." value="<?php echo $row->m00_sms_username;?>">
												<span id="divtxtsmsacc" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">SMS Account Pwd</label>
											<div class="col-lg-8">
												<input type="password" id="txtsmspwd" name="txtsmspwd" class="form-control empty" placeholder="Enter SMS Account Pwd." value="<?php echo $row->m00_sms_pwd;?>">
												<span id="divtxtsmspwd" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">SMS Send Status</label>
											<div class="col-lg-8">
												<div class="m-bot20">
													<input type="checkbox" id="chksmsstatus" name="chksmsstatus" <?php echo ($row->m00_sms_send==1)?'checked':'';?> value="1">
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								
								<div class="form-group ">
									<div class="row">
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">SMS Sender Id</label>
											<div class="col-lg-8">
												<input type="text" id="txtsenderid" name="txtsenderid" class="form-control empty" placeholder="Enter SMS Sender Id." value="<?php echo $row->m00_sms_senderid;?>">
												<span id="divtxtsenderid" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="lastname" class="control-label col-lg-4">Admin Theme</label>
											<div class="col-lg-8">
												<select id="txttheme" name="txttheme" class="form-control opt">
													<option value="1">Default-theme</option>
													<option value="2">Blue-theme</option>
													<option value="3">Green-theme</option>
													<option value="4">Orange-theme</option>
													<option value="5">Purple-theme</option>
													<option value="6">Turquoise-theme</option>
												</select>
												<span id="divtxttheme" style="color:red"></span>
											</div>
										</div>
										
									</div>
								</div>
								
								<div class="form-group ">
									<div class="row">
										<div class="col-lg-4">
											<label for="username" class="control-label col-lg-4">Login Id</label>
											<div class="col-lg-8">
												<input type="text" id="txtusername" name="txtusername" class="form-control empty" placeholder="Enter User Name." value="<?php echo $row->m00_username;?>">
											<span id="divtxtusername" style="color:red"></span></div>
										</div>
										
										<div class="col-lg-4">
											<label for="password" class="control-label col-lg-4">Login Password</label>
											<div class="col-lg-8">
												<input type="password" id="txtuserpass" name="txtuserpass" class="form-control" placeholder="Enter User Password." value="<?php echo $row->m00_password;?>">
												<span id="divtxtuserpass" style="color:red"></span>
											</div>
										</div>
										
										<div class="col-lg-4">
											<label for="confirm_password" class="control-label col-lg-4">Login PinPwd</label>
											<div class="col-lg-8">
												<input type="password" id="txtuserpinpass" name="txtuserpinpass" class="form-control" placeholder="Enter User Pin Password." value="<?php echo $row->m00_pinpassword;?>">
												<span id="divtxtuserpinpass" style="color:red"></span>
											</div>
										</div>
										
									</div>
								</div>
								
								
								<div class="form-group ">
									<div class="row">
										<div class="col-lg-4">
											<label for="email" class="control-label col-lg-4">Description</label>
											<div class="col-lg-8">
												<textarea id="txtdesc" name="txtdesc" rows="3" col="9" data-height="auto" placeholder="Enter Project Description." class="form-control"><?php echo $row->m00_description;?></textarea>
												<span id="divtxtdesc" style="color:red"></span>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm')">Update</button>
										<button class="btn btn-default" type="button">Cancel</button>
									</div>
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