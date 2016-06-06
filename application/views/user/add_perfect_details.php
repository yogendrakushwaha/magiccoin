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
						Add Perfectmoney Details
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/insert_perfect_details'); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Currency <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<select name="ddcurrency" id="ddcurrency" class="form-control opt">
										<option value="">Select</option>
										<option value="1">&#x0E3F; BTC</option>
										<option value="2">&#x20B2; GOLD</option>
										<option value="3">&#x24; USD</option>
										<option value="4">&euro; EUR</option>
									</select>
									<span id="divddcurrency" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Perfectmoney Account No <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type='text' class="form-control empty" name="txtperfectacc" id="txtperfectacc" placeholder="Enter Your Perfectmoney account no here" >
									<span id="divtxtperfectacc" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('insert_data')">Add Details</button>
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
						View Perfectmoney Details
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
										<th>Account Holder Name</th>
										<th>Currency Type</th>
										<th>Account No.</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sn=1;
										foreach($perfect->result() as $rows)
										{
										?>
										<tr>
											<td><?php echo $sn;?></td>
											<td><?php echo $rows->or_m_name;?></td>
											<td><?php echo $rows->curr_type; ?></td>
											<td><?php echo $rows->m_pfect_acc; ?></td>
											<td>
												<a href="<?php echo base_url(); ?>userprofile/edit_perfect_details/<?php echo $rows->m_pfect_id;?>"><i class="fa fa-pencil-square"></i> Edit</a>
												/ 
												<?php 
													if($rows->m_pfect_status==1)
													{
													?>
													<a href="<?php echo base_url(); ?>userprofile/status_perfect_details/<?php echo $rows->m_pfect_id;?>/0"><i class="fa fa-trash-o"></i> Disable</a>
													<?php 
													}
													else
													{
													?>
													<a href="<?php echo base_url(); ?>userprofile/status_perfect_details/<?php echo $rows->m_pfect_id;?>/1"><i class="fa fa-undo"></i> Enable</a>
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