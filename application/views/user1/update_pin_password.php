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
		<li class="active"><a href="#">Update Transaction Password</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Update</strong> Transaction Password</h2>
						</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/update_pin_password'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="return check_pass()">
							
							<div class="form-group">
								<label class="control-label">Old Password</label>
								<div>
									<input type="password"  parsley-required="true"   parsley-trigger="keyup" id="txtoldpassword" name="txtoldpassword" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Old Password." value="" onblur="validte_pin_password();">
									<span id="divtxtoldpassword" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">New Password</label>
								<div>
									<input type="password" parsley-required="true"   parsley-trigger="keyup" id="txtpassword" name="txtpassword" class="form-control"  placeholder="Enter New Password.">
									<span id="divtxtpassword" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Confirm New Password</label>
								<div>
									<input type="password" parsley-required="true" parsley-trigger="keyup" id="txtrepassword" name="txtrepassword" class="form-control" empty="yes" err_msg="Is Required" placeholder="Confirm New Password.">
									<span id="divtxtrepassword" style="color:red"></span>
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