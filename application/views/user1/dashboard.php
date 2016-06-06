<?php
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
?>
<div id="main">
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">Dashboard</a></li>
	</ol>
	<!-- //breadcrumb-->
	<?php
		if($COUNT_ID == 0)
		{
		?>
		<script>alert("You will have been disabled after 48 hours,if don't deposit.")</script>;
		<?php
		}
	?>
	<div id="content">
		<div class="row">
			<div class="col-md-3">
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>REGISTRATION </strong> DATE </h5>
							<h4><?php echo $dash->REGISTRATION_DATE; ?>
							</h4>
						</section>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>IP  </strong> ADDRESS </h5>
							<h4><?php echo $ip; ?></h4>
						</section>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>LAST ACCOUNT  </strong> ACCESS </h5>
							<h4><?php echo date('F d, Y h:i:s a'); ?></h4>
						</section>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>Bitcoin  </strong> Rate </h5>
							<h4 class="conver"></h4>
						</section>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" >
				<section class="panel corner-flip">
					<div class="widget-chart bg-lightseagreen bg-gradient-green" id="chartContainer" style="height: 294px; width: 100%; padding-top: 0px; padding-left: 0px;border: #0AA699 4px solid;">
						
						
					</div>
					
				</section>
			</div>
		</div>
		<script type="text/javascript">
			window.onload = function () {
				var chart = new CanvasJS.Chart("chartContainer",
				{
					theme: "theme1",
					title:{
						text: "DAILY GROWTH (GBP Vs Days)"
					},
					animationEnabled: true,
					axisX: {
						title: "Days",
						valueFormatString: "DD-MMM",
						interval:1,
						intervalType: "day"
					},
					axisY:{
						title: "GBP",
						includeZero: false
					},
					data: [
					{        
						type: "line", 
						dataPoints: [
								
						<?php
							foreach($rec->result() as $row)
							{
							?>
							{ x: new Date(<?php echo $row->pay_date; ?>), y: <?php echo $row->cr_amt ?> },
							<?php
							}
						?>
						]
					}
					
					]
				});
				
				chart.render();
			}
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/canvasjs-1.8.0/canvasjs.min.js"></script>
		
		
		<?php /*
			<div class="row">
			<div class="col-md-12" >
			<section class="panel corner-flip">
			<div class="widget-chart bg-lightseagreen bg-gradient-green">
			
			<h2>TOTAL LEVEL INCOME</h2>
			<table class="flot-chart" data-type="lines" data-tick-color="rgba(255,255,255,0.2)" data-width="100%" data-height="220px">
			<thead>
			<tr>
			<th></th>
			<th style="color : red;">&euro; LEVEL</th>				
			</tr>
			</thead>
			<tbody>
			<?php
			foreach($rec2->result() as $row)
			{
			?>
			<tr>
			<th><?php echo $row->pay_date ?></th>
			<td> <i class="fa fa-gbp"></i> <?php echo $row->cr_amt ?></td>
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
		*/?>
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="well bg-inverse">
							<div class="widget-tile">
								<section>
									<h5><strong>ACCOUNT </strong> BALANCE </h5>
									<h2><i class="fa fa-gbp"></i> <?php echo $dash->WALLET_AMT;?></h2>
									<hr/>
									<label class="progress-label label-white"> <table width="100%">
										<tr>
											<td width="20%"><img src='<?php echo base_url()."application/libraries/assets/img/perr.png";?>' alt='Perfect Money' height="80%" width="80%" /></td>
											<td width="20%"><i class="fa fa-gbp fa-2x"> <?php echo $dash->WALLET_AMT;?></i></td>
											<td width="20%">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
											<td width="20%"><img src='<?php echo base_url()."application/libraries/assets/img/perfectmoney.png";?>' alt='Perfect Money' height="90%" width="90%" /></td>
											<td width="20%"><i class="fa fa-gbp fa-2x"> 0.00</i></td>
										</tr>
									</table>
									</label>
								</section>
								<div class="hold-icon"><i class="fa fa-gbp"></i></div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="well bg-info">
									<div class="widget-tile">
										<section>
											<h5><strong>TOTAL </strong> INVESTMENT </h5>
											<h2><i class="fa fa-gbp"> </i> <?php echo  $dash->TOTAL_INVESTMENT; ?> </h2>
											<hr/>
											<div class="progress-label label-white"> <h6>Active Investment <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-gbp"> </i> <?php echo  $dash->ACTIVE_INVESTMENT; ?></span></h6>
												<hr/>
											<h6>Last Investment  <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-gbp"> </i> <?php echo  $dash->LAST_INVESTMENT; ?></span></h6></div>
										</section>
										<div class="hold-icon"><i class="fa fa-money"></i></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="well bg-inverse">
									<div class="widget-tile">
										<section>
											<h5><strong>TOTAL   </strong> WITHDRAWALS </h5>
											<h2><i class="fa fa-gbp"> </i> <?php echo $dash->TOTAL_WITHDRAWN; ?></h2>
											<hr/>
											<div class="progress-label label-white"> <h6>Pending Withdrawal <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-gbp"> </i> <?php echo $dash->PENDING_WITHDRAWN; ?></span></h6>
												<hr/>
											<h6>Last Withdrawal  <span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-gbp"> </i> <?php echo $dash->LAST_WITHDRAWN; ?></span></h6></div>
										</section>
										<div class="hold-icon"><i class="glyphicon glyphicon-compressed"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<section class="panel">
					<div class="widget-clock">
						<div id="clock" style="width: 222px important;"></div>
					</div>
				</section>
				<section class="panel">
					<header class="panel-heading">
						<h2><strong>News</strong></h2>
						<label class="color">less than a minute ago</label>
					</header>
					<ul class="list-group">
						<?php
							$s=0;
							foreach($news->result() as $n)
							{
								$s++;
								if($s==4)
								{
									break;
								}
							?>
							<li class="list-group-item">
								<a href="<?php echo site_url("userprofile/view_all_news"); ?>"><span class="pull-right">...Read More</span>  <?php echo substr($n->m_news_des,0,50); ?></a>
							</li>
							<?php
							}
						?>
						<li class="list-group-item">
							<a href="<?php echo site_url("userprofile/view_all_news"); ?>">Click to View All News </a>
						</li>
					</ul>
				</section>
			</div>
		</div>
		
		<!-- //content > row-->
		
	</div>
	<!-- //content-->
</div>
<!-- //main-->																			