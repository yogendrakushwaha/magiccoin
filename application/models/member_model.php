<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class member_model extends CI_Model
	{
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Signup In model     ///////
		//////////////////////////////////////////////////////////////////////
		
		/*--------------MAKE REGISTRATION DATA-----------------*/
		
		public function reg_data($id=null)
		{
			$pass=rand(100000,999999);
			$pinpass=rand(100000,999999);
			$data=array(
			'reg_id'	=>	$this->input->post('txtregid'),
			'or_m_name'  =>  $this->input->post('txtassociate_name'),
			'or_m_dob'  =>  ($this->input->post('txtdob'))?date('Y-m-d',strtotime($this->input->post('txtdob'))):'',
			'or_m_gurdian_name'  =>  $this->input->post('txtparent'),
			'or_m_gender'  =>  $this->input->post('rbgender'),
			'or_m_email'  =>  $this->input->post('txtemail'),
			'or_m_mobile_no'  =>  $this->input->post('txtmobile'),
			'or_m_address'  =>  $this->input->post('txtaddress'),
			'or_m_pincode'  =>  $this->input->post('txtpincode'),
			'or_m_country'  =>  $this->input->post('ddcountry'),
			'or_m_userimage'  => $id,
			'or_m_status'  =>  0,
			'or_m_intr_id'  =>  $this->input->post('txtintroducer_id'),
			'or_m_upliner_id'  =>  $this->input->post('txtparent_id'),
			'or_m_position'  =>  $this->input->post('txtjoin_leg'),
			'pass'  =>  $pass,
			'pinpass'  =>  $pinpass,
			'proc' => $this->input->post('txtproc'),
			);
			return $data;
		}
		
		/*--------------MAKE USER REGISTRATION-----------------*/
		
		public function signup()
		{
			$data=$this->reg_data('');
			$query = " CALL sp_member(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			
			$id=$this->db->query("SELECT @msg as message")->row()->message;
			if($id)
			{
				$update_data=array(
						'or_m_user_hash'=>do_hash($id)
						);
				$this->db->where('or_m_user_id',$id);
				$this->db->update('m03_user_detail',$update_data);
				
				$data1['name']=$this->input->post('txtassociate_name');
				$data1['email']=$this->input->post('txtemail');
				$data1['regid']=$id;
				$data1['id']=1;
				$msg=$this->load->view('email/email_template',$data1,TRUE);
				$mailfor='Acivation Mail';
				$subject='Activate Your Account';
				$to=trim($this->input->post('txtemail'));
				if(EMAIL_SEND==1)
				{
					if($this->crud_model->send_email($to,$subject,$msg,$mailfor))
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
		
		/*--------------MAKE USER PROFILE UPDATE-----------------*/
		
		public function update_member()
		{
			$config['upload_path']   =   "application/user_image/";
			$config['allowed_types'] =   "gif|jpg|jpeg|png|bmp"; 
			$config['max_size']      =   "5000";
			$config['max_width']     =   "5000";
			$config['max_height']    =   "5000";
			$this->load->library('upload',$config);
			$this->upload->do_upload();
			$finfo=$this->upload->data();
			$fileupload=($finfo['raw_name'].$finfo['file_ext']);
			
			$data=$this->reg_data($fileupload);
			$query = " CALL sp_member(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$this->db->query("SELECT @msg as message")->row()->message;
		}
		
		/*--------------USER LOGIN ACTIVATION VIA MAIL-----------------*/
		
		public function activate_Acount($uid=NULL,$param=NULL)
		{
			if($param==1)
			{
				$uid=get_uid($uid);
				$this->db->where('tr_userid',$uid);
				return $this->db->get('tr02_activate_account')->num_rows();
			}
			else if($param==2)
			{
				$uid=get_uid($uid);
				$data=array(
						'or_m_status'=>1
					);
				$this->db->where('or_m_reg_id',$uid);
				$this->db->update('m03_user_detail',$data);
				$data['id']=2;
				$this->db->delete('tr02_activate_account', array('tr_userid' => $uid));
				$this->db->free_db_resource(); 
				$this->db->where('USER_REGID',$uid);
				$data['row']=$this->db->get('vw_user_details')->row();
				
				$msg=$this->load->view('email/email_template',$data,TRUE);
				$mailfor='Login credentials';
				$subject='New user Registration Details';
				$to=trim($data['row']->USER_EMAIL);
				$this->crud_model->send_email($to,$subject,$msg,$mailfor);
				return $data;
			}
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     				USER DOWNLINE		 	    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function user_downline($id,$position)
		{
			$query = " CALL sp_get_downtree($id,'$position') ";
			$this->db->query($query);
			$data['rec']=$this->db->query("SELECT * FROM `vw_user_details` WHERE USER_REGID IN (SELECT reg_id FROM tree)");
			return $data;
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     				USER TREE		 	    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function get_tree_details($id=null)
		{
			if($id!="" && $id!=null && $id!=0)
			{
				return $this->db->query("SELECT * FROM `vw_user_details` WHERE USER_REGID=$id")->row();
			}
			else
			{
				return 0;
			}
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////    			UPDATE SCHEDULING		 	    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function scheduling()
		{
			$data['depositor']=$this->db->get_where('view_deposit_details',array('m_top_status'=>1,'m_top_pmt_type'=>1));
			$data['beneficiary']=$this->db->get_where('view_withdraw_details',array('m_w_status'=>1,'m_w_type'=>1))->result();
			return $data;
		}
		
		/*--------------MEMBER SCHEDULING-----------------*/
		
		public function scheduling_action()
		{
			$id=$this->db->query('select get_transaction_id() as id')->row()->id;
			$rem_amt=0;
			$str = $this->input->post('txtquid');
			$total_amt=$this->input->post('txttotamountdeposit');
			$c = explode(',', $str);
			$no=count($c);
			
			for($i=0; $i<$no-1; $i++)
			{
				$co1=explode('_', $c[$i]);
				$rem_amt=$total_amt-$co1[1];
				if($co1[0]!=0)
				{
					$bal=$co1[1];
				}
				else
				{
					$bal=$rem_amt;
				}
				if($co1[0] != 0)
				{
					$data=array(
					'sch_id'  =>  '',
					'w_id'  =>  $co1[0],
					'm_top_id'  =>  $this->input->post('dddepositor'),
					'order_id'	=> $id,
					'sch_amount'  => $bal,
					'sch_status'  =>  1,
					'proc' => 1
					);
					$query = " CALL sp_schedule(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
					$this->db->query($query, $data);
					$this->db->free_db_resource();
					$msg=$this->db->query("SELECT @msg as message")->row()->message;
					$this->session->set_flashdata('info',$msg);
				}
				$total_amt=$rem_amt;
			}
			
			if($rem_amt > 0)
			{
				$data=array(
				'sch_id'  =>  '',
				'w_id'  =>  0,
				'm_top_id'  =>  $this->input->post('dddepositor'),
				'order_id'	=> $id,
				'sch_amount'  => $rem_amt,
				'sch_status'  =>  1,
				'proc' => 1
				);
				$query = " CALL sp_schedule(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
				$this->db->query($query, $data);
				$this->db->free_db_resource();
				$msg=$this->db->query("SELECT @msg as message")->row()->message;
				$this->session->set_flashdata('info',$msg);
			}
		}
		
		
		
		
		
		
		
		
		public function approve_topup()
		{
			$data['topup']=$this->db->query('select * from view_topup_details where m_top_status = 1')->result();
			$data['user']=$this->db->get_where('m03_user_detail',array('or_m_status'=>1))->result();
			return $data;
		}
		
		public function update_topup()
		{
			$data=array(
			'm_u_id'	=>	$this->input->post('dduser'),
			'm_top_amount'  =>  0,
			'm_top_curr_type'  =>  0,
			'm_top_status'  =>  2,
			'proc' => 2
			);
			$query = " CALL sp_topup(?" . str_repeat(",?", count($data)-1) . ",@msg) ";
			$this->db->query($query, $data);
			$msg=$this->db->query("SELECT @msg as message")->row()->message;
			if($msg)
			{
				return $msg;
			}
			else
			{
				return 0;
			}
		}
		
		
		
	}
?>