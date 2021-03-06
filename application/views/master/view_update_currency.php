
<?php if($update->num_rows() > 0) { 
	foreach($update->result() AS $row)
	?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Edit Currency
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/master/update_currency/'.$row->Cur_id; ?>" method="post" id="signupForm">
								<div class="form-body" id="city">
									<div class="form-group">
										<label class="col-md-3 control-label">Currency Name</label>
										<div class="col-md-9">
											<input type="text" id="txtcurrencyname" name="txtcurrencyname" class="form-control input-inline input-medium" value="<?php echo $row->Cur_name; ?>" placeholder="Enter Currency Name">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Currency Code</label>
										<div class="col-md-9">
											<input type="text" id="txtcurrencycode" name="txtcurrencycode" class="form-control input-inline input-medium" value="<?php echo $row->Cur_symbol; ?>" placeholder="Enter Currency Code">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Currency Icon</label>
										<div class="col-md-9">
											<input type="text" id="txtcurrencyicon" name="txtcurrencyicon" class="form-control input-inline input-medium" value="<?php echo $row->Cur_icon; ?>" placeholder="Enter Currency Icon" />
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Currency Value</label>
										<div class="col-md-9">
											<input type="text" id="txtcurrencyvalue" name="txtcurrencyvalue" class="form-control input-inline input-medium" value="<?php echo $row->Cur_gbp_conversion; ?>" placeholder="Enter Currency Value">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Status</label>
										<div class="col-md-9">
											<div class="radio-list">
												<label class="radio-inline">
												<input type="radio" name="rdcurrency" id="rdcurrency1" value="1" <?php echo ($row->Cur_status==1 ? 'checked':''); ?> onClick="check1('1')"> Enable</label>
												<label class="radio-inline">
												<input type="radio" name="rdcurrency" id="rdcurrency2" value="0" <?php echo ($row->Cur_status==0 ? 'checked':''); ?> onClick="check1('0')"> Disable</label>
												<input type="hidden" value="<?php echo ($row->Cur_status); ?>" id="txtstatus" name="txtstatus" />
											</div>
										</div>
									</div>
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm')">Update</button>
										<button type="button" class="btn btn-default">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			
			
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
						View Currency
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
                    <div class="panel-body">
						<div class="adv-table">
							<table  class="display table table-bordered table-striped" id="dynamic-table">
								<thead>
									<tr>
										<th>S No.</th>
										<th>Currency Name</th>
										<th>Currency Symbol</th>
										<th>Currency Icon</th>
										<th>Currency Value</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$sn=1;
										foreach($currency->result() as $allrow)
										{
											$status=0;
											if($allrow->Cur_status==1)
											{
												$status="Enable";
											}
											if($allrow->Cur_status==0)
											{
												$status="Disable";
											}
										?>
										<tr>
											<td><?php echo $sn;?></td>
											<td><?php echo $allrow->Cur_name?></td>
											<td><?php echo $allrow->Cur_symbol?></td>
											<td><?php echo $allrow->Cur_icon?></td>
											<td><?php echo $allrow->Cur_gbp_conversion?></td>
											<td>
												<a href="<?php echo base_url();?>index.php/master/select_currency/<?php echo $allrow->Cur_id;?>" rel="facebox">
													<i class="fa fa-edit (alias)"></i>
													<?php 
														if($status=="Enable")
														{
														?>&nbsp;
														<a href="<?php echo base_url();?>index.php/master/status_currency/<?php echo $allrow->Cur_id;?>/0">
															<i class="fa fa-trash-o"></i>
														</a>
														<?php
														}
														if($status=="Disable")
														{
														?>&nbsp;
														<a href="<?php echo base_url();?>index.php/master/status_currency/<?php echo $allrow->Cur_id?>/1">
															<i class="fa fa-undo"></i>
															</a><?php
														}
													?>
												</td>
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
		function check1(id)
		{
			$("#txtstatus").val(id);
		}
	</script>	
<?php } ?>