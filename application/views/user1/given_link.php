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
		<li class="active"><a href="#">GIVEN LINKS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row pricing">
			<div class="col-lg-12">
				<header class="panel-heading sm">
					<h2><strong>GIVEN  </strong> LINKS </h2>
				</header>
				<div class="panel-body">
					<?php /*<table class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
						<thead>
						<tr>
						<th>S No.</th>
						<th>DATE</th>
						<th>LOGIN ID</th>
						<th>ORDER ID</th>
						<th>BANK HOLDER NAME</th>
						<th>PHONE NO</th>
						<th>AMOUNT</th>
						<th>ACCOUNT NO</th>
						<th>BANK NAME</th>
						<th>BRANCH NAME</th>
						<th>SWIFT CODE</th>
						<th>RECEIPT</th>
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
						<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_user_id:$rows->BENIUSERID; ?></td>
						<td align="center"><?php echo $rows->SCHEDULEORDERID; ?></td>
						<td align="center"><?php echo ucwords(($rows->BENIUSERID=='')?$admin_bank_detail->or_m_name:$rows->BENIBANKHOLDERNAME); ?></td>
						<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_mobile_no:$rows->BENIMOBILE; ?></td>
						<td align="center">&pound; <?php echo $rows->SCHEDULEAMOUNT; ?></td>
						<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_cbsacno:$rows->BANKACCNO; ?></td>
						<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_name:$rows->BENIBANKNAME; ?></td>
						<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_branch:$rows->BENIBANKBRANCHNAME; ?></td>
						<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_ifscode:$rows->BENIBANKIFSC; ?></td>
						<td align="center">
						<?php 
						if($rows->RECIPT=='')
						{
						?>
						<a href="<?php echo site_url('userprofile/upload_recipt/'.$rows->SCHEDULEID) ?>">Upload Recipt</a>
						<?php
						}
						else
						{
						echo substr("<a href='".base_url()."application/recipt/".$rows->RECIPT."' target='_blank'>".$rows->RECIPT."</a>";
						}
						?>
						</td>
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
						<td></td>
						<td></td>
						<td  align="center">Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						</tr> 
						</tbody>
						</table>
					*/ ?>
					
					<?php
						$sn=1;
						$sum=0;
						foreach($page_data as $rows)
						{
						?>
						<div class="col-md-4">
							<ul class="plan corner-flip flip-gray">
								<li class="plan-name"> ORDER ID : <?php echo $rows->SCHEDULEORDERID;?> </li>
								<li class="plan-price"> &pound;<span> <?php echo $rows->SCHEDULEAMOUNT; ?> </span> </li>
								<li> <strong>DATE</strong> : <?php echo $rows->SCHEDULEREQDATE;?> </li>
								<li> <strong>BANK HOLDER NAME</strong> : <?php echo ucwords(($rows->BENIUSERID=='')?$admin_bank_detail->or_m_name:$rows->BENIBANKHOLDERNAME); ?> </li>
								<li> <strong>PHONE NO</strong> : <?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_mobile_no:$rows->BENIMOBILE; ?> </li>
								<li> <strong>ACCOUNT NO</strong> : <?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_cbsacno:$rows->BANKACCNO; ?> </li>
								<li> <strong>BANK NAME</strong> : <?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_name:$rows->BENIBANKNAME; ?> </li>
								<li> <strong>BRANCH NAME</strong> : <?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_branch:$rows->BENIBANKBRANCHNAME; ?> </li>
								<li> <strong>SWIFT CODE</strong> : <?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_ifscode:$rows->BENIBANKIFSC; ?> </li>
								<?php
									if($rows->RECIPT)
									{
									?>
									<li> <strong>RECIPT</strong> : <a href="<?php echo base_url()."application/recipt/".$rows->RECIPT; ?>" target="_blank"><?php echo substr($rows->RECIPT,0,30); ?>...</a></li>
									<?php
									}
								?>
								<?php
									if($rows->SCHDULETRANSID)
									{
									?>
									<li> <strong>DESCRIPTION & TRANSACTION</strong> : <?php echo $rows->SCHDULETRANSID; ?></li>
									<?php
									}
								?>
								<li class="plan-action"> 
									<?php 
										if($rows->RECIPT=='')
										{
										?>
										<a href="<?php echo site_url('userprofile/upload_recipt/'.$rows->SCHEDULEID) ?>" class="btn btn-theme-inverse">Upload Recipt</a>
										<?php
										}
									?>
								</li>
								<?php 
									if($rows->SCHDULETRANSID=='')
									{
									?>
									<li> <strong>DESCRIPTION & TRANSACTION</strong> : <input type="text" name="txtdesc<?php echo $sn; ?>" id="txtdesc<?php echo $sn; ?>" /></li>
									<li> <input type="button" name="btnsubmit" id="btnsubmit" class="btn btn-danger" onclick="update_transid(<?php echo $sn; ?>,<?php echo $rows->SCHEDULEID; ?>)" value="submit"/> </li>
									<?php
									}
								?>
							</ul>
						</div>
						
						<?php 
							$sum=$sum+$rows->SCHEDULEAMOUNT;
							$sn++;
						} 
					?> 
					
				</div>
				<p style="font-size:12px;">
					<span style="color:red;">*NOTE - </span>
					<ul style="font-size:12px;">
						<li>
							<span style="color:black;">1 - GIVEN REQUEST - AFTER REQUEST APPROVE PAYMENT WILL BE TRANSFER 48 TO 72 HRS.</span>
						</li>
						<li>
							<span style="color:black;">2 - IF YOU DON'T PAYMENT IN TIME YOUR ID WILL BE BLOCKED.</span>
						</li>
					</ul>
				</p> 
				<br>
			</div>
			
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>GIVEN  </strong> LINKS REPORT</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div style="overflow:auto;">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>S No.</th>
									<th>DATE</th>
									<th>ORDER ID</th>
									<th>BANK HOLDER NAME</th>
									<th>PHONE NO</th>
									<th>AMOUNT</th>
									<th>ACCOUNT NO</th>
									<th>BANK NAME</th>
									<th>BRANCH NAME</th>
									<th>SWIFT CODE</th>
									<th>IFSC CODE</th>
									<th>STATUS</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($given as $rows)
									{
									?>
									<tr>
										<td align="center"><?php echo $sn;?></td>
										<td align="center"><?php echo $rows->SCHEDULEREQDATE;?></td>
										<td align="center"><?php echo $rows->SCHEDULEORDERID; ?></td>
										<td align="center"><?php echo ucwords(($rows->BENIUSERID=='')?$admin_bank_detail->or_m_name:$rows->BENIBANKHOLDERNAME); ?></td>
										<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_mobile_no:$rows->BENIMOBILE; ?></td>
										<td align="center">&pound; <?php echo $rows->SCHEDULEAMOUNT; ?></td>
										<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_cbsacno:$rows->BANKACCNO; ?></td>
										<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_name:$rows->BENIBANKNAME; ?></td>
										<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_branch:$rows->BENIBANKBRANCHNAME; ?></td>
										<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_ifscode:$rows->BENIBANKIFSC; ?></td>
										<td align="center"><?php echo ($rows->BENIUSERID=='')?$admin_bank_detail->or_m_b_ifscode:$rows->BENIBANKIFSCORG; ?></td>
										
										<td align="center">
											<?php
												if($rows->SCHEDULESTATUS==1)
													echo "Pending";
												if($rows->SCHEDULESTATUS==2)
													echo "Approve";
												if($rows->SCHEDULESTATUS==0)
													echo "Reject";
											?>
										</td>
									</tr>   
									<?php 
										$sum=$sum+$rows->SCHEDULEAMOUNT;
										$sn++;
									} 
								?> 
									<tr>
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center" nowrap>Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
										<td align="center"></td>
									</tr>
							</tbody>
						</table>
						</div>
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
	function update_transid(id,id2)
	{
		var msg=$("#txtdesc"+id).val();
		
		$.post("<?php echo base_url(); ?>index.php/userprofile/update_transid", {msg: msg,schid: id2},function(){
			alert('Your transaction No Has Been Updated');
			location.reload();
		});
	}
</script>