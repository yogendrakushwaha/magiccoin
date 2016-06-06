<?php 
	
	class Auth extends CI_Controller 
	{
		
		public function __construct() 
		{
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('common/header');
			$this->load->view('auth/login');
			$this->load->view('common/footer');
		}
		
		public function login()
		{
			if($this->session->userdata('user_id')=="")
			{
				$query00 = $this->db->get_where('m00_setconfig',array('m00_username'=>$this->input->post('txtlogin'),'m00_password'=>$this->input->post('txtpwd'), 'm00_status'=>1));
				$row00 = $query00->row();
				if($query00->num_rows()>0)
				{
					$sessiondata=array(
					'user_id'=>"9999999999",
					'profile_id'=>"0",
					'e_email'  =>$this->input->post('txtlogin'),
					'name'     => "Super Admin",
					'designation' =>"Super Admin",
					'mobile_no' =>'9721789285',
					'doj' =>'2014-12-25',
					'logged_in' => TRUE
					);
					$this->session->set_userdata($sessiondata);
					$return_arr["status"]=1;
					echo json_encode($return_arr);
				}
				else
				{
					$query = $this->db->get_where('tr01_login',array('or_login_id'=>$this->input->post('txtlogin'),'or_login_pwd'=>$this->input->post('txtpwd')));
					$row2 = $query->row();
					if($query->num_rows()>0)
					{
						$query1 = $this->db->get_where('m03_user_detail',array('or_m_reg_id'=>$row2->or_user_id));
						$row = $query1->row();
						if($row->or_m_status!="0")
						{
							$sessiondata=array(
							'user_id'=>$row->or_m_user_id,
							'profile_id' => $row->or_m_reg_id,
							'e_email'  => $row->or_m_email,
							'name'     => ucwords($row->or_m_name),
							'mobile_no' =>$row->or_m_mobile_no,
							'userimage' =>$row->or_m_userimage,
							'reg' =>$row->or_m_regdate,
							'logged_in' => "TRUE"
							);
							$this->session->set_userdata($sessiondata);
							$return_arr["status"]=2;
							echo json_encode($return_arr);
						}
						else
						{
							$return_arr["status"]=0;
							echo json_encode($return_arr);
						}
					}
					else
					{
						$return_arr["status"]=0;
						echo json_encode($return_arr);
					}
				}
			}
			else
			{
				$this->session->sess_destroy();
				$return_arr["status"]=0;
				echo json_encode($return_arr);
			}
		}
		
		public function logout()
	    {	
			$this->session->sess_destroy();
			$return_arr["status"]=0;
			header("Location:".base_url()."welcome/index");
		}
		
		public function activate_Acount()
		{
			$id=$this->uri->segment(3);
			$num_rows=$this->member_model->activate_Acount($id,1);
			if($num_rows>0)
			{
				$data=$this->member_model->activate_Acount($id,2);
				$msg="Your Login Id And Password Send To Your Registered E-Mail Id";
				$this->session->set_flashdata('info',$msg);
			}
			else
			{
				$data['msg']=0;
			}
			redirect("welcome/index", 'refresh');
		}
		
		public function resetpassword()
		{
			$this->db->where('or_m_user_id',$this->input->post('txtuserid'));
			$data['rec']=$this->db->get('m03_user_detail');
			$r=$data['rec']->num_rows();
			if($r>0)
			{
				foreach($data['rec']->result() as $r)
				{
					break;
				}
				$data=array(
						'tr_userid'=>$r->or_m_reg_id
						);
				$this->db->insert('tr04_forword_pass',$data);

				$data1['or_m_reg_id']=$r->or_m_reg_id;
				$data1['email']=$this->input->post('txtuserid');
				$data1['id']=3;
				$msg1=$this->load->view('email/email_template',$data1,TRUE);
				$this->crud_model->send_email(trim($r->or_m_email),'Forget Password',$msg1,'Forget Password');
				$msg="Please Check Your Inbox or Spam or Junk Mail For New Password";
				$this->session->set_flashdata('info',$msg);
			}
			header("Location:".base_url()."auth/index");
		}
		
		public function forget_pwd()
		{
			$this->db->where('tr_userid',$this->uri->segment(3));
			$data1['rec']=$this->db->get('tr04_forword_pass');
			$r=$data1['rec']->num_rows();
			$loginpwd=random_string('numeric',7);
			if($r > 0)
			{
				$data=array(
					'or_login_pwd'=>$loginpwd
					);
				$this->db->where('or_user_id',$this->uri->segment(3));
				$this->db->update('tr01_login',$data);
				$this->db->free_db_resource();
				$this->db->where('tr_userid',$this->uri->segment(3));
				$this->db->delete('tr04_forword_pass');

				$this->db->where('or_m_reg_id',$this->uri->segment(3));
				$re=$this->db->get('m03_user_detail')->row();
				
				$data1['email']=$re->or_m_name;
				$data1['loginpwd']=$loginpwd;
				$data1['id']=4;
				$msg1=$this->load->view('email/email_template',$data1,TRUE);
				$this->crud_model->send_email(trim($re->or_m_email),'New Password',$msg1,'New Password');
				$msg="Password are updated And New Password Are send in your Email. Please Check Your Inbox or Spam or Junk Mail";
				$this->session->set_flashdata('info',$msg);
			}
			header("Location:".base_url()."welcome/index");
		}


	}
?>