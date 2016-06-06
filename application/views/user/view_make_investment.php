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
	<section class="wrapper">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						User Make Investment
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/insert_make_investment'); ?>" method="post" id="insert_data">
							<div class="form-group">
								<label class="col-md-3 control-label">Your Amount <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<select id="ddpack" name="ddpack" class="form-control opt">
										<option value="-1">Please Select Package </option>
										<?php
											foreach($packages as $package)
											{
											?>
											<option value="<?php echo $package->m_pack_id ;?>"><?php echo $package->m_pack_name.' - ('.$package->m_pack_currency.' '.$package->m_pack_fee.')';?></option>
											<?php
											}
										?>
									</select>
									<span id="divddpack" style="color:red"></span>
									<input type="hidden" id="your_Curr" name="your_Curr" value="<?php echo $dash->YOUR_CURRENCY; ?>" >
									<input type="hidden" value="<?php echo $dash->WALLET_AMT;?>" name="amt" id="amt" />
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('insert_data')">Make Investment</button>
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