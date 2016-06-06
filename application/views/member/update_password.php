
<!--main content start-->
<section id="main-content">
	<section class="wrapper" id="rank">
		<!-- page start-->
		
		<div class="row">
			<div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
						Activate Members
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
                    <div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('member/update_password'); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Old Password<span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="password" id="txtoldpwd" name="txtoldpwd" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Old Password." value="<?php echo $value->or_login_pwd; ?>" readonly>
									<input type="hidden" id="txtoldhpwd" name="txtoldhpwd" value="<?php echo $value->or_login_pwd; ?>">
									<input type="hidden" id="txtuserid" name="txtuserid" value="<?php echo $value->or_user_id; ?>">
									<span id="divtxtuserid" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">New Password<span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="password" id="txtpassword" name="txtpassword" class="form-control empty" empty="yes" err_msg="Is Required" placeholder="Enter New Password.">
									<span id="divtxtpassword" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Confirm New Password<span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="password" id="txtcpassword" name="txtcpassword" class="form-control empty" empty="yes" err_msg="Is Required" placeholder="Confirm New Password.">
									<span id="divtxtcpassword" style="color:red"></span>
									<span id="divtxtconfirm" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('insert_data')">Update</button>
									<button class="btn btn-default" type="button">Cancel</button>
								</div>
							</div>
							
						</form>
						
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->																		