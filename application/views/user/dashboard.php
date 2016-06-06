
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-md-6">
				<h2>Welcome To User Panel</h2>
			</div>
		</div>
		<?php /*
		<!--mini statistics start-->
		<div class="row">
			<div class="col-md-3">
				<section class="panel">
					<div class="panel-body">
						<div class="top-stats-panel">
							<div class="gauge-canvas">
								<h4 class="widget-h">Monthly Expense</h4>
								<canvas width=160 height=100 id="gauge"></canvas>
							</div>
							<ul class="gauge-meta clearfix">
								<li id="gauge-textfield" class="pull-left gauge-value"></li>
								<li class="pull-right gauge-title">Safe</li>
							</ul>
						</div>
					</div>
				</section>
			</div>
			
			<div class="col-md-3">
				<section class="panel">
					<div class="panel-body">
						<div class="top-stats-panel">
							<h4 class="widget-h">Daily Sales</h4>
							<div class="bar-stats">
								<ul class="progress-stat-bar clearfix">
									<li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
									<li data-percent="90%"><span class="progress-stat-percent"></span></li>
									<li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
								</ul>
								<ul class="bar-legend">
									<li><span class="bar-legend-pointer pink"></span> New York</li>
									<li><span class="bar-legend-pointer green"></span> Los Angels</li>
									<li><span class="bar-legend-pointer yellow-b"></span> Dallas</li>
								</ul>
								<div class="daily-sales-info">
									<span class="sales-count">1200 </span> <span class="sales-label">Products Sold</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!--mini statistics end-->
		
		<!--mini statistics start-->
		<div class="row">
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
					<div class="mini-stat-info">
						<span>320</span>
						New Order Received
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
					<div class="mini-stat-info">
						<span>22,450</span>
						Copy Sold Today
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon pink"><i class="fa fa-money"></i></span>
					<div class="mini-stat-info">
						<span>34,320</span>
						Dollar Profit Today
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
					<div class="mini-stat-info">
						<span>32720</span>
						Unique Visitors
					</div>
				</div>
			</div>
		</div>
		<!--mini statistics end-->
		
		
		<div class="row">
			<div class="col-md-8">
				<div class="event-calendar clearfix">
					<div class="col-lg-12 calendar-block">
						<div class="cal1">
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="profile-nav alt">
					<section class="panel">
						<div class="user-heading alt clock-row terques-bg">
							<h1>December 14</h1>
							<p class="text-left">2014, Friday</p>
							<p class="text-left">7:53 PM</p>
						</div>
						<ul id="clock">
							<li id="sec"></li>
							<li id="hour"></li>
							<li id="min"></li>
						</ul>
						
						<ul class="clock-category">
							<li>
								<a href="#" class="active">
									<i class="ico-clock2"></i>
									<span>Clock</span>
								</a>
							</li>
							<li style="width: 43%;">
								<h3><a href="#">Have A Nice Day</a></h3>
							</li>
							<li style="width: 22%;">
								<h3><a href="#"><i class="ico-happy"></i></a></h3>
							</li>
						</ul>
						
					</section>
					
				</div>
			</div>
		</div>
		
		<h1></h1>
		
		<div class="row">
			<div class="col-md-6">
				<!--notification start-->
				<section class="panel">
					<header class="panel-heading">
						<i class="ico-bell"></i> Current News <span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-down"></a>
							<a href="javascript:;" class="fa fa-cog"></a>
							<a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
					<div class="panel-body">
						<?php
						foreach($news->result() as $n)
						{
						?>
						<div class="alert alert-success">
							<span class="alert-icon"><i class="fa fa-comments-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><?php echo $n->m_news_title; ?></li>
									<li class="pull-right notification-time"><?php echo $n->m_entrydate; ?></li>
								</ul>
								<p>
									<a href="#"><?php echo $n->m_news_des; ?></a>
								</p>
							</div>
						</div>
						<?php
						}
						?>
					</div>
				</section>
				<!--notification end-->
			</div>
			<div class="col-md-6">
				<!--todolist start-->
				<section class="panel">
					<header class="panel-heading">
						<i class="ico-ticket"></i> Tickets <span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-down"></a>
							<a href="javascript:;" class="fa fa-cog"></a>
							<a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
					<div class="panel-body">
						<ul class="to-do-list" id="sortable-todo">
							<?php 
							foreach($tickets->result() as $tic)
							{
							?>
							<li class="clearfix">
								<p class="todo-title">
									<i class="ico-arrow-right4"></i> <b>Title - </b> <?php echo $tic->tr_ticket_title; ?><br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Description - </b> <?php echo $tic->tr_ticket_desc; ?>
								</p>
							</li>
							<?php
							}	
							?>
						</ul>						
					</div>
				</section>
				<!--todolist end-->
			</div>
		</div>
		*/?>
	</section>
</section>
<!--main content end-->
</section>