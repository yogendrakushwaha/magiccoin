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
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						View Admin reply
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="adv-table">
							<table  class="display table table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th>S No.</th>
										<th>Action</th>
										<th>Created Date</th>
										<th>Full Name</th>
										<th>Member Code</th>
										<th>Title</th>
										<th>Description</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$SN=0;
										foreach($rec->result() as $row)
										{
											if($row->TICKET_REPLY!='')
											{
											$SN++;
										?>
										
										<tr>
											<td><?php echo $SN; ?></td>
											<td>
												<?php
													if($row->TICKET_STATUS_ID==1)
													{
													?>
													<a href="<?php echo base_url(); ?>member/deactive_ticket/<?php echo $row->TICKET_ID; ?>/0">Deactive</a>
													<?php
													}
												?>
												&nbsp;/&nbsp;
												<a onclick="get_details('<?php echo $row->TICKET_ID; ?>')" data-toggle="modal" href="#basic">Reply</a>
											</td>
											<td><?php echo $row->TICKET_DATE; ?></td>
											<td><?php echo $row->TICKET_USERNAME; ?></td>
											<td><?php echo $row->TICKET_USERID; ?></td>
											<td><?php echo $row->TICKET_TITLE; ?></td>
											<td><?php echo substr($row->TICKET_DESC,0,50); ?></td>
											<td><?php echo $row->TICKET_STATUS; ?></td>
										</tr>
										<?php
											}
										}
									?>
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





<!-- END CONTAINER -->
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Admin Reply</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url(); ?>member/update_reply" method="post">
					<div class="modal-body form">
						
						<div class="form-group">
							<label><b>Title : </b></label>
							<label id="divtitle"></label>
						</div>
						
						<div class="form-group">
							<label><b>Description : </b></label>
							<label id="divdesc"></label>
						</div>
						
						<div class="form-group">
							<label><b>Reply</b></label>
							<textarea name="txtreply" id="txtreply" placeholder="Enter Description" style="resize:none;" rows="5" class="form-control"></textarea>
							<input type="hidden" id="txtid" name="txtid" class="form-control">
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary md-close">Proceed</button>
						<button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
					</div>
				</form>
			</div>
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>