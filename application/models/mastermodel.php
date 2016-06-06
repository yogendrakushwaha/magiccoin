<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class mastermodel extends CI_Model
	{
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Configuration Data In Model     ///////
		//////////////////////////////////////////////////////////////////////
		
		public function select_config()
		{
			$this->db->where('m00_id',1);
			return $this->db->get('m00_setconfig');
		}
		
		public function update_config()
		{
			$mcf=array(
			'id'=>$this->uri->segment(3),
			'm00_sitename'=>$this->input->post('txtprojname'),
			'm00_website_name'=>$this->input->post('txtwebsite'),
			'm00_email'=>$this->input->post('txtemail'),
			'm00_email_password'=>$this->input->post('txtemailpwd'),
			'm00_email_send'=>$this->input->post('chkemail'),
			'm00_sms_username'=>$this->input->post('txtsmsacc'),
			'm00_sms_pwd'=>$this->input->post('txtsmspwd'),
			'm00_sms_send'=>$this->input->post('chksmsstatus'),
			'm00_sms_senderid'=>$this->input->post('txtsenderid'),
			'm00_theme'=>$this->input->post('txttheme'),
			'm00_username'=>$this->input->post('txtusername'),
			'm00_password'=>$this->input->post('txtuserpass'),
			'm00_pinpassword'=>$this->input->post('txtuserpinpass'),
			'm00_description'=>$this->input->post('txtdesc'),
			);
			$query="CALL sp_setconfig(?" . str_repeat(",?", count($mcf)-1) . ")";
			$this->db->query($query,$mcf);
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Manage Country in Model     ///////
		//////////////////////////////////////////////////////////////////////
		
		public function select_counrty($id)
		{
		       if($id!='' && $id!='0')
			   {
			    $counrty=array(
				'proc'=>4,
				'country_name'=>'',
				'iso_code_2'=>'',
				'iso_code_3'=>'',
				'address_format'=>'',
				'postal'=>'',
				'statuss'=>'',
				'country_id'=>'',
				'query'=>"`m02_country`.`country_id`='".$this->uri->segment(3)."' "
				);
			   $query="CALL sp_manage_counrty(?" . str_repeat(",?", count($counrty)-1) . ")";
			  $data=$this->db->query($query,$counrty);
			  return $data;
			   }
			   else
			   {
				   
			   $counrty=array(
				'proc'=>4,
				'country_name'=>'',
				'iso_code_2'=>'',
				'iso_code_3'=>'',
				'address_format'=>'',
				'postal'=>'',
				'statuss'=>'',
				'country_id'=>'',
				'query'=>"1"
				);
			   $query="CALL sp_manage_counrty(?" . str_repeat(",?", count($counrty)-1) . ")";
			  $data=$this->db->query($query,$counrty);
			  return $data;
			   }
	    }
		public function add_counrty()  
		{
			   $counrty=array(
				'proc'=>1,
				'country_name'=>trim($this->input->post('txtcounrty')),
				'iso_code_2'=>trim($this->input->post('txtisocode')),
				'iso_code_3'=>trim($this->input->post('txtisoccode1')),
				'address_format'=>trim($this->input->post('txtaddressformat')),
				'postal'=>trim($this->input->post('txtpostal')),
				'statuss'=>trim($this->input->post('txtstatus')),
				'country_id'=>'',
				'query'=>''
				);
			   $query="CALL sp_manage_counrty(?" . str_repeat(",?", count($counrty)-1) . ")";
			  $this->db->query($query,$counrty);
		}
		
		public function update_country($id)  
		{
			$counrty=array(
				'proc'=>2,
				'country_name'=>trim($this->input->post('txtcounrty')),
				'iso_code_2'=>trim($this->input->post('txtisocode')),
				'iso_code_3'=>trim($this->input->post('txtisoccode1')),
				'address_format'=>trim($this->input->post('txtaddressformat')),
				'postal'=>trim($this->input->post('txtpostal')),
				'statuss'=>trim($this->input->post('txtstatus')),
				'country_id'=>$id,
				'query'=>''
				);
			$query="CALL sp_manage_counrty(?" . str_repeat(",?", count($counrty)-1) . ")";
			$this->db->query($query,$counrty);
		} 
		
		/////////////////////////////////////////////////////////////////////////
		//////////     News Master In Model    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function view_news()
		{
			return $this->db->get('m24_news');
		}
		
		public function insert_news()
		{
			$data=array
			(
			'm_news_id'=>'',
			'm_news_title'=>$this->input->post('txttitle'),
			'm_news_des'=>$this->input->post('txtdescription'),
			'm_news_status'=>$this->input->post('ddstatus'),
			'm_affid'=>$this->input->post('ddtype'),
			'proc_id'=>'1'
			);
			$query = " CALL sp_news(?" . str_repeat(",?", count($data)-1) . ")";
			$this->db->query($query, $data);
		}
		
		public function update_news()
		{
			$data=array
			(
			'm_news_id'=>$this->uri->segment(3),
			'm_news_title'=>$this->input->post('txttitle'),
			'm_news_des'=>$this->input->post('txtdescription'),
			'm_news_status'=>$this->input->post('ddstatus'),
			'm_affid'=>$this->input->post('ddtype'),
			'proc_id'=>'2'
			);
			$query = " CALL sp_news(?" . str_repeat(",?", count($data)-1) . ")";
			$this->db->query($query, $data);
		}
		
		public function delete_news()
		{
			$data=array
			(
			'm_news_id'=>$this->uri->segment(3),
			'm_news_title'=>'',
			'm_news_des'=>'',
			'm_news_status'=>$this->uri->segment(4),
			'm_affid'=>'',
			'proc_id'=>'3'
			);
			$query = " CALL sp_news(?" . str_repeat(",?", count($data)-1) . ")";
			$this->db->query($query, $data);
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Manage Bank in Model    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function view_bank()
		{
			$data=array(
			'm_bank_id'=>'',
			'm_bank_name'=>'',
			'm_bank_status'=>'1',
			'proc'=>'2'
			);
			$query = " CALL sp_bank(?" . str_repeat(",?", count($data)-1) . ")";
			return $this->db->query($query, $data);
		}
		
		public function insert_bank()
		{
			$data=array(
			'm_bank_id'=>'',
			'm_bank_name'=>$this->input->post('txtbank'),
			'm_bank_status'=>'1',
			'proc'=>'1'
			);
			$query = " CALL sp_bank(?" . str_repeat(",?", count($data)-1) . ")";
			$this->db->query($query, $data);
		}
		
		public function view_update_bank()
		{
			$data=array(
			'm_bank_id'=>$this->uri->segment(3),
			'm_bank_name'=>$this->input->post('txtbank'),
			'm_bank_status'=>'',
			'proc'=>'3'
			);
			$query = " CALL sp_bank(?" . str_repeat(",?", count($data)-1) . ")";
			$this->db->query($query, $data);
		}
		
		public function bank_status()
		{
			$data=array(
			'm_bank_id'=>$this->uri->segment(3),
			'm_bank_name'=>'',
			'm_bank_status'=>$this->uri->segment(4),
			'proc'=>'4'
			);
			$query = " CALL sp_bank(?" . str_repeat(",?", count($data)-1) . ")";
			$this->db->query($query, $data);
		}
		
		
		
	}
?>