<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">ADMIN</a></li>
		<li class="active"><a href="#">SCHEDULE LINKS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>SEARCHING </strong>WITHDRAWN</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('member/view_scheduling'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">From Date</label>
										<div class="input-group date form_datetime" data-picker-position="bottom-left" data-date-start-date="+0d"  data-date-format="dd MM yyyy" >
											<input type="text" class="form-control" name="txtfrom" id="txtfrom" placeholder="Enter From Date.">
											<span class="input-group-btn btn-group-sm">
												<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">To Date</label>
										<div class="input-group date form_datetime" data-picker-position="bottom-left" data-date-start-date="+0d"  data-date-format="dd MM yyyy" >
											<input type="text" class="form-control" name="txtto" id="txtto" placeholder="Enter To Date.">
											<span class="input-group-btn btn-group-sm">
												<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
							
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Depositor Id</label>
										<div>
											<input type="text" id="txtdepositor" name="txtdepositor" class="form-control" placeholder="Enter User Id.">
										</div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Beneficiary Id</label>
										<div>
											<input type="text" id="txtbene" name="txtbene" class="form-control" placeholder="Enter User Id.">
										</div>
									</div>
								</div>
								
							</div>

							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Search</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
			
		</div>
		
		<div class="row">
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>SCHEDULE </strong> LINKS REPORT</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div style="overflow:auto">
						<table class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
							<thead>
								<tr>
									<th>S No.</th>
									<th>DATE</th>
									<th>RECEIVED LOGIN ID</th>
									<th>GIVEN LOGIN ID</th>
									<th>ORDER ID</th>
									<th>AMOUNT</th>
									<th>BANK HOLDER NAME</th>
									<th>PHONE NO</th>
									<th>ACCOUNT NO</th>
									<th>BANK NAME</th>
									<th>BRANCH NAME</th>
									<th>SWIFT CODE</th>
									<th>RECIPT</th>
									<th colspan=2>STATUS</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($recive->result() as $row)
									{ 
									?>
									<tr>
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $row->SCHEDULEREQDATE;?></td>
										<td align="center"><?php echo $row->DEPOSITORUSERID;?></td>
										<td align="center"><?php echo $row->BENIUSERID;?></td>
										<td align="center"><?php echo $row->SCHEDULEORDERID; ?></td>
										<td align="center"><?php echo $row->SCHEDULEAMOUNT;?></td>
										<td align="center"><?php echo ucwords(($row->BENIUSERID=='')?$admin_bank_detail->or_m_name:$row->BENIBANKHOLDERNAME); ?></td>
										<td align="center"><?php echo ($row->BENIUSERID=='')?$admin_bank_detail->or_m_mobile_no:$row->BENIMOBILE; ?></td>
										<td align="center"><?php echo ($row->BENIUSERID=='')?$admin_bank_detail->or_m_b_cbsacno:$row->BANKACCNO; ?></td>
										<td align="center"><?php echo ($row->BENIUSERID=='')?$admin_bank_detail->or_m_b_name:$row->BENIBANKNAME; ?></td>
										<td align="center"><?php echo ($row->BENIUSERID=='')?$admin_bank_detail->or_m_b_branch:$row->BENIBANKBRANCHNAME; ?></td>
										<td align="center"><?php echo ($row->BENIUSERID=='')?$admin_bank_detail->or_m_b_ifscode:$row->BENIBANKIFSC; ?></td>
										<td align="center"><a href="<?php echo base_url(); ?>application/recipt/<?php echo $row->RECIPT;?>" target="_blank"><?php echo $row->RECIPT;?></a></td>
										<td align="center">
										<?php
										if($row->SCHEDULESTATUS == 1)
										{
										?>
											Pending
										<?php
										}
										if($row->SCHEDULESTATUS == 2)
										{
										?>
											Approve
										<?php
											}
											if($row->SCHEDULESTATUS == 0)
											{
										?>
											Reject Link
											<?php
											}
											?>
										</td>
									</tr>   
									<?php 
										$sum=$sum+$row->SCHEDULEAMOUNT;
										$sn++;
									} 
								?> 
									<tr>
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center">Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>	
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
									</tr>
							</tbody>
						</table>
					</div>
					</div>
				</section>
			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
</div>
<!-- //main-->