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
		<li><a href="#">ADMIN</a></li>
		<li class="active"><a href="#">GIVEN LINKS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
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
									<th>RECEIPT</th>	
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
										<td align="center">
											<?php 
												if($rows->RECIPT!='')
												{
													echo "<a href='".base_url()."application/recipt/".$rows->RECIPT."' target='_blank'>".substr($rows->RECIPT,0,30)."</a>";
												}
											?>
										</td>
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