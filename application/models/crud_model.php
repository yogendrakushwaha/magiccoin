<?php
	class crud_model extends CI_Model
	{
		/*
			|		SEND EMAIL CODE
		*/
		public function send_email($to=NULL,$subject=NULL,$message=NULL,$mailfor=NULL)
		{
			$config = array (
			'protocol' => 'smtp',
			'smtp_host'=> WEBSITE_NAME,	
			'smtp_user'=> EMAIL,	
			'smtp_pass'=> EMAIL_PASSWORD,
			'charset'  => 'utf-8',
			'priority' => '1'
			);
			$this->email->initialize($config);
			$this->email
			->set_newline("\r\n")
			->from(EMAIL,$mailfor)			 			
			->to(trim($to))								
			->subject($subject)
			->message($message)
			->set_mailtype('html');
			if(EMAIL_SEND==1)
			{
				if($this->email->send())
				return 1;
				else
				return 0;
			}
			else
			{
				return 1;
			}
		}
		
		/*
			|		SEND SMS CODE
		*/	
		public function send_sms($mob,$msg)
		{
			$url="http://api.unicel.in/SendSMS/sendmsg.php";
			$params = array (
			'uname'=>'RealStep',
			'pass'=>'real123',
			'send'=>'RLSTEP',
			'dest'=>$mob,
			'msg'=>$msg
			);
			
			$options = array(
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
			);
			
			$defaults = array(
			CURLOPT_URL => $url. (strpos($url, '?') 
			=== FALSE ? '?' : ''). http_build_query($params),
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_TIMEOUT =>56
			);
			
			$ch = curl_init();
			curl_setopt_array($ch, ($options + $defaults));
			$result = curl_exec($ch);
			if(!$result)
			{
				trigger_error(curl_error($ch));
				$flag=0;
			}
			else
			{	                
				$flag=1;
			}
			curl_close($ch);
			//echo $result; 
		}
		
		public function profile_percent()
		{
			$data=array(
			'USER_REG'	=>	$this->session->userdata('profile_id')
			);
			$query = " CALL sp_profiler(?" . str_repeat(",?", count($data)-1) . ") ";
			return $this->db->query($query, $data)->row()->percentage;
		}

		public function menu_limit()
		{
			$data=array(
			'USER_REG'	=>	$this->session->userdata('profile_id')
			);
			$query = " CALL sp_profiler(?" . str_repeat(",?", count($data)-1) . ") ";
			return $this->db->query($query, $data)->row()->MENU_STATUS;
		}
		
    	public function check_permission()
		{
			$bank=$this->db->get_where('m04_user_bank',array('or_m_id'=>$this->session->userdata('profile_id'),'or_m_b_primary'=>1));
			$user=$this->db->get_where('m03_user_detail',array('or_m_reg_id'=>$this->session->userdata('profile_id')));
			if($bank->num_rows>0 && $user->num_rows>0)
			{
			if((($bank->row()->or_m_bid!='' && $bank->row()->or_m_bid!=0 )||($user->row()->or_m_perfect!='' && $user->row()->or_m_perfect!=0)) && $user->row()->or_m_name!='' )
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
	}
		?>		