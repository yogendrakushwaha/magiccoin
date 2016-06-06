<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Master</a></li>
		<li class="active"><a href="#">Add Bank Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Add Bank </strong>Details</h2>
						</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('member/insert_bank_details'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
							
							<div class="form-group">
								<label class="control-label">Account Holder Name</label>
								<div>
									<input type="text" id="txtaccname" name="txtaccname" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Account No." >
									<span id="divtxtaccname" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Account Number</label>
								<div>
									<input type="text" id="txtacc" name="txtacc" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Account No." >
									<span id="divtxtacc" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Bank Name</label>
								<div>
									<input type="text" id="txtbank_name" name="txtbank_name" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Bank Name.">
									<span id="divtxtbank_name" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Branch Name</label>
								<div>
									<input type="text" id="txtbranch" name="txtbranch" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Branch Name.">
									<span id="divtxtbranch" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Swift Code</label>
								<div>
									<input type="text" id="txtswift" name="txtswift" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Swift Code.">
									<span id="divtxtswift" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Currency</label>
								<div>
									<select name="ddcurrency" id="ddcurrency" class="form-control" empty="yes" err_msg="Is Required">
										<option>Select</option>
									<?php
										foreach($cur->result() as $currency)
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
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Add</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
			
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View </strong> Account Details </h2>
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
									<th>Account Holder Name</th>
									<th>Account No.</th>
									<th>Bank Name</th>
									<th>Branch</th>
									<th>Swift Code</th>
									<th>Currency</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									foreach($bank_details->result() as $rows)
									{
									?>
									<tr align="center">
										<td><?php echo $sn;?></td>
										<td><?php echo $rows->or_m_name;?></td>
										<td><?php echo $rows->or_m_b_cbsacno;;?></td>
										<td><?php echo $rows->or_m_b_name;?></td>
										<td><?php echo $rows->or_m_b_branch;?></td>
										<td><?php echo $rows->or_m_b_ifscode;?></td>
										<td><?php echo $rows->m_cur_symbol;?></td>
										<td><a href="<?php echo base_url(); ?>member/delete_deials/<?php echo $rows->or_m_bid;?>"><i class="fa fa-trash-o"></i> Delete</a></td>
										
									</tr>   
									<?php 
										$sn++;
									}
								?> 
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