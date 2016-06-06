<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
	});
</script>
<div class="parallax_sec3">
	<h2>You May Register <span> by Filling in The Form </span></h2>
	<br>
	
	<div class="container">
		<form action="<?php echo site_url('welcome/register_candidate'); ?>" method="post" class="horizontal-form" id="signupForm" onsubmit="return check('signupForm')">
			<div class="row">
				<div class="col-md-6 wow fadeInRight">
					<label class="control-label">Reference Id*:</label>
					<p id="text-p1">(Fill Reference Id)</p>
					
				</div>
				<div class="col-md-6 wow fadeInRight">
					<input name="txtintroducer_id" id="txtintroducer_id" type="text" class="form-control empty" onblur="get_intro_detail()">
					<span id="divtxtintroducer_id" style="color:red"></span>
					<input name="txtintroducer_name" id="txtintroducer_name" readonly type="text" style="border:none; background-color: #F2F2F4;">
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 wow fadeInRight">
					<label class="control-label">Your Choise:</label>
				</div>
				<div class="col-md-6 wow fadeInRight" id="leg">
					<label class="radio-inline">
						<input type="radio" name="rbjoin_leg" id="rbjoin_leg1" value="L" onClick="check_leg()">Left
					</label>
					<label class="radio-inline">
						<input type="radio" name="rbjoin_leg" id="rbjoin_leg2" value="R" onClick="check_leg()">Right
						<input type="hidden" value="0" id="txtjoin_leg" name="txtjoin_leg" />
					</label>         
				</div>
				<input type="hidden" class="form-control empty" name="txtparent_id" id="txtparent_id" onblur="get_parent_detail()">
				<input type="hidden" class="form-control empty" name="txtparent_name" id="txtparent_name" >
				<input type="hidden" value="1" id="txtproc" name="txtproc" />
			</div>
			
			<div class="col-md-12 wow fadeInRight">
				<div class="row">
					<div class="col-md-6 wow fadeInRight">
						<label class="control-label">Name*:</label>
						<p id="text-p1">
							(A Nickname is Possible)
						</p>
						
					</div>
					<div class="col-md-6 wow fadeInRight">
						<input type="text" name="txtassociate_name" id="txtassociate_name" class="form-control empty">
						<span id="divtxtassociate_name" style="color:red"></span>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6 wow fadeInRight">
						<label class="control-label">E-mail *:</label>
						<p id="P1">
							(For Example: example@gmail.com)
						</p>
						
					</div>
					<div class="col-md-6 wow fadeInRight">
						<input type="text" name="txtemail" id="txtemail" class="form-control" onblur="validate_email()">
						<span id="divtxtemail" style="color:red"></span>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 wow fadeInRight">
						<label class="control-label">Mobile phone number *::</label>
						<p id="P4">
							(For Example, 084995551234)
						</p>
						
					</div>
					<div class="col-md-6 wow fadeInRight">
						<input type="text" name="txtmobile" id="txtmobile" maxlength="10" class="form-control" onblur="validate_mobile()">
						<span id="divtxtmobile" style="color:red"></span>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<label class="control-label">Country* :</label>
						<p id="P6">
							(Select Your Country)
						</p>
					</div>
					<div class="col-md-6 wow fadeInRight">
						<select id="ddcountry" name="ddcountry" class="form-control opt">
							<option selected="selected" value="-1">Select Country</option>
							<?php foreach($country->result() as $row)
								{
								?>
								<option value="<?php echo $row->country_id;?>"><?php echo $row->name;?></option>
								<?php
								}
							?>
						</select>
						<span id="divddcountry" style="color:red"></span>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6 wow fadeInRight">
					</div>
					<div class="col-md-6 wow fadeInRight">
						<p>
							<input id="chkAgree" type="checkbox" name="chkAgree">
							Having read the <a href="#.">WARNING</a>, I am well aware fully of the risks. Being in sound mind, I have decided to become a member of Magic Coin.
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 wow fadeInRight">
					</div>
					<div class="col-md-6 wow fadeInRight">
						<br>
						<input type="submit" name="btnSave" value="REGISTER IN MAGIC COIN"  class="btn btn-primary btn-lg">
					</div>
				</div>
			</div>
		</form>
	</div>
</div><!-- end tweets section -->