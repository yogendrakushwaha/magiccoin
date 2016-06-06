<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class user_model extends CI_Model
	{
		
		/*|-----------------------------------------------------|*/
		/*|------	 	    USER Bank Details	         -------|*/
		/*|-----------------------------------------------------|*/
		
		public function bank_details($param=null)
		{
			if($param==1)
			{
				$primary='';
				$CID=$this->db->query("SELECT COUNT(*) AS COUNT_ID FROM `m04_user_bank` WHERE `m04_user_bank`.`or_m_id`=".$this->session->userdata('profile_id'))->row()->COUNT_ID;
				if($CID==0)
				{
					$primary=1;
				}
				$data = array(
				'or_m_id' => $this->session->userdata('profile_id'),
				'or_m_name' => $this->input->post('txtaccname'),
				'or_m_b_ifscode' => $this->input->post('txtifsc'),
				'or_m_b_cbsacno' => $this->input->post('txtacc'),
				'or_m_b_name' => $this->input->post('txtbank_name'),
				'or_m_b_branch' => $this->input->post('txtbranch'),
				'or_m_b_cardno' => $this->input->post('txtswift'),
				'or_m_b_currency' => $this->input->post('ddcurrency'),
				'or_m_b_primary' => $primary,
				'or_m_b_status' => 1
				);
				$this->db->insert('m04_user_bank',$data);
			}
			if($param==2)
			{
				$data = array(
				'or_m_id' => $this->session->userdata('profile_id'),
				'or_m_name' => $this->input->post('txtaccname'),
				'or_m_b_ifscode' => $this->input->post('txtifsc'),
				'or_m_b_cbsacno' => $this->input->post('txtacc'),
				'or_m_b_name' => $this->input->post('txtbank_name'),
				'or_m_b_branch' => $this->input->post('txtbranch'),
				'or_m_b_cardno' => $this->input->post('txtswift'),
				'or_m_b_currency' => $this->input->post('ddcurrency')
				);
				$this->db->where('or_m_bid',$this->uri->segment(3));
				$this->db->update('m04_user_bank',$data);
			}
		}
		
		/*|-------------------------------------------------|*/
		/*|------   INSERT USER PERFECTMONEY DETAILS -------|*/
		/*|-------------------------------------------------|*/
		
		public function add_perfect_details($param=null)
		{
			if($param==1)
			{
				$data = array(
				'm_pfect_id' => '',
				'm_pfect_userid' => $this->session->userdata('profile_id'),
				'm_pfect_currtype' => $this->input->post('ddcurrency'),
				'm_pfect_acc' => $this->input->post('txtperfectacc'),
				'm_pfect_status' => 1,
				'proc' => 1
				);
				$query = " CALL add_perfect_money(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
				$this->db->query($query, $data);
				$msg=$this->db->query("SELECT @msg as message")->row()->message;
				if($msg)
				{
					$this->session->set_flashdata('info',$msg);
				}
				else
				{
					$this->session->set_flashdata('info','Oh Snap!! Some thing went wrong.');
				}
			}
			if($param==2)
			{
				$data = array(
				'm_pfect_id' => $this->uri->segment(3),
				'm_pfect_userid' => '',
				'm_pfect_currtype' => $this->input->post('ddcurrency'),
				'm_pfect_acc' => $this->input->post('txtperfectacc'),
				'm_pfect_status' => 1,
				'proc' => 2
				);
				$query = " CALL add_perfect_money(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
				$this->db->query($query, $data);
				$msg=$this->db->query("SELECT @msg as message")->row()->message;
				if($msg)
				{
					$this->session->set_flashdata('info',$msg);
				}
				else
				{
					$this->session->set_flashdata('info','Oh Snap!! Some thing went wrong.');
				}
			}
			if($param==3)
			{
				$data = array(
				'm_pfect_id' => $this->uri->segment(3),
				'm_pfect_userid' => '',
				'm_pfect_currtype' => '',
				'm_pfect_acc' => '',
				'm_pfect_status' => $this->uri->segment(4),
				'proc' => 3
				);
				$query = " CALL add_perfect_money(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
				$this->db->query($query, $data);
				$msg=$this->db->query("SELECT @msg as message")->row()->message;
				if($msg)
				{
					$this->session->set_flashdata('info',$msg);
				}
				else
				{
					$this->session->set_flashdata('info','Oh Snap!! Some thing went wrong.');
				}
			}
		}
		
		/*|-----------------------------------------------|*/
		/*|------   	INSERT TICKET OF USER 	   -------|*/
		/*|-----------------------------------------------|*/
		
		public function insert_ticket()
		{
			$data=array(
			'tr_ticket_id'=>'',
			'tr_ticket_userid'=> trim($this->input->post('txtuserid')),
			'tr_ticket_title'=>trim($this->input->post('txttitle')),
			'tr_ticket_desc'=>$this->input->post('txtmsg'),
			'tr_ticket_reply'=>'',
			'tr_ticket_status'=>1,
			'tr_ticket_date'=>CURR_DATE,
			'proc'=>1
			);
			$query = " CALL sp_ticket(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$query1=$this->db->query("SELECT @msg as message");
			$row = $query1->row();
			$this->session->set_flashdata('info',$row->message);
		}
		
		/*|---------------------------------------------|*/
		/*|------  	 MAKE DEPOSITOR ID	 	 -------|*/
		/*|---------------------------------------------|*/
		
		public function insert_make_deposit()
		{
			$data=array(
			'm_top_id' => '',
			'm_u_id' => $this->session->userdata('profile_id'),
			'm_top_amount' => $this->input->post('txtamount'),
			'm_top_pmt_type' => $this->input->post('payment_method'),
			'm_top_curr_type' => $this->input->post('ddperfect'),
			'm_top_status' => 1,
			'proc' => 1
			);
			$query = " CALL sp_make_deposit(?" . str_repeat(",?", count($data)-1) . ",@msg,@msg2) ";
			$this->db->query($query, $data);
			$msg=$this->db->query("SELECT @msg as message")->row()->message;
			$msg2=$this->db->query("SELECT @msg2 as message2")->row()->message2;
			$this->session->set_flashdata('info',$msg);
			return $msg2;
		}
		
		/*|---------------------------------------+++++------|*/
		/*|------        MAKE USER INVESTMENT	      -------|*/
		/*|-------------------------------------+++++--------|*/
		
		public function investment($param=null)
		{
			if($param==1)
			{
				$data['packages']=$this->db->get_where('m06_package',array('m_pack_status'=>1))->result();
				return $data;
			}
			if($param==2)
			{
				$data=array(
				'm_u_id'=>$this->session->userdata('profile_id'),
				'm_inv_pack'=>$this->input->post("ddpack")
				);
				$query = "CALL sp_investment(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
				$this->db->query($query, $data);
				$msg=$this->db->query("SELECT @msg as message")->row()->message;
				$this->session->set_flashdata('info',$msg);
			}
		}
		
		/*|-------------------------------------------------|*/
		/*|------      	MAKE USER WITHDRAW 	     -------|*/
		/*|-------------------------------------------------|*/
		
		public function insert_withdraw_details()
		{
			$input=$this->session->userdata('profile_id');
			$data=array(
			'm_w_id'  => 0,
			'm_u_id'    =>  $input,
			'm_w_amount'   =>  $this->input->post('txtamount'),
			'm_w_status'   =>  1,
			'm_w_type'   =>  $this->input->post('payment_method'),
			'proc' => 1
			);
			$query = " CALL sp_withdrawn(?" . str_repeat(",?", count($data)-1) . ",@result,@msg) ";
			$this->db->query($query, $data);
			$msg=$this->db->query("SELECT @msg as message")->row()->message;
			$this->session->set_flashdata('info',$msg);
		}
		
		/*|-------------------------------------------------|*/
		/*|------      INTERNAL TEAM TRANSFER 	     -------|*/
		/*|-------------------------------------------------|*/
		
		public function transfer_to_user_amt()
		{
			$data=array(
			'tr_trans_userid'=>$this->session->userdata('profile_id'),
			'tr_trans_transid'=>$this->input->post('txtrecipent'),
			'tr_trans_amt'=>$this->input->post('txtamount'),
			'tr_trans_pass'=>$this->input->post('txtpinpwd')
			);
			$query = "CALL sp_transfer_balance(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$msg=$this->db->query("SELECT @msg as message")->row()->message;
			$this->session->set_flashdata('info',$msg);
		}
		
	}
?>