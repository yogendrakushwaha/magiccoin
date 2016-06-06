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
						<form class="form-horizontal" action="https://perfectmoney.is/api/step1.asp" method="post" id="insert_data">
							
							<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $rec->m_pfect_acc; ?>">
							<input type="hidden" name="PAYEE_NAME" value="Lytbit">
							<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $txtamount; ?>">
							<input type="hidden" name="PAYMENT_UNITS" value="<?php echo $rec->curr_type; ?>">
							<input type="hidden" name="STATUS_URL"  value="<?php echo base_url(); ?>userprofile/check_status">
							<input type="hidden" name="PAYMENT_URL" value="<?php echo base_url(); ?>userprofile/approve_payment/<?php echo $m_top_id; ?>">
							<input type="hidden" name="NOPAYMENT_URL"  value="<?php echo base_url(); ?>userprofile/disapprove_payment/<?php echo $m_top_id; ?>">
							<input type="hidden" name="BAGGAGE_FIELDS"  value="ORDER_NUM CUST_NUM">
							<input type="hidden" name="ORDER_NUM" value="<?php echo $id; ?>">
							<input type="hidden" name="CUST_NUM" value="<?php echo $id1; ?>">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Your Amount <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" value="<?php echo $txtamount; ?>" id="txtamount" name="txtamount" class="form-control empty" readonly>
									<span id="divtxtamount" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Your Payment Method <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<label class="control-label">Perfect Money </label>
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