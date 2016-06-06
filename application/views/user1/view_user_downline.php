<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">View Downline</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
		
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View </strong> Downline </h2>
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
									<th>User Id/User Name</th>
									<th>Sponser Id/Name</th>
									<th>Email</th>
									<th>Joining Date</th>
									<th>Investment</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									foreach($rec->result() as $rows)
									{
									?>
									<tr align="center">
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $rows->USER_USERID.'/'.$rows->USER_NAME;?></td>
										<td align="center"><?php echo $rows->USER_INTRO_USERID.'/'.$rows->USER_INTRONAME;?></td>
										<td align="center"><?php echo $rows->USER_EMAIL;?></td>
										<td align="center"><?php echo date('d F Y',strtotime($rows->USER_DOJ));?></td>
										<td align="center"><i class="fa fa-gbp"></i> <?php echo $rows->USER_INVESTMENT;?></td>
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