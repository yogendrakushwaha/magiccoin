<?php 
	foreach($info->result() as $bank)
	{
		break;
	}
?>	
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Bank Master
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>index.php/master/view_update_bank/<?php echo $bank->m_bank_id; ?>" id="signupForm">
								<div class="form-body">
									
									<div class="form-group">
										<label class="col-md-3 control-label">Bank Name</label>
										<div class="col-md-9">
											<input type="text" id="txtbank" name="txtbank" class="form-control input-inline input-medium" placeholder="Enter Bank Name." value="<?php echo $bank->m_bank_name; ?>" />
										</div>
									</div>
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-4 col-md-8">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm')">Update</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->	
