<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Get_details extends CI_Controller {
		
		public function __construct() 
		{
			parent::__construct();
		}
		
		public function index()
		{
			
		}
		
		
		//Get member name 
		public function get_member_name()
		{
			$mname="";
			$id="";
			$id=$this->input->post('txtintuserid');
			$mname=get_intro_name($id);						// Get Details From Admin_Helper
			echo $mname;
		}
		
		//Get Extreme parent on behalf of introducer
		public function get_parent_detail()
		{
			$i="";
			$lrt=0;
			$rrt=0;
			$t=0;
			$id1=$this->input->post('txtintuserid');
			$this->db->where('or_m_user_id',$id1);
			$data['lid']=$this->db->get('m03_user_detail');
			foreach($data['lid']->result() as $row)
			{
				$i=$row->or_m_reg_id;
				break;
			}
			if($i!="")
			{
				$id=$i;
				
				$jleg=$this->input->post('leg');
				if($jleg=="L")
				{
					echo fetchl($id);								// Get Exterme Left Id From Admin_Helper
				}
				if($jleg=="R")
				{
					echo fetchr($id);								// Get Exterme Right Id From Admin_Helper
				}
			}
			else
			{
				echo "This id is not registered";
			}
		}
		
		//Validate Mobile No
		public function validate_mobile()
		{
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('session');
			$query=$this->db->query("SELECT COUNT(*) as count_mobile FROM `m03_user_detail` where `or_m_mobile_no`=".$this->input->post('phone'));
			$rows=$query->row();
			echo $rows->count_mobile;
		}
		
		//Validate Pancard
		public function validate_pancard()
		{
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('session');
			$query=$this->db->query("SELECT COUNT(*) as pan FROM `m04_user_bank` WHERE `m04_user_bank`.`or_m_b_pancard`='".$this->input->post('pancard')."'");
			$rows=$query->row();
			echo $rows->pan;
		}
		
		//Validate Email ID
		public function validate_email()
		{
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('session');
			$query=$this->db->query("SELECT COUNT(*) as email FROM `m03_user_detail` WHERE `m03_user_detail`.`or_m_email`='".$this->input->post('txtemail')."'");
			$rows=$query->row();
			echo $rows->email;
		}
		
		//Get Ticket Details From Ticket Id
		public function get_ticket_details()
		{
			$query=$this->db->query("SELECT * FROM `view_ticket` where TICKET_ID=".$this->input->post('id'));
			$json=json_encode($query->result());
			echo $json;
		}
		
		//Validate USer Exist Or Not
		public function validte_user()
		{
			$query = $this->db->get_where('tr01_login',array('or_login_id'=>$this->input->post('txtlogin')));
			$row2 = $query->row();
			if($query->num_rows()>0)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		
		//Get User Perfectmoney Account Fetails
		public function get_perfect_account()
		{
			$this->db->where('m_pfect_userid',0);
			$this->db->where('m_pfect_status',1);
			$data['rec']=$this->db->get('view_perfect_money');
			$this->load->view("user/select_perfect_acc",$data);
		}
		
	}
	
?>