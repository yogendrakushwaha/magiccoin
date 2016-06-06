<?php 
	foreach($content->result() as $row)
	{
		break;
	}
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Edit News
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>index.php/master/update_news/<?php echo $row->m_news_id; ?>" id="signupForm">
								<div class="form-body" id="rank">
									
									<div class="form-group">
										<label class="col-md-2 control-label">Title</label>
										<div class="col-md-9">
											<input type="text" id="txttitle" name="txttitle"  class="form-control input-inline input-xlarge" placeholder="Enter News Title." value='<?php echo $row->m_news_title; ?>' >
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-md-2 control-label">Description</label>
										<div class="col-md-9">
											<textarea class="ckeditor form-control" name="txtdescription" id='txtdescription' placeholder="Enter User Name." cols='50' rows='6'><?php echo $row->m_news_des; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Status</label>
										<div class="col-md-9">
											<select class="bs-select form-control input-large" name="ddstatus" id="ddstatus">
												<?php
													if($row->m_news_status==1)
													{												
													?>
													<option value="1" selected>Active</option>
													<option value="0" >Inactive</option>
													<?php 
													}
													else
													{
													?>
													<option value="1">Active</option>
													<option value="0" selected>Inactive</option>
													<?php 
													} 
												?>
											</select>
										</div>
									</div>
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-2 col-md-9">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm')">Update News</button>
										<button type="reset" class="btn default">Cancel</button>
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
