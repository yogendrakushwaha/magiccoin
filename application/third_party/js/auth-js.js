$(function() {
			//Login animation to center 
			function toCenter(){
				var mainH=$("#main").outerHeight();
				var accountH=$(".account-wall").outerHeight();
				var marginT=(mainH-accountH)/2;
				if(marginT>30){
					$(".account-wall").css("margin-top",marginT-15);
					}else{
					$(".account-wall").css("margin-top",30);
				}
			}
			toCenter();
			var toResize;
			$(window).resize(function(e) {
				clearTimeout(toResize);
				toResize = setTimeout(toCenter(), 500);
			});
			
			if(txtclass!='welcome')
			{
				$(function() {
					$.gritter.add({
						// (string | mandatory) the heading of the notification
						title: 'Welcome in Magic coin',
						// (string | mandatory) the text inside the notification
						text: 'Hi User , you can use Username : <strong>Username</strong> and Password: <strong>*****</strong> to  access account.'
					});
					return false;
				});
			}
			
			$("#form-signin").submit(function(event){
				event.preventDefault();
				var main=$("#main");
				//scroll to top
				main.animate({
					scrollTop: 0
				}, 500);
				main.addClass("slideDown");
				// send username and password to php check login
				$.ajax({
					url: baseUrl+"index.php/auth/login", 
					data: $(this).serialize(), 
					type: "POST", 
					dataType: 'json',
					beforeSend: function() {
						$('#login_submit').html('<i class="fa fa-spinner fa-spin" style="color:white; padding-left: 0px;"></i>');
					},
					success: function (e) {
						setTimeout(function () { main.removeClass("slideDown") }, !e.status ? 500:3000);
						if (!e.status) { 
							if(txtclass!='welcome')
							{
								$.gritter.add({
									// (string | mandatory) the heading of the notification
									title: 'Error Massage',
									// (string | mandatory) the text inside the notification
									text: 'Check Username or Password again !! '
								});
								return false;
							}
						}
						setTimeout(function () { $("#loading-top span").text("Yes, account is access...") }, 500);
						setTimeout(function () { $("#loading-top span").text("Redirect to account page...")  }, 1500);
						if(e.status==1)
						{
							setTimeout( "window.location.href='"+baseUrl+"master/index'", 3100 );
						}
						if(e.status==2)
						{
							setTimeout( "window.location.href='"+baseUrl+"userprofile/index'", 3100 );
						}
					}
				});	
				
			});
		});