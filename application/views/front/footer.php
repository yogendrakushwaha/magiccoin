<div class="copyrights">
	<div class="container">
		
		<ul>
			<li class="animate" data-anim-type="zoomIn" data-anim-delay="200"><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
			<li class="animate" data-anim-type="zoomIn" data-anim-delay="400"><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
			<li class="animate" data-anim-type="zoomIn" data-anim-delay="600"><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
			
		</ul>
		
		<div class="clearfix"></div>
		<div class="margin_top3"></div>
		
		<p style="color:#FFF;">© 2016. Magiccoin. All rights reserved.</p>
		
	</div>
</div><!-- end copyrights section -->


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->



<!-- style switcher -->
<script src='<?php echo base_url(); ?>application/libraries/js/bootstrap.min.js'></script>
<link rel="alternate stylesheet" type="text/css" href="<?php echo base_url(); ?>application/libraries/css/colors/lightblue.css" title="lightblue" />
</div>

<!-- ######### JS FILES ######### -->
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/universal/jquery.js"></script>

<?php
	if($this->router->fetch_method()=='front')
	{
	?>
<!-- animations -->
<script src="<?php echo base_url(); ?>application/libraries/js/animations/js/animations.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>application/libraries/js/animations/js/smoothscroll.js" type="text/javascript"></script>

<!-- Master Slider -->
<!--<script src="js/masterslider/jquery-1.10.2.min.js"></script>
<script src="js/masterslider/jquery.easing.min.js"></script>-->
<script src="<?php echo base_url(); ?>application/libraries/js/masterslider/masterslider.min.js"></script>
<script type="text/javascript">		
	(function($) {
		"use strict";
		
		var slider = new MasterSlider();
		
		slider.control('arrows' ,{insertTo:'#masterslider'});	
		slider.control('bullets');	
		
		slider.setup('masterslider' , {
			width:1170,
			height:700,
			space:5,
			view:'basic',
			fullwidth:true,
			speed:20,
			autoplay:true,
			loop:true,
		});
		
	})(jQuery);
</script>

<!-- scroll up -->
<script src="<?php echo base_url(); ?>application/libraries/js/scrolltotop/totop.js" type="text/javascript"></script>

<!-- sticky menu -->
<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/mainmenu/sticky.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/js/mainmenu/modernizr.custom.75180.js"></script>

<!-- forms -->
<script src="<?php echo base_url(); ?>application/libraries/js/form/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/js/form/jquery.validate.min.js"></script>
<script type="text/javascript">
	(function($) {
		"use strict";
		
		$(function()
		{
			// Validation
			$("#sky-form").validate(
			{					
				// Rules for form validation
				rules:
				{
					name:
					{
						required: true
					},
					email:
					{
						required: true,
						email: true
					},
					message:
					{
						required: true,
						minlength: 10
					}
				},
				
				// Messages for form validation
				messages:
				{
					name:
					{
						required: 'Please enter your name',
					},
					email:
					{
						required: 'Please enter your email address',
						email: 'Please enter a VALID email address'
					},
					message:
					{
						required: 'Please enter your message'
					}
				},
				
				// Ajax form submition					
				submitHandler: function(form)
				{
					$(form).ajaxSubmit(
					{
						success: function()
						{
							$("#sky-form").addClass('submited');
						}
					});
				},
				
				// Do not change code below
				errorPlacement: function(error, element)
				{
					error.insertAfter(element.parent());
				}
			});
		});			
		
	})(jQuery);
</script>

<!-- menu -->
<script src="<?php echo base_url(); ?>application/libraries/js/mainmenu/responsive-nav.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/js/mainmenu/fastclick.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/js/mainmenu/scroll.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/js/mainmenu/fixed-responsive-nav.js"></script>
<!-- carousel -->
<script defer src="<?php echo base_url(); ?>application/libraries/js/carousel/jquery.flexslider.js"></script>
<?php
	}
	?>
<script type="text/javascript" src="<?php echo base_url(); ?>application/third_party/assets/js/gritter/js/jquery.gritter.js"></script>
<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>" />
<input type="hidden" id="txtmethod" value="<?php echo $this->router->fetch_method(); ?>" />
<input type="hidden" id="txtclass" value="<?php echo $this->router->fetch_class(); ?>" />
<!--Core js-->
<script src="<?php echo base_url() ?>application/third_party/js/baseUrl.js"></script>
<script src="<?php echo base_url() ?>application/third_party/js/check.js"></script>
<script src="<?php echo base_url() ?>application/third_party/js/Custom.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/js/registration.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/bootbox.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/js/auth-js.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/gritter.js" type="text/javascript"></script>

<div id="myModal1" class="modal fade" role="dialog" style="z-index: 10000;">
	<div class="modal-dialog" style="Z-INDEX: 1076;">
		<!-- Modal content-->
		<div class="modal-content" id="email-bg">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"  align="center" style="color:#FFF;">Sign In Here</h4>
			</div>
			<div class="modal-body">
				
				<form class="form-horizontal" action="javascript:;" role="form" id="login_form">
					
					<div class="form-group">
						
						<div class="col-md-12">
							<input type="text" class="form-control" id="txtname" name="txtname" placeholder="Enter Userid">
						</div>
					</div>
					
					<div class="modal-footer" id="login_submit">
						<button type="button" class="btn btn-primary" onclick="validte_user()" >Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

</html>