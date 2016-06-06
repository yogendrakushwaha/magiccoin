<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
	});
</script>
<div class="sectionarea" id="home">
	
	<!-- Slider start -->  
	<div class="ms-fullscreen-template" id="slider1-wrapper">
		<!-- masterslider -->
		<div class="master-slider ms-skin-default" id="masterslider">
			
			<div class="ms-slide slide-1" data-delay="5">
				
				<h3 class="ms-layer medium-text"
				data-type="text"
				style="top:290px;"
				data-effect="skewright(25,250)"
				data-duration="1500"
				data-ease="easeOutQuart"
				data-delay="700"
				>
					Choose your life. Lose your limits.
				</h3>
				<h3 class="ms-layer big-text"
				data-type="text"
				style="top:370px;"
				data-effect="scalebottom(1.1,1.1,50)"
				data-duration="1500"
				data-ease="easeOutQuart"
				data-delay="1200"
				>
					Magic Coin
				</h3>
				
				<div class="ms-layer"
				style="top:465px;"
				data-type="text"
				data-duration="900"
				data-delay="2200"
				data-ease="easeOutExpo"
				data-effect="bottom(40)"
				>
					<a href="javascript:void(0);" class="sbutton1">Get Started</a>
				</div>
				
				<img src="<?php echo base_url(); ?>application/libraries/js/masterslider/blank.gif" data-src="<?php echo base_url(); ?>application/libraries/images/sliders/master/bg-1.jpg" alt=""/>    
			</div>
			
			
			<div class="ms-slide slide-2" data-delay="5">
				
				<h3 class="ms-layer medium-text"
				data-type="text"
				style="left:670px; top:290px;"
				data-effect="skewright(25,250)"
				data-duration="1500"
				data-ease="easeOutQuart"
				data-delay="100"
				>
					Easy to Use
				</h3>
				<h3 class="ms-layer big-text"
				data-type="text"
				style="left:670px; top:370px;"
				data-effect="scalebottom(1.1,1.1,50)"
				data-duration="1500"
				data-ease="easeOutQuart"
				data-delay="600"
				>
					Our expertise
				</h3>
				
				<div class="ms-layer"
				style="left:670px; top:465px;"
				data-type="text"
				data-duration="900"
				data-delay="1600"
				data-ease="easeOutExpo"
				data-effect="bottom(40)"
				>
					<a href="javascript:void(0);" class="sbutton1">Get Started</a>
				</div>
				
				<img src="<?php echo base_url(); ?>application/libraries/js/masterslider/blank.gif" data-src="<?php echo base_url(); ?>application/libraries/images/sliders/master/bg-2.jpg" alt=""/>    
			</div>
			
			
			<div class="ms-slide slide-3" data-delay="5">
				
				<h3 class="ms-layer thin-text-white blacktext"
				style="top:350px;"
				data-type="text"
				data-effect="rotate3dleft(50,0,0,380)"
				data-duration="1000"
				data-ease="easeInOutQuint"
				>
					Choose 
				</h3>
				
				<h3 class="ms-layer thin-text-black whitetext"
				style="top:435px;"
				data-type="text"
				data-effect="rotate3dright(-50,0,0,380)"
				data-duration="1000"
				data-ease="easeInOutQuint"
				>
					freedom
				</h3>
				
				<img src="<?php echo base_url(); ?>application/libraries/js/masterslider/blank.gif" data-src="<?php echo base_url(); ?>application/libraries/images/sliders/master/bg-3.jpg" alt=""/>    
			</div>
			
			
			
			<div class="ms-slide slide-4" data-delay="5">
				
				<h4 class="ms-layer small-text"
				style="top:160px;"
				data-type="text"
				data-effect="top(45)"
				data-duration="3400"
				data-delay="100"
				data-ease="easeOutExpo"
				>
					Even the tallest trees
				</h4>
				
				<h4 class="ms-layer bold-text-white bigtext"
				style="top:245px;"
				data-type="text"
				data-effect="top(45)"
				data-duration="3400"
				data-delay="700"
				data-ease="easeOutExpo"
				>
					always begin as a seed.
				</h4>
				<img src="<?php echo base_url(); ?>application/libraries/js/masterslider/blank.gif" data-src="<?php echo base_url(); ?>application/libraries/images/sliders/master/bg-4.jpg" alt=""/>    
			</div>
			
			
			
			
		</div>
		
	</div><!-- end of slider -->      
	
</div>

<div class="clearfix"></div>

<div class="container">
	<div class="section1" id="about">
		
		<h1>Welcome to Magic Coin</h1>
		<p>This Magic Coin mining is probably the best deal. Magic Coin mining for profit is very competitive and volatility in the Magic Coin price makes it difficult to realize monetary gains without also speculating on the price. Mining makes sense if you plan to do it for fun, to learn or to support the security of Magic Coin and do not care if you make a profit. If you have access to large amounts of cheap electricity and the ability to manage a large installation and business, you can mine for a profit.If you wish to undertake something new.</p>
		
		<div class="clearfix margin_top7"></div>
		
		<h1 style="  font-size: 25px;     color: #212543;   margin-bottom: 8px;">EARN MORE MONEY.</h1>
		<p>Magic Coin assumes any risk, eliminates costly fraud associated with credit card theft and best of all, makes chargebacks a thing of the past. Once a sale is made, the transaction is final. Magic Coin only takes a 1% fee.</p>
		
		<div class="clearfix margin_top7"></div>
		
		
		<div class="one_fourth">
			
			<div class="circle animate" data-anim-type="zoomIn" data-anim-delay="400">
				<i class="fa fa-exchange" aria-hidden="true"></i>
			</div>
			
			<strong>Fast 
			transactions</strong>
			
			<p>Magic Coin provide Fast transactions</p>
			
			
		</div><!-- end section -->
		
		<div class="one_fourth">
			
			<div class="circle animate" data-anim-type="zoomIn" data-anim-delay="600">
				<i class="fa fa-globe" aria-hidden="true"></i>
			</div>
			
			<strong>Worldwide
			payments</strong>
			
			<p>Magic Coin provide Worldwide payments</p>
			
			
		</div><!-- end section -->
		
		<div class="one_fourth">
			
			<div class="circle animate" data-anim-type="zoomIn" data-anim-delay="800">
				<i class="fa fa-ticket"></i>
			</div>
			
			<strong>Low
			processing fees</strong>
			
			<p>Magic Coin provide Low processing fees</p>
			
			
		</div><!-- end section -->
		
		<div class="one_fourth last">
			
			<div class="circle animate" data-anim-type="zoomIn" data-anim-delay="1000">
				<i class="fa fa-bell" aria-hidden="true"></i>
			</div>
			
			<strong>Zero % Risk</strong>
			
			<p>Magic Coin Assure Zero % Risk</p>
			
			
		</div><!-- end section -->
		
	</div>
</div><!-- end about section -->


<!-- end fun facts section -->

<div class="clearfix"></div>

<div class="section2" id="portfolio">
	<div class="container">
		
		<h1 class="white">Business Plan</h1>
		<div class="row"> <h3 class="text-left" style="color:#FFF;"><i class="fa fa-star-half-o"></i> Package</h3></div>
		
		<div class="row">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="active">
							<th class="text-center">
								S.N
							</th>
							<th class="text-center">
								Package
							</th>
							<th class="text-center">
								Price
							</th>
							<th class="text-center">
								No.of  coin
							</th>
							<th class="text-center">
								Magic point volume
							</th>
							<th class="text-center">
								Binary capping  per day
							</th>
							
						</tr>
					</thead>
					<tbody>
						<tr class="active">
							<td>
								1
							</td>
							<td>Basic</td>
							<td>100 $</td>
							<td>1000</td>
							<td>01 Pv</td>
							<td>200 $</td>
							
						</tr>
						<tr class="danger">
							<td>
								2
							</td>
							<td>Executive</td>
							<td>200 $</td>
							<td>2000</td>
							<td>02 Pv</td>
							<td>400 $</td>
						</tr>
						<tr class="success">
							<td>
								3
							</td>
							<td>Gold</td>
							<td>500 $</td>
							<td>5000</td>
							<td>05 Pv</td>
							<td>600 $</td>
						</tr>
						<tr class="warning">
							<td>
								4
							</td>
							<td>Diamond</td>
							<td>1000 $</td>
							<td>10000</td>
							<td>10 Pv</td>
							<td>750 $</td>
						</tr>
						<tr class="danger">
							<td>
								5
							</td>
							<td>Ruby</td>
							<td>5000 $</td>
							<td>50000</td>
							<td>50 Pv</td>
							<td>1000 $</td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				
				
				<h3 class="text-left" style="color:#FFF;"><i class="fa fa-star-half-o"></i> Direct</h3>
				
				<p class="text-left" style="color:#FFF;"><i class="fa fa-caret-right"></i>10% of direct amount.</p>
				<h3 class="text-left" style="color:#FFF;"><i class="fa fa-star-half-o"></i> Binary</h3>
				
				<p class="text-left" style="color:#FFF;"><i class="fa fa-caret-right"></i>1 I.D left & 1 I.D right direct sponsoring is compulsory.<br>
				1:1=10%</p>
				
				
			</div>
			<div class="col-md-6">
				
				<h3 class="text-left" style="color:#FFF;"><i class="fa fa-star-half-o"></i> Note</h3>
				<p class="text-left" style="color:#FFF;">1-Coin will sell after 90 days from purchasing date.</p>
				<p class="text-left" style="color:#FFF;">2-MLM Income withdrawal->40% Request</p>
				<p class="text-left" style="color:#FFF;">60% Repurchase coin.</p>
				
				
			</div>
            
		</div>
		
		<div class="row"> 
			
            
		</div>
		
		<div class="clearfix margin_top5"></div>
		
		
		
	</div>
	
	
</div><!-- end portfolio section -->

<div class="clearfix"></div>


<div class="section3" id="services">
	<div class="container">
		
		<h1 class="white" style="    color: #212543;">Our Services</h1>
		
		
		<div class="clearfix margin_top7"></div>
		
		<div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="400">
			
			
			
			<strong style="    color: #212543;">You can make it Possible</strong>
			
			<p style="    color: black;">Magiclife Points start calculating based on your join date as a member, all people who join as members after you in the total company.</p>
			
		</div>
		
		<div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="600">
			
			
			
			<strong style="    color: #212543;">We make it Possible</strong>
			
			<p style="    color: black;">Magic coin is more than just a cryptocurrency. To make it successful and unique, we have created a whole concept and universe to make Magic coin a market leader</p>
			
		</div>
		
		<div class="one_fourth animate" data-anim-type="fadeIn" data-anim-delay="800">
			
			
			
			<strong style="    color: #212543;">Maximize your Life</strong>
			
			<p style="    color: black;">Maximize your Magiclife, is all about combining business and lifestyle! When you are a member of the Magiclife program, you work with a business model.</p>
			
		</div>
		
		<div class="one_fourth last animate" data-anim-type="fadeIn" data-anim-delay="1000">
			
			
			
			<strong style="    color: #212543;">Design you Own Future</strong>
			
			<p style="    color: black;">Magic Coin Plan, offers all members, a unique chance for serious earning potential. We value your performance. Awards incentivize the success stories</p>
			
		</div>
		
		<div class="clearfix margin_top7"></div>
		
		<!--<img src="images/site-img1.png" class="img_left wres animate" data-anim-type="fadeInRight" data-anim-delay="1300" alt="" />-->
		
	</div>
</div><!-- end services section -->



<div class="clearfix"></div>

<div class="section6" id="contact">
	<div class="container">
		
		<h1 class="white">Contact Us</h1>
		<h5><b class="white">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will readable content of a page when looking many web sites.</b></h5>
		
		<div class="clearfix margin_top5"></div>
		
		<div class="two_third">
			
			<div class="cforms animate" data-anim-type="fadeInUp" data-anim-delay="200">
				
				<form action="<?php echo site_url('welcome/send_mail'); ?>" method="post" id="sky-form" class="sky-form">
					<fieldset>
						<div class="row">
							<div class="col col-6">
								<label class="label">Name</label>
								<label class="input"> <i class="icon-append icon-user"></i>
									<input type="text" name="name" id="name">
								</label>
							</div>
							<div class="col col-6">
								<label class="label">E-mail</label>
								<label class="input"> <i class="icon-append icon-envelope-alt"></i>
									<input type="email" name="email" id="email">
								</label>
							</div>
						</div>
						<div>
							<label class="label">Subject</label>
							<label class="input"> <i class="icon-append icon-tag"></i>
								<input type="text" name="subject" id="subject">
							</label>
						</div>
						<div>
							<label class="label">Message</label>
							<label class="textarea"> <i class="icon-append icon-comment"></i>
								<textarea rows="10" name="message" id="message"></textarea>
							</label>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="button">Send message</button>
					</footer>
					<div class="message"> <i class="icon-ok"></i>
						<p>Your message was successfully sent!</p>
					</div>
				</form>
				
			</div>
			
		</div>
		
		<div class="one_third last">
			
			<div class="addressinfo animate" data-anim-type="fadeInUp" data-anim-delay="400" style="color:#fff;">
				
				<h3 class="white">Address Info</h3>
				
				<strong>Company Name</strong><br />
				2901 Xxxxx Xxxx, Xxxxx, Xxxxxx,<br />
				XX 010101-1090<br />
				Telephone: +9100000000<br />
				Mobile: +91-00000000<br />
				E-mail: <a href="mailto:info@Magic Coin.com">info@magiccoin.com</a><br />
				Website: <a href="javascript:void(0);">www.magiccoin.com</a>
				
			</div><!-- end section -->
			
			<div class="clearfix margin_top4"></div>
			
			<div class="googglemap animate" data-anim-type="fadeInUp" data-anim-delay="500">
				
				<h3 class="white">Find the Address</h3>
				
				<iframe class="google-map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=WA,+United+States&amp;aq=0&amp;oq=WA&amp;sll=47.605288,-122.329296&amp;sspn=0.008999,0.016544&amp;ie=UTF8&amp;hq=&amp;hnear=Washington,+District+of+Columbia&amp;t=m&amp;z=7&amp;iwloc=A&amp;output=embed"></iframe>
				
			</div><!-- end section -->
			
		</div>
		
	</div>
</div><!-- end contact section -->

<div class="clearfix"></div>	