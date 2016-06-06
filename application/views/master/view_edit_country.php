<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		
		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
						Manage Country
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<?php foreach($edit_country->result() AS $roww ) {} ?>
					<div class="panel-body">
						<div class="form">
							<form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/master/update_country/'.$roww->country_id; ?>" method="post" id="signupForm">
								<div class="form-body" id="city">
									
									<div class="form-group">
										<label class="col-md-3 control-label">Country Name</label>
										<div class="col-md-9">
											<input type="text" id="txtcounrty" name="txtcounrty" class="form-control input-inline input-medium" value="<?php echo $roww->name;?>" placeholder="Enter Country Name">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ISO Code </label>
										<div class="col-md-9">
											<input type="text" id="txtisocode" name="txtisocode" class="form-control input-inline input-medium" value="<?php echo $roww->iso_code_2;?>" placeholder="Enter ISO Code Name">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Other ISO Code</label>
										<div class="col-md-9">
											<input type="text" id="txtisoccode1" name="txtisoccode1" class="form-control input-inline input-medium" value="<?php echo $roww->iso_code_3;?>" placeholder="Enter Other ISO Code Name">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Format</label>
										<div class="col-md-9">
											<input type="text" id="txtaddressformat" name="txtaddressformat" class="form-control input-inline input-medium" value="<?php echo $roww->address_format;?>" placeholder="Enter Country Address Format ">
											<span class="help-inline">
												
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Use Postal Code</label>
										<div class="col-md-9">
											<div class="radio-list">
												<label class="radio-inline">
												<input type="radio" name="rdpostal" id="rdpostal1" value="1" <?php echo ($roww->postcode_required==1 ? 'checked': ''); ?> onClick="check1('1')"> Yes</label>
												<label class="radio-inline">
												<input type="radio" name="rdpostal" id="rdpostal2" value="0"  <?php echo ($roww->postcode_required==0 ? 'checked': ''); ?> onClick="check1('0')"> No</label>
												<input type="hidden" value="1" id="txtpostal" name="txtpostal" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Status</label>
										<div class="col-md-9">
											<div class="radio-list">
												<label class="radio-inline">
												<input type="radio" name="rbcity" id="rbcity1" value="1" <?php echo ($roww->status==1 ? 'checked': ''); ?> onClick="check2('1')"> Enable</label>
												<label class="radio-inline">
												<input type="radio" name="rbcity" id="rbcity2" value="0" <?php echo ($roww->status==0 ? 'checked': ''); ?> onClick="check2('0')"> Disable</label>
												<input type="hidden" value="1" id="txtstatus" name="txtstatus" />
											</div>
										</div>
									</div>
									
									
								</div>
								<div class="form-actions fluid">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-primary" type="button" onclick="conwv('signupForm')">Submit</button>
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
						View & Modify Country
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
										<th>Country Name</th>
										<th>ISO Code</th>
										<th>Other ISO Code</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$sn=1;
										foreach($allcountry->result() as $row)
										{
											$status=0;
											if($row->status==1)
											{
												$status="Enable";
											}
											if($row->status==0)
											{
												$status="Disable";
											}
										?>
										<tr>
											<td><?php echo $sn;?></td>
											<td><?php echo $row->name?></td>
											<td><?php echo $row->iso_code_2?></td>
											<td><?php echo $row->iso_code_3?></td>
											<td>
												<a href="<?php echo base_url();?>index.php/master/edit_country/<?php echo $row->country_id;?>" rel="facebox">
												<i class="ico-pencil"></i></a>
												<?php 
													if($status=="Enable")
													{
													?>&nbsp;
													<a href="<?php echo base_url();?>index.php/master/update_status_country/<?php echo $row->country_id;?>/0">
													<i class="ico-cancel-circle2"></i></a>
												</a>
												<?php
												}
												if($status=="Disable")
												{
												?>&nbsp;
												<a href="<?php echo base_url();?>index.php/master/update_status_country/<?php echo $row->country_id?>/1">
												<i class="ico-checkmark"></i></a>
											</a>
											<?php
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
							$("#txtpostal").val(id);
							}
							</script>
							<script>
							function check2(id)
							{
							$("#txtstatus").val(id);
							}
							</script>							