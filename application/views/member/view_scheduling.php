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

<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<!--main content start-->
<section id="main-content">
	<section class="wrapper" id="rank">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						User Payment Scheduling
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form action="<?php echo base_url();?>member/scheduling_action" method="post" class="horizontal-form" id="form_sample_1">
							<div class="form-body">
								
								<!--/row-->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Depositor User Id <span class="required"> * </span></label>
											<select id="dddepositor" name="dddepositor" class="form-control opt">
												<option value="-1">Please select Depositor</option>
												<option value="0"  amt="0"> Admin </option>
												<?php 
													foreach($depositor->result() as $d)
													{
													?>
													<option value="<?php echo $d->m_top_id?>" amt="<?php echo $d->m_top_amount;?>" ><?php echo $d->USERID; ?></option>
													<?php 
													}
												?>
											</select>
											<span id="divdddepositor" style="color:red"></span>
											<input type="hidden" name="txtamount" id="txtamount" value="" />
											<input type="hidden" name="txttotamountdeposit" id="txttotamountdeposit" />
											<input type="hidden" id="txtquid" name="txtquid">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<br><span id="tot_balance" style="color:red"> </span><br>
											<span style="color:red;" id="error_msg"></span>
										</div>
									</div>
								</div>
								<!--/row-->
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" onclick="validate_scheduling()" id="sub-btn" class="btn btn-primary">Update</button>
									<button class="btn btn-default" type="reset">Cancel</button>
								</div>
							</div>
							
						</form>
					</div>
				</section>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Select Withdrawl User
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
										<th><input type="checkbox" id="checkAll" onchange="chbcheckall()"/></th>
										<th>S No.</th>
										<th>Login Id</th>
										<th>User Id</th>
										<th>User Name</th>
										<th>User Email</th>
										<th>User Mobile</th>
										<th>Amoount</th>
									</tr>
								</thead>
								<tbody id="userid">
									<?php
										$sn=1;
									?>
									<tr>
										<td><input type="checkbox" class="checkboxes" id="<?php echo '0'.'_'.'0.00'; ?>" name="<?php echo '0'.'_'.'0.00'; ?>"  value="<?php echo '0'.'_'.'0.00'; ?>" onClick="chbchecksin()"/></td>
										<td><?php echo $sn;?></td>
										<td><?php echo 'SUPERADMIN'; ?></td>
										<td><?php echo 'SUPERADMIN'; ?></td>
										<td><?php echo 'SUPERADMIN';?></td>
										<td><?php echo 'SUPERADMIN';?></td>
										<td><?php echo '999999999';?></td>
										<td><?php echo '&pound; - 0';?></td>
									</tr>
									<?php
										foreach($beneficiary as $b) 
										{
											$sn++;
										?>
										<tr>
											<td><input type="checkbox" class="checkboxes" id="<?php echo $b->w_id.'_'.$b->m_w_amount; ?>" name="<?php echo $b->w_id.'_'.$b->m_w_amount; ?>"  value="<?php echo $b->w_id.'_'.$b->m_w_amount; ?>" onClick="chbchecksin()"/></td>
											<td><?php echo $sn;?></td>
											<td><?php echo $b->USERID; ?></td>
											<td><?php echo $b->USER_HASHUSERID; ?></td>
											<td><?php echo $b->USERNAME;?></td>
											<td><?php echo $b->USEREMAIL;?></td>
											<td><?php echo $b->USERMOBILE;?></td>
											<td><?php echo '&pound; - '.$b->m_w_amount;?></td>
										</tr>
										<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->