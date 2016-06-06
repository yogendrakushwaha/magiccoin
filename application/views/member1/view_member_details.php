<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">Menber Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>Search</strong> Member</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form action="<?php echo site_url('member/view_member_details'); ?>" method="post">
							
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">From Joining Date</label>
										<div class="input-group date form_datetime" data-picker-position="bottom-left"  data-date-format="yyyy-mm-dd" >
											<input type="text" class="form-control" name="frm_joindate" id="frm_joindate" parsley-required="true"  parsley-trigger="keyup" >
											<span class="input-group-btn btn-group-sm">
												<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">To Joining Date</label>
										<div class="input-group date form_datetime" data-picker-position="bottom-left"  data-date-format="yyyy-mm-dd">
											<input type="text" class="form-control" name="tojoin_date" id="tojoin_date" parsley-required="true"  parsley-trigger="keyup" >
											<span class="input-group-btn btn-group-sm">
												<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Email/Login Id</label>
										<input type="text" class="form-control" name="txtlogin" id="txtlogin" placeholder="Enter Login Id">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Mobile No</label>
										<input type="text" class="form-control" name="txtmob" id="txtmob" placeholder="Enter Mobile No" >
									</div>
								</div>
							</div>
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Submit</button>
									<button type="reset" class="btn"> Reset form</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View </strong> Member Details </h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
							<thead>
								<tr>
									<th>S No.</th>
									<th>User Id</th>
									<th>User Name</th>
									<th>Sponsor</th>
									<th>Mobile No</th>
									<th>Email/Login Id</th>
									<th>Password</th>
									<th>Transaction Password</th>
									<th>Joining Date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									foreach($rec->result() as $rows)
									{
									?>
									<tr align="center">
										<td><?php echo $sn;?></td>
										<td><?php echo $rows->USER_USERID;?></td>
										<td><?php echo $rows->USER_NAME;?></td>
										<td><?php echo $rows->USER_INTRO_USERID.'<b><span style="color:red">/</span></b>'.$rows->USER_INTRONAME;?></td>
										<td><?php echo $rows->USER_MOBILE;?></td>
										<td><?php echo $rows->USER_EMAIL;?></td>
										<td><?php echo $rows->USER_PWD;?></td>
										<td><?php echo $rows->USER_PIN_PWD;?></td>
										<td><?php echo date('d F Y',strtotime($rows->USER_DOJ));?></td>
										<td><a href="<?php echo base_url().'index.php/member/update_details/'.$rows->USER_REG; ?>" > View/Update Full Details </a></td>
									</tr>   
									<?php 
										$sn++;
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