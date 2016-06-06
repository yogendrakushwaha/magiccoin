<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">WITHDRAWN</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>VIEW </strong> Withdrawn</h2>
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
									<th>Request Date</th>
									<th>Approve Date</th>
									<th>User Id</th>
									<th>Amount</th>
									<th>Order Id</th>
									<th>Status</th>
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
										<td><?php echo $sn; ?></td>
										<td><?php echo $rows->m_w_reqdate; ?></td>
										<td nowrap><?php echo $rows->m_w_approvedate; ?></td>
										<td><?php echo $rows->USERID; ?></td>
										<td nowrap><i class='fa fa-gbp'></i>  <?php echo $rows->m_w_amount; ?></td>
										<td nowrap><?php echo $rows->m_order_id; ?></td>
										<td nowrap><?php echo $rows->WITH_STATUS; ?></td>
									</tr>
									<?php 
									$sum=$sum+$rows->m_w_amount;
										$sn++;
									}
								?> 
									<tr align="center">
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td></td>
										<td></td>
										<td></td>
										<td nowrap>Total = <i class='fa fa-gbp'></i>  <?php echo $sum; ?></td>
										<td></td>
										<td></td>
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