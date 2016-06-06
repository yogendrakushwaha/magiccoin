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
		<li class="active"><a href="#">Investment</a></li>
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
							<h5><strong>Available </strong> Investment Amount </h5>
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
						<h2><strong>Investment</strong> Now</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/make_investment'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="return validate_wallet()">
							
							<div class="form-group">
								<label class="control-label">Your Package</label>
								<div>
									<select id="ddpack" name="ddpack" class="form-control"  parsley-required="true" parsley-trigger="keyup" onchange="vai_pack();" >
										<option value="" selected disabled hidden max_limit='0' >Please Select Package </option>
										<?php foreach($packages as $package)
											{
											?>
											<option value="<?php echo $package->m_pack_id ;?>" min_limit='<?php echo $package->m_pack_min_limit ;?>' max_limit='<?php echo $package->m_pack_max_limit ;?>' > 
											<?php echo $package->m_pack_name.' ( &#8356; '.$package->m_pack_min_limit.' - &#8356; '.$package->m_pack_max_limit.')';?> </option>
											<?php
											} 
										?>
									</select>
									<span id="divddpack" style="color:red"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Your Amount</label>
								<div>
									<div class="input-group">
										<input type="number" parsley-required="true" parsley-trigger="blur" id="txtamount" name="txtamount" class="form-control" placeholder="Enter your desired investment amount" step='10' min='10' max='5000' onblur='val_amount();' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
										<span class="input-group-btn">
											<button class="btn btn-theme btn-sm" type="button" onclick="calculate_amt();" >Calculate Amount</button>
											<input type="hidden" id="your_Curr" name="your_Curr" value="<?php echo $dash->YOUR_CURRENCY; ?>" >
											<input type="hidden" value="<?php echo $dash->WALLET_AMT;?>" name="amt" id="amt" />
										</span>
									</div>
									<span id="divtxtamount" style="color:red"></span>
								</div>
							</div>
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Invest</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
			<div class="col-md-4">
				<br><br><br><br><br>
				<div class="well bg-theme">
					<div class="widget-tile">
						<section>
							<h5><strong>Your </strong> Investment </h5>
							<h4 class="you_pay"></h4>
						</section>
					</div>
				</div>

			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
	
	
</div>
<!-- //main-->																			