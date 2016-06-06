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
			
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
						View News
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
					
                    <div class="panel-body">
						<div class="table-toolbar">
							<div class="btn-group pull-right" >
								<a href="<?php echo base_url(); ?>index.php/master/add_news" class="btn btn-primary" style="margin-right:20px;">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
										Add News
									</span>
								</a>
							</div>
						</div>
						<div class="adv-table">
							
							<table  class="display table table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th>
											S No.
										</th>
										<th>
											Action
										</th>
										<th>
											News Title
										</th>
										<th>
											News Date
										</th>
										
										<th>
											Description
										</th>
										
									</tr>
								</thead>
								<tbody>
									<?php 
										$sn=0;
										foreach($content->result() as $row)
										{
											$sn++;
										?>
										<tr class="odd gradeX">
											<td>
												<?php echo $sn;?>
											</td>
											<td>
												<a href="<?php echo base_url(); ?>index.php/master/edit_news/<?php echo $row->m_news_id;?>" title="Edit" >
												<i class="ico-pencil"></i></a>
												&nbsp;
												<?php
													if($row->m_news_status==1)
													{
													?>
													<a href="<?php echo base_url(); ?>index.php/master/delete_news/<?php echo $row->m_news_id;?>/0" title="Delete News" >
													<i class="ico-cancel-circle2"></i></a>
													<?php
													}
													else
													{
													?>
													<a href="<?php echo base_url(); ?>index.php/master/delete_news/<?php echo $row->m_news_id;?>/1" title="Delete News" >
													<i class="ico-checkmark"></i></a>
													<?php
													}
												?>
												
											</td>
											<td>
												<?php echo $row->m_news_title; ?>
												<td>
													<?php echo $row->m_entrydate; ?>
												</td>
												
												<td>
													<?php echo substr($row->m_news_des,0,100); ?>
												</td>
												
											</tr>
										<?php } ?>
									</tbody>
									
								</table>
							</div>
						</div>
					</section>
				</div>
				
			</div>
			<!-- page end-->
		</section>
	</section>
	<!--main content end-->		