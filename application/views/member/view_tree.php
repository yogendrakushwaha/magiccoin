<script>
	function get_details_show(id)
	{
		$("#"+id).removeAttr('style');
		$("#"+id).css("margin-left","50%");
	}
	function get_details_show_hide(id)
	{
		$("#"+id).css("visibility","hidden");
	}
</script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Tree Structure
						<span class="tools pull-right">
							<a class="fa fa-chevron-down" href="javascript:;"></a>
							<a class="fa fa-cog" href="javascript:;"></a>
							<a class="fa fa-times" href="javascript:;"></a>
						</span>
					</header>
					<div class="panel-body">
						<div class="form">
							<form action="<?php echo base_url(); ?>member/get_tree" class="horizontal-form" method="post">
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<?php 
										$result0=$this->member_model->get_tree_details($this->uri->segment(3));
									?>
									<div class="form-body">
										<!--/row-->
										<div class="row">
											<!--/span-->
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Search Here : <span class="required"> * </span></label>
													<input type="text" class="form-control" value='<?php echo $result0->USER_USERID; ?>' name='search_id' id='search_id' placeholder="Search User Id">
												</div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="col-lg-offset-3 col-lg-6">
											<button class="btn btn-primary" type="submit">Submit</button>
											<button type="button" class="btn btn-default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
			</div>
			
			
			<?php
				if($this->uri->segment(3))
				{
					$member_id=$this->uri->segment(3);
				}
				else 
				{
					$member_id=1;
				}
			?>				
			<?php
				$upliner31L='';
				$upliner31R='';
				$upliner32L='';
				$upliner32R='';
				$upliner41L='';
				$upliner42L='';
				$upliner43L='';
				$upliner44L='';
			?>
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							Tree Structure
							<span class="tools pull-right">
								<a class="fa fa-chevron-down" href="javascript:;"></a>
								<a class="fa fa-cog" href="javascript:;"></a>
								<a class="fa fa-times" href="javascript:;"></a>
							</span>
						</header>
						<div class="panel-body">
							
									
									<!---------------------------- Head--------------------------------->
									<!---------------------------- Head--------------------------------->
									<!---------------------------- Head--------------------------------->
									
									<?php 
										$result=$this->member_model->get_tree_details((($member_id)?$member_id:0));
										if($result)
										{
										?>
										
										<div style="width:100%; text-align:center;">
											<img src='<?php echo base_url().(($result->IMG_SRC)?$result->IMG_SRC:"application/libraries/no-img.png"); ?>' onmouseover="get_details_show('tooltips')" onmouseout="get_details_show_hide('tooltips')" title='Magic Coin'/>
											<br>
											<?php echo $result->USER_USERID; ?>
											<div id='tooltips' style="margin-left: 50%; visibility:hidden;">
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponsor ID</td><td><?php echo $result->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:100%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									<!-------------------------- 2nd Level-------------------------------->
									<!-------------------------- 2nd Level-------------------------------->
									<!-------------------------- 2nd Level-------------------------------->
									
									<?php
										$result1=$this->member_model->get_tree_details((($result)?$result->lEFT_ID:0));
										if($result1)
										{
										?>
										<div style="float:left; padding:10px; width:50%; height:100px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result1->USER_REGID; ?>">
												<img src="<?php echo base_url().(($result1->IMG_SRC)?$result1->IMG_SRC:"application/libraries/no-img.png"); ?>" style="float:center;" title='Magic Coin' onmouseover="get_details_show('tooltips1')" onmouseout="get_details_show_hide('tooltips1')"/>
												<br>
												<?php echo $result1->USER_USERID; ?>
											</a>
											<div id='tooltips1' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result1->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result1->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result1->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:50%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									<?php
										$result2=$this->member_model->get_tree_details((($result)?$result->RIGHT_ID:0));
										if($result2)
										{
										?>
										<div style="float:left; padding:10px; width:50%; height:100px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result2->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result2->IMG_SRC)?$result2->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips2')" onmouseout="get_details_show_hide('tooltips2')"/>
												<br>
												<?php echo $result2->USER_USERID; ?>
											</a>
											<div id='tooltips2' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result2->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result2->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result2->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:50%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									<div style='clear:both;'></div>
									
									<!-------------------------- 3rd Level----------------------------->
									<!-------------------------- 3rd Level----------------------------->
									<!-------------------------- 3rd Level----------------------------->
									
									<?php
										$result11=$this->member_model->get_tree_details((($result1)?$result1->lEFT_ID:0));
										if($result11)
										{
										?>				
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result11->USER_REGID; ?>">
												<img src="<?php echo base_url().(($result11->IMG_SRC)?$result11->IMG_SRC:"application/libraries/no-img.png"); ?>" title='Magic Coin' onmouseover="get_details_show('tooltips3')" onmouseout="get_details_show_hide('tooltips3')"/>
												<br>
												<?php echo $result11->USER_USERID; ?>
											</a>
											<div id='tooltips3' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result11->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result11->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result11->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									
									<?php
										$result12=$this->member_model->get_tree_details((($result1)?$result1->RIGHT_ID:0));
										if($result12)
										{
										?>
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result12->USER_REGID; ?>">
												<img src="<?php echo base_url().(($result12->IMG_SRC)?$result12->IMG_SRC:"application/libraries/no-img.png"); ?>" title='Magic Coin' onmouseover="get_details_show('tooltips4')" onmouseout="get_details_show_hide('tooltips4')"/>
												<br>
												<?php echo $result12->USER_USERID; ?>
											</a>
											<div id='tooltips4' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result12->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result12->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result12->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									
									<?php 
										$result21=$this->member_model->get_tree_details((($result2)?$result2->lEFT_ID:0));
										if($result21)
										{
										?>
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result21->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result21->IMG_SRC)?$result21->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips5')" onmouseout="get_details_show_hide('tooltips5')"/>
												<br>
												<?php echo $result21->USER_USERID; ?>
											</a>
											<div id='tooltips5' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result21->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result21->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result21->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									
									<?php
										$result22=$this->member_model->get_tree_details((($result2)?$result2->RIGHT_ID:0));
										if($result22)
										{
										?>			
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result22->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result22->IMG_SRC)?$result22->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips6')" onmouseout="get_details_show_hide('tooltips6')"/>
												<br>
												<?php echo $result22->USER_USERID; ?>
											</a>
											<div id='tooltips6' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result22->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result22->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result22->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:25%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									<div style='clear:both;'></div>					
									
									
									
									
									
									<!---------------------------- 4th Level Tree -------------------------------->
									<!---------------------------- 4th Level Tree -------------------------------->
									<!---------------------------- 4th Level Tree -------------------------------->
									
									<?php
										$result31=$this->member_model->get_tree_details((($result11)?$result11->lEFT_ID:0));
										if($result31)
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result31->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result31->IMG_SRC)?$result31->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips7')" onmouseout="get_details_show_hide('tooltips7')"/>
												<br>
												<?php echo $result31->USER_USERID; ?>
											</a>
											<div id='tooltips7' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result31->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result31->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result31->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									
									
									<?php
										$result32=$this->member_model->get_tree_details((($result11)?$result11->RIGHT_ID:0));
										if($result32)
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result32->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result32->IMG_SRC)?$result32->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips8')" onmouseout="get_details_show_hide('tooltips8')"/>
												<br>
												<?php echo $result32->USER_USERID; ?>
											</a>
											<div id='tooltips8' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result32->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result32->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result32->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									
									
									
									<?php
										$result41=$this->member_model->get_tree_details((($result12)?$result12->lEFT_ID:0));
										if($result41)
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result41->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result41->IMG_SRC)?$result41->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips9')" onmouseout="get_details_show_hide('tooltips9')"/>
												<br>
												<?php echo $result41->USER_USERID; ?>
											</a>
											<div id='tooltips9' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result41->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result41->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result41->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									
									<?php
										$result42=$this->member_model->get_tree_details((($result12)?$result12->RIGHT_ID:0));
										if($result42)
										{
										?>			
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result42->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result42->IMG_SRC)?$result42->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips10')" onmouseout="get_details_show_hide('tooltips10')"/>
												<br>
												<?php echo $result42->USER_USERID; ?>
											</a>
											<div id='tooltips10' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result42->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result42->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result42->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									<?php
										$result51=$this->member_model->get_tree_details((($result21)?$result21->lEFT_ID:0));
										if($result51)
										{
										?>			
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result51->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result51->IMG_SRC)?$result51->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips11')" onmouseout="get_details_show_hide('tooltips11')"/>
												<br>
												<?php echo $result51->USER_USERID; ?>
											</a>
											<div id='tooltips11' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result51->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result51->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result51->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									<?php
										$result52=$this->member_model->get_tree_details((($result21)?$result21->RIGHT_ID:0));
										if($result52)
										{
										?>				
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result52->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result52->IMG_SRC)?$result52->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips12')" onmouseout="get_details_show_hide('tooltips12')"/>
												<br>
												<?php echo $result52->USER_USERID; ?>
											</a>
											<div id='tooltips12' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result52->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result52->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result52->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									<?php
										$result61=$this->member_model->get_tree_details((($result22)?$result22->lEFT_ID:0));
										if($result61)
										{
										?>						
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result61->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result61->IMG_SRC)?$result61->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips13')" onmouseout="get_details_show_hide('tooltips13')"/>
												<br>
												<?php echo $result61->USER_USERID; ?>
											</a>
											<div id='tooltips13' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result61->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result61->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result61->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									
									<?php
										$result62=$this->member_model->get_tree_details((($result22)?$result22->RIGHT_ID:0));
										if($result62)
										{
										?>			
										<div style="padding:10px; float:left; width:12.5%; height:180px; text-align:center;">
											<a href="<?php echo base_url();?>index.php/member/tree?i=<?php echo $result62->USER_REGID; ?>">
												<img src='<?php echo base_url().(($result62->IMG_SRC)?$result62->IMG_SRC:"application/libraries/no-img.png"); ?>' title='Magic Coin' onmouseover="get_details_show('tooltips14')" onmouseout="get_details_show_hide('tooltips14')"/>
												<br>
												<?php echo $result62->USER_USERID; ?>
											</a>
											<div id='tooltips14' style='display:none;'>
												<table border="1" style="z-index:1000; position:absolute; background-color:#03C7BB; width:230px; color:#FFF;">
													<tr>
														<td>User Name</td><td><?php echo $result62->USER_NAME; ?></td>
													</tr>
													<tr>
														<td>DOJ</td><td><?php echo $result62->USER_REGDATE; ?></td>
													</tr>
													<tr>
														<td>Sponser ID</td><td><?php echo $result62->USER_INTROUSER; ?></td>
													</tr>
												</table>
											</div>
										</div>
										<?php
										}
										else
										{
										?>
										<div style="padding:10px; float:left; width:12.5%; height:100px; text-align:center;">
											<img src="<?php echo base_url()."application/libraries/no-img.png"; ?>" title='Magic Coin' />
										</div>
										<?php
										}
									?>
									
									<!---------------------------- 4th Level Tree End -------------------------------->
									<!---------------------------- 4th Level Tree End-------------------------------->
									<!---------------------------- 4th Level Tree End-------------------------------->							
									
								</div>
							</div>
							<div style="height:140px;"></div>
						
						</section>
				</div>
			</div>
		</div>
		<!-- page end-->
	</section>
	</section>
		<!--main content end-->		