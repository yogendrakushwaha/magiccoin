
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
		<li class="active"><a href="#">Approve DEPOSIT</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>Approve </strong> DEPOSIT </h2>
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
									<th>User Id</th>
									<th>User Name</th>
									<th>Amount</th>
									<th colspan=2>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								/*	$sn=1;
									foreach($topup as $rows)
									{
										//print_r($rows); */
									?>
									<tr align="center">
										<td><?php //echo $sn;?></td>
										<td><?php //echo $rows->USERID;?></td>
										<td><?php //echo $rows->USERNAME;;?></td>
										<td><?php //echo $rows->m_top_amount;?></td>
										<td>
										<form parsley-validate id='form_topup' class="form-horizontal" action="<?php // echo site_url('member/update_topup'); ?>" method="post" data-collabel="3" data-alignlabel="left" >
											<select id="dduser" name="dduser" class="form-control" >
												<option value="-1" selected disabled hidden>Please select action </option>
												<option value="2" >Approve</option>
												<option value="0" >Reject</option>
											</select>
											<input type='hidden' id="ddrequest" name="ddrequest" value='<?php // echo $rows->m_top_id;?>'/>
										</form>
										</td>
										<td><a href="javascript:void(0)" class='btn btn-theme' onclick="$('#form_topup').submit();"> Go </a></td>
									</tr>   
									<?php 
									/*	$sn++;
									} */
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