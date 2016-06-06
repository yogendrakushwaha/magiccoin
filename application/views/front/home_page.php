<!DOCTYPE html>
<html lang="en-gb" xml:lang="en-gb" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Aleš Trunda alestrunda.cz">
		<meta name="robots" content="index, follow">
		<meta name="viewport" content="width=device-width, initial-scale=1">   
		<link rel="icon" href="<?php echo base_url(); ?>application/libraries/fornt_web/images/fevi.jpg" type="image/png">
		
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,500,400italic,500italic%7CMontserrat:400,700' rel='stylesheet' type='text/css'>    
		
		<!-- Icon-Font -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/fornt_web/font-awesome/font-awesome/css/font-awesome.min.css" type="text/css">
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/fornt_web/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/fornt_web/stroll/stroll.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/fornt_web/owl-carousel/owl.carousel.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/fornt_web/styles/animate.min.css" type="text/css">
		<link id="main-stylesheet" rel="stylesheet" href="<?php echo base_url(); ?>application/libraries/fornt_web/styles/main.css" type="text/css">
		<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/js/jquery-1.11.2.min.js"></script>
		<title>Magic coin</title>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/js/modernizr.js"></script>
		
		<style>
			#theme-customizer {
			font-size: 15px;
			position: fixed;
			background-color: #FFF;
			width: 290px;
			left: -290px;
			top: 50px;
			color: #000;
			-webkit-transition: left 0.7s ease-out;
			-moz-transition: left 0.7s ease-out;
			-o-transition: left 0.7s ease-out;
			transition: left 0.7s ease-out;
			font-style: italic;
			text-align: center;
			padding: 0 5px 5px 5px;
			z-index: 99999;
			border: 1px #e1e1e1 solid;
			border-left: none;
			}
			
			#theme-customizer.active {
			left: 0;
			}
			
			#theme-customizer .customizer-heading {
			font-size: 20px;
			margin: 25px 0;
			}
			
			#theme-customizer .customizer-info {
			color: #969696;
			font-size: 13px;
			}
			
			#theme-customizer hr {
			margin: 20px auto;
			height: 1px;
			width: 80%;
			background-color: #e8e8e8;
			}
			
			#theme-customizer-trigger {
			position: absolute;
			background-color: #FFF;
			width: 50px;
			height: 50px;
			right: -50px;
			top: -1px;
			font-size: 27px;
			line-height: 50px;
			text-align: center;
			cursor: pointer;
			border: 1px #e1e1e1 solid;
			border-left: none;
			}
			
			.theme-setting {
			width: 54px;
			height: 54px;
			display: inline-block;
			margin: 0px 2px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			border-radius: 50%;
			border: 2px #FFF solid;
			-webkit-transition: border 0.2s ease-out;
			-moz-transition: border 0.2s ease-out;
			-o-transition: border 0.2s ease-out;
			transition: border 0.2s ease-out;
			cursor: pointer;
			}
			
			.theme-setting.theme-pattern {
			border-color: #E1E1E1;
			}
			
			.theme-setting:hover {
			border-color: #B1B1B1;
			}
			
			.theme-setting.active {
			border-color: #B1B1B1;
			}
		</style>
	</head>
	
	<body>
		
		<header id="header-section">
			<!-- .site-top -->
			<div class="main-menu">
				<div class="container">
					<img class="pull-left main-logo" alt="hometastic" src="<?php echo base_url(); ?>application/libraries/fornt_web/images/logo.png">
					<div class="menu-button"><i class="fa fa-reorder"></i></div>
					<nav class="menu-container underscore-container menu-container-fade">
						<ul>
							<li class="active"><a href="javascript:void(0);">Home</a></li>
							<li><a href="javascript:void(0);" id="head-color">Charts</a></li>
							<li><a href="<?php echo base_url(); ?>welcome/front" id="head-color">Login</a></li>
							<li><a href="javascript:void(0);" id="head-color">Wallet</a></li>
							<li><a href="javascript:void(0);" id="head-color">Get in touch</a></li>
						</ul>
						<div class="underscore"><div class="underscore-inner"></div></div>
					</nav>
				</div><!-- .container -->
			</div><!-- .main-menu -->
		</header>
		<script>
	$( window ).load(function() {
		<?php if($this->session->flashdata('info')){ ?>
			alert( "<?php echo $this->session->flashdata('info');?>" );
		<?php } ?>
	});
</script>
		<section>
			<div class="section-content">
				<div class="container">
					<div class="section-header onscroll-animate" data-animation="fadeInLeft">
						<h1>Welcome to Magiccoin</h1>
						<h4>This Magic Coin mining is probably the best deal.</h4>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-hover table-responsive">
							
							<tbody>
						
							
								<tr>
								    <th>Transaction id</th>
									<th>Price</th>
									<th>Amount</th>
									<th>Trade Type</th>
									<th>Date</th>
								</tr>
	
	
							<?php $i=1;foreach($trads['ltc_btc'] as $row):?>
								<tr>
									<th scope="row"><a href="javascript:void(0);" id="alink"><?= $row['tid']?></a></th>
									<td><?= $row['price']?></td>
									<td><?= $row['amount']?></td>
									<td><?= change_type($row['type'])?></td>
									<td><?= convert_time($row['timestamp']);?></td>									
								</tr>
							<?php if($i == 10)break;$i++; endforeach;?>
								
							</tbody>
						</table>
					</div>
				</div><!-- .container -->
			</div><!-- .section-content -->
		</section>
		
		<section id="citation-section" class="section-contrast">
			<div class="bg-image bg-pattern bg-cover parallax-background">
				<div class="section-content onscroll-animate" data-animation="fadeInUp">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								
								<marquee direction="up" scrollamount="15" onmouseover="this.stop()" onmouseout="this.start()">
									<div class="table-responsive">
										<table class="table table-striped table-hover table-responsive">
											
											<tbody>
												<tr>
													<th colspan="3" class="active">Latest Transactions</th>
												</tr>
												
												<tr>
													<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
													<td> < 1 minute</td>
													<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
													</tr>
													<tr>
														<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
														<td> < 1 minute</td>
															<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
														</tr>
														<tr>
															<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
															<td> < 1 minute</td>
																<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
															</tr>
															<tr>
																<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
																<td> < 1 minute</td>
																	<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
																</tr>
																<tr>
																	<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
																	<td> < 1 minute</td>
																		<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
																	</tr>
																	<tr>
																		<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
																		<td> < 1 minute</td>
																			<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
																		</tr>
																		<tr>
																			<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
																			<td> < 1 minute</td>
																				<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
																			</tr>
																			<tr>
																				<th scope="row"><a href="javascript:void(0);" id="alink1">8eb288a964c41a500390282c7...</a></th>
																				<td> < 1 minute</td>
																					<td><button class="btn btn-success cb"><span data-c="7095433">0.071 BTC</span></button></td>
																				</tr>
																				</tbody>
																			</table>
																			</div>
																		</marquee> 
																		</div>
																		<div class="col-md-6">
																			<div class="well">
																				<h3>Search</h3>
																				
																				<p><i>You may enter a block height, address, block hash, transaction hash, hash160, or ipv4 address...</i></p>
																				
																				<form class="form-inline">
																					<input type="text" style="width:255px;" placeholder="Address / ip / SHA hash" id="search_input2" autofocus> <input type="submit" value="Search" id="search_button" class="btn btn-primary">
																				</form>
																			</div>
																			
																			<div class="zeroblock">
																				<div class="news">
																					NEWS
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Magnr - Bitcoin Trading Platform | Trade with Leverage</a><br>
																					<span>Magnr  &lt; 1 minute ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Vox reporter expects a cryptocurrency with bigger blocks to supersede Bitcoin (calling bigger blocks a "technical improvement")</a><br>
																					<span>/r/btc 21 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Vox reporter on Twitter: "I'm becoming convinced that "the real innovation isn't bitcoin, it's the blockchain" is total nonsense."</a><br>
																					<span>/r/btc 24 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">If segwit and RBF are implemented, can we have a joint action to show how easy these two can be exploitable?</a><br>
																					<span>/r/btc 48 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Bitcoin Price Analysis — A quiet week comes to an end</a><br>
																					<span>/r/btc 56 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Leaderless, Blockchain-Based Venture Capital Fund Raises $100 Million, And Counting</a><br>
																					<span>/r/btc 3 hours 12 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Bitcoin Fork "Core" Plans To "Open Up" Contribution Process</a><br>
																					<span>/r/btc 3 hours 12 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Bitcoin’s Transaction Fees Skyrocket as the Bitcoin Halving Looms</a><br>
																					<span>/r/btc 3 hours 48 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">8 weeks before the halving!</a><br>
																					<span>/r/bitcoin 4 hours 54 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">The year is 2140. What about block sizes now?</a><br>
																					<span>/r/btc 5 hours 2 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">I just discovered this subreddit, and I did a video review/article for a device called KeepKey a few months back. Have a look!</a><br>
																					<span>/r/btc 5 hours 2 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Dear Core - those Asics miners have some crazy advantage over my GPUs, can you please hard fork them out as well?</a><br>
																					<span>/r/btc 5 hours 10 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">just to remember : it's mid-may , and segwit has yet to provide any help '' scaling '' Bitcoin !</a><br>
																					<span>/r/btc 5 hours 10 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Roger Ver's dinner with Adam Back</a><br>
																					<span>/r/btc 5 hours 48 minutes ago</span>
																				</div>
																				
																				<div class="story">
																					<a href="javascript:void(0);" rel="nofollow" target="new">Resources to learn how bitcoins work?</a><br>
																					<span>/r/btc 6 hours 31 minutes ago</span>
																				</div>
																				
																			</div>
																			
																		</div>
																		
																	</div>
																	</div>
																</div>
																</div>
															</section>
															
															<section>
																<div class="section-content">
																	<div class="container">
																		
																		<div class="row">
																			<div class="col-md-6 onscroll-animate">
																				<img src="<?php echo base_url(); ?>application/libraries/fornt_web/images/download.gif" class="img-responsive">
																				
																			</div><!-- .col-md-4 -->
																			<div class="col-md-6 onscroll-animate" data-delay="400">
																				
																				<h3>Other Bitcoin Links</h3>
																				
																				<ul>
																					<li id="id-li"><a href="javascript:void(0);">Most Popular Addresses</a> - Addresses which have received the most payments</li>
																					<li id="id-li"><a href="javascript:void(0);">Orphaned Blocks</a> - Valid blocks not part of the main bitcoin chain
																					</li><li><a href="javascript:void(0);">Unconfirmed Transactions</a> - Transactions waiting to be included in a block</li>
																					<li id="id-li"><a href="javascript:void(0);">Largest Transactions</a> - Largest 50 transactions</li>
																					<li id="id-li"><a href="javascript:void(0);">Double Spends</a> - Double spends detected in the last 500,000 transactions</li>
																					<li id="id-li"><a href="javascript:void(0);">Strange Transactions</a> - Transactions which we were unable to decode the output address</li>
																					<li id="id-li"><a href="javascript:void(0);">Mining Pool Stats</a> - Pie chart showing the market share of the top bitcoin mining pools</li>
																					<li id="id-li"><a href="javascript:void(0);">Bitcoin Nodes Globe</a> - WebGL globe showing bitcoin nodes (Requires Chrome, Safari)</li>
																					<li id="id-li"><a href="javascript:void(0);g">Bitcoin Nodes List</a> - A Log of all bitcoin nodes blockchain.info has connected to</li>
																					<li id="id-li"><a href="javascript:void(0);">Hub Nodes</a> - A list of the most well connected bitcoin super nodes</li>
																					<li id="id-li"><a href="javascript:void(0);">Rejected Inventory</a> - Blocks and transactions which have been rejected by our nodes</li>
																					<li id="id-li"><a href="javascript:void(0);">Address Tags</a> - Tag your public bitcoin addresses.</li>
																					<li id="id-li"><a href="javascript:void(0);">My Wallet</a> - <b>Manage your money with Bitcoin's most advanced web wallet.</b></li>
																				</ul>
																				
																			</div><!-- .col-md-4 -->
																			<!-- .col-md-4 -->
																		</div><!-- .row -->
																		
																	</div><!-- .container -->
																</div><!-- .section-content -->
															</section>
															
															<div class="margin-30 visible-lg-block visible-md-block"></div>
															
															<footer id="footer-section">
																<a href="#header-section" class="scroll-to" id="to-top"></a>
																<!-- .container -->
																<div class="main-menu-alt">
																	<div class="container">
																		<div class="menu-button"><i class="fa fa-reorder"></i></div>
																		<nav id="bottom-menu" class="menu-container menu-container-slide">
																			<div class="underscore-container">
																				<ul>
																					<li><a href="javascript:void(0);"  id="foot-color">Home</a></li>
																					<li><a href="javascript:void(0);"  id="foot-color">About us</a></li>
																					<li><a href="javascript:void(0);"  id="foot-color">Login</a></li>
																					<li><a href="javascript:void(0);"  id="foot-color">News</a></li>
																					<li><a href="javascript:void(0);"  id="foot-color">Gallery</a></li>
																					<li><a href="javascript:void(0);"  id="foot-color">Blog</a></li>
																					<li><a href="javascript:void(0);"  id="foot-color">Contact</a></li>
																				</ul>
																				<div class="underscore"><div class="underscore-inner"></div></div>
																			</div>
																		</nav>
																	</div><!-- .container -->
																</div><!-- .main-menu-alt -->
																<div class="site-info">
																	<div class="container">
																		<div class="row">
																			<div class="col-xs-6 onscroll-animate" data-animation="fadeInLeft">
																				<p>2016 All rights Reserved. <a href="">Magiccoin</a></p>
																			</div>
																			<div class="col-xs-6 text-right onscroll-animate" data-animation="fadeInRight">
																				<div class="socials-wrapper">
																					<div class="social-round-container">
																						<a href="#"><i class="fa fa-facebook"></i></a>
																					</div>
																					<div class="social-round-container">
																						<a href="#"><i class="fa fa-twitter"></i></a>
																					</div>
																					
																				</div>
																			</div>
																		</div><!-- .row -->
																	</div><!-- .container -->
																</div><!-- .site-info -->
															</footer>
															
															
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/bootstrap/js/bootstrap.min.js"></script>
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/owl-carousel/owl.carousel.min.js"></script>
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/stroll/stroll.min.js"></script>
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/js/jquery.scrollTo.min.js"></script>
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/js/jquery.stellar.min.js"></script>
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/js/jquery.inview.min.js"></script>
															<script type="text/javascript" src="<?php echo base_url(); ?>application/libraries/fornt_web/js/custom.js"></script>
															</body>
															
														</html>