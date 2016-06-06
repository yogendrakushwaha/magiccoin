<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">View Perfect Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
		
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View </strong> Perfect Details </h2>
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
									<th>Action</th>
									<th>User Id</th>
									<th>User Name</th>
									<th>Currency Type</th>
									<th>Account No.</th>
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
										<td align="center"><a href="javascript:void(0)" onclick="window.location.href='<?php echo base_url().'index.php/member/edit_perfect_details/'.$rows->m_pfect_id; ?>';"> <i class="fa fa-edit (alias) fa-2x"></i> </a></td>
										<td align="center"><?php echo $rows->or_m_user_id;?></td>
										<td align="center"><?php echo $rows->or_m_name;;?></td>
										<td align="center"><?php echo $rows->curr_type;?></td>
										<td align="center"><?php echo $rows->m_pfect_acc;?></td>
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