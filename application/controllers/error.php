<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Error extends CI_Controller {
	
		/////////////////////////////////////////////////////////////////////////
		//////////     Constructor In Master Controller    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('common/header');
			$this->load->view('error/error_404');
		}
		
		
	}
?>			