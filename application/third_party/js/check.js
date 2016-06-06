function check(get_id)
{
	var collection=$("#"+get_id);
	var mark=0;
	var obtainmark=0;
	var vali=false;
	var inputs=collection.find("input[type=text],select,textarea,input[type=url],input[type=hidden],input[type=password],input[type=email],input[type=file],input[type=number]");
	for(var x=0;x<inputs.length;x++)
	{
		var id=inputs[x].id;
		var name=inputs[x].name;
		var value=$("#"+id+"").val();
		var type=inputs[x].type;
		if($("#"+id+"").attr('class')=="form-control empty" || $("#"+id+"").attr('class')=="emptyfile" || $("#"+id+"").attr('class')=="form-control default-date-picker empty" )
		{
			if((type=="text" || type=="textarea" || type=="url" || type=="hidden" || type=="password" || type=="number" || type=="file") && value=="" && value==0 )
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.You can't leave this empty");
				return false;
			}
			if(type=="password")
			{
				var val=$("#"+id+"").val();
				$("#"+id+"").html('');
				if(val.length >= 6 && val.length <= 10)
				{
					$("#div"+id+"").html('');
				}
				else
				{
					$("#"+id+"").focus();
					$("#div"+id+"").html("Password must be Greater than 6 Digit and less than 10!. ");
					return false;
				}
			}
		}
	
		
		if($("#"+id+"").attr('id')=="txtcpassword")
		{
			if(type=="password" && value!="" && value!=0 )
			{
				var pval=$("#txtpassword").val();
				var cval=$("#txtcpassword").val();
				if(pval==cval)
				{
					$("#divtxtconfirm").html('');		
				}
				else
				{
					$("#"+id+"").focus();
					$("#divtxtconfirm").html("Password does't Match. ");
					return false;
				}
			}
			else
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is req");
				return false;
			}
		}
		
		
		if($("#"+id+"").attr('class')=="form-control numeric" || $("#"+id+"").attr('class')=="form-control input-medium input-inline numeric")
		{
			if((type=="text" || type=="textarea") && value!="" )
			{
				var pattern=/^[0-9]+$/; 
				if($("#"+id+"").val().match(pattern))  
				{  
					$("#div"+id+"").html('');
				}  
				else
				{
					$("#"+id+"").focus();
					$("#div"+id+"").html("*Only numeric characters allowed. You have entered an invalid input in this field!");
					return false;  
				}
			}
			else
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.You can't leave this empty");
				return false;
			}
		}
		
		if($("#"+id+"").attr('class')=="form-control aplha_only" || $("#"+id+"").attr('class')=="form-control input-lg aplha_only" || $("#"+id+"").attr('class')=="form-control input-medium input-inline aplha_only")
		{
			if((type=="text" || type=="textarea") && value!="" && value!=0 )
			{
				var pattern=/^[a-zA-Z. ]*$/;
				if($("#"+id+"").val().match(pattern))  
				{  
					$("#div"+id+"").html('');
				}  
				else
				{
					$("#"+id+"").focus();
					$("#div"+id+"").html("*Only alpha characters and space allowed. You have entered an invalid input in this field!");
					return false;  
				}
			}
			else
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.You can't leave this empty");
				return false;
			}
		}
		if($("#"+id+"").attr('class')=="form-control alpha_numeric" || $("#"+id+"").attr('class')=="form-control date-picker alpha_numeric" || $("#"+id+"").attr('class')=="form-control input-medium input-inline alpha_numeric")
		{
			if((type=="text" || type=="textarea") && value!="" && value!=0 )
			{
				var pattern=/^[a-zA-Z0-9. ]*$/;
				if($("#"+id+"").val().match(pattern))  
				{  
					$("#div"+id+"").html('');
				}  
				else
				{
					$("#"+id+"").focus();
					$("#div"+id+"").html("*Only alpha numeric characters and space allowed. You have entered an invalid input in this field!");
					return false;  
				}
			}
			else
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.You can't leave this empty");
				return false;
			}
		}
		
		if($("#"+id+"").attr('id')=="txtemail")
		{
			if(type=="text" && value!="" && value!=0 )
			{
				var pattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				if($("#"+id+"").val().match(pattern))  
				{  
					$("#div"+id+"").html('');
				}  
				else
				{
					$("#"+id+"").focus();
					$("#div"+id+"").html("*You have entered an invalid Email!,Please Fill Email in this format xyz@domain.com");
					return false;
				} 
			}
			else
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.You can't leave this empty");
				return false;
			}
		}
		
		if($("#"+id+"").attr('name')=="txtmobile")
		{
			if(type=="text" && value!="" && value!=0 )
			{
				var numbers = /^[0-9]+$/;  
				if($("#"+id+"").val().match(numbers))  
				{   
					var val=$("#"+id+"").val();
					if(val.charAt(0)!="0")
					{
						$("#"+id+"").html('');
						if(val.length == 10)
						{
							$("#div"+id+"").html(''); 
						}
						else
						{
							$("#"+id+"").focus();
							$("#div"+id+"").html("Mobile Phone must be 10 Digit numeric no!. ");
							return false;
						}
					}
					else
					{
						$("#"+id+"").focus();
						$("#div"+id+"").html("Mobile Phone should not start with zero!. ");
						return false;
					}
				}   
				else  
				{ 
					$("#"+id+"").focus();
					$("#div"+id+"").html("Mobile Phone must be numeric!.This Field contain only numbers. ");   
					return false;  
				}
			}
			else
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.You can't leave this empty");
				return false;
			}   
		}
		
		if($("#"+id+"").attr('class')=="form-control input-small input-inline opt" || $("#"+id+"").attr('class')=="form-control opt" || $("#"+id+"").attr('class')=="form-control input-inline input-medium otp")
		{
			if($("#"+id+"").val() == -1 || $("#"+id+"").val()=="" || $("#"+id+"").val()==0)
			{
				$("#"+id+"").focus();
				$("#div"+id+"").html("This Feild is required.Please Select");
				return false;
			}
		}
		
		$("#div"+id+"").html('');
		vali=true;
	}
	return vali;
}





function conwv(get_id)
{
	if(check(get_id))
	{
		bootbox.confirm('Are you sure to Submit from?', function(result){
			if(result==true)
			{
				document.getElementById(get_id).submit();
			}
		}); 
	}
	else
	{
		return false;
	}
}