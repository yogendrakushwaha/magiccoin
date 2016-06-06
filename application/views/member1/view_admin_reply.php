<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">View All Tickets</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View </strong> All Tickets </h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
							<thead>
								<tr>
									<th>S No.</th>
									<th>Action</th>
									<th>Created Date</th>
									<th>Full Name</th>
									<th>Member Code</th>
									<th>Title</th>
									<th>Description</th>
									<th>Reply</th>
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
										<td align="center"><?php echo $SN; ?></td>
										<td align="center">
											<?php
												if($row->TICKET_STATUS_ID==1)
												{
												?>
												<a href="<?php echo base_url(); ?>index.php/member/deactive_ticket/<?php echo $row->TICKET_ID; ?>/0" class="btn btn-danger btn-sm">Deactive</a>
												<?php
												}
											?>
											&nbsp;/&nbsp;
											<a onclick="get_details('<?php echo $row->TICKET_ID; ?>','<?php echo $row->TICKET_TITLE; ?>','<?php echo $row->TICKET_DESC; ?>')" data-effect="md-flipHor" class="btn btn-primary btn-sm md-effect">Reply</a>
										</td>
										<td align="center"><?php echo $row->TICKET_DATE; ?></td>
										<td align="center"><?php echo $row->TICKET_USERNAME; ?></td>
										<td align="center"><?php echo $row->TICKET_USERID; ?></td>
										<td align="center"><?php echo $row->TICKET_TITLE; ?></td>
										<td align="center"><?php echo substr($row->TICKET_DESC,0,50); ?></td>
										<td align="center"><?php echo substr($row->TICKET_REPLY,0,50); ?></td>
										<td align="center"><?php echo $row->TICKET_STATUS; ?></td>
									</tr>
									
									<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
</div>
<!-- //main-->

<!--
	////////////////////////////////////////////////////////////////////////
	//////////     MODAL EFFECT DEMO    //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="md-effect" class="modal fade" tabindex="-1" data-width="450">
	<div class="modal-header bg-inverse bd-inverse-darken">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
		<h4 class="modal-title">Admin Reply</h4>
	</div>
	<!-- //modal-header-->
	<div class="modal-body">
		<form action="<?php echo base_url(); ?>index.php/member/update_reply" method="post">
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
				<button type="button" data-dismiss="modal" class="btn btn-default md-close">Cancel</button>
				<button type="submit" class="btn btn-primary md-close">Proceed</button>
			</div>
		</form>
	</div>
	<!-- //modal-body-->
</div>
<!-- //modal-->  
<script>
	function get_details(id,title,desc)
	{
		$("#divtitle").html(title);
		$("#divdesc").html(desc);
		$("#txtid").val(id);
	}
	</script>