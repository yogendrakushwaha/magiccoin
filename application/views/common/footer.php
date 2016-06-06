<!--
	////////////////////////////////////////////////////////////////////////
	//////////     JAVASCRIPT  LIBRARY     //////////
	/////////////////////////////////////////////////////////////////////
-->

<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>" />
<input type="hidden" id="txtmethod" value="<?php echo $this->router->fetch_method(); ?>" />
<input type="hidden" id="txtclass" value="<?php echo $this->router->fetch_class(); ?>" />

<!-- Placed js at the end of the document so the pages load faster -->
<!--Core js-->
<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/third_party/assets/js/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<!--dynamic table-->
<script type="text/javascript" src="<?php echo base_url(); ?>application/third_party/assets/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/third_party/assets/js/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/third_party/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<?php 
	if($this->router->fetch_method() == "index" || $this->router->fetch_method() == "dashboard")
	{
	?>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/skycons/skycons.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.easing.min.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/calendar/clndr.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/underscore-min.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/calendar/moment-2.2.1.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/evnt.calendar.init.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/gauge/gauge.js"></script>
	
	<!--clock init-->
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/css3clock/js/css3clock.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/dashboard.js"></script>
	<?php
	}
?>

<?php 
	if($this->router->fetch_method() == "view_mainconfig")
	{
	?>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/bootstrap-switch.js"></script>
	<script src="<?php echo base_url(); ?>application/third_party/assets/js/toggle-init.js"></script>
	<?php
	}
?>
<!--common script init for all pages-->
<script src="<?php echo base_url(); ?>application/third_party/assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/bootbox.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/gritter.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/dynamic_table_init.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/assets/js/advanced-form.js"></script>

<!-- Jquery Library -->
<script src="<?php echo base_url() ?>application/third_party/js/baseUrl.js"></script>
<script src="<?php echo base_url() ?>application/third_party/js/check.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/js/registration.js"></script>
<script src="<?php echo base_url(); ?>application/third_party/js/custom.js"></script>
<!--script for this page-->
<?php 
	if($this->router->fetch_class() == "auth")
	{
	?>
		<script src="<?php echo base_url() ?>application/third_party/js/auth-js.js"></script>
	<?php
	}
?>
</body>
</html>
