<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
		<?php if($this->session->flashdata('succ')){ ?>
			alert('<?php echo $this->session->flashdata('succ'); ?>');
			<?php }
			else if($this->session->flashdata('unsucc')){ 
			?>
			alert('<?php echo $this->session->flashdata('unsucc'); ?>');
		<?php } ?>
	});
</script>
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">Deposit</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-md-4">
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>Bitcoin  </strong> Rate </h5>
							<h4 class="conver"></h4>
						</section>
					</div>
				</div>
				
			</div>
			
			<div class="col-md-4">
				
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>Available </strong> Deposit Amount </h5>
							<h4><i class="fa fa-gbp"></i> <?php echo $dash->WALLET_AMT;?></h4>
						</section>
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-7">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Deposit</strong> Now</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="form-group">
								<label class="control-label">Your Amount</label>
								<div>
									<div class="input-group">
										<input type="text" parsley-required="true" parsley-trigger="blur" id="txtamount" name="txtamount" class="form-control" placeholder="Enter your desired investment amount in GBP" >
										<span class="input-group-btn">
											<button class="btn btn-theme btn-sm" type="button" onclick="calculate_amt()">Calculate Amount</button>
										</span>
									</div>
									<span id="divtxtamount" style="color:red"></span>
									<input type="hidden" id="your_Curr" name="your_Curr" value="<?php echo $dash->YOUR_CURRENCY; ?>" >
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Your Payment Method </label>
								<div class="row">
									<div class="col-md-1">
										<input type="radio" name="payment_method" value="1" onclick="change_url(1)" parsley-required="true" parsley-error-container="div#radio-error"> 
									</div>
									<div class="col-md-5">
										<img src='<?php echo base_url()."application/libraries/assets/img/perr.png";?>' alt='Perfect Money' height="60%" width="60%" />
									</div>
									<div class="col-md-1">
										<input type="radio" name="payment_method" value="2" onclick="change_url(2)">
									</div>
									<div class="col-md-5">
										<img src='<?php echo base_url()."application/libraries/assets/img/perfectmoney.png";?>' alt='Perfect Money' height="100%" width="100%" />
									</div>
								</div>
							</div>
							<div id="radio-error"></div>
							
							
							<div class="form-group" id="rank" style="display:none;">
								<label class="control-label">Your Perfectmoney Account</label>
								<div id="select_per">
									<select name="ddperfect" id="ddperfect" class="form-control">
										<option value="">Select</option>
									</select>
								</div>
							</div>
							
							
							<div class="form-group offset" id="rank">
								<div>
									<button type="submit" class="btn btn-theme">Deposit</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				<p style="font-size:12px;">
					<span style="color:red;">*NOTE - </span>
					<ul style="font-size:12px;">
						<li>
							<span style="color:black;">1 - MINIMUM DEPOSIT - 10 POUND.</span>
						</li>
					</ul>
				</p>
			</div>
			
			<div class="col-md-4">
				<br><br><br><br><br>
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>You </strong> Pay </h5>
							<h4 class="you_pay"></h4>
						</section>
					</div>
				</div>
			</div>
			
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>VIEW </strong> Deposit Report</h2>
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
									<th>Request Date</th>
									<th>Approve Date</th>
									<th>Remaining Date</th>
									<th>User Id</th>
									<th>Payment Type</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Reject</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($page_data->result() as $rows)
									{ 
									?>
									<tr align="center">
										<td><?php echo $sn; ?></td>
										<td><?php echo $rows->m_top_reqdate; ?></td>
										<td nowrap><?php echo $rows->m_top_approvedate; ?></td>
										<td nowrap>
											<?php 
												if($rows->m_top_status==1)
												{
													echo $rows->remaining_time;
												} 
											?>
										</td>
										<td><?php echo $rows->USERID; ?></td>
										<td><?php echo $rows->payment_type; ?></td>
										<td nowrap><i class='fa fa-gbp'></i> <?php echo $rows->m_top_amount; ?></td>
										<td nowrap><?php echo $rows->TOP_STATUS; ?></td>
										<td nowrap>
											<?php 
											if($rows->m_top_status=='1')
											{
												?>
												<a href="<?php echo base_url(); ?>userprofile/reject_topup/<?php echo $rows->m_top_id; ?>">Reject</a>
												<?php
											}
											?>
											</td>
									</tr>   
									<?php 
										$sum=$sum+$rows->m_top_amount;
										$sn++;
									}
								?> 
								<tr align="center">
									<td><span style="display:none;"><?php echo $sn; ?></span></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td nowrap>Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
									<td></td>
									<td></td>
								</tr>
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
<script>
	function change_url(id)
	{
		if(id == 1)
		{
			$("#rank").hide();
			$("#insert_data").attr('action','<?php echo site_url('userprofile/topup'); ?>');
		}
		else
		{
			$("#rank").show();
			$("#select_per").load("<?php echo base_url(); ?>welcome/get_perfect_account");
			$("#insert_data").attr('action','<?php echo site_url('userprofile/perfectmoney_confirm'); ?>');
		}
	}
</script>