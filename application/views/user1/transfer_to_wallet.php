<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
	});
</script>
<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">Transfer</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-7">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Transfer</strong> In Team</h2>
					</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" parsley-validate action="<?php echo site_url('userprofile/transfer_to_user_amt'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data" onsubmit="return check_wallet()">
							<div class="form-group">
								<label class="control-label">User Name</label>
								<div>
									<input type="text" parsley-required="true" parsley-trigger="blur" readonly id="txtname" name="txtname" class="form-control" value="<?php echo trim($this->session->userdata('name')); ?>">
									<span id="divtxtname" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Recipient Login Id</label>
								<div>
									<input type="text" parsley-required="true" parsley-trigger="blur" id="txtuserid" name="txtuserid" class="form-control" placeholder="Enter Email Id" >
									<span id="divtxtuserid" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Amount</label>
								<div>
									<input type="text" parsley-required="true" parsley-trigger="blur" id="txtamt" name="txtamt" class="form-control" placeholder="Enter Amount">
									<span id="divtxtamt" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label">Pin Password</label>
								<div>
									<input type="password" parsley-required="true" parsley-trigger="blur" id="txtpwd" name="txtpwd" class="form-control" placeholder="Enter Pin Password">
									<span id="divtxtpwd" style="color:red"></span>
								</div>
							</div>
							
							<div class="form-group offset" id="teamid">
								<div>
									<button type="submit" class="btn btn-theme">Transfer</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>
			<div class="col-md-4">
				<div class="well bg-theme">
						<div class="widget-tile">
							<section>
								<h5><strong>Bitcoin  </strong> Rate </h5>
								<h4 class="conver"></h4>
							</section>
						</div>
					</div>
					
					<div class="well bg-theme">
						<div class="widget-tile">
							<section>
								<h5><strong>Available </strong> Transfer Amount </h5>
								<h4><i class="fa fa-gbp"></i> <?php echo $dash->WALLET_AMT;?></h4>
							</section>
						</div>
					</div>
				</div>
			</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
	
</div>
<!-- //main-->
<script>
function find_in_team()
{
	var userid=$("#txtuserid").val();
	var sessionid="<?php echo trim($this->session->userdata('e_email')); ?>";
	$.ajax(
		{
			type:"POST",
			url:"<?php echo base_url(); ?>index.php/userprofile/find_in_team",
			data: {'userid': userid, 'sessionid': sessionid},
			success: function(data) {
				if(data == 0)
				{
					$("#teamid").hide();
					$("#divtxtuserid").html("User Id Not In Team");
				}
				else
				{	
					$("#teamid").show();
					$("#divtxtuserid").html("");
				}
			}
		});
}
</script>

<script>
	function check_wallet()
	{
		var amt=<?php echo $useramount ?>;
		var trans_amt=$("#txtamt").val();
		var pin_pwd=<?php echo $pin_pwd ?>;
		var user_pwd=$("#txtpwd").val();
		if(parseInt(amt) < parseInt(trans_amt))
		{
			alert("User Have Insufficient Amount");
			return false;
		}
		else
		{
			if(pin_pwd != user_pwd)
			{
				alert("Pin Password Not Match");
				return false;
			}
			else
			{
				return true;
			}
		}
	}
</script>