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
		<li class="active"><a href="#">Edit Perfectmoney Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Edit Perfectmoney </strong>Details</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('member/update_perfect_data/'.$perfect->m_pfect_id); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="form-group">
								<label class="control-label">Currency</label>
								<div>
									<select name="ddcurrency" id="ddcurrency" class="form-control" parsley-required="true" parsley-error-container="div#select-com-error">
										<option value="">Select</option>
										<option value="1">BTC</option>
										<option value="2">Gold Metal</option>
										<option value="3">USD</option>
									</select>
									<script>
										$("#ddcurrency").val("<?php echo $perfect->m_pfect_currtype; ?>");
									</script>
									<div id="select-com-error"></div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Perfectmoney Account No</label>
								<div>
									<input type='text' class="form-control" name="txtperfectacc" id="txtperfectacc" parsley-required="true" value="<?php echo $perfect->m_pfect_acc; ?>" placeholder="Enter Your Perfectmoney account no here" >
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Submit</button>
									<a href="#" onclick="history.back();" class="btn btn-default">Cancel</a>
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