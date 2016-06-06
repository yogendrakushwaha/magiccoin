//////////////////////////////////////////////////////////////////////////
//////////         MODEL SCHEDULING SCRIPT        //////////
/////////////////////////////////////////////////////////////////////

function validate_scheduling()
{
	var value=$('#txtquid').val();
	var dep=$('#dddepositor').val();
	if(dep!=null && dep!='-1')
	{
		if(value!='')
		{
			var depositor=	$('#dddepositor option:selected').attr('amt');
			var valNew=value.split(',');
			var count=(valNew.length)-1;
			var amt=0;
			for(i=0; i < parseInt(count); i++)
			{
				var valNew1=valNew[i].split('_');
				var amt=parseInt(valNew1[1])+parseInt(amt);
			}
			$('#txtamount').val(amt);
			$('#txttotamountdeposit').val(depositor);
			$('#tot_balance').html('Total Selected Amount: &pound;'+amt);
			if(dep!=0)
			{
				if(parseInt(amt)>parseInt(depositor))
				{
					$('#error_msg').html('Amount Exceeded');
					$('#tot_balance').append('Amount Exceeded');
					$('#sub-btn').hide();
				}
				else
				{
					$('#sub-btn').show();
					if(confirm('Are you sure to Scheduling?'))
					{
						$('#form_sample_1').submit();
					}
				}
			}
			else
			{
				$('#sub-btn').show();
				if(confirm('Are you sure to Scheduling?'))
				{
					$('#form_sample_1').submit();
				}
			}
		}
		else
		{
			$('#error_msg').html('Beneficiary Not Selected');
			$('#tot_balance').html('');
			$('#sub-btn').show();
		}
	}
	else
	{
		$('#error_msg').html('Depositor Not Selected');
		$('#dddepositor').focus();
		$('#tot_balance').html('');
		$('#sub-btn').show();
	}
}

/*-----------------Get Ticket details From Ticket id------------------------*/

function get_details(id)
{
	$.ajax(
	{
		type: "POST",
		url:baseUrl+"get_details/get_ticket_details",
		dataType: 'json',
		data: {'id':id},
		success: function(data) {
			$.each(data,function(i,item)
			{
				$("#divtitle").append(item.TICKET_TITLE);
				$("#divdesc").append(item.TICKET_DESC);
				$("#txtid").val(id);
				if(item.TICKET_REPLY!='')
				{
					$("#divreply").append(item.TICKET_REPLY);
				}
			});
		}
	});
}

/*------------------------------------------------|--------------------------|-----------------------------------------------*/
/*												  |							 |												 */
/*---------------------------------------------|  SRART SCRIPT FOR USER PANEL  |-----------------------------------------------*/
/*												  |							 |												 */
/*------------------------------------------------|--------------------------|-----------------------------------------------*/

function validte_password()
{
	var pass = $("#txtoldpassword").val();
	if(pass!="" )
	{
		$.ajax({
			type:"POST",
			url:baseUrl+"userprofile/validte_password",
			data:{'pass':pass},
			success:function(msg) 
			{
				if(msg=="" || msg==0 || msg=="false")
				{
					$('#divtxtoldpassword').html('Wrong Password');
					$('#txtoldpassword').val('');
				}
				else
				{
					$('#divtxtoldpassword').html('');
				}
			}
		});
	}
	else
	{
		$('#divtxtoldpassword').val('');
	}
}

function validte_pin_password()
{
	var pinpass = $("#txtoldppassword").val();
	if(pinpass!="" )
	{
		$.ajax({
			type:"POST",
			url:baseUrl+"userprofile/validte_pin_password",
			data:{'pinpass':pinpass},
			success:function(msg) 
			{
				if(msg=="" || msg==0 || msg=="false")
				{
					$('#divtxtoldppassword').html('Wrong Pin Password');
					$('#txtoldppassword').val('');
				}
				else
				{
					$('#divtxtoldppassword').html('');
				}
			}
		});
	}
	else
	{
		$('#divtxtoldpassword').val('');
	}
}

/*-----------------Validate User From Front Site------------------------*/

function validte_user()
{
	var username = $("#txtname").val();
	if(username!="" )
	{
		$.ajax({
			type:"POST",
			url:baseUrl+"get_details/validte_user",
			data:{'txtlogin':username},
			beforeSend: function() {
   			 	$('#login_submit').html('<i class="fa fa-spinner fa-spin" style="color:white"></i>');
			},
			success:function(msg) 
			{
				if(msg!="" && msg!=0 && msg!="false")
				{
					window.location.href=baseUrl+"welcome/view_signin?txtname="+username;
				}
				else
				{
					$('#txtname').val('');
					alert('Invalid user name');
					$('#login_submit').html('<button type="button" class="btn btn-primary" onclick="validte_user();" >Submit</button>');
					
				}
			}
		});
	}	
}

///**** BEGIN CEPTCHA CODE ****///

Captcha();
function Captcha(){
	var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	var i;
	for (i=0;i<6;i++){
		var a = alpha[Math.floor(Math.random() * alpha.length)];
		var b = alpha[Math.floor(Math.random() * alpha.length)];
		var c = alpha[Math.floor(Math.random() * alpha.length)];
		var d = alpha[Math.floor(Math.random() * alpha.length)];
	}
	var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d;
	$("#mainCaptcha").html(code);
}

function ValidCaptcha(){
	var string1 = removeSpaces($('#mainCaptcha').html());
	var string2 = removeSpaces($('#txtInput').val());
	if (string1 == string2){
		if($('#txtpwd').val()!=''){
			$('#form-signin').submit();
			}
		else{
			alert('Enter Password');
			$('#txtpwd').focus();
			return false;
			}
	}
	else{ 
		$('#txtInput').val('');
		alert('Invalid Captcha');
		return false;
	}
}

function removeSpaces(string){
	return string.split(' ').join('');
}

///**** END CEPTCHA CODE ****///


///**** Load CEPTCHA CODE ****///

$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results==null){
		return null;
	}
	else{
		return results[1] || 0;
	}
}
if(txtclass=='welcome')
{
	var tech = $.urlParam('txtname');
	$("#txtlogin").val(decodeURIComponent(tech));
}
if (navigator.userAgent.match(/IEMobile\/10\.0/) || navigator.userAgent.match(/MSIE 10.*Touch/)) {
	var msViewportStyle = document.createElement('style')
	msViewportStyle.appendChild(
	document.createTextNode(
	'@-ms-viewport{width:auto !important}'
	)
	)
	document.querySelector('head').appendChild(msViewportStyle)
}
///****END LOAD CEPTCHA CODE ****///

/*-----------------Reset Password------------------------*/

function reset_pwd()
{
	var txtuserid =$('#txtuserid').val();
	$.ajax(
	{
		type: "POST",
		url:baseUrl+"auth/resetpassword",
		data: "txtuserid="+txtuserid,
		success: function(msg) {
				alert("A Link is send on your Registered Email Id For Reset Your password !");
				window.location.href = baseUrl;
		}
	});	
}

/*------------------------Change Url Of deposit Form------------------------*/

function change_url(id)
{
	if(id == 1)
	{
		$("#rank").hide();
		$("#insert_data").attr("action" , baseUrl+"userprofile/insert_make_deposit");
	}
	else
	{
		$("#rank").show();
		$("#select_per").load(baseUrl+"get_details/get_perfect_account");
		$("#insert_data").attr("action" , baseUrl+"userprofile/perfectmoney_confirm");
	}
}

/*-----------------Reset Password------------------------*/

function get_recipent_details()
{
	var txtuserid =$('#txtrecipent').val();
	$.ajax(
	{
		type: "POST",
		url:baseUrl+"get_details/get_member_name",
		data: "txtintuserid="+txtuserid,
		success: function(msg) {
			var msg=msg.trim();
			if(msg!='' && msg!='false')
			{
				$("#divtxtrecipent").html(msg);
			}
			else
			{
				$("#divtxtrecipent").html('This Is Not Validate id');
				$("#txtrecipent").val('');
			}
		}
	});	
}

/*-----------------SELECT SINGLE USER IN CHECK BOX------------------------*/

var quid="";
	function chbchecksin()
	{
		quid="";
		var collection=$("#userid");
		var inputs=collection.find("input[type=checkbox]");
		for(var x=0;x<inputs.length;x++)
		{
			var id=inputs[x].id;
			if(document.getElementById(id).checked)
			{ 
				quid=id+","+quid;
			}
		}
		$("#txtquid").val(quid);
	}

/*-----------------SELECT MULTI USER IN CHECK BOX------------------------*/
	
	function chbcheckall()
	{
		quid="";
		var collection=$("#userid");
		var inputs=collection.find("input[type=checkbox]");
		for(var x=0;x<inputs.length;x++)
		{
			var id=inputs[x].id;
			if(document.getElementById('checkAll').checked == true)
			{
				if(document.getElementById(id).checked == false)
				{
					document.getElementById(id).checked=true;
					quid=id+","+quid;
				}
				else
				{
					quid=id+","+quid;
				}
			}
			else
			{
				document.getElementById(id).checked=false;
				quid="";
			}
		}
		$("#txtquid").val(quid);
	}