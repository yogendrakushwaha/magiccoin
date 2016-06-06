<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Master</a></li>
		<li class="active"><a href="#">Fetch Old Password</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Change</strong> Password</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form parsley-validate class="form-horizontal" action="<?php echo site_url('member/fetch_password'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="form-group">
								<label class="control-label">Email Id</label>
								<div>
									<input type="text" id="txtuserid" name="txtuserid" parsley-required="true" parsley-trigger="keyup" value="<?php echo $userid; ?>" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Email Id.">
									<span id="divtxtprojname" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Submit</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View</strong> Password </h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped" id="table-example">
							<thead>
								<tr>
									<th>S No.</th>
									<th>User Id</th>
									<th>Password</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sn=1;
									foreach($value->result() as $rows)
									{
									?>
									<tr>
										<td align="center"><?php echo $sn; ?></td>
										<td align="center"><?php echo $rows->or_login_id;?></td>
										<td align="center"><?php echo $rows->or_login_pwd;?></td>
										<td align="center">
											<a href="<?php echo site_url('member/view_update_password/'.$rows->or_user_id); ?>" title="Change login Password">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
									</tr>
									<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
			
			<div class="col-md-offset-6 col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View</strong> Pin Password </h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table  class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
							<thead>
								<tr>
									<th>S No.</th>
									<th>User Id</th>
									<th>Pin Password</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sn=1;
									foreach($value->result() as $rows)
									{
									?>
									<tr>
										<td align="center"><?php echo $sn; ?></td>
										<td align="center"><?php echo $rows->or_login_id;?></td>
										<td align="center"><?php echo $rows->or_pin_pwd;?></td>
										<td align="center">
											<a href="<?php echo site_url('member/view_update_pin_password/'.$rows->or_user_id); ?>" title="Change login Password">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
									</tr>
									<?php 
									}
								?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
	
	
</div>
<!-- //main-->																			