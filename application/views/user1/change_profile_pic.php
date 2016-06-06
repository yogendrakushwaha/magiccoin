<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
		<?php if($this->session->flashdata('succ')){ ?>
			//alert('<?php echo $this->session->flashdata('succ'); ?>');
			<?php }
			else if($this->session->flashdata('unsucc')){ 
			?>
			alert('<?php echo $this->session->flashdata('unsucc'); ?>');
		<?php } ?>
	});
</script>
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Master</a></li>
		<li class="active"><a href="#">Update Password</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Update</strong> Profile Picture</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" data-collabel="4" data-label="color" parsley-validate action="<?php echo site_url('userprofile/uploadfile'); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label">Images Preview </label>
								<div>
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img data-src="<?php echo base_url(); ?>application/libraries/assets/plugins/holder/holder.js/140x140" alt="...">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<!-- //fileinput-preview-->
										<div>
											<span class="btn btn-default btn-file">
												<span class="fileinput-new">Select image</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="userfile" parsley-required="true"   parsley-trigger="keyup">
											</span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">
												<i class="fa fa-trash-o"></i> Remove
											</a>
										</div>
									</div><!-- //fileinput-->
									
								</div>
							</div>
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Update</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div><!-- //panel-body-->
					
				</section>
				
			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
	
	
</div>
<!-- //main-->																			