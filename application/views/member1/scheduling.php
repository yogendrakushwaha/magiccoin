<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
		<?php if($this->session->flashdata('succ')){ ?>
			//alert('<?php echo $this->session->flashdata('succ'); ?>');
			<?php }
			else if($this->session->flashdata('unsucc')){ 
			?>
			alert('<?php echo $this->session->flashdata('unsucc'); ?>');
		<?php } ?>
	});
</script>

<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->
<div id="main">	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">Scheduling</a></li>
	</ol>
	<!-- //breadcrumb-->
	<div id="content">
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>Scheduling </strong> </h2>
						<span id="tot_balance" style="color:red"> </span>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form parsley-validate id='form_topup' class="form-horizontal" action="<?php echo base_url().'index.php/member/scheduling_action'; ?>" method="post" data-collabel="3" data-alignlabel="left" >
							<div class="row"> 
								<div class="col-md-5">
									<select id="dddepositor" name="dddepositor" class="selectpicker form-control" title="Please select Depositor " parsley-required="true"   parsley-trigger="keyup" >
										<option value="-1" selected disabled hidden>Please select Depositor</option>
										<option value="0" amt="0" > Admin </option>
										<?php foreach($depositor as $d){ ?>
											<option value="<?php echo $d->m_top_id?>" amt="<?php echo $d->m_top_amount;?>" ><?php echo $d->USERID.' - '.$d->USERNAME.' - '.$d->USEREMAIL.' - &pound; '.$d->m_top_amount; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-5">
									<?php 
										/*
											<select id="ddbeneficiary" name="ddbeneficiary[]" class="selectpicker form-control" multiple title="Please select Beneficiary " onchange="validate_scheduling();" parsley-required="true"   parsley-trigger="keyup" >
												<option value="0" amt="0" > Admin </option>
												<?php foreach($beneficiary as $b) { ?>
													<option value="<?php echo $b->w_id?>" amt="<?php echo $b->m_w_amount;?>" ><?php echo $b->USERID.' - '.$b->USERNAME.' - '.$b->USEREMAIL.' - &pound; '.$b->m_w_amount; ?></option>
												<?php } ?>
											</select>
										*/
									?>
									<input type="hidden" name="txtamount" id="txtamount" value="" />
									<input type="hidden" name="txttotamount" id="txttotamount" value="" />
									<input type="hidden" name="txttotamountdeposit" id="txttotamountdeposit" />
									<input type="hidden" id="txtquid" name="txtquid">
									<span id="divddbeneficiary" style="color:red"></span>
								</div>
								<div class="col-md-2">
									<a href="javascript:void(0)" class='btn btn-theme' id='sub-btn' onclick="submit_form()"> Schedule </a>
								</div>
							</div>  
							
							<br>
							<br>
							
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th><input type="checkbox" id="checkAll" onchange="chbcheckall()"/></th>
												<th>S No.</th>
												<th>User Id</th>
												<th>User Name</th>
												<th>User Email</th>
												<th>User Mobile</th>
												<th>Amoount</th>
											</tr>
										</thead>
										<tbody id="userid">
												<?php
												$sn=1;
												?>
												<tr>
													<td align="center"><input type="checkbox" class="checkboxes" id="<?php echo '0'.'_'.'0.00'; ?>" name="<?php echo '0'.'_'.'0.00'; ?>"  value="<?php echo '0'.'_'.'0.00'; ?>" onClick="chbchecksin()"/></td>
													<td align="center"><?php echo $sn;?></td>
													<td align="center"><?php echo 'SUPERADMIN'; ?></td>
													<td align="center"><?php echo 'SUPERADMIN';?></td>
													<td align="center"><?php echo 'SUPERADMIN';?></td>
													<td align="center"><?php echo '999999999';?></td>
													<td align="center"><?php echo '&pound; - 0';?></td>
												</tr>
												<?php
												foreach($beneficiary as $b) 
												{
													$sn++;
												?>
												<tr>
													<td align="center"><input type="checkbox" class="checkboxes" id="<?php echo $b->w_id.'_'.$b->m_w_amount; ?>" name="<?php echo $b->w_id.'_'.$b->m_w_amount; ?>"  value="<?php echo $b->w_id.'_'.$b->m_w_amount; ?>" onClick="chbchecksin()"/></td>
													<td align="center"><?php echo $sn;?></td>
													<td align="center"><?php echo $b->USERID; ?></td>
													<td align="center"><?php echo $b->USERNAME;?></td>
													<td align="center"><?php echo $b->USEREMAIL;?></td>
													<td align="center"><?php echo $b->USERMOBILE;?></td>
													<td align="center"><?php echo '&pound; - '.$b->m_w_amount;?></td>
												</tr>
												<?php
												}
												?>
										</tbody>
									</table>
								</div>
							</div>
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