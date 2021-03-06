<?php
	foreach($rec as $row)
	{
		break;
	}
	?>
<div id="main">
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">Update Details</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading sm">
						<h2><strong>Member</strong> Update Form</h2>
						<label class="color">Registration :<strong> Enter Applicant details</strong> </label>
					</header>
					<div class="panel-body">
						<form parsley-validate action="<?php echo site_url("member/update_data/".$row->USER_REG); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="check('insert_data')">
							<div class="row">
								<div class="col-md-12">
									<h5>Member :<strong> Sponsor  Details</strong> </h5>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Sponser Id*</label>
										<input type="text" class="form-control" name="txtintroducer_id" id="txtintroducer_id" parsley-required="true"   parsley-trigger="keyup" parsley-error-message="Please Enter Sponser Id" placeholder="Enter Sponser Id Here" value="<?php echo $row->USER_INTRO_USERID;?>" readonly>
									</div>
								</div>
							</div>
							<hr/>
							<!-- Begin Personal Details  -->
							<div class="row">
								<div class="col-md-12">
									<h5> Member :<strong> Personal Details</strong> </h5>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Applicant Name *</label>
										<input type="text" class="form-control" name="txtassociate_name" id="txtassociate_name" parsley-required="true"   parsley-trigger="keyup" parsley-error-message="Please Enter Applicant Name" placeholder="Enter Applicant Name Here" value="<?php echo $row->USER_NAME;?>" >
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Date of Birth </label>
										
										<div class="input-group date form_datetime" data-picker-position="bottom-left" data-date-start-date="+0d"  data-date-format="dd MM yyyy" >
											<input type="text" class="form-control" name="txtdob" id="txtdob" value="<?php echo $row->USER_DOB;?>" >
											<span class="input-group-btn btn-group-sm">
												<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Gender</label>
										<br/>
										<input type="radio" id="txtgender" name="txtgender" <?php echo ($row->USER_GENDER==1)?'checked="checked"':'';?>  value="1" >
										<label>Male</label>
										<input  type="radio" id="txtgender" name="txtgender" <?php echo ($row->USER_GENDER==0)?'checked="checked"':'';?> value="0" >
										<label >Female</label>
									</div>
								</div>
							</div>
							<!-- End Personal Details  -->
							<hr/>
							<!-- Begin Contact Details  -->
							<div class="row">
								<div class="col-md-12">
									<h5>Member :<strong> Contact Details</strong></h5> 
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Mobile Number *</label>
										<input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="txtphone" id="txtphone" parsley-required="true" parsley-trigger="keyup"  parsley-validation-minlength="1" placeholder="Enter Mobile Number Here" value="<?php echo $row->USER_MOBILE;?>">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Email Address *</label>
										<input type="text" class="form-control" name="txtemail" id="txtemail" parsley-type="email"  parsley-required="true"   parsley-trigger="keyup" placeholder="Enter Email Here"  value="<?php echo $row->USER_EMAIL;?>" readonly>
										<span id="divtxtemail" class="help-inline" style="color:red"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Country</label>
										<select id="ddcountry" name="ddcountry" class="form-control" >
											<option value="-1" selected disabled hidden>Please select country </option>
											<?php foreach($country->result() as $row1)
												{
												?>
												<option value="<?php echo $row1->country_id;?>" <?php if($row->USER_COUNTRY==$row1->country_id){echo 'selected';}else{echo '';}?> ><?php echo $row1->name; ?></option>
												<?php
												} 
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Zip Code</label>
										<input type="text" class="form-control" name="txtpincode" id="txtpincode"  parsley-trigger="keyup" parsley-validation-minlength="1" placeholder="Enter Pincode Here" value="<?php echo $row->USER_PINCODE; ?>" >
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<label class="control-label">Address</label>
										<textarea class="form-control" name="txtaddress" id="txtaddress"  rows="3"><?php echo $row->USER_ADDRESS;?></textarea>
									</div>
								</div>
								
							</div>
							<!-- End Contact Details  -->
							<hr/>
							<!-- Begin Bank & Nominee  Details  -->
							<?php
							if($bank->num_rows() > 0)
							{
								foreach($bank->result() as $b)
								{
									break;
								}
							?>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Acount Holder Name *</label>
											<input type="text" class="form-control" name="txtaccname" id="txtaccname" parsley-required="true" parsley-trigger="keyup" placeholder="Enter Acount Holder Name Here" value="<?php echo $b->or_m_name;?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Acount Number *</label>
											<input type="text" class="form-control" name="txtaccnum" id="txtaccnum" parsley-trigger="keyup" placeholder="Enter Acount Number Here" value="<?php echo $b->or_m_b_cbsacno;?>" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Bank Name*</label>
											<input type="text" class="form-control" name="txtbankname" id="txtbankname" parsley-required="true" parsley-trigger="keyup" placeholder="Enter Bank Here"  value="<?php echo $b->or_m_b_name;?>" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Branch Name*</label>
											<input type="text" class="form-control" name="txtbranch" id="txtbranch" placeholder="Enter Branch Here" value="<?php echo $b->or_m_b_branch; ?>" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Swift Code</label>
											<input type="text" class="form-control" name="txtifsc" id="txtifsc"  placeholder="Enter Swift Code Here" value="<?php echo $b->or_m_b_ifscode;?>">
											<input type="hidden" class="form-control" name="txtbankid" id="txtbankid" value="<?php echo $b->or_m_bid;?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">IFSC Code</label>
											<input type="text" class="form-control" name="txtcard" id="txtcard" placeholder="Enter IFSC Code Here" value="<?php echo $b->or_m_b_cardno;?>">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Currency *</label>
											<select id="ddcurr" name="ddcurr" class="form-control">
											<?php foreach($curr->result() as $c)
												{
												?>
												<option value="<?php echo $c->m_cur_id;?>" <?php echo ($b->or_m_b_currency==$c->m_cur_id)?'selected':'';?> ><?php echo $c->m_cur_symbol; ?></option>
												<?php
												} 
											?>
										</select>
										</div>
									</div>
								</div>
							<?php
							}
							?>
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Submit</button>
									<button type="reset" class="btn" onclick="$( '#formID' ).parsley( 'destroy' )"> Reset form</button>
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
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
			get_city();
			function get_city()
			{
				var ddstate=$("#ddstate").val();
				var ocity=$("#hdocity").val();
				if(ddstate!="-1")
				{
					$.ajax(
					{
						type:"POST",
						url:"<?php echo base_url(); ?>index.php/welcome/get_city",
						dataType: 'json',
						data: {'ddstate': ddstate},
						success: function(data) {
							$("#ddcity").empty();
							$("#ddcity").append("<option value=-1>Select City</option>");
							$.each(data,function(i,item)
							{
								if(ocity!="")
								{
									if(item.m_loc_id==ocity)
									{
										$('#ddcity').append("<option value="+item.m_loc_id+" selected>"+item.m_loc_name+"</option>");
									}
									else
									{
										$('#ddcity').append("<option value="+item.m_loc_id+">"+item.m_loc_name+"</option>");
									}
								}
								else
								{
									$('#ddcity').append("<option value="+item.m_loc_id+">"+item.m_loc_name+"</option>");
								}
							});
						}
					});
				}
			}
	});
</script>