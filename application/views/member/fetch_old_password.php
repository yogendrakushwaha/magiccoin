<!--main content start-->
<section id="main-content">
	<section class="wrapper" id="rank">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						User Login Password Change
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" action="<?php echo site_url('member/fetch_password'); ?>" method="post" id="insert_data">
								<div class="form-group">
									<label class="col-md-3 control-label">User ID<span class="required"> * </span></label>
									<div class="col-md-9"> 
										<input type="text" id="txtuserid" name="txtuserid" value="<?php echo $userid; ?>" class="form-control" placeholder="Enter Email Id.">
										<span id="divtxtuserid" style="color:red"></span>
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
					</div>
				</section>
			</div>
			
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						User Login Password Change
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="adv-table">
							<table  class="display table table-bordered table-striped" id="dynamic-table">
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
											<td><?php echo $sn; ?></td>
											<td><?php echo $rows->or_login_id;?></td>
											<td><?php echo $rows->or_login_pwd;?></td>
											<td>
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
					</div>
				</section>
			</div>
			
			<div class="row">
				<div class="col-md-offset-6 col-lg-6">
					<section class="panel">
						<header class="panel-heading">
							User Login Password Change
							<span class="tools pull-right">
								<a class="fa fa-chevron-down" href="javascript:;"></a>
								<a class="fa fa-cog" href="javascript:;"></a>
								<a class="fa fa-times" href="javascript:;"></a>
							</span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
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
												<td><?php echo $sn; ?></td>
												<td><?php echo $rows->or_login_id;?></td>
												<td><?php echo $rows->or_pin_pwd;?></td>
												<td>
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
						</div>
					</section>
				</div>
			</div>
			
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->		