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
						Apply For Ticket
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/insert_ticket'); ?>" method="post" id="insert_data">
							
							<div class="form-group">
								<label class="col-md-3 control-label">Title <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<input type="text" id="txttitle" name="txttitle" class="form-control empty" placeholder="Enter Title.">
									<input type="hidden" id="txtuserid" name="txtuserid" value="<?php echo $this->session->userdata('profile_id'); ?>" >
									<span id="divtxttitle" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Text Message <span class="required"> * </span></label>
								<div class="col-md-9"> 
									<textarea id="txtmsg" name="txtmsg" class="form-control empty" placeholder="Enter Text Message." rows="5"></textarea>
									<span id="divtxtmsg" style="color:red"></span>
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
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Apply For Ticket
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
											$SN++;
										?>
										<tr>
											<td><?php echo $SN; ?></td>
											<td>
												<a onclick="get_details('<?php echo $row->TICKET_ID; ?>')" data-toggle="modal" href="#basic" class="btn btn-primary btn-sm" >Reply</a>
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
									?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
<!--main content end-->

<!--
	////////////////////////////////////////////////////////////////////////
	//////////     MODAL EFFECT DEMO    //////////
	//////////////////////////////////////////////////////////////////////
-->
<!-- END CONTAINER -->
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Admin Reply</h4>
			</div>
			<div class="modal-body">
				<form action="javascript:;">
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
							<label><b>Reply : </b></label>
							<label id="divreply"></label>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
					</div>
				</form>
			</div>
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>