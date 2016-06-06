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
						WITHDRAWN Request
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/insert_withdraw_details'); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Enter Your Amount</label>
								<div class="col-md-9"> 
									<input type='text' class="form-control empty" name="txtamount" id="txtamount" placeholder="Desired Withdrawn amount in USD" >
									<span id="divtxtamount" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Withdrawn From</label>
								<div class="col-md-9">
									<div class="radio-list">
										<label class="radio-inline">
										<input type="radio" name="payment_method" id="payment_method1" value="1" checked>peer2peer</label>
										<label class="radio-inline">
										<input type="radio" name="payment_method" id="payment_method2" value="0">perfectmoney</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('insert_data')">Withdrawn</button>
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
						View Withdrawn
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
                                        <th>User Id</th>
										<th>Withdrawal amount</th>
										<th>Reqdate</th>
										<th>Order Id</th>
                                        <th>Type</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sn=1;
										foreach($rec->result() as $rows)
										{
										?>
										<tr>
											<td><?php echo $sn;?></td>
											<td><?php echo $rows->USERID;?></td>
											<td><?php echo $rows->m_w_amount; ?></td>
											<td><?php echo $rows->m_w_reqdate; ?></td>
                                            <td><?php echo $rows->m_order_id; ?></td>
                                            <td><?php echo $rows->Payment_type; ?></td>
                                            
											<td>												 
												<?php 
													if($rows->m_w_status==1)
													{
													?>
													<a href="<?php echo base_url(); ?>userprofile/staus_withdraw_details/<?php echo $rows->w_id;?>/0" class="btn btn-info btn-xs"><i class="fa fa-trash"></i> Disable</a>
													<?php 
													}
													else
													{
													?>
													<a href="<?php echo base_url(); ?>userprofile/staus_withdraw_details/<?php echo $rows->w_id;?>/1" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i> Enable</a>
													<?php
													}
												?>
											</td>
										</tr>   
										<?php 
											$sn++;
										}
									?> 
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