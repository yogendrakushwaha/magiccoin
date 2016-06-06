<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User Panel</a></li>
		<li class="active"><a href="#">Edit Bank Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Edit Bank </strong>Details</h2>
						</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/update_bank_details/'.$this->uri->segment(3)); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
							
							<div class="form-group">
								<label class="control-label">Account Holder Name</label>
								<div>
									<input type="text" id="txtaccname" name="txtaccname" class="form-control" parsley-required="true" parsley-trigger="keyup" value="<?php echo $banks->or_m_name; ?>" placeholder="Enter Account No." >
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Account Number</label>
								<div>
									<input type="text" id="txtacc" name="txtacc" class="form-control" parsley-required="true" parsley-trigger="keyup" value="<?php echo $banks->or_m_b_cbsacno; ?>" placeholder="Enter Account No." >
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Bank Name</label>
								<div>
									<input type="text" id="txtbank_name" name="txtbank_name" class="form-control" parsley-required="true" parsley-trigger="keyup" value="<?php echo $banks->or_m_b_name; ?>" placeholder="Enter Bank Name.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Branch Name</label>
								<div>
									<input type="text" id="txtbranch" name="txtbranch" class="form-control" parsley-required="true" parsley-trigger="keyup" value="<?php echo $banks->or_m_b_branch; ?>" placeholder="Enter Branch Name.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Swift Code</label>
								<div>
									<input type="text" id="txtswift" name="txtswift" class="form-control" parsley-required="true" parsley-trigger="keyup" value="<?php echo $banks->or_m_b_ifscode; ?>" placeholder="Enter Swift Code.">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">IFSC Code</label>
								<div>
									<input type="text" id="txtifsc" name="txtifsc" class="form-control" parsley-required="true" parsley-trigger="keyup" value="<?php echo $banks->or_m_b_cardno; ?>" placeholder="Enter IFSC Code.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Currency</label>
								<div>
									<select name="ddcurrency" id="ddcurrency" class="form-control" parsley-required="true" parsley-error-container="div#select-com-error">
										<option>Select</option>
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
									<select>
									<div id="select-com-error"></div>
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Update</button>
									<button type="reset" class="btn">Cancel</button>
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