<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Search Form
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form action="<?php echo base_url(); ?>member/search_member" class="horizontal-form" method="post">
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									
									<div class="form-body">
										<!--/row-->
										<div class="row">
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">From Joining Date<span class="required"> * </span></label>
													<input type="text" id="frm_joindate" name="frm_joindate"  class="form-control default-date-picker" placeholder="Date.">
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">To Joining Date</label>
													<input type="text" id="tojoin_date" name="tojoin_date"  class="form-control default-date-picker" data-date-form="yyyy-mm-dd" placeholder="Date.">
												</div>
											</div>
											<!--/span-->
										</div>
										<!--/row-->
										<div class="row">
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Login Id<span class="required"> * </span></label>
													<input type="text" id="txtlogin" name="txtlogin"  class="form-control input-inline input-medium" placeholder="Enter login id.">
												</div>
											</div>
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Mobile No</label>
													<input type="text" id="txtmob" name="txtmob"  class="form-control input-inline input-medium" placeholder="Enter Mobile No.">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Email</label>
													<input type="text" id="txtemail" name="txtemail"  class="form-control input-inline input-medium" placeholder="Enter Email."> 
												</div>
											</div>
											<!--/span-->
										</div>
									</div>
									<div id="function" class="form-actions right">
										<button class="btn btn-primary" type="submit">Submit</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			
			
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Search Result
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
										<th>Associate</th>
										<th>Joining Date</th>
										<th>Country</th>
										<th>Mobile No</th>
										<th>Email</th>
										<th>Password</th>
										<th>Transaction Password</th>
										<th>Last Login</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sn=1;
										foreach($rid->result() as $rows)
										{?>
										
										<tr>
											<td><?php echo $sn; ?></td>
											<td><?php echo $rows->USER_USERID;?></td>
											<td><?php echo $rows->USER_HASHUSERID;?></td>
											<td><?php echo $rows->USER_NAME;;?></td>
											<td><?php echo $rows->USER_REGDATE;;?></td>
											<td><?php echo $rows->USER_COUNTRYNAME;?></td>
											<td><?php echo $rows->USER_MOBILE;?></td>
											<td><?php echo $rows->USER_EMAIL;?></td>
											<td><?php echo $rows->USER_PWD;?></td>
											<td><?php echo $rows->USER_PIN_PWD;?></td>
											<td><?php echo $rows->USER_LAST_LOGIN;?></td>
										</tr>   
									<?php $sn++; }?>      
								</tbody>
								
							</table>
						</div>
						
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->	