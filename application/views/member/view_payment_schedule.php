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
						User Login Password Change
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form action="<?php echo base_url();?>member/fetch_password" method="post" class="form-horizontal" id="form_sample_1">
							
							<!--/row-->
							<div class="form-group">
								<label class="col-md-3 control-label">User ID<span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txtuserid" name="txtuserid"  class="form-control empty" placeholder="Enter your user Id.">
									<span id="divtxtuserid" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-6">
									<button type="button" class="btn btn-primary" onclick="conwv('form_sample_1')">Update</button>
									<button class="btn btn-default" type="reset">Cancel</button>
								</div>
							</div>
							
						</form>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->