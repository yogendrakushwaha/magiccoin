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
	<section class="wrapper" id="rank">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Add Bank Details
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/insert_bank_details'); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Account Holder Name <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtaccname" name="txtaccname" class="form-control empty" placeholder="Enter Account Holder Name" >
									<span id="divtxtaccname" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Account Number <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtacc" name="txtacc" class="form-control empty" placeholder="Enter Account No." >
									<span id="divtxtacc" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Bank Name <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtbank_name" name="txtbank_name" class="form-control empty" placeholder="Enter Bank Name.">
									<span id="divtxtbank_name" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Branch Name <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtbranch" name="txtbranch" class="form-control empty" placeholder="Enter Branch Name.">
									<span id="divtxtbranch" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Swift Code <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtswift" name="txtswift" class="form-control empty" placeholder="Enter Swift Code.">
									<span id="divtxtswift" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">IFSC Code <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtifsc" name="txtifsc" class="form-control empty" placeholder="Enter IFSC Code.">
									<span id="divtxtifsc" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Currency <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<select name="ddcurrency" id="ddcurrency" class="form-control opt">
										<option value="">Select</option>
										<?php
											foreach($curr->result() as $currency)
											{
											?>
											<option value="<?php echo $currency->m_cur_id; ?>"><?php echo $currency->m_cur_symbol; ?></option>
											<?php 
											} 
										?>
										<select>
											<span id="divddcurrency" style="color:red"></span>
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
								View Bank Details
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
												<th>Account No.</th>
												<th>Bank Name</th>
												<th>Branch</th>
												<th>IFSC Code</th>
												<th>Swift Code</th>
												<th>Currency</th>
												<th>Primary</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$sn=1;
												$class='';
												foreach($bank->result() as $rows)
												{
													if($rows->or_m_b_primary==1)
													{
														$class="style='color:red'";
													}
													else
													{
														$class="";
													}
												?>
												<tr <?php echo $class; ?>>
													<td><?php echo $sn;?></td>
													<td><?php echo $rows->or_m_name;?></td>
													<td><?php echo $rows->or_m_b_cbsacno;;?></td>
													<td><?php echo $rows->or_m_b_name;?></td>
													<td><?php echo $rows->or_m_b_branch;?></td>
													<td><?php echo $rows->or_m_b_ifscode;?></td>
													<td><?php echo $rows->or_m_b_cardno;?></td>
													<td><?php echo $rows->m_cur_symbol;?></td>
													<td>
														<?php 
															if($rows->or_m_b_primary!=1)
															{
															?>
															<a href="<?php echo base_url(); ?>userprofile/make_primary/<?php echo $rows->or_m_bid;?>"> Make It Primary</a>
															<?php 
															}
															else
															{
															?>
															<i class="glyphicon glyphicon-ok"></i>
															<?php
															}
														?>
													</td>
													<td>
														<a href="<?php echo base_url(); ?>userprofile/edit_bank_details/<?php echo $rows->or_m_bid;?>"><i class="fa fa-pencil-square"></i> Edit</a>
														<?php if($rows->or_m_b_primary!=1){ ?>/ <a href="<?php echo base_url(); ?>userprofile/delete_details/<?php echo $rows->or_m_bid;?>"><i class="fa fa-trash-o"></i> Delete</a><?php } ?>
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