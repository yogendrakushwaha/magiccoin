<?php 
		if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Member extends CI_Controller {
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Constructor In Member Controller    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function __construct()
		{
			parent::__construct();
			$this->_is_logged_in();
			$this->db->where('m_menu_status',1);
			$this->data['menu']=$this->db->get('m32_apps');
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Check Login    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function _is_logged_in() 
		{
			if ($this->session->userdata('user_id')=="" || $this->session->userdata('profile_id')!="0")
			{
				redirect('auth/logout');
				die();
			}
		}
		
		public function index()
		{
			header("Location:".base_url()."master/view_mainconfig");
		}
		
		/*|-----------------------------------------|*/
		/*|------     USER REGISTRATION      -------|*/
		/*|-----------------------------------------|*/
		
		public function registration()
		{
			$this->db->where('status',1);
			$data['country']=$this->db->get('m02_country');
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/registration',$data);
			$this->load->view('common/footer');
		}
		
		// -------------USER REGISTRATION INSERTION---------------
		
		public function register_candidate()
		{
			$output=$this->member_model->signup();
			if($output==1)
			{
				$msg='A Mail Has been sent to your registered email ID. Sign in email to activate your account!!';
				$this->session->set_flashdata('info',$msg);
				$this->session->set_flashdata('succ','Registerd Successfully!!');
			}
			header("Location:".base_url()."member/registration");
		}
		
		// -------------USER DETAILS UPDATION VIEW---------------
		
		public function update_details()
		{	
			$uid=$this->input->post('distributor_id');
			$data['uid']=$this->input->post('distributor_id');
			if($uid != '')
			{
				$this->db->where('status',1);
				$data['country']=$this->db->get('m02_country');
			
				$this->db->where('USER_USERID',$uid);
				$data['info']=$this->db->get('vw_user_details');
			}
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/view_member_edit',$data);
			$this->load->view('common/footer');
		}
		
		// -------------USER DETAILS UPDATION---------------
		
		public function update_member()
		{
			$this->member_model->update_member();
			$this->session->set_flashdata('info','Updated Successfully!!');
			header("Location:".base_url()."member/update_details");
		}
		
		/*|------------------------------------------|*/
		/*|------     USER SEARCH MEMEBR      -------|*/
		/*|------------------------------------------|*/
		
		public function search_member()
		{
			$todate=0;
			$fromdate=0;
			$condition='';
			
			if($this->input->post('frm_joindate')!="")
			{
				$fromdate=$this->input->post('frm_joindate');
			}
			
			if($this->input->post('tojoin_date')!="")
			{
				$todate=$this->input->post('tojoin_date');
			}
			
			if($todate!='0' && $fromdate!='0')
			{
				$condition=$condition."USER_REGDATE BETWEEN DATE_FORMAT('$fromdate','%Y-%m-%d %H:%i:%s') and DATE_FORMAT('$todate','%Y-%m-%d %H:%i:%s') and ";
			}
			
			if($this->input->post('txtlogin')!="" && $this->input->post('txtlogin')!="0")
			{
				$id=get_uid($this->input->post('txtlogin'));
				$condition=$condition." USER_REGID= ".$id."  and";
			}
			
			if($this->input->post('txtmob')!="" && $this->input->post('txtmob')!="0")
			{
				$condition=$condition." USER_MOBILE= ".$this->input->post('txtmob')."  and";
			} 
			
			if($this->input->post('txtemail')!="" && $this->input->post('txtemail')!="0")
			{
				$condition=$condition." USER_EMAIL= '".$this->input->post('txtemail')."'  and";
			}
			
			$condition=$condition." USER_REGID !=0 ";
			$condition=$condition." ORDER BY USER_REGID DESC";
			
			$query = " select* from vw_user_details where ".$condition;
			$data['rid']=$this->db->query($query);
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/search_mem',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------|*/
		/*|------     USER ACTIVATION VIEW      -------|*/
		/*|--------------------------------------------|*/
		
		public function view_activate_member()
		{
			$data['rec']=$this->db
			->where('USER_STATUS',0)
			->get('vw_user_details');
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_activate_member',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------ACTIVATE USER-------------------*/
		
		public function update_activate_member()
		{
			$regid=$this->input->post('txtquid');
			$this->db->query("CALL sp_change_status_of_user('".$regid."',1)");
			$this->session->set_flashdata('info','Member Activated Successfully!!');
			header("Location:".base_url()."member/view_activate_member");
		}
		
		/*|----------------------------------------------|*/
		/*|------     USER DEACTIVATION VIEW      -------|*/
		/*|----------------------------------------------|*/
		
		public function view_deactivate_member()
		{
			$data['rec']=$this->db
			->where('USER_STATUS',1)
			->get('vw_user_details');
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_deactivate_member',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------DEACTIVATE USER-------------------*/
		
		public function update_deactivate_member()
		{
			$regid=$this->input->post('txtquid');
			$this->db->query("CALL sp_change_status_of_user('".$regid."',2)");
			$this->session->set_flashdata('info','Member Deactivated Successfully!!');
			header("Location:".base_url()."member/view_deactivate_member");
		}
		
		/*|---------------------------------------------------------|*/
		/*|------  		     USER DIRECT REFFERAL            -------|*/
		/*|---------------------------------------------------------|*/
		
		public function view_direct_referal()
		{
			$this->db->where('USER_INTROUSER',$this->input->post('txtuserid'));
			$data['rec']=$this->db->get('vw_user_details');
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_direct_referal',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------|*/
		/*|------        			USER DOWNLINE   	    -------|*/
		/*|--------------------------------------------------------|*/
		
		public function view_user_downline()
		{
			$leg='';
			$position=$this->input->post('ddposition');
			$regid=get_uid($this->input->post('txtuserid'));
			
				if($position=='')
				{	
					$leg='L';
				}
				else
				{
					$leg=$position;
				}
				
				$this->db->query("CALL sp_get_downtree(".$regid.",'".$leg."')");
				$data['rec']=$this->db->query("SELECT * FROM `vw_user_details` WHERE  USER_REGID IN (SELECT reg_id FROM tree)");
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_user_downline',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------|*/
		/*|------     		USER TREE STRUCTURE	      -------|*/
		/*|--------------------------------------------------|*/
		
		public function tree()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_tree');
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
				header("Location:".base_url()."index.php/member/tree/".$reg_id);
			}
		}
		
		/*|--------------------------------------------------|*/
		/*|------     	USER UPDATE PASSWORD	      -------|*/
		/*|--------------------------------------------------|*/
		
		
		public function change_password()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/change_password');
			$this->load->view('common/footer');
		}
		
		/*-------------FETCH PASSWORD OF USER-------------------*/
		
		public function fetch_password()
		{
			$data['userid']=$this->input->post('txtuserid');
			$data['value']=$this->db->query("SELECT * FROM `tr01_login` WHERE `tr01_login`.`or_login_id`='".$this->input->post('txtuserid')."' LIMIT 1");
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/fetch_old_password',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------VIEW OF UPDATE PASSWORD-----------------*/
		
		public function view_update_password()
		{
			$id=$this->uri->segment(3);
			$data['value']=$this->db->query("SELECT * FROM `tr01_login` WHERE `tr01_login`.`or_user_id`='$id' LIMIT 1")->row();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/update_password',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------UPDATE PASSWORD---------------*/
		
		public function update_password()
		{
			$ulgpd=array(
					'or_login_pwd'=>$this->input->post('txtpassword')
				);
			$this->db->where('or_user_id',$this->input->post('txtuserid'));
			$this->db->update('tr01_login',$ulgpd);
			$this->session->set_flashdata('info','Password Updated Successfully!!');
			header("Location:".base_url()."member/change_password");
		}
		
		/*-------------VIEW OF UPDATE PIN PASSWORD-----------------*/
		
		public function view_update_pin_password()
		{
			$id=$this->uri->segment(3);
			$data['value']=$this->db->query("SELECT * FROM `tr01_login` WHERE `tr01_login`.`or_user_id`='$id' LIMIT 1")->row();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/update_pin_password',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------UPDATE PIN PASSWORD---------------*/
		
		public function update_pin_password()
		{
			$ulgpd=array(
			'or_pin_pwd'=>$this->input->post('txtpassword')
			);
			$this->db->where('or_user_id',$this->input->post('txtuserid'));
			$this->db->update('tr01_login',$ulgpd);
			$this->session->set_flashdata('info','Transaction Password Updated Successfully!!');
			header("Location:".base_url()."member/change_password");
		}
		
		/*|------------------------------------------------|*/
		/*|------  			ADMIN REPLY      		-------|*/
		/*|------------------------------------------------|*/
		
		public function view_admin_reply()
		{
			$this->db->where('TICKET_STATUS_ID',1);
			$data['rec']=$this->db->get('view_ticket');
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_admin_reply',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------DEACTIVATE TICKET---------------*/
		
		public function deactive_ticket()
		{
			$data=array(
			'tr_ticket_id'=>$this->uri->segment(3),
			'tr_ticket_userid'=> '',
			'tr_ticket_title'=>'',
			'tr_ticket_desc'=>'',
			'tr_ticket_reply'=>'',
			'tr_ticket_status'=>$this->uri->segment(4),
			'tr_ticket_date'=>'',
			'proc'=>3
			);
			$query = " CALL sp_ticket(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$query1=$this->db->query("SELECT @msg as message");
			$row = $query1->row()->message;
			$this->session->set_flashdata('info',$row);
			header("Location:".base_url()."member/view_admin_reply");
		}
		
		/*-------------UPDATE REPLY---------------*/
		
		public function update_reply()
		{
			$data=array(
			'tr_ticket_id'=>trim($this->input->post('txtid')),
			'tr_ticket_userid'=> '',
			'tr_ticket_title'=>'',
			'tr_ticket_desc'=>'',
			'tr_ticket_reply'=>trim($this->input->post('txtreply')),
			'tr_ticket_status'=>'',
			'tr_ticket_date'=>'',
			'proc'=>2
			);
			$query = " CALL sp_ticket(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$query1=$this->db->query("SELECT @msg as message");
			$row = $query1->row()->message;
			$this->session->set_flashdata('info',$row);
			header("Location:".base_url()."member/view_admin_reply");
		}
		
		/*|-----------------------------------------|*/
		/*|------   VIEW USER SCHEDULING     -------|*/
		/*|-----------------------------------------|*/
		
		public function scheduling()
		{
			$data=$this->member_model->scheduling();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_scheduling',$data);
			$this->load->view('common/footer');
		}
		
		/*-------------MAKE SCHEDULE---------------*/
		
		public function scheduling_action()
		{
			$this->member_model->scheduling_action();
			header("Location:".base_url()."member/scheduling");
		}

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function update_perfect_details()
		{
			$data['rec']=$this->db->get("view_perfect_money");
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/view_perfect_details',$data);
			$this->load->view('common/footer');
		}
		
		public function edit_perfect_details()
		{
			$this->db->where('m_pfect_id',$this->uri->segment(3));
			$data['perfect']=$this->db->get("view_perfect_money")->row();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Member/edit_perfect_details',$data);
			$this->load->view('common/footer');
		}
		
		public function update_perfect_data()
		{
			$data=array(
			'm_pfect_currtype'=>$this->input->post('ddcurrency'),
			'm_pfect_acc'=>$this->input->post('txtperfectacc'),
			);
			$this->db->where('m_pfect_id',$this->uri->segment(3));
			$this->db->update('m08_perfect_money',$data);
			header("Location:".base_url()."member/update_perfect_details");
		}
		
		
		
		
		
		
		
		/*|--------------------------------------|*/
		/*|------  		UPDATE TOPUP      -------|*/
		/*|--------------------------------------|*/
		
		public function approve_topup()
		{
			$data=$this->member_model->approve_topup();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/approve_topup',$data);
			$this->load->view('common/footer');
		}
		
		public function update_topup()
		{
			$msg=$this->member_model->update_topup();
			if($msg)
			$this->session->set_flashdata('info',$msg);
			else
			$this->session->set_flashdata('unsucc','Oh Snap!! Some thing went wrong.');
			header("Location:".base_url()."member/approve_topup");
		}
		
		/*|--------------------------------------|*/
		/*|------   UPDATE SCHEDULING     -------|*/
		/*|--------------------------------------|*/
		
	
		
		
		/*|-----------------------------------------------------|*/
		/*|------   ADD BANK DETAILS      -------|*/
		/*|-----------------------------------------------------|*/
		
		public function add_bank_details()
		{
			$this->db->where('or_m_id',1);
			$this->db->where('or_m_b_status',1);
			$data['bank_details']=$this->db->get("view_bank_details");
			$this->db->where('m_cur_status',1);
			$data['cur']=$this->db->get("m01_currency");
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/add_bank_details',$data);
			$this->load->view('common/footer');
		}
		
		public function insert_bank_details()
		{
			$data = array(
			'or_m_id' => 1,
			'or_m_name' => $this->input->post('txtaccname'),
			'or_m_b_ifscode' => $this->input->post('txtswift'),
			'or_m_b_cbsacno' => $this->input->post('txtacc'),
			'or_m_b_name' => $this->input->post('txtbank_name'),
			'or_m_b_branch' => $this->input->post('txtbranch'),
			'or_m_b_currency' => $this->input->post('ddcurrency')
			);
			$this->db->insert('m04_user_bank',$data);
			header("Location:".base_url()."member/add_bank_details");
		}
		
		public function delete_deials()
		{
			$data = array(
			'or_m_b_status' => 0
			);
			$this->db->where('or_m_bid',$this->uri->segment(3));
			$this->db->update('m04_user_bank',$data);
			header("Location:".base_url()."member/add_bank_details");
		}
		
		/*|--------------------------------------------------------------------------------|*/
		/*|------         		 DAILY INVESTMENTS   				-------|*/
		/*|--------------------------------------------------------------------------------|*/
		
		public function view_daily_investment()
		{
			$todate=0;
			$fromdate=0;
			$condition='';
			$condition1='';
			
			if($this->input->post('txtto')!="")
			{
				$todate=$this->input->post('txtto');
				$todate=date('Y-m-d',strtotime($todate));
			}
			if($this->input->post('txtfrom')!="")
			{
				$fromdate=$this->input->post('txtfrom');
				$fromdate=date('Y-m-d',strtotime($fromdate));
			}
			
			if($this->input->post('ddtype')==1)
			{
				if($todate!='0' && $fromdate!='0')
				{
					$condition=$condition." DATE_FORMAT(INVEST_DATE,'%Y-%m-%d' )>=DATE_FORMAT('$fromdate','%Y-%m-%d') and DATE_FORMAT(INVEST_DATE,'%Y-%m-%d' )<=DATE_FORMAT('$todate','%Y-%m-%d') and ";
				}
				
				if($this->input->post('txtuserid')!="")
				{
					$condition=$condition." INVEST_UID= get_name('".$this->input->post('txtuserid')."',5)  and";
				}
				
				if($this->input->post('ddpackage')!="" && $this->input->post('ddpackage')!="-1")
				{
					$condition=$condition." INVEST_PACKID= ".$this->input->post('ddpackage')."  and";
				}
				
				$condition=$condition." INVEST_UID!=''";
			}
			if($this->input->post('ddtype')==2)
			{
				if($todate!='0' && $fromdate!='0')
				{
					$condition1=$condition1." DATE_FORMAT(LEDGER_TIME,'%Y-%m-%d' )>=DATE_FORMAT('$fromdate','%Y-%m-%d') and DATE_FORMAT(LEDGER_TIME,'%Y-%m-%d' )<=DATE_FORMAT('$todate','%Y-%m-%d') and ";
				}
				
				if($this->input->post('txtuserid')!="")
				{
					$condition1=$condition1." LEDGER_UID= get_name('".$this->input->post('txtuserid')."',5)  and";
				}
				$condition1=$condition1." LEDGER_UID!=''";
			}
			
			if($condition)
			{
				$data['page_data']=$this->db->query("SELECT * FROM view_daily_investment WHERE ".$condition);
			}
			else
			{
				$data['page_data']=$this->db->query("SELECT * FROM view_daily_investment");
			}
			
			if($condition1)
			{
				$data['ledger']=$this->db->query("SELECT * FROM view_ledger WHERE LEDGER_LEDGERID = 3 and ".$condition1);
			}
			else
			{
				$this->db->where('LEDGER_LEDGERID',3);
				$data['ledger']=$this->db->get("view_ledger");
			}
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_daily_investment',$data);
			$this->load->view('common/footer');
		}
		
		/*|---------------------------------------------------------------------------------------------|*/
		/*|------    			  LEDGER REPORT OF USER            		 -------|*/
		/*|---------------------------------------------------------------------------------------------|*/
		
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
			
			if($this->input->post('txtuserid')!="")
			{
				$condition=$condition." LEDGER_UID= get_name('".$this->input->post('txtuserid')."',5)  and";
			}
			
			if($type!="" && $type!="-1")
			{	
				if($type==2)
				$condition=$condition." `LEDGER_LEDGERID` IN (4,5) AND ";
				if($type==3)
				$condition=$condition." `LEDGER_LEDGERID`=3 AND ";
				if($type==4)
				$condition=$condition." `LEDGER_LEDGERID`=6 AND ";
				if($type==5)
				$condition=$condition." `LEDGER_LEDGERID`=7 AND ";
				if($type==6)
				$condition=$condition." `LEDGER_LEDGERID`=2 AND ";
			}
			
			$condition=$condition." `LEDGER_UID`!=0 ";
			
			$data['page_data']=$this->db->query("SELECT * FROM view_ledger WHERE ".$condition);
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_ledger_report',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------------------|*/
		/*|------    WITHDRAWN REPORT OF USER        -------|*/
		/*|--------------------------------------------------------------------|*/
		
		public function view_withdrawn_report()
		{
			$todate=0;
			$fromdate=0;
			$condition='';
			
			if($this->input->post('txtto')!="")
			{
				$todate=date('Y-m-d',strtotime($this->input->post('txtto')));
			}
			
			if($this->input->post('txtfrom')!="")
			{
				$fromdate=date('Y-m-d',strtotime($this->input->post('txtfrom')));
			}
			
			if($todate!='0' && $fromdate!='0')
			{
				$condition=$condition." DATE_FORMAT(`withdrawn_req`,'%d-%b-%Y')>=DATE_FORMAT('$fromdate','%d-%b-%Y') AND DATE_FORMAT(`withdrawn_req`,'%d-%b-%Y')<=DATE_FORMAT('$todate','%d-%b-%Y') AND ";
			}
			
			if($this->input->post('txtuserid')!="")
			{
				$condition=$condition." m_u_id= get_name('".$this->input->post('txtuserid')."',5)  and";
			}
			
			if($this->input->post('ddtype')!="" && $this->input->post('ddtype')!="-1")
			{
				$condition=$condition." m_w_type= ".$this->input->post('ddtype')." and";
			}
			
			$condition=$condition." `m_u_id`!=0 ";
			
			$data['page_data']=$this->db->query("select * from view_withdraw_details where ".$condition);
			
			
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_withdrawn_report',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------------------------------------|*/
		/*|------    		RECIEVED REPORT OF USER		        -------|*/
		/*|--------------------------------------------------------------------|*/
		
		public function view_scheduling()
		{
			$todate=0;
			$fromdate=0;
			$condition='';
			
			if($this->input->post('txtto')!="")
			{
				$todate=date('Y-m-d',strtotime($this->input->post('txtto')));
			}
			
			if($this->input->post('txtfrom')!="")
			{
				$fromdate=date('Y-m-d',strtotime($this->input->post('txtfrom')));
			}
			
			if($todate!='0' && $fromdate!='0')
			{
				$condition=$condition." DATE_FORMAT(`SCHEDULEREQDATE`,'%d-%b-%Y')>=DATE_FORMAT('$fromdate','%d-%b-%Y') AND DATE_FORMAT(`SCHEDULEREQDATE`,'%d-%b-%Y')<=DATE_FORMAT('$todate','%d-%b-%Y') AND ";
			}
			
			if($this->input->post('txtbene')!="")
			{
				$condition=$condition." BENIUSERID='".$this->input->post('txtbene')."' and";
			}
			
			if($this->input->post('txtdepositor')!="")
			{
				$condition=$condition." DEPOSITORUSERID='".$this->input->post('txtdepositor')."' and";
			}
			
			$condition=$condition." SCHEDULEID!=0";
			
			$data['recive']=$this->db->query("SELECT * FROM `view_schedule` WHERE ".$condition);
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_scheduling',$data);
			$this->load->view('common/footer');
		}
		
		/*|--------------------------------------|*/
		/*|------  		GIVEN LINKS       -------|*/
		/*|--------------------------------------|*/
		
		public function given_link()
		{
			$data['given']=$this->db->query("SELECT * FROM `view_schedule` WHERE `view_schedule`.`SCHEDULESTATUS` IN (1,2)")->result();
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/given_link',$data);
			$this->load->view('common/footer');
		}
		
		public function do_topup()
		{
			$todate=0;
			$fromdate=0;
			$condition='';
			
			if($this->input->post('txtto')!="")
			{
				$todate=date('Y-m-d',strtotime($this->input->post('txtto')));
			}
			
			if($this->input->post('txtfrom')!="")
			{
				$fromdate=date('Y-m-d',strtotime($this->input->post('txtfrom')));
			}
			
			if($todate!='0' && $fromdate!='0')
			{
				$condition=$condition." DATE_FORMAT(`DEPOSIT_REQUEST`,'%d-%b-%Y')>=DATE_FORMAT('$fromdate','%d-%b-%Y') AND DATE_FORMAT(`DEPOSIT_REQUEST`,'%d-%b-%Y')<=DATE_FORMAT('$todate','%d-%b-%Y') AND ";
			}
			
			if($this->input->post('txtuserid')!="")
			{
				$condition=$condition." m_u_id= get_name('".$this->input->post('txtuserid')."',5)  and";
			}
			
			if($this->input->post('ddtype')!="" && $this->input->post('ddtype')!="-1")
			{
				$condition=$condition." m_top_pmt_type= ".$this->input->post('ddtype')." and";
			}
			
			$condition=$condition." `m_u_id`!=0 ";
			
			$data['page_data']=$this->db->query("select * from view_topup_details where ".$condition);
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/do_topup',$data);
			$this->load->view('common/footer');
		}
		
		/*|-------------------------------------------------|*/
		/*|------  		PERFECT MONEY APPROVAL       -------|*/
		/*|-------------------------------------------------|*/
		
		public function perfect_approval()
		{
			$this->db->where('m_w_type',2);
			$this->db->where('m_w_status',1);
			$data['page_data']=$this->db->get("view_withdraw_details");
			
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('member/view_perfecct_withdrwal_report',$data);
			$this->load->view('common/footer');
		}
		
		public function approve()
		{
			$timezone = new DateTimeZone("Asia/Kolkata" );
			$date = new DateTime();
			$date->setTimezone($timezone);
			$currd=$date->format( 'Y-m-d' );
			$data=array(
			'm_w_approvedate'=>$date->format( 'Y-m-d' ),
			'm_m_description'=>$this->input->post('txtdescription'),
			'm_w_status'=>3
			);
			$this->db->where('w_id',$this->input->post('hdid'));
			$this->db->update('tr08_withdrawn',$data);
			header("Location:".base_url()."member/perfect_approval");
		}
		
		public function reject()
		{
			$timezone = new DateTimeZone("Asia/Kolkata" );
			$date = new DateTime();
			$date->setTimezone($timezone);
			$currd=$date->format( 'Y-m-d' );
			$data=array(
			'm_w_approvedate'=>$date->format( 'Y-m-d' ),
			'm_m_description'=>$this->input->post('txtdescription'),
			'm_w_status'=>0
			);
			$this->db->where('w_id',$this->input->post('hdid1'));
			$this->db->update('tr08_withdrawn',$data);
			header("Location:".base_url()."member/perfect_approval");
		}
		
		
	}
?>							