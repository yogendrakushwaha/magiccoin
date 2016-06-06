//////////////////////////////////////////////////////////////////////////
//////////         MODEL SCHEDULING SCRIPT        //////////
/////////////////////////////////////////////////////////////////////

/*-----------------Get Intro Name From User id------------------------*/

function get_intro_detail()
{
	var introducer = $("#txtintroducer_id").val();
	if($("#txtintroducer_id").val()!="")
	{
		get_member_name(introducer,1);
	}
	else
	{
		var mssg="";
		$('#txtintroducer_name').attr('value',mssg);
	}
}

/*-----------------Get Name From User id------------------------*/

function get_member_name(name,id)
{
	var intoducer = name;
	if($("#txtintroducer_id").val()!="")
	{
		$.ajax({	
			type:"POST",
			url:baseUrl+"get_details/get_member_name",
			data:"txtintuserid="+intoducer,
			success:function(msg) 
			{
				var msg=msg.trim();
				if(msg!="" && msg!="0" && msg!="false")
				{
					if(id==1)
					{
						$('#txtintroducer_name').attr('value',msg);
					}
					if(id==2)
					{
						$('#txtparent_name').attr('value',msg);
						//get_pos();
					}
				}
				else
				{
					$('#txtintroducer_id').val('');
					$('#txtintroducer_name').val('');
				}
			}
		});
	}
}

/*-----------------Get Paraent id From Leg------------------------*/

function check_leg()
{
	var collection=$("#leg");
	var mark=0;
	var obtainmark=0;
	var inputs=collection.find("input[type=checkbox],input[type=radio]");
	for(var x=0;x<inputs.length;x++)
	{
		var id=inputs[x].id;
		var name=inputs[x].name;
		if($("#"+id+"").is(':checked'))
		{
			if(id=="rbjoin_leg1")
			{
				$("#txtjoin_leg").val('L');
				get_parent_detail();
				
			}
			if(id=="rbjoin_leg2")
			{
				$("#txtjoin_leg").val('R');
				get_parent_detail();
			}
		}
	}
}

/*-----------------Get Paraent id------------------------*/

function get_parent_detail()
{
	var introducer = $("#txtintroducer_id").val();
	if($("#txtintroducer_id").val()!="")
	{
		if($("#txtjoin_leg").val()!="" && $("#txtjoin_leg").val()!=0)
		{
			var leg=$("#txtjoin_leg").val();
			$.ajax({	
				type:"POST",
				url:baseUrl+"get_details/get_parent_detail",
				data:"txtintuserid="+introducer+"&leg="+leg,
				success:function(msg) 
				{
					var msg=msg.trim();
					if(msg!="" && msg!="0" && msg!="This id is not registered")
					{
						$('#txtparent_id').attr('value',msg);
						var parentid=$('#txtparent_id').val();
						get_member_name(parentid,2);
						//get_pos();
					}
					else
					{
						var mssg="";
						$('#txtintroducer_name').attr('value',mssg);
						$('#txtparent_name').attr('value',mssg);
						$('#txtparent_id').attr('value',mssg);
					}
				}
			});
		}
		else
		{
			alert('Please Select Leg.');
		}
	}
	else
	{
		var mssg="";
		$('#txtintroducer_name').attr('value',mssg);
		$('#txtparent_name').attr('value',mssg);
		$('#txtparent_id').attr('value',mssg);
	}
}

/*-----------------Mobile NO Validate------------------------*/

function validate_mobile()
{
	var txtmobile=$("#txtmobile").val();
	$.post(baseUrl+"get_details/validate_mobile",
	{
		phone: txtmobile
	},
	function(data){
		if(data>0)
		{
			$("#function").hide();
			$("#txtmobile").val('');
			alert("This Mobile No is Already Used");
		}
		else
		{
			$("#function").show();
			$("divtxtmobile").html("");
		}
	});
}


function validate_email()
{
	var txtemail=$("#txtemail").val();
	$.post(baseUrl+"get_details/validate_email",
	{
		txtemail: txtemail
	},
	function(data){
		if(data>0)
		{
			$("#sbsubmit").hide();
			$("#txtemail").val('');
			alert("This Email Id is Already Used");
		}
		else
		{
			$("#sbsubmit").show();
		}
	});
}