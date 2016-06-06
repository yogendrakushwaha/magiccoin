<?php 
	
	
	/*----------------Get Name From User Id------------------*/
	
	function get_intro_name($id)
	{
		$CI =& get_instance();
		$query=$CI->db->get_where('m03_user_detail',array('or_m_user_id'=>$id ));
		$row = $query->row();
		if($query->num_rows()==1)
		{	
			return $row->or_m_name;	
		}
		else
		{
			return "false";		// RETURN ARRAY WITH ERROR
		}
	}
	
	/*----------------Get Reg id From User Id------------------*/
	
	function get_uid($id)
	{
		$CI =& get_instance();
		$query=$CI->db->get_where('vw_user_details',array('USER_USERID'=>$id ));
		$row = $query->row();
		if($query->num_rows()==1)
		{	
			return $row->USER_REGID;	
		}
		else
		{
			return "false";		// RETURN ARRAY WITH ERROR
		}
	}
	
	/*----------------Get Member idIn team------------------*/
	
	function scan_team($id)
	{
		$CI =& get_instance();
		$CI->db->where('or_m_reg_id',$id);
		$data['mem1']=$CI->db->get('m03_user_detail');
		foreach($data['mem1']->result() as $row1)
		{
			$intdid1=$row1->or_m_upliner_id;
			if($intdid1==$CI->session->userdata('profile_id'))
			{
				return 'true';
			}
			else
			{
				$y=scan_team($intdid1);
				if($y=="true")
				{
					return "true";
				}
				else
				{
					return "false";
				}
			}
		}
	}
	
	/*----------------Get Extreme Left Id------------------*/
	
	function fetchl($id)
	{
		$CI =& get_instance();
		$f="";
		$f1="";
		$query="SELECT * FROM  `m03_user_detail` WHERE  `or_m_position` =  'L' AND ( `or_m_upliner_id` =$id )";	
		$data['lid']=$CI->db->query($query);
		foreach($data['lid']->result() as $rows)
		{	
			$f=$rows->or_m_reg_id;
			break;
		}
		if($f!=0 || $f!="")
		{
			$f1=fetchl($f);
			return  $f1;
		}
		else
		{	
			$CI->db->where('or_m_reg_id',$id);
			$data['id']=$CI->db->get('m03_user_detail');
			foreach($data['id']->result() as $rows)
		{
		$f=$rows->or_m_user_id;	
		}
		return $f;
		}
		}
		
		/*----------------Get Extreme Right Id------------------*/
		
		function fetchr($id)
		{
		$CI =& get_instance();
		$rf="";
		$rf1="";
		$query="SELECT * FROM  `m03_user_detail` WHERE `or_m_position` = 'R' AND (`or_m_upliner_id` =$id)";	
		$data['rid']=$CI->db->query($query);
		foreach($data['rid']->result() as $rowr)
		{
		$rf=$rowr->or_m_reg_id;
		break;
		}
		if($rf!=0 || $rf!="")
		{
		$rf1=fetchr($rf);
		return $rf1;
		}
		else
		{	
		$CI->db->where('or_m_reg_id',$id);
		$data['id']=$CI->db->get('m03_user_detail');
		foreach($data['id']->result() as $rows)
		{
		$rf=$rows->or_m_user_id;	
		}
		return $rf;
		}
		}
		
		?>		