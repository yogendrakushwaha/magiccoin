<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">INVESTMENTS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
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