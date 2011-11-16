<?php

class Customers extends Controller {

	function Customers()
	{
		parent::Controller();	
	}
	
	function edit($cust_id = -1)
	{
		//TODO region is being updated, but on the html page it is not being displayd properly.  We need logic to choose which region to select.
		$error = false;
		
		
		if($cust_id != -1)
		{
			$this->db->where('cust_id', $cust_id);
			$query = $this->db->get('customer');
		}
		else
		{
			$error = true;
		}
		
		if($query->num_rows() <= 0)
		{
			$error = true;
		}
		else
		{
			$result = $query->result();
			$result = $result[0];
			$data['customer'] = $result;
		}
		
		$this->load->view('html_layout/header');
		if($error == false)
		{
			$this->load->view('customers_edit', $data);
		}
		else
		{
			$this->load->view('customers_edit_error');
		}
		$this->load->view('html_layout/footer');
	}
	
	function add()
	{
		$params = $_GET;
		$cust_id = -1;
		
		
		$arr = array();
		if(isset( $params['cust_id'] ) == true)
		{
			//Update
			$cust_id = $params['cust_id'];
			$this->db->where("cust_id", (int) $cust_id);
			
		}
		
		//Build array of customer values.
		foreach ($params as $key => $value) 
		{
			if(strpos($key, "use_") === 0)
			{
				$key = substr($key,4);
				$arr[$key] = $value;
			}
		}
		
		$data['arr'] = $arr;
		
		
		if(isset($params['cust_id']))
		{
			$this->db->update('customer', $arr);
			//Set view to update complete
			$data['header'] = "Customer's Updated Information";
			
		}
		else
		{
			$query = $this->db->insert('customer', $arr);
			//Set view to add complete
			$data['header'] = "Customer's New Information";
		}
		
		$this->load->view('html_layout/header');
		$this->load->view('update_complete', $data);
		$this->load->view('html_layout/footer');
		
		
	}
}

?>
