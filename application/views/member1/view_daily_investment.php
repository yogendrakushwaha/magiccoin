<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">ADMIN</a></li>
		<li class="active"><a href="#">INVESTMENTS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>SEARCHING </strong> INVESTMENTS</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('member/view_daily_investment'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
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
										<label class="control-label">User Id</label>
										<div>
											<input type="text" id="txtuserid" name="txtuserid" class="form-control" placeholder="Enter User Id.">
										</div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Package</label>
										<div>
											<select class="form-control" name="ddpackage" id="ddpackage">
												<option value="-1">Select</option>
												<option value="1">BASIC PACKAGE</option>
												<option value="2">PREMIUM PACKAGE</option>
												<option value="3">GOLD PACKAGE</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Type</label>
										<div>
											<select class="form-control" name="ddtype" id="ddtype">
												<option value="-1">Select</option>
												<option value="1">INVESTMENTS</option>
												<option value="2">DAILY GROWTH</option>
											</select>
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
						<h2><strong>VIEW  </strong> INVESTMENTS</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>	
									<th>User Id</th>
									<th>Date</th>
									<th>Investment Id</th>
									<th>Package</th>
									<th>Order Id</th>
									<th>Total Days</th>
									<th>Remaining Days</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($page_data->result() as $rows)
									{ 
									?>
									<tr align="center">
										<td><?php echo $rows->INVEST_USERID; ?></td>
										<td><?php echo $rows->INVEST_DATE; ?></td>
										<td>LBI-<?php echo $rows->INVEST_COUNTERID; ?></td>
										<td><?php echo $rows->INVEST_PACKNAME; ?></td>
										<td><?php echo $rows->INVEST_ORDERID; ?></td>
										<td><?php echo $rows->INVEST_TOTAL_DAY; ?></td>
										<td><?php echo ($rows->INVEST_TOTAL_DAY-$rows->INVEST_PAIDDAY); ?></td>
										<td><i class='fa fa-gbp'></i> <?php echo $rows->INVEST_AMT; ?></td>
									</tr>   
									<?php
										$sum=$sum+$rows->INVEST_AMT;
										$sn++;
									}
								?> 
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td nowrap>Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
									</tr>  
							</tbody>
						</table>
					</div>
				</section>
			</div>
			
		</div>
		<!-- //content > row-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>DAILY  </strong> GROWTH</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>S No.</th>
									<th>Date</th>
									<th>User Id</th>
									<th>User Name</th>
									<th>Investment Id</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($ledger->result() as $rows)
									{ 
									?>
									<tr align="center">
										<td><?php echo $sn;?></td>
										<td><?php echo $rows->LEDGER_DATETIME;?></td>
										<td><?php echo $rows->LEDGER_USERID;?></td>
										<td><?php echo $rows->LEDGER_NAME;?></td>
										<td>LBI-<?php echo $rows->LEDGER_REFFID;?></td>
										<td><i class='fa fa-gbp'></i> <?php echo $rows->LEDGER_CR;?></td>
									</tr>   
									<?php 
										$sum=$sum+$rows->LEDGER_CR;
										$sn++;
									}
								?> 
									<tr>
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td nowrap align="center">Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
									</tr>
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