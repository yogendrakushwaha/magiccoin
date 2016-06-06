<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Userprofile extends CI_Controller {
		
		//////////////////////////////////////////////////////////////////////////
		//////////     Constructor In Member Controller    ///////
		/////////////////////////////////////////////////////////////////////////
		
		public function __construct()
		{
			parent::__construct();
			$this->_is_logged_in();
			$this->data['dash']=$this->db->query("CALL sp_dashboard(".$this->session->userdata('profile_id').")")->row();
			$this->db->free_db_resource();
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Check Login    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function _is_logged_in() 
		{
			if ($this->session->userdata('user_id')=="")
			{
				redirect('auth/index');
				die();
			}
		}
		
		public function index()
		{
			header("Location:".base_url()."userprofile/dashboard");
		}
		
		/*----------------------User Dashboard----------------------------*/
		
		public function dashboard()
		{
			$this->db->where('m_news_status',1);
			$data['news']=$this->db->get('m24_news');
			
			$data['tickets']=$this->db
			->where('tr_ticket_userid',$this->session->userdata('profile_id'))
			->where('tr_ticket_status',1)
			->order_by('tr_ticket_date',"DESC")
			->get('tr05_ticket');
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/dashboard',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------|*/
		/*|------   UPDATE USER PROFILE   -------|*/
		/*|--------------------------------------|*/
		
		public function update_details()
		{	
			$this->db->where('status',1);
			$data['country']=$this->db->get('m02_country');
			
			$this->db->where('USER_REGID',$this->session->userdata('profile_id'));
			$data['info']=$this->db->get('vw_user_details');
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/view_member_edit',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------UPDATE USER DETAILS-----------------*/
		
		public function update_candidate()
		{
			$this->member_model->update_member();
			$this->session->set_flashdata('info','Updated Successfully!!');
			header("Location:".base_url()."userprofile/update_details");
		}
		
		/*|--------------------------------------|*/
		/*|------     UPDATE Password     -------|*/
		/*|--------------------------------------|*/
		
		public function change_password()
		{
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/update_password');
			$this->load->view('common/footer');
		}
		
		public function validte_password()
		{
			echo ($this->db->query("select validte_password('".$this->session->userdata('user_id')."','".$this->input->post("pass")."') AS id")->row()->id);
		}
		
		public function update_password()
		{
			$ulgpd=array(
			'or_login_pwd'=>$this->input->post('txtpassword')
			);
			$this->db->where('or_user_id',$this->session->userdata('profile_id'));
			if($this->db->update('tr01_login',$ulgpd))
			$this->session->set_flashdata('info','Updated Successfully!!');
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."userprofile/change_password");
		}
		
		/*|--------------------------------------|*/
		/*|------  UPDATE PIN Password    -------|*/
		/*|--------------------------------------|*/
		
		
		public function validte_pin_password()
		{
			echo ($this->db->query("select validte_pin_password('".$this->session->userdata('user_id')."','".$this->input->post("pinpass")."') AS id")->row()->id);
		}
		
		public function update_pin_password()
		{
			$ulgpd=array(
			'or_pin_pwd'=>$this->input->post('txtpassword')
			);
			$this->db->where('or_user_id',$this->session->userdata('profile_id'));
			if($this->db->update('tr01_login',$ulgpd))
			$this->session->set_flashdata('info','Updated Successfully!!');
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."userprofile/change_password");
		}
		
		// -------------Add Bank Details---------------
		
		public function add_bank_details()
		{
			$data['curr']=$this->db->get('m07_currency');
			$data['bank']=$this->db
			->where('or_m_id',$this->session->userdata('profile_id'))
			->where('or_m_b_status',1)
			->order_by('or_m_b_primary','DESC')
			->get('view_bank_details');
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/add_bank_details',$data);
			$this->load->view('common/footer');
		}
		
		// -------------Make Primary Bank Details---------------
		
		public function make_primary()
		{
			$data1=array(
			'or_m_b_primary'=>0
			);
			$this->db->where('or_m_id',$this->session->userdata('profile_id'));
			$this->db->update('m04_user_bank',$data1);
			
			$data=array(
			'or_m_b_primary'=>1
			);
			$this->db->where('or_m_bid',$this->uri->segment(3));
			$this->db->update('m04_user_bank',$data);
			$this->session->set_flashdata('info','Bank Details Successfully Converted To Primary !!');
			header("Location:".base_url()."userprofile/add_bank_details");
		}
		
		public function insert_bank_details()
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
			$this->session->set_flashdata('info','Bank Details Added Successfully!!');
			header("Location:".base_url()."userprofile/add_bank_details");
		}
		
		public function delete_details()
		{
			$data = array(
			'or_m_b_status' => 0
			);
			$this->db->where('or_m_bid',$this->uri->segment(3));
			$this->db->update('m04_user_bank',$data);
			$this->session->set_flashdata('info','Bank Details Deleted Successfully!!');
			header("Location:".base_url()."userprofile/add_bank_details");
		}
		
		public function edit_bank_details()
		{
			$data['curr']=$this->db->get('m07_currency');
			$this->db->where('or_m_bid',$this->uri->segment(3));
			$data['banks']=$this->db->get('view_bank_details')->row();
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/edit_bank_details',$data);
			$this->load->view('common/footer');
		}
		
		public function update_bank_details()
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
			$this->session->set_flashdata('info','Bank Details Updated Successfully!!');
			header("Location:".base_url()."userprofile/add_bank_details");
		}
		
		// -------------Add Perfect Money Accounts---------------
		
		public function add_perfect_details()
		{
			$data['perfect']=$this->db
			->where('m_pfect_userid',$this->session->userdata('profile_id'))
			->get('view_perfect_money');
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/add_perfect_details',$data);
			$this->load->view('common/footer');
		}
		
		public function insert_perfect_details()
		{
			$this->user_model->add_perfect_details(1);
			header("Location:".base_url()."userprofile/add_perfect_details");
		}
		
		public function edit_perfect_details()
		{
			$data['perfect']=$this->db
			->where('m_pfect_userid',$this->session->userdata('profile_id'))
			->where('m_pfect_id',$this->uri->segment(3))
			->where('m_pfect_status',1)
			->get('view_perfect_money')->row();
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/edit_perfect_details',$data);
			$this->load->view('common/footer');
		}
		
		public function update_perfect_details()
		{
			$this->user_model->add_perfect_details(2);
			header("Location:".base_url()."userprofile/add_perfect_details");
		}
		
		public function status_perfect_details()
		{
			$this->user_model->add_perfect_details(3);
			header("Location:".base_url()."userprofile/add_perfect_details");
		}
		
		/*|---------------------------------------------------------|*/
		/*|------  		  BEGIN USER TICKET SYSTEM 	     -------|*/
		/*|----------------------------------------------------------|*/
		
		public function view_ticket()
		{
			$this->db->where('TICKET_REGID',$this->session->userdata('profile_id'));
			$data['rec']=$this->db->get('view_ticket');
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/view_ticket',$data);
			$this->load->view('common/footer');
		}
		
		public function insert_ticket()
		{
			$this->user_model->insert_ticket();
			header("Location:".base_url()."userprofile/view_ticket");
		}
		
		/*|---------------------------------------------------------|*/
		/*|------  		    USER DIRECT REFFERAL             -------|*/
		/*|---------------------------------------------------------|*/
		
		public function view_direct_referal()
		{
			$this->db->where('USER_INTOID',$this->session->userdata('profile_id'));
			$data['rec']=$this->db->get('vw_user_details');
			$this->load->view('common/header');
			$this->load->view('common/user_menu');
			$this->load->view('user/view_direct_referal',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------|*/
		/*|------        		USER DOWNLINE  		 	    -------|*/
		/*|--------------------------------------------------------|*/
		
		public function view_user_downline()
		{
			$leg='';
			$position=$this->input->post('ddposition');
			if($position=='')
			{	
				$leg='L';
			}
			else
			{
				$leg=$position;
			}
			
			$this->db->query("CALL sp_get_downtree(".$this->session->userdata('profile_id').",'".$leg."')");
			$data['rec']=$this->db->query("SELECT * FROM `vw_user_details` WHERE  USER_REGID IN (SELECT reg_id FROM tree)");
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_user_downline',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------|*/
		/*|------     		USER TREE STRUCTURE	      -------|*/
		/*|--------------------------------------------------|*/
		
		public function tree()
		{
			$id=$this->uri->segment(3);
			$res=scan_team($id);
			if($res=='true')
			{
				$data['s']=1;
			}
			else
			{
				$data['s']=0;
			}
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_tree',$data);
			$this->load->view('common/footer');
		}
		
		/*----------------SEARCH USER ID IN TREE-------------------*/
		
		public function get_tree()
		{
			if($this->input->post('search_id')!='' || $this->input->post('search_id')!='0')
			{
				$this->db->where('or_m_user_id',trim($this->input->post('search_id')));
				$data['rec']=$this->db->get('m03_user_detail');
				foreach($data['rec']->result() as $row)
				{
					$reg_id=$row->or_m_reg_id;
					break;
				}
				header("Location:".base_url()."userprofile/tree/".$reg_id);
			}
		}
		
		/*|--------------------------------------------------------|*/
		/*|------        	  USER DEPOSIT MONEY            -------|*/
		/*|--------------------------------------------------------|*/
		
		public function view_make_deposit()
		{
			$this->db->where('m_u_id',$this->session->userdata('profile_id'));
			$data['page_data']=$this->db->get("view_deposit_details");
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_make_deposit',$data);
			$this->load->view('common/footer');
		}
		
		public function insert_make_deposit()
		{
			$this->user_model->insert_make_deposit();
			header("Location:".base_url()."userprofile/view_make_deposit");
			
		}
		
		public function reject_deposit()
		{
			$data=array(
			'm_top_status' => 0
			);
			$this->db->where('m_u_id',$this->session->userdata('profile_id'));
			$this->db->update('tr04_deposit',$data);
			$this->session->set_flashdata('info','Your Deposit is Rejected Successfully');
			header("Location:".base_url()."userprofile/view_make_deposit");
		}
		
		public function perfectmoney_confirm()
		{
			$data['m_top_id']=$this->user_model->insert_make_deposit();
			
			$data['txtamount']=$this->input->post("txtamount");
			$data['ddperfect']=$this->input->post("ddperfect");
			
			$data['id']=$this->db->query('select get_transaction_id() as id')->row()->id;
			$data['id1']=$this->db->query('select get_transaction_id() as id1')->row()->id1;
			
			$this->db->where("m_pfect_id",$this->input->post("ddperfect"));
			$data['rec']=$this->db->get('view_perfect_money')->row();
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/perfectmoney_confirm',$data);
			$this->load->view('common/footer');
		}
		
		public function approve_payment()
		{
			$data=array(
			'm_top_id'=>$this->uri->segment(3),
			'm_top_status'=>3
			);
			$query = " CALL sp_perfectmoney_status(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$msg=$this->db->query("SELECT @msg as message")->row()->message;
			$this->session->set_flashdata('info',$msg);
			header("Location:".base_url()."userprofile/do_topup");
		}
		
		public function disapprove_payment()
		{
			$data=array(
			'm_top_id'=>$this->uri->segment(3),
			'm_top_status'=>0
			);
			$query = " CALL sp_perfectmoney_status(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$msg=$this->db->query("SELECT @msg as message")->row()->message;
			$this->session->set_flashdata('info',$msg);
			header("Location:".base_url()."userprofile/do_topup");
		}
		
		/*|-------------------------------------------------------|*/
		/*|------        		USER INVESTMENT   		  -------|*/
		/*|-------------------------------------------------------|*/
		
		public function view_make_investment()
		{
			$data=$this->user_model->investment(1);
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_make_investment',$data);
			$this->load->view('common/footer');
		}
		
		public function insert_make_investment()
		{
			$this->user_model->investment(2);
			header("Location:".base_url()."userprofile/view_make_investment");
		}
		
		/*|----------------------------------------------------|*/
		/*|------        	 USER WITHDRAW  			-------|*/
		/*|----------------------------------------------------|*/
		
		public function view_make_withdrawal()
		{
			$this->db->where('m_u_id',$this->session->userdata('profile_id'));
			$data['rec']=$this->db->get("view_withdraw_details");
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_make_withdrawal',$data);
			$this->load->view('common/footer');
		}
		
		public function insert_withdraw_details()
		{
			$this->user_model->insert_withdraw_details();
			header("Location:".base_url()."userprofile/view_make_withdrawal");
		}
		
		public function staus_withdraw_details()
		{	
			$data=array(
			'm_w_status' => $this->uri->segment(4)
			);
			$this->db->where('w_id',$this->uri->segment(3));
			$this->db->update('tr09_withdrawn',$data);
			header("Location:".base_url()."userprofile/view_make_withdrawal");
		}
		
		/*|------------------------------------------------------------------|*/
		/*|------        		INTERNAL MONEY TRANSFER  		         -------|*/
		/*|------------------------------------------------------------------|*/
		
		public function view_make_money_transfer()
		{
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_make_money_transfer');
			$this->load->view('common/footer');
		}
		
		public function transfer_to_user_amt()
		{
			$this->user_model->transfer_to_user_amt();
			header("Location:".base_url()."userprofile/view_make_money_transfer");
		}
		
		
		
		
		/*|-----------------------------------------------------|*/
		/*|------  		    BEGIN TRANSFER IN TEAM 	     -------|*/
		/*|-----------------------------------------------------|*/
		
		public function find_in_team()
		{
			$sessionid=$this->input->post('sessionid');
			$userid=$this->input->post('userid');
			$info=$this->db->query("SELECT get_member_in_team('".$sessionid."','".$userid."') as find_result");
			$row=$info->row();
			echo $row->find_result;
		}
		
		/*|-----------------------------------------------------------------------------|*/
		/*|------  		      BEGIN VIEW ALL NEWS      	     -------|*/
		/*|-----------------------------------------------------------------------------|*/
		
		public function view_all_news()
		{
			$this->db->where('m_news_status',1);
			$this->db->where('m_affid',1);
			$data['news']=$this->db->get('m05_news');
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_all_news',$data);
			$this->load->view('common/footer');
		}
		
		/*|-----------------------------------------------------|*/
		/*|------  	    BEGIN CHANGE USER PROFILE PIC    -------|*/
		/*|-----------------------------------------------------|*/
		
		public function change_profile_pic()
		{
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/change_profile_pic');
			$this->load->view('common/footer');
		}
		
		public function uploadfile()
		{
			$config['upload_path']   =   "application/user_profile/";
			$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
			$config['max_size']      =   "5000";
			$config['max_width']     =   "1960";
			$config['max_height']    =   "1280";
			$this->load->library('upload',$config);
			$this->upload->do_upload();
			$finfo=$this->upload->data();
			$fileupload=($finfo['raw_name'].$finfo['file_ext']);
			$data=array(
			'or_m_userimage'=>$fileupload
			);
			$this->db->where('or_m_reg_id',$this->session->userdata('profile_id'));
			$this->db->update('m03_user_detail',$data);
			header("Location:".base_url()."userprofile/change_profile_pic");
		}
		
		/*|--------------------------------------|*/
		/*|------    BEGIN withdrawn   -------|*/
		/*|--------------------------------------|*/
		
		
		public function withdrawn()
		{
			$this->db->where('m_u_id',$this->session->userdata('profile_id'));
			$data['page_data']=$this->db->get("view_withdraw_details");
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/withdrawn',$data);
			$this->load->view('common/footer');
		}
		
		public function withdrawn_action()
		{
			$msg=$this->user_model->withdrawn_action();
			if($msg)
			$this->session->set_flashdata('info',$msg);
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."userprofile/withdrawn");
		}
		
		public function withdrawl_reject()
		{
			$data=array(
			'm_w_status'=>0
			);
			$this->db->where('w_id',$this->uri->segment(3));
			$this->db->update('tr08_withdrawn',$data);
			header("Location:".base_url()."userprofile/withdrawn");
		}
		
		/*|--------------------------------------|*/
		/*|------    RECEIVED LINKS    -------|*/
		/*|--------------------------------------|*/
		
		
		public function received_link()
		{
			$data['page_data']=$this->user_model->received_link(1);
			$this->db->free_db_resource();
			$data['recive']=$this->db->query("SELECT * FROM `view_schedule` WHERE `view_schedule`.`BENIID`=".$this->session->userdata('profile_id')." AND `view_schedule`.`SCHEDULESTATUS` IN (1,2)");
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/received_link',$data);
			$this->load->view('common/footer');
		}
		
		public function received_link_action()
		{
			$data=$this->user_model->received_link(2);
			if($data)
			$this->session->set_flashdata('info',$msg);
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."userprofile/received_link");
		}
		
		/*|--------------------------------------|*/
		/*|------  		GIVEN LINKS       -------|*/
		/*|--------------------------------------|*/
		
		
		public function given_link()
		{
			$data=$this->user_model->given_link(1);
			$this->db->free_db_resource();
			$data['given']=$this->db->query("SELECT * FROM `view_schedule` WHERE `view_schedule`.`DEPOSITORID`=".$this->session->userdata('profile_id')." AND `view_schedule`.`SCHEDULESTATUS` IN (1,2)")->result();
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/given_link',$data);
			$this->load->view('common/footer');
		}
		
		public function given_link_action()
		{
			$data=$this->user_model->given_link(2);
			if($data)
			$this->session->set_flashdata('info',$msg);
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."userprofile/withdrawn");
		}
		
		public function update_transid()
		{
			$data=$this->user_model->given_link(3);
		}
		
		public function upload_recipt()
		{
			$data['sec_id']=$this->uri->segment(3);
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/upload_recipt',$data);
			$this->load->view('common/footer');
		}
		
		public function upload_recipt_file()
		{
			$config['upload_path']   =   "application/recipt/";
			$config['allowed_types'] =   "gif|jpg|jpeg|png|pdf|doc|docx|xlsx|xml|zip|txt"; 
			$config['max_size']      =   "5000";
			$config['max_width']     =   "1960";
			$config['max_height']    =   "1280";
			$this->load->library('upload',$config);
			$this->upload->do_upload();
			$finfo=$this->upload->data();
			$fileupload=($finfo['raw_name'].$finfo['file_ext']);
			
			$data=array(
			'sch_recipt'=>$fileupload
			);
			$this->db->where('sch_id',$this->input->post('sechid'));
			$this->db->update('tr09_scheduling',$data);
			header("Location:".base_url()."userprofile/given_link");
		}
		
		/*|--------------------------------------|*/
		/*|------  		REJECTED LINKS    -------|*/
		/*|--------------------------------------|*/
		
		
		public function rejected_link()
		{
			$data['page_data']=$this->user_model->rejected_link(1);
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/rejected_link',$data);
			$this->load->view('common/footer');
		}
		
		public function rejected_link_action()
		{
			$data=$this->user_model->rejected_link(2);
			if($data)
			$this->session->set_flashdata('info',$msg);
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."userprofile/withdrawn");
		}
		
		
		/*|----------------------------------------------|*/
		/*|------    REFERRALS          -------|*/
		/*|----------------------------------------------|*/
		
		
		public function referral()
		{
			$data['page_data']=$this->user_model->referral();
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/referral',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------------|*/
		/*|------          DAILY INVESTMENTS      -------|*/
		/*|--------------------------------------------------------------|*/
		
		
		public function view_daily_investment()
		{
			$this->db->where('INVEST_UID',$this->session->userdata('profile_id'));
			$data['page_data']=$this->db->get("view_daily_investment");
			
			$this->db->where('LEDGER_LEDGERID',3);
			$this->db->where('LEDGER_UID',$this->session->userdata('profile_id'));
			$data['ledger']=$this->db->get("view_ledger");
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_daily_investment',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------------------|*/
		/*|------    LEDGER REPORT OF USER        -------|*/
		/*|--------------------------------------------------------------------|*/
		
		
		public function view_ledger_report()
		{
			$condition="";
			$todate=0;
			$fromdate=0;
			$type=$this->input->post('txttype');
			if($this->input->post('txttodate')!="")
			{
				$todate=date('Y-m-d',strtotime($this->input->post('txttodate')));
			}
			
			if($this->input->post('txtfromdate')!="")
			{
				$fromdate=date('Y-m-d',strtotime($this->input->post('txtfromdate')));
			}
			
			if($todate!='0' && $fromdate!='0')
			{
				$condition=$condition." `LEDGER_DATETIME`>=DATE_FORMAT('$fromdate','%d-%b-%Y') AND `LEDGER_DATETIME`<=DATE_FORMAT('$todate','%d-%b-%Y') AND ";
			}
			
			if($type!="" && $type!="-1")
			{	
				if($type==2)
				$condition=$condition." `LEDGER_LEDGERID` IN (4,5)  AND ";
				if($type==3)
				$condition=$condition." `LEDGER_LEDGERID`=3 AND ";
				if($type==4)
				$condition=$condition." `LEDGER_LEDGERID`=6 AND ";
				if($type==5)
				$condition=$condition." `LEDGER_LEDGERID`=7 AND ";
				if($type==6)
				$condition=$condition." `LEDGER_LEDGERID`=2 AND ";
			}
			
			$condition=$condition." `LEDGER_UID`=".$this->session->userdata('profile_id');
			
			$data['page_data']=$this->db->query("SELECT * FROM view_ledger WHERE ".$condition);
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_ledger_report',$data);
			$this->load->view('common/footer');
		}
		
		
		/*|-------------------------------------------------------------|*/
		/*|------    			LINK REPORTS				     -------|*/
		/*|-------------------------------------------------------------|*/
		
		public function view_link_report()
		{
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_link_report',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------------------|*/
		/*|------    WITHDRAWN REPORT OF USER        -------|*/
		/*|--------------------------------------------------------------------|*/
		
		public function view_withdrawn_report()
		{
			$this->db->where('m_u_id',$this->session->userdata('profile_id'));
			$data['page_data']=$this->db->get("view_withdraw_details");
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_withdrawn_report',$data);
			$this->load->view('common/footer');
		}
		
		/*|----------------------------------------------------------------------|*/
		/*|------        TOPUP REPORT OF USER        -------|*/
		/*|----------------------------------------------------------------------|*/
		
		public function view_topup_report()
		{
			$this->db->where('m_u_id',$this->session->userdata('profile_id'));
			$data['page_data']=$this->db->get("view_topup_details");
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_topup_report',$data);
			$this->load->view('common/footer');
		}
		
		/*|-----------------------------------------------------------------------------------------|*/
		/*|------        LEVEL INCOME REPORT OF USER   		     -------|*/
		/*|-----------------------------------------------------------------------------------------|*/
		
		public function view_level_income()
		{
			$this->db->where('LEDGER_LEDGERID',6);
			$this->db->where('LEDGER_UID',$this->session->userdata('profile_id'));
			$data['page_data']=$this->db->get("view_ledger");
			
			$this->load->view('common/header');
			$this->load->view('common/user_menu',$this->data);
			$this->load->view('user/view_level_income',$data);
			$this->load->view('common/footer');
		}
		
		
		
	}
	
?>										