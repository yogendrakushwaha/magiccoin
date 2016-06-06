<body>
	<section id="container">
		<!--header start-->
		<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="brand">
				
				<a href="index.html" class="logo">
					<img src="<?php echo base_url(); ?>application/third_party/logo/magiclogo.png" alt="">
				</a>
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
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<img alt="" src="<?php echo base_url(); ?>application/third_party/assets/images/avatar1_small.jpg">
							<span class="username"><?php echo $this->session->userdata('name'); ?></span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<li><a href="#"><i class="ico-envelop2"></i><?php echo $this->session->userdata('e_email'); ?></a></li>
							<li><a href="<?php echo site_url('master/view_mainconfig'); ?>"><i class="ico-tools"></i> Settings</a></li>
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
						<?php
							foreach($menu->result() as $m)
							{
								if($m->m_menu_parentid==0)
								{
								?>
								<li class="sub-menu"><a href="<?php echo ($m->m_menu_islink==1)?site_url($m->m_menu_url):'javascript:;'; ?>"><i class="<?php echo $m->m_menu_icon; ?>"></i><span class="title"><?php echo $m->m_menu_name; ?></span><?php echo ($m->m_menu_islink==0)?'<span class="arrow"></span>':''; ?></a>
									<?php
										if($m->m_menu_islink==0)
										{
										?>
										<ul class="sub">
											<?php
												foreach($menu->result() as $s)
												{
													if($s->m_menu_parentid==$m->m_menu_id)
													{
													?>
													<li><a href="<?php echo ($s->m_menu_islink==1)?site_url($s->m_menu_url):'javascript:;'; ?>"><i class="<?php echo $s->m_menu_icon; ?>"></i><?php echo $s->m_menu_name; ?></a></li>
													<?php
													}
												}
											?>
										</ul>
										<?php
										}
									?>
								</li>
								<?php
								}
							}
						?>
					</ul>            
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
	<!--sidebar end-->			