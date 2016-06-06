<!--main content start-->
<section id="main-content">
	<section class="wrapper" id="rank">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Search Direct Refferal
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form action="<?php echo base_url();?>member/view_direct_referal" method="post" class="form-horizontal" id="form_sample_1">
							
							<!--/row-->
							<div class="form-group">
								<label class="col-md-2 control-label">User ID<span class="required"> * </span></label>
								<div class="col-md-4"> 
									<input type="text" id="txtuserid" name="txtuserid"  class="form-control empty" placeholder="Enter your user Id.">
									<span id="divtxtuserid" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('form_sample_1')">Update</button>
									<button class="btn btn-default" type="reset">Cancel</button>
								</div>
							</div>
							
						</form>
					</div>
				</section>
			</div>
			
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Get Direct Referal
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
										<th>Login Id</th>
										<th>User Id</th>
										<th>Login Name</th>
										<th>Upliner Id</th>
										<th>Upliner Name</th>
										<th>Joining Date</th>
										<th>Position</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sn=1;
										foreach($rec->result() as $rows)
										{
										?>
										<tr>
											<td><?php echo $sn;?></td>
											<td><?php echo $rows->USER_USERID;?></td>
											<td><?php echo $rows->USER_HASHUSERID;?></td>
											<td><?php echo $rows->USER_NAME;?></td>
											<td><?php echo $rows->USER_UPLINERUSERID;?></td>
											<td><?php echo $rows->USER_UPLINERNAME;?></td>
											<td><?php echo $rows->USER_REGDATE;?></td>
											<td><?php echo $rows->USER_POSITION_DESC;?></td>
										</tr>   
									<?php 
										$sn++;
										}
										?>                    
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
<!--main content end-->