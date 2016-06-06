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
		<li class="active"><a href="#">REJECTED LINKS</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>REJECTED  </strong> LINKS </h2>
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
									<th>Date</th>
									<th>Login ID</th>
									<th>User Name</th>
									<th>Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									$sum=0;
									foreach($page_data as $rows)
									{ 
									?>
									<tr align="center">
										<td><?php echo $sn;?></td>
										<td align="center"><?php echo $rows->SCHEDULEREQDATE; ?></td>
										<td><?php echo $rows->DEPOSITORUSERID; ?></td>
										<td><?php echo $rows->DEPOSITORNAME; ?></td>
										<td><?php echo $rows->SCHEDULEAMOUNT; ?></td>
									</tr>   
									<?php
										$sum=$sum+$rows->SCHEDULEAMOUNT;
										$sn++;
									} 
								?> 
									<tr align="center">
										<td><span style="display:none;"><?php echo $sn; ?></span></td>
										<td align="center"></td>
										<td></td>
										<td></td>
										<td nowrap>Total = <i class='fa fa-gbp'></i> <?php echo $sum; ?></td>
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