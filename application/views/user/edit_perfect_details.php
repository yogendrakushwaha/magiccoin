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
						Add Perfectmoney Details
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/update_perfect_details/'.$perfect->m_pfect_id); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Currency <span class="required"> * </span></label>
								<div class="col-md-9">
									<select name="ddcurrency" id="ddcurrency" class="form-control opt">
										<option value="">Select</option>
										<option value="1">&#x0E3F; BTC</option>
										<option value="2">&#x20B2; GOLD</option>
										<option value="3">&#x24; USD</option>
										<option value="4">&euro; EUR</option>
									</select>
									<script>
										$("#ddcurrency").val("<?php echo $perfect->m_pfect_currtype; ?>");
									</script>
									<span id="divddcurrency" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Perfectmoney Account No <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type='text' class="form-control empty" name="txtperfectacc" id="txtperfectacc" value="<?php echo $perfect->m_pfect_acc; ?>" placeholder="Enter Your Perfectmoney account no here" >
									<span id="divtxtperfectacc" style="color:red"></span>
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