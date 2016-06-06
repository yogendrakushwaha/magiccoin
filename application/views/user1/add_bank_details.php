<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User Panel</a></li>
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
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/insert_bank_details'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="form-group">
								<label class="control-label">Account Holder Name</label>
								<div>
									<input type="text" id="txtaccname" name="txtaccname" class="form-control" parsley-required="true" parsley-trigger="keyup" placeholder="Enter Account Holder Name" >
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Account Number</label>
								<div>
									<input type="text" id="txtacc" name="txtacc" class="form-control"  parsley-required="true" parsley-trigger="keyup" placeholder="Enter Account No." >
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Bank Name</label>
								<div>
									<input type="text" id="txtbank_name" name="txtbank_name" class="form-control"  parsley-required="true" parsley-trigger="keyup" placeholder="Enter Bank Name.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Branch Name</label>
								<div>
									<input type="text" id="txtbranch" name="txtbranch" class="form-control"  parsley-required="true" parsley-trigger="keyup" placeholder="Enter Branch Name.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Swift Code</label>
								<div>
									<input type="text" id="txtswift" name="txtswift" class="form-control"  parsley-required="true" parsley-trigger="keyup" placeholder="Enter Swift Code.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">IFSC Code</label>
								<div>
									<input type="text" id="txtifsc" name="txtifsc" class="form-control"  parsley-required="true" parsley-trigger="keyup" placeholder="Enter IFSC Code.">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Currency</label>
								<div>
									<select name="ddcurrency" id="ddcurrency" class="form-control" parsley-required="true" parsley-error-container="div#select-com-error">
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
									<div id="select-com-error"></div>
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
			
			
			<div class="col-lg-12">
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
									<th>IFSC Code</th>
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
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $rows->or_m_name;?></td>
										<td align="center"><?php echo $rows->or_m_b_cbsacno;;?></td>
										<td align="center"><?php echo $rows->or_m_b_name;?></td>
										<td align="center"><?php echo $rows->or_m_b_branch;?></td>
										<td align="center"><?php echo $rows->or_m_b_ifscode;?></td>
										<td align="center"><?php echo $rows->or_m_b_cardno;?></td>
										<td align="center"><?php echo $rows->m_cur_symbol;?></td>
										<td align="center">
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
										<td align="center">
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
				</section>
			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
	
	
</div>
<!-- //main-->																			