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
						User Login Password Change
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/update_bank_details/'.$this->uri->segment(3)); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Account Holder Name <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtaccname" name="txtaccname" class="form-control empty" value="<?php echo $banks->or_m_name; ?>" placeholder="Enter Account Holder Name" >
									<span id="divtxtaccname" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Account Number <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtacc" name="txtacc" class="form-control empty" value="<?php echo $banks->or_m_b_cbsacno; ?>" placeholder="Enter Account No." >
									<span id="divtxtacc" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Bank Name <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtbank_name" name="txtbank_name" class="form-control empty" value="<?php echo $banks->or_m_b_name; ?>" placeholder="Enter Bank Name.">
									<span id="divtxtbank_name" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Branch Name <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtbranch" name="txtbranch" class="form-control empty" value="<?php echo $banks->or_m_b_branch; ?>" placeholder="Enter Branch Name.">
									<span id="divtxtbranch" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Swift Code <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtswift" name="txtswift" class="form-control empty" value="<?php echo $banks->or_m_b_cardno; ?>" placeholder="Enter Swift Code.">
									<span id="divtxtswift" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">IFSC Code <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtifsc" name="txtifsc" class="form-control empty" value="<?php echo $banks->or_m_b_ifscode; ?>" placeholder="Enter IFSC Code.">
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
												if($banks->or_m_b_currency==$currency->m_cur_id)
												{
												?>
												<option value="<?php echo $currency->m_cur_id; ?>" selected><?php echo $currency->m_cur_symbol; ?></option>
												<?php 
												}
												else
												{
												?>
												<option value="<?php echo $currency->m_cur_id; ?>" selected><?php echo $currency->m_cur_symbol; ?></option>
												<?php
												}
											} 
										?>
									</select>
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
	</section>
</section>
<!--main content end-->