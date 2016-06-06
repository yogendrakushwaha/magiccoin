<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
	});
</script>
<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User Panel</a></li>
		<li class="active"><a href="#">Add Perfectmoney Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Add Perfectmoney </strong>Details</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/insert_perfect_details'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="form-group">
								<label class="control-label">Currency</label>
								<div>
									<select name="ddcurrency" id="ddcurrency" class="form-control" parsley-required="true" parsley-error-container="div#select-com-error">
										<option value="">Select</option>
										<option value="1">&#x0E3F; BTC</option>
										<option value="2">&#x20B2; GOLD</option>
										<option value="3">&#x24; USD</option>
										<option value="4">&euro; EUR</option>
									</select>
									<div id="select-com-error"></div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Perfectmoney Account No</label>
								<div>
									<input type='text' class="form-control" name="txtperfectacc" id="txtperfectacc" parsley-required="true" placeholder="Enter Your Perfectmoney account no here" >
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Submit</button>
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
						<h2><strong>View </strong> Perfectmoney Details </h2>
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
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $rows->or_m_name;?></td>
										<td align="center"><?php echo $rows->m_pfect_currtype; ?></td>
										<td align="center"><?php echo $rows->m_pfect_acc; ?></td>
										<td align="center">
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
				</section>
				</div>
				
				</div>
				<!-- //content > row-->
			</div>
			<!-- //content-->
			
			
		</div>
	<!-- //main-->																					