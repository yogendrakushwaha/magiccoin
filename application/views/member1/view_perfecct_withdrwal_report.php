<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">ADMIN</a></li>
		<li class="active"><a href="#">WITHDRAWN FROM PERFECTMONEY</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>VIEW </strong> Withdrawn From Perfectmoney</h2>
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
									<th>User Id</th>
									<th>Amount</th>
									<th>Order Id</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									foreach($page_data->result() as $rows)
									{
									?>
									<tr align="center">
										<td><?php echo $sn; ?></td>
										<td><?php echo $rows->m_w_reqdate; ?></td>
										<td><?php echo $rows->USERID; ?></td>
										<td nowrap><i class='fa fa-gbp'></i> <?php echo $rows->m_w_amount; ?></td>
										<td nowrap><?php echo $rows->m_order_id; ?></td>
										<td nowrap>
											<a class="btn" data-toggle="modal" data-target="#md-normal" title="Approve" onclick="$('#hdid').val(<?php echo $rows->w_id; ?>)">
												Approve
											</a>
											<a class="btn" data-toggle="modal" href="#md-reject"  title="Reject" onclick="$('#hdid1').val(<?php echo $rows->w_id; ?>)">
												Reject
											</a>											
										</td>
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

<!--
//////////////////////////////////////////////////////////////
//////////     MODAL NORMAL    //////////
//////////////////////////////////////////////////////////
-->
		<div id="md-normal" class="modal fade">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title">Request Approve</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					<p>
						<form method="post" action="<?php echo site_url('member/approve') ?>">
						<div class="row">
							<div class="col-md-4">Description</div>
							<div class="col-md-8"><textarea rows="4" cols="50" name="txtdescription" class="form-control" id="txtdescription" class="form-control"></textarea></div>
							<input type="hidden" name="hdid" id="hdid"/>
						</div>
						<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<input type="submit" name="submit" id="submit" value="Submit"/>
							</div>
						</div>
						</form>
					</p>
				</div>
				<!-- //modal-body-->
		</div>
		<!-- //modal-->
		
				<div id="md-reject" class="modal fade">
				<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title">Request Reject</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
					<p>
						<form method="post" action="<?php echo site_url('member/reject') ?>">
						<div class="row">
							<div class="col-md-4">Description</div>
							<div class="col-md-8"><textarea rows="4" cols="50" name="txtdescription" class="form-control" id="txtdescription" class="form-control"></textarea></div>
							<input type="hidden" name="hdid1" id="hdid1"/>
						</div>
						<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<input type="submit" name="submit" id="submit" value="Submit"/>
							</div>
						</div>
						</form>
					</p>
				</div>
				<!-- //modal-body-->
		</div>
		<!-- //modal-->