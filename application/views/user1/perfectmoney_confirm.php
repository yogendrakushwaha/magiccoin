<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">Perfect Money Deposit</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-7">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Perfect Money</strong> Deposit</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="https://perfectmoney.is/api/step1.asp" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $rec->m_pfect_acc; ?>">
							<input type="hidden" name="PAYEE_NAME" value="Lytbit">
							<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $txtamount; ?>">
							<input type="hidden" name="PAYMENT_UNITS" value="<?php echo $rec->curr_type; ?>">
							<input type="hidden" name="STATUS_URL"  value="<?php echo base_url(); ?>userprofile/check_status">
							<input type="hidden" name="PAYMENT_URL" value="<?php echo base_url(); ?>userprofile/approve_payment/<?php echo $topup_details->m_top_id; ?>">
							<input type="hidden" name="NOPAYMENT_URL"  value="<?php echo base_url(); ?>userprofile/disapprove_payment/<?php echo $topup_details->m_top_id; ?>">
							<input type="hidden" name="BAGGAGE_FIELDS"  value="ORDER_NUM CUST_NUM">
							<input type="hidden" name="ORDER_NUM" value="<?php echo $id; ?>">
							<input type="hidden" name="CUST_NUM" value="<?php echo $id1; ?>">

							<div class="form-group">
								<label class="control-label">Your Amount</label>
								<div>
									<div class="col-md-12">
										<input type="text" parsley-required="true" parsley-trigger="blur" value="<?php echo $txtamount; ?>" id="txtamount" name="txtamount" class="form-control" readonly>
									</div>
									<span id="divtxtamount" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Your Payment Method </label>
								<div class="row">
									<div class="col-md-12">
										<label class="control-label">Perfect Money </label>
									</div>
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Proceed</button>
									<a href="<?php echo site_url("userprofile/do_topup") ?>" class="btn btn-default">Cancel</a>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
</div>
<!-- //main-->