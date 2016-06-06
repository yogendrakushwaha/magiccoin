<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Master extends CI_Controller {
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Constructor In Master Controller    ///////
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
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/dashboard');
			$this->load->view('common/footer');
		}
		
		public function dashboard()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/dashboard');
			$this->load->view('common/footer');
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Main Configuraion    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function view_mainconfig()
		{
			$data['config']= $this->mastermodel->select_config();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_mainconfig',$data);
			$this->load->view('common/footer');
		}
		
		public function update_mainconfig()
		{
			$this->mastermodel->update_config();
			$this->session->set_flashdata('info','Setting Updated Successfully!!');
			header("Location:".base_url()."master/view_mainconfig");
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Manage Country    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function view_country()
		{
			$data['allcountry']=$this->mastermodel->select_counrty(0);
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_country',$data);
			$this->load->view('common/footer');
		}
		
		public function select_country()
		{			
			$data['country']=$this->mastermodel->select_counrty($this->uri->segment(3));
			$this->load->view('Master/view_select_country',$data);			
		}
		
		public function add_country()
		{			
			$this->mastermodel->add_counrty();
			$this->session->set_flashdata('info','Country Inserted Successfully!!');
			header("Location:".base_url()."master/view_country");				
		}
		
		public function update_status_country()
		{			
			$id=$this->uri->segment(3);
			$counrty=array(
			'proc'=>3,
			'country_name'=>'',
			'iso_code_2'=>'',
			'iso_code_3'=>'',
			'address_format'=>'',
			'postal'=>'',
			'statuss'=>$this->uri->segment(4),
			'country_id'=>$id,
			'query'=>''
			);
			$query="CALL sp_manage_counrty(?" . str_repeat(",?", count($counrty)-1) . ")";
			$this->db->query($query,$counrty);
			$this->session->set_flashdata('info','Country Status Updated Successfully!!');
			header("Location:".base_url()."master/view_country");				
		}
		
		public function edit_country()
		{			
			$id=$this->uri->segment(3);
			$data['id']=$id;
			$data['edit_country']=$this->mastermodel->select_counrty($id);
			$this->db->free_db_resource();
			$data['allcountry']=$this->mastermodel->select_counrty(0);
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_edit_country',$data);
			$this->load->view('common/footer');
		}
		
		public function update_country()
		{			
			$id=$this->uri->segment(3);
			$data['id']=$id;
			$this->mastermodel->update_country($id);
			$this->session->set_flashdata('info','Country Status Updated Successfully!!');
			header("Location:".base_url()."master/view_country");
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Start News Master    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function view_news()
		{
			$data['content']=$this->mastermodel->view_news();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('master/view_news',$data);
			$this->load->view('common/footer');
		}
		
		public function add_news()
		{
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('master/add_news');
			$this->load->view('common/footer');
		}
		
		public function insert_news()
		{
			$this->mastermodel->insert_news();
			$this->session->set_flashdata('info','News Inserted Successfully!!');
			header("Location:".base_url()."Master/add_news");
		}
		
		public function edit_news()
		{
			$this->db->where('m_news_id',$this->uri->segment(3));
			$data['content']=$this->db->get('m24_news');
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('master/view_edit_news',$data);
			$this->load->view('common/footer');
		}
		
		public function update_news()
		{
			$this->mastermodel->update_news();
			$this->session->set_flashdata('info','News Updated Successfully!!');
			header("Location:".base_url()."Master/view_news");
		}
		
		public function delete_news()
		{
			$this->mastermodel->delete_news();
			$this->session->set_flashdata('info','News Status Updated Successfully!!');
			header("Location:".base_url()."Master/view_news");
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Start Bank Master    ///////
		//////////////////////////////////////////////////////////////////////
		
		public function view_bank()
		{			
			$data['info']=$this->mastermodel->view_bank();
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_bank_master',$data);
			$this->load->view('common/footer');
		}
		
		public function inser_bank_master()
		{			
			$this->mastermodel->insert_bank();
			$this->session->set_flashdata('info','Bank Inserted Successfully!!');
			header("Location:".base_url()."Master/view_bank");
		}
		
		public function view_edit_bank()
		{	
			$this->db->where('m_bank_id',$this->uri->segment(3));
			$data['info']=$this->db->get('m01_bank');
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_edit_bank',$data);
			$this->load->view('common/footer');
		}
		
		public function view_update_bank()
		{			
			$this->mastermodel->view_update_bank();
			$this->session->set_flashdata('info','Bank Details Updated Successfully!!');
			header("Location:".base_url()."Master/view_bank");
		}
		
		public function bank_status()
		{			
			$this->mastermodel->bank_status();
			$this->session->set_flashdata('info','Bank Status Updated Successfully!!');
			header("Location:".base_url()."Master/view_bank");
		}
		
		/////////////////////////////////////////////////////////////////////////
		//////////     Start Currency master    ///////
		//////////////////////////////////////////////////////////////////////
		
		//View Currency detail
		public function view_currency_master()
		{
			$data['currency']=$this->db->query("SELECT * FROM view_currency");
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_currency',$data);
			$this->load->view('common/footer');
		}
		
		//Add Currency
		public function add_currency()
		{
			$datas=array(
			'Cur_id'=>'',
			'Cur_name'=>$this->input->post('txtcurrencyname'),
			'Cur_symbol'=>$this->input->post('txtcurrencycode'),
			'Cur_icon'=>$this->input->post('txtcurrencyicon'),
			'Cur_gbp_conversion'=>$this->input->post('txtcurrencyvalue'),
			'Cur_status'=>$this->input->post('txtstatus'),
			'proc'=>1
			);
			$query="CALL sp_currency(?" . str_repeat(",?", count($datas)-1) . ")";
			$data=$this->db->query($query,$datas);
			$this->session->set_flashdata('info','Currency Added Successfully!!');
			header("location:".base_url()."master/view_currency_master");
		}
		
		//Select Currency detail
		public function select_currency()
		{
			$data['currency']=$this->db->query("SELECT * FROM view_currency");
			$data['update']=$this->db->query("SELECT * FROM view_currency WHERE Cur_id='".$this->uri->segment(3)."' ");
			$this->load->view('common/header');
			$this->load->view('common/menu',$this->data);
			$this->load->view('Master/view_update_currency',$data);
			$this->load->view('common/footer');
		}
		
		//Update Currency
		public function update_currency()
		{
			$datas=array(
			'Cur_id'=>$this->uri->segment(3),
			'Cur_name'=>$this->input->post('txtcurrencyname'),
			'Cur_symbol'=>$this->input->post('txtcurrencycode'),
			'Cur_icon'=>$this->input->post('txtcurrencyicon'),
			'Cur_gbp_conversion'=>$this->input->post('txtcurrencyvalue'),
			'Cur_status'=>$this->input->post('txtstatus'),
			'proc'=>2
			);
			$query="CALL sp_currency(?" . str_repeat(",?", count($datas)-1) . ")";
			$data=$this->db->query($query,$datas);
			$this->session->set_flashdata('info','Currency Updated Successfully!!');
			header("location:".base_url()."master/view_currency_master");
		}
		
		//Update Status Currency
		public function status_currency()
		{
			$datas=array(
			'Cur_id'=>$this->uri->segment(3),
			'Cur_name'=>'',
			'Cur_symbol'=>'',
			'Cur_icon'=>'',
			'Cur_gbp_conversion'=>'',
			'Cur_status'=>$this->uri->segment(4),
			'proc'=>3
			);
			$query="CALL sp_currency(?" . str_repeat(",?", count($datas)-1) . ")";
			$data=$this->db->query($query,$datas);
			$this->session->set_flashdata('info','Currency Status Updated Successfully!!');
			header("location:".base_url()."master/view_currency_master");
		}
		
		/*---------------- End Currency master -------------------------*/

	}
?>			