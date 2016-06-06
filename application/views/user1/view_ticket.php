<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Master</a></li>
		<li class="active"><a href="#">Apply For Ticket</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-6">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Apply</strong> For Ticket</h2>
						</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="#" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="form-group">
								<label class="control-label">Title</label>
								<div>
									<input type="text" parsley-required="true" parsley-trigger="keyup" id="txttitle" name="txttitle" class="form-control" empty="yes" err_msg="Is Required" placeholder="Enter Title.">
									<input type="hidden" id="txtuserid" name="txtuserid" value="<?php echo $this->session->userdata('profile_id'); ?>" >
									<span id="divtxttitle" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Text Message</label>
								<div>
									<input type="text" parsley-required="true" parsley-trigger="keyup" id="txtmsg" name="txtmsg" class="form-control"  placeholder="Enter Text Message.">
									<span id="divtxtmsg" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group offset" id="function">
								<div>
									<button type="button" onclick="inserts()" class="btn btn-theme">Submit</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>View </strong>All Query </h2>
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
												<a onclick="get_details('<?php echo $row->TICKET_TITLE; ?>','<?php echo $row->TICKET_DESC; ?>','<?php echo $row->TICKET_REPLY; ?>')" data-effect="md-flipHor" class="btn btn-primary btn-sm md-effect" >Reply</a>
											</td>
											<td align="center"><?php echo $row->TICKET_DATE; ?></td>
											<td align="center"><?php echo $row->TICKET_USERNAME; ?></td>
											<td align="center"><?php echo $row->TICKET_USERID; ?></td>
											<td align="center"><?php echo $row->TICKET_TITLE; ?></td>
											<td align="center"><?php echo substr($row->TICKET_DESC,0,50); ?></td>
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
						<h4 class="modal-title">Reply</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body">
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
				<!-- //modal-body-->
		</div>
		<!-- //modal-->  
		
	
		

<script>
	function get_details(title,desc,reply)
	{
		$("#divtitle").html(title);
		$("#divdesc").html(desc);
		$("#divreply").html(reply);
	}
</script>	
<script>
	function inserts()
	{
		if(confirm('Are you sure to Submit from?')==true)
		{
			$("#function").html("<center>Your request is under-process.</center>");
			formData=$("#insert_data").serialize();
			$.ajax(
			{
				type: "POST",
				url:"<?php echo base_url(); ?>userprofile/insert_ticket",
				data:formData,
				success: function(msg)  {
					$("#main").html("<center><h2>"+msg+"</h2></center>")
					.hide()
					.fadeIn(2000,function()
					{
						window.location.href = "<?php echo base_url(); ?>userprofile/view_ticket";
					});
				}	
			});
		}
	}
</script>