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
						Bank Master
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>index.php/master/inser_bank_master" id="signupForm">
								<div class="form-body">
									
									<div class="form-group">
										<label class="col-md-3 control-label">Bank Name</label>
										<div class="col-md-9">
											<input type="text" id="txtbank" name="txtbank" class="form-control input-inline input-medium" placeholder="Enter Bank Name.">
										</div>
									</div>
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-4 col-md-8">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm')">Submit</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			
			
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
						Bank Index
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
                    <div class="panel-body">
						<div class="adv-table">
							<table  class="display table table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Bank Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$sn=0;
										foreach($info->result() as $unit)
										{
											$sn++;
										?>												
										<tr>
											<td><?php echo $sn; ?></td>
											<td><?php echo $unit->m_bank_name; ?></td>
											<td><a href="<?php echo base_url(); ?>master/view_edit_bank/<?php echo $unit->m_bank_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;
												<?php 
													if($unit->m_bank_status==1)
													{
													?>
													<a href="<?php echo base_url(); ?>master/bank_status/<?php echo $unit->m_bank_id; ?>/0"><span class='glyphicon glyphicon-trash'></span></a>
													<?php
													}
													else
													{
													?>
													<a href="<?php echo base_url(); ?>master/bank_status/<?php echo $unit->m_bank_id; ?>/1"><span class='glyphicon glyphicon-repeat'></span></a>
													<?php
													}
												?></td>
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
