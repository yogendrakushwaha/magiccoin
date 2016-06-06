<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			$(function() {
				$.gritter.add({
					// (string | mandatory) the heading of the notification
					title: 'Massage',
					// (string | mandatory) the text inside the notification
					text: '<?php echo $this->session->flashdata('info');?>'
				});
				return false;
			});
		<?php } ?>
	});
</script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Make Deposit
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/insert_make_deposit'); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Your Amount <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtamount" name="txtamount" class="form-control numeric" placeholder="Enter your desired investment amount in USD" >
									<span id="divtxtamount" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group" id='container'>
								<label class="col-md-3 control-label">Your Payment Method <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<div class="radio-list">
										<label class="radio-inline">
										<input type="radio" name="payment_method" checked onclick="change_url(1)" value="1">Peer2peer</label>
										<label class="radio-inline">
										<input type="radio" name="payment_method" onclick="change_url(2)" value="2">Perfectmoney</label>
									</div>
								</div>
							</div>
							
							<div class="form-group" id="rank" style="display:none;">
								<label class="col-md-3 control-label">Your Perfectmoney Account <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<div id="select_per">
										<select name="ddperfect" id="ddperfect" class="form-control">
											<option value="-1">Select</option>
										</select>
									</div>
									<span id="divddperfect" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('insert_data')">Make Deposit</button>
									<button class="btn btn-default" type="reset">Cancel</button>
								</div>
							</div>
							
						</form>
						</div>
				</section>
			</div>
		</div>
		
		<!-- page end-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						View Deposit details
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="adv-table">
							<table  class="display table table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th>S No.</th>
										<th>Request Date</th>
										<th>Approve Date</th>
										<th>Remaining Date</th>
										<th>User Id</th>
										<th>Payment Type</th>
										<th>Amount</th>
										<th>Status</th>
										<th>Reject</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sn=1;
										$sum=0;
										foreach($page_data->result() as $rows)
										{ 
										?>
										<tr>
											<td><?php echo $sn; ?></td>
											<td><?php echo $rows->m_top_reqdate; ?></td>
											<td nowrap><?php echo $rows->m_top_approvedate; ?></td>
											<td nowrap>
												<?php 
													if($rows->m_top_status==1)
													{
														echo $rows->remaining_time;
													} 
												?>
											</td>
											<td><?php echo $rows->USERID; ?></td>
											<td><?php echo $rows->payment_type; ?></td>
											<td nowrap><i class='fa fa-gbp'></i> <?php echo $rows->m_top_amount; ?></td>
											<td nowrap><?php echo $rows->TOP_STATUS; ?></td>
											<td nowrap>
												<?php 
													if($rows->m_top_status=='1')
													{
													?>
													<a href="<?php echo base_url(); ?>userprofile/reject_deposit/<?php echo $rows->m_top_id; ?>" class="btn btn-info btn-xs">Reject</a>
													<?php
													}
												?>
											</td>
										</tr>   
										<?php 
											$sum=$sum+$rows->m_top_amount;
											$sn++;
										}
									?> 
									<tr>
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td nowrap>Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
<!--main content end-->