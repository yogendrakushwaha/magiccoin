<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">Deactivate Menber</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading sm">
						<h2><strong>View </strong> Activate Member </h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url();?>index.php/member/update_deactivate_member" method="post">
							<div class="form-group offset" align="center">
								<div>
									<input type="hidden" id="txtquid" name="txtquid" >
									<button type="submit" class="btn btn-theme">Deactivate Member</button>
								</div>
							</div>
							
							<table class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
								<thead>
									<tr>
										<th><input type="checkbox" id="checkAll" onchange="chbcheckall()"/></th>
										<th>S No.</th>
										<th>Login Id</th>
										<th>Login Name</th>
										<th>Joining Date</th>
										<th>Mobile</th>
									</tr>
								</thead>
								<tbody align="center" id="userid">
									<?php
										$sn=0;
										foreach($rec->result() as $row)
										{
											$sn++;
										?>
										<tr>
											<td><input type="checkbox" class="checkboxes" id="<?php echo $row->USER_REG; ?>" name="<?php echo $row->USER_REG; ?>"  value="<?php echo $row->USER_REG; ?>" onClick="chbchecksin()"/></td>
											<td><?php echo $sn; ?></td>
											<td><?php echo $row->USER_USERID; ?></td>
											<td><?php echo $row->USER_NAME; ?></td>
											<td><?php echo $row->USER_DOJ; ?></td>
											<td><?php echo $row->USER_MOBILE; ?></td>
										</tr>
										<?php
										}
									?>
								</tbody>
							</table>
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
<script>
	var quid="";
	function chbchecksin()
	{
		quid="";
		var collection=$("#userid");
		var inputs=collection.find("input[type=checkbox]");
		for(var x=0;x<inputs.length;x++)
		{
			var id=inputs[x].id;
			if(document.getElementById(id).checked)
			{ 
				quid=id+","+quid;
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
			if(document.getElementById('checkAll').checked == true)
			{
				if(document.getElementById(id).checked == false)
				{
					document.getElementById(id).checked=true;
					quid=id+","+quid;
				}
				else
				{
					quid=id+","+quid;
				}
			}
			else
			{
				document.getElementById(id).checked=false;
				quid="";
			}
		}
		$("#txtquid").val(quid);
	}
</script>