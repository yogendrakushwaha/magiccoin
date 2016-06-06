<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">Member</a></li>
		<li class="active"><a href="#">View All News</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-12">
				<div class="widget-timeline">
					<ul>
						<?php
						foreach($news->result() as $row)
						{
						?>
						<li class="highlight">
							<section>
								<time><i class="fa fa-clock-o"></i><?php 
																	$date=date_create(trim($row->m_entrydate));
																	echo date_format($date,"d l, h:i A");
																	 ?></time>
								<h3><?php echo $row->m_news_title; ?></h3>
								<p><?php echo $row->m_news_des; ?></p>
							</section>
						</li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<!-- //content > row > col-lg-12 -->
			
		</div>
		<!-- //content > row-->
	</div>
	<!-- //content-->
</div>
<!-- //main-->