<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Master</a></li>
		<li class="active"><a href="#">Update Password</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Update</strong> Password</h2>
						</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('member/update_password'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
							
							<div class="form-group">
								<label class="control-label">Old Password</label>
								<div>
									<input type="password" id="txtoldpwd" name="txtoldpwd" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Old Password." value="<?php echo $value->or_login_pwd; ?>" readonly>
									<input type="hidden" id="txtoldhpwd" name="txtoldhpwd" value="<?php echo $value->or_login_pwd; ?>">
									<input type="hidden" id="txtuserid" name="txtuserid" value="<?php echo $value->or_user_id; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">New Password</label>
								<div>
									<input type="password" id="txtnewpwd" name="txtnewpwd" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter New Password.">
									<span id="divtxtnewpwd" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Confirm New Password</label>
								<div>
									<input type="password" id="txtcnewpwd" name="txtcnewpwd" class="form-control" empty="yes" err_msg="Is Required" placeholder="Confirm New Password.">
									<span id="divtxtcnewpwd" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Update</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
	
	
</div>
<!-- //main-->																			