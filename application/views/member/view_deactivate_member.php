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
			<div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
						Deactivate Member
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
                    <div class="panel-body">
						<form action="<?php echo base_url();?>member/update_deactivate_member" class="horizontal-form" id="form_sample_1" method="post">
							<div class="form-body">
								<div class="row">
									<div class="col-md-4">
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">Member Deactivate  Here </label>
											<input type="hidden" id="txtquid" name="txtquid" class="form-control empty">
											<button type="button" class="btn btn-primary" onclick="conwv('form_sample_1')">Deactivate</button>
										</div>
									</div>
									<div class="col-md-4">
									</div>
								</div>
							</div>
						</form>
						<div class="adv-table">
							<table  class="display table table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th></th>
										<th>S No.</th>
										<th>Login Id</th>
										<th>User Id</th>
										<th>Associate</th>
										<th>Joining Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="userid">
									<?php $sn=1;
										foreach($rec->result() as $rows)
										{
										?>
										<tr>
											<td><input type="checkbox" class="checkboxes" id="<?php echo $sn;?>" name="<?php echo $sn;?>" value="<?php echo $rows->USER_REGID;?>" onClick="chbchecksin();"/></td>
											<td><?php echo $sn;?></td>
											<td><?php echo $rows->USER_USERID;?></td>
											<td><?php echo $rows->USER_HASHUSERID;?></td>
											<td><?php echo $rows->USER_NAME;?></td>
											<td><?php echo $rows->USER_REGDATE;?></td>
											<td>Active Member</td>
										</tr>
									<?php 
										$sn++;
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

<script>
	var quid="";
	var status=0;
	var descr="";
	function chbchecksin()
	{
		quid="";
		$("#txtuserid").val('');
		var collection=$("#userid");
		var inputs=collection.find("input[type=checkbox]");
		for(var x=0;x<inputs.length;x++)
		{
			var id=inputs[x].id;
			var name=inputs[x].name;
			if($("#"+id+"").is(':checked'))
			{ 
				quid=$("#"+id+"").val()+","+quid;
				
			}
		}
		$("#txtquid").val(quid);
	}
	
	function chbcheckall()
	{
		quid="";
		var collection=$("#userid");
		var inputs=collection.find("input[type=checkbox]");
		for(var x=0;x<inputs.length;x++)
		{
			var id=inputs[x].id;
			var name=inputs[x].name;
			if($("#checkall").is(':checked'))
			{
				quid=$("#"+id+"").val()+","+quid;
			}
			else
			{
				//inputs[x].checked = false;
				document.getElementById(id).checked=false;
				quid="";
			}
		}
		$("#txtquid").val(quid);
	}
	
</script>