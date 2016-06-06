<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">ADMIN</a></li>
		<li class="active"><a href="#">WITHDRAWN</a></li>
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
						<form class="form-horizontal" action="<?php echo site_url('member/view_withdrawn_report'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
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
										<label class="control-label">Type</label>
										<div>
											<select class="form-control" name="ddtype" id="ddtype">
												<option value="-1">Select</option>
												<option value="1">Peer2peer</option>
												<option value="2">Perfectmoney</option>
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
									<th>Withdrawn Type</th>
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
										<td><?php echo $rows->Payment_type; ?></td>
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