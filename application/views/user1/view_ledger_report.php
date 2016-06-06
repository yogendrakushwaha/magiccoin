<!--
	/////////////////////////////////////////////////////////////////////////
	//////////     MAIN SHOW CONTENT     //////////
	//////////////////////////////////////////////////////////////////////
-->

<div id="main">
	
	<ol class="breadcrumb">
		<li><a href="#">User</a></li>
		<li class="active"><a href="#">JOURNAL</a></li>
	</ol>
	<!-- //breadcrumb-->
	
	<div id="content">
		
		<div class="row">
			
			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm" data-color="theme-inverse">
						<h2><strong>Search </strong>Details</h2>
						</header>
					<div class="panel-tools color" align="right" data-toolscolor="#4EA582">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="<?php echo site_url('userprofile/view_ledger_report'); ?>" method="post" data-collabel="3" data-alignlabel="left" id="insert_data">
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">From Date</label>
									<div class="input-group date form_datetime" data-picker-position="bottom-left" data-date-start-date="+0d"  data-date-format="dd MM yyyy" >
										<input type="text" class="form-control" id="txtfromdate" name="txtfromdate" >
										<span class="input-group-btn btn-group-sm">
											<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
											<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">To Date</label>
									<div class="input-group date form_datetime" data-picker-position="bottom-left" data-date-start-date="+0d"  data-date-format="dd MM yyyy" >
										<input type="text" class="form-control" id="txttodate" name="txttodate" >
										<span class="input-group-btn btn-group-sm">
											<button class="btn btn-default" type="button"><i class="fa fa-times"></i></button>
											<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Type</label>
									<div>
										<select id="txttype" name="txttype" class="form-control">
											<option value="-1"> Select </option>
											<option value="1">All</option>
											<option value="2">Internal Transfer</option>
											<option value="3">Growth Income</option>
											<option value="4">Level Income</option>
											<option value="5">Prefer Commision</option>
											<option value="6">Withdrawn</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="form-group offset">
								<div>
									<button type="submit" class="btn btn-theme">Search</button>
									<button type="reset" class="btn">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</section>
				
			</div>

			<div class="col-lg-12">
				<section class="panel corner-flip">
					<header class="panel-heading sm">
						<h2><strong>VIEW  </strong> Journal</h2>
					</header>
					<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
						<ul class="tooltip-area">
							<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
							<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-hover" data-provide="data-table" id="toggle-column">
							<thead>
								<tr>
									<th>S No.</th>
									<th>Date</th>
									<th>User Id</th>
									<th>Description</th>
									<th>Credit</th>
									<th>Debit</th>
									<th>Current Balance</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$sn=1;
									foreach($page_data->result() as $rows)
									{ 
									?>
									<tr align="center">
										<td><?php echo $sn; ?></td>
										<td nowrap><?php echo $rows->LEDGER_DATETIME; ?></td>
										<td><?php echo $rows->LEDGER_USERID; ?></td>
										<td><?php echo $rows->LEDGER_DESC; ?></td>
										<td nowrap><i class='fa fa-gbp'></i>  <?php echo $rows->LEDGER_CR; ?></td>
										<td nowrap><i class='fa fa-gbp'></i>  <?php echo $rows->LEDGER_DR; ?></td>
										<td nowrap><i class='fa fa-gbp'></i>  <?php echo $rows->LEDGER_CURRBAL; ?></td>
									</tr>   
									<?php 
										$sn++;
									}
								?> 
							</tbody>
						</table>
					</div>
				</section>
			</div>
			
		</div>
		<!-- //content > row-->
		
	</div>
	<!-- //content-->
</div>
<!-- //main-->