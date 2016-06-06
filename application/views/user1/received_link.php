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
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">RECEIVED LINKS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">

			

			<div class="col-lg-12">

				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>RECEIVED </strong>LINKS</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>S No.</th>
									<th>Date</th>
									<th>Login ID</th>
									<th>Mobile No</th>
									<th>Amount</th>
									<th>Transaction ID</th>
									<th>Receipt</th>
									<th colspan=2>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($page_data as $rows)
									{ 
									?>
									<tr>
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $rows->SCHEDULEREQDATE;?></td>
										<td align="center"><?php echo $rows->DEPOSITORUSERID;?></td>
										<td align="center"><?php echo $rows->DEPOSITORMOBILE;;?></td>
										<td align="center"><?php echo $rows->SCHEDULEAMOUNT;?></td>
										<td align="center"><?php echo $rows->SCHDULETRANSID;?></td>
										<td align="center"><a href="<?php echo base_url(); ?>application/recipt/<?php echo $rows->RECIPT;?>" target="_blank"><?php echo substr($rows->RECIPT,0,30); ?></a></td>
										<td align="center">
										<form parsley-validate id='form_topup<?php echo $sn;?>' class="form-horizontal" action="<?php echo site_url('userprofile/received_link_action'); ?>" method="post" data-collabel="3" data-alignlabel="left" >
											<input type='hidden' id="depositor" name="depositor" value='<?php  echo $rows->DEPOSITORID;?>'/>
											<input type='hidden' id="sch_id" name="sch_id" value='<?php echo $rows->SCHEDULEID;?>'/>
											<input type='hidden' id="txtamount" name="txtamount" value='<?php echo $rows->SCHEDULEAMOUNT;?>'/>
											<select id="ddstatus" name="ddstatus" class="form-control" >
												<option value="-1" selected disabled hidden>Please select action </option>
												<option value="2" >Approve</option>
												<option value="0" >Reject</option>
											</select>
										</form>
										</td>
										<td><a href="javascript:void(0)" class='btn btn-theme' onclick="$('#form_topup<?php echo $sn;?>').submit();"> Go </a></td>
									</tr>   
									<?php 
										$sum=$sum+$rows->SCHEDULEAMOUNT;
										$sn++;
									} 
								?> 
									<tr>
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td></td>
										<td></td>
										<td></td>
										<td nowrap align="center" >Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
										<td></td>
										<td></td>
									</tr>
							</tbody>
						</table>
					</div>
				</section>
				<p style="font-size:12px;">
					<span style="color:red;">*NOTE - </span>
					<ul style="font-size:12px;">
						<li>
							<span style="color:black;">1 - RECIEVE REQUEST - PLEASE APPROVE PAYMENT IN 72 HRS.</span>
						</li>
					</ul>
				</p> 
				<BR>
			</div>
			
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>RECEIVE </strong> LINKS REPORT</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>S No.</th>
									<th>Date</th>
									<th>Login ID</th>
									<th>Amount</th>
									<th colspan=2>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($recive->result() as $row)
									{ 
									?>
									<tr>
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $row->SCHEDULEREQDATE;?></td>
										<td align="center"><?php echo $row->DEPOSITORUSERID;?></td>
										<td align="center"><?php echo $row->SCHEDULEAMOUNT;?></td>
										<td align="center">
										<?php
										if($row->SCHEDULESTATUS == 1)
										{
										?>
											Pending
										<?php
										}
										if($row->SCHEDULESTATUS == 2)
										{
										?>
											Approve
										<?php
											}
											if($row->SCHEDULESTATUS == 0)
											{
										?>
											Reject Link
											<?php
											}
											?>
										</td>
									</tr>   
									<?php 
										$sum=$sum+$row->SCHEDULEAMOUNT;
										$sn++;
									} 
								?> 
									<tr>
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center">Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>	
										<td align="center"></td>
									</tr>
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