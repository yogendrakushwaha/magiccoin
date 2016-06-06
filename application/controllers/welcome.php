<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		
		public function __construct() 
		{
			parent::__construct();
		}
		
		public function index()
		{
		    $this->load->helper('front_helper');
			$data['trads'] = $this->trade_api();			
			$this->load->view('front/home_page',$data);
		}
		
		public function front()
		{
		    $this->load->view('front/header');
			$this->load->view('front/menu');
			$this->load->view('front/index');
			$this->load->view('front/footer');
		}
		
		public function view_signup()
		{
			$this->db->where('status',1);
			$data['country']=$this->db->get('m02_country');
		    $this->load->view('front/header');
			$this->load->view('front/menu');
			$this->load->view('front/signup',$data);
			$this->load->view('front/footer');
		}
		
		/*
			| 				INSERT MEMBER				 |
		*/
		
		public function register_candidate()
		{
			$output=$this->member_model->signup();
			if($output==1)
			{
				$msg='A Mail Has been sent to your registered email ID. Sign in email to activate your account!!';
				$this->session->set_flashdata('info',$msg);
				$this->session->set_flashdata('succ','Registerd Successfully!!');
			}
			header("Location:".base_url()."welcome/view_signup");
		}
		
		public function view_signin()
		{
		    $this->load->view('front/header');
			$this->load->view('front/menu');
			$this->load->view('front/signin');
			$this->load->view('front/footer');
		}
		
		public function forget_password()
		{
			$this->load->view('front/header');
			$this->load->view('front/menu');
			$this->load->view("front/foregt-password");
			$this->load->view('front/footer');
		}
		
		public function send_mail()
		{
			$msg1="";
			$Name="";
			$Email_id="";
        	$Subject="";
			$Message="";
			$msg="";
			$this->load->library('email');
			$msg1="Thankyou For Contecting us.<br>";
			
			if($this->input->post("name")!="")
			$Name = "Name = ".$this->input->post("name")."<br>";
		
			if($this->input->post("email")!="")
			$Email_id = "Email Id = ".$this->input->post('email')."<br>";
			
			if($this->input->post("subject")!="")
			$Subject = "Subject = ".$this->input->post("subject")."<br>";
		
			if($this->input->post("message")!="")
			$Message = "Message = ".$this->input->post("message").".";
			
			$msg=$msg1.$Name.$Email_id.$Message;
			
			$this->crud_model->send_email('yogendrakushwaha6@gmail.com','Contact Form',$msg,'Contact Form');
		    header("Location:".base_url());
		}
		
	   //trade api integrate 
	   public function trade_api()
	   {    
	     $this->third_party('api/api_yobit.php');
		 $yobit = new Api_Yobit();
		 $trads  = $yobit->get_trades();		
		 return $trads;
       }	
	   
	   public function third_party($path)
	   {
	      include APPPATH . 'third_party/'.$path;       	   
	   } 
	
	
	}
	
?>