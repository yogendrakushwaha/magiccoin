<body>
	<section id="container">
		<!--header start-->
		<header class="header fixed-top clearfix"> 
			<!--logo start-->
			<div class="brand"> <a href="index.html" class="logo"> <img src="<?php echo base_url(); ?>application/third_party/logo/magiclogo.png" alt="magiclogo" title="magiclogo"> </a>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>
			</div>
			<!--logo end-->
			
			<div class="top-nav clearfix"> 
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<li>
						<input type="text" class="form-control search" placeholder=" Search">
					</li>
					<!-- user login dropdown start-->
					<li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<?php 
							if($this->session->userdata('userimage')=='')
							{
							?>
							<img alt="" src="<?php echo base_url(); ?>application/third_party/assets/images/avatar1_small.jpg">
							<?php
							}
							else
							{
							?>
							<img alt="" src="<?php echo base_url(); ?>application/user_image/<?php echo $this->session->userdata('userimage') ?>" height="33" width="33">
							<?php
							}
						?>
					<span class="username"><?php echo $this->session->userdata('name'); ?></span> <b class="caret"></b> </a>
					<ul class="dropdown-menu extended logout">
						<li><a href="#"><i class="ico-user"></i><?php echo $this->session->userdata('user_id'); ?></a></li>
						<li><a href="<?php echo site_url('userprofile/change_password'); ?>"><i class="ico-tools"></i>Change Password</a></li>
						<li><a href="<?php echo site_url('auth/logout'); ?>"><i class="ico-switch"></i> Log Out</a></li>
					</ul>
					</li>
					<!-- user login dropdown end -->
				</ul>
				<!--search & user info end--> 
			</div>
		</header>
		<!--header end--> 
		
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse"> 
				<!-- sidebar menu start-->
				<div class="leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion">
						<li class="sub-menu"><a href="<?php echo site_url('userprofile/dashboard'); ?>"><i class="ico-home"></i><span class="title">Dashboard</span></a></li>
						<li class="sub-menu"><a href="javascript:;"><i class="ico-users"></i><span class="title">Member</span><span class="arrow"></span></a>
							<ul class="sub">
								<li><a href="<?php echo site_url('userprofile/update_details'); ?>"><i class="ico-users3"></i>Update Member Detail</a></li>
							</ul>
						</li>
						<li class="sub-menu"><a href="javascript:;"><i class="ico-cabinet"></i><span class="title">Account Details</span><span class="arrow"></span></a>
							<ul class="sub">
								<li><a href="<?php echo site_url('userprofile/add_bank_details'); ?>"><i class="ico-tag"></i>Add Bank Details</a></li>
								<li><a href="<?php echo site_url('userprofile/add_perfect_details'); ?>"><i class="ico-coins"></i>Add Perfect Money Details</a></li>
							</ul>
						</li>
						<li class="sub-menu"><a href="javascript:;"><i class="ico-network"></i><span class="title">Downline</span><span class="arrow"></span></a>
							<ul class="sub">
								<li><a href="<?php echo site_url('userprofile/view_direct_referal'); ?>"><i class="ico-eight-ball"></i>Direct Referal</a></li>
								<li><a href="<?php echo site_url('userprofile/view_user_downline'); ?>"><i class="ico-download2"></i>User Downline</a></li>
								<li><a href="<?php echo site_url('userprofile/tree/'.$this->session->userdata('profile_id')); ?>"><i class="ico-download2"></i>Tree Structure</a></li>
							</ul>
						</li>
						<li class="sub-menu"><a href="javascript:;"><i class="ico-loop2"></i><span class="title">Transactions</span><span class="arrow"></span></a>
							<ul class="sub">
								<li><a href="<?php echo site_url('userprofile/view_make_deposit'); ?>"><i class="ico-shuffle"></i>Deposit</a></li>
								<li><a href="<?php echo site_url('userprofile/view_make_investment'); ?>"><i class="ico-google-plus"></i>Investment</a></li>
								<li><a href="<?php echo site_url('userprofile/view_make_withdrawal'); ?>"><i class="fa fa-money"></i>Withdrawal</a></li>
								<li><a href="<?php echo site_url('userprofile/view_make_money_transfer'); ?>"><i class="ico-shuffle"></i>Money Transfer</a></li>
							</ul>
						</li>
						<li class="sub-menu"><a href="javascript:;"><i class="ico-key"></i><span class="title">Password</span><span class="arrow"></span></a>
							<ul class="sub">
								<li><a href="<?php echo site_url('userprofile/change_password'); ?>"><i class="ico-key2"></i>Show & Change Password</a></li>
							</ul>
						</li>
						<li class="sub-menu"><a href="<?php echo site_url('userprofile/view_ticket'); ?>"><i class="ico-ticket"></i><span class="title">Ticket</span></a></li>
					</ul>
				</div>
				<!-- sidebar menu end--> 
			</div>
		</aside>
	<!--sidebar end--> 	