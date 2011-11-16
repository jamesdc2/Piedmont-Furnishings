<?php

class Ajax extends Controller {

	function Ajax()
	{
		parent::Controller();
	}
	
	/**
	 * 
	 * 
	 * @param object $partialFName
	 * @param object $startOffset
	 * @param object $endOffset
	 * @return 
	 */
	function search_user()
	{
		$startOffset=10;
		$params = $_GET;
		
		
		
		if(isset($params['none']) && $params['none'] == 'none')
		{
			$json = array();
			$json['ResultSet'] = array();
			$json['ResultSet']['totalResultsAvailable'] = 0;
			$json['ResultSet']['totalResultsReturned'] = 0;
			$json['ResultSet']['firstResultPosition'] = 0;
			$json['ResultSet']['resultSetMapUrl'] = 'http://map.com';
			$json['ResultSet']['Result'] = array();
			$data['json'] = $json;
		}
		else
		{
			
			foreach ($params as $key => $value) {
    			//TODO Need to check and see if the value is region, if it is you can't do a string match on it.
				$this->db->like($key, $params[$key], 'both'); 
			}
			
			$query = $this->db->get('customer');
			
			$json = array();
			$json['ResultSet'] = array();
			$json['ResultSet']['totalResultsAvailable'] = (int) $query->num_rows();
			$json['ResultSet']['totalResultsReturned'] = (int) $query->num_rows();
			$json['ResultSet']['firstResultPosition'] = 0;
			$json['ResultSet']['resultSetMapUrl'] = 'http://localhost/';
			$json['ResultSet']['Result'] = $query->result();
			
			$data['json'] = $json;
		}
		
		$this->load->view('json_view', $data);
			
	}
	
	function search_orders() {
		$params = $_REQUEST;
		
		if(isset($params['none']) && $params['none'] == 'none')
		{
			$json = array();
			$json['ResultSet'] = array();
			$json['ResultSet']['totalResultsAvailable'] = 0;
			$json['ResultSet']['totalResultsReturned'] = 0;
			$json['ResultSet']['firstResultPosition'] = 0;
			$json['ResultSet']['resultSetMapUrl'] = 'http://map.com';
			$json['ResultSet']['Result'] = array();
			$data['json'] = $json;
		}
		else
		{
			if(!isset($params['cust_name']))
				$params['cust_name'] = "";
				
			if(isset($params['order_id']) && trim($params['order_id']) != "") {
				$sql = "SELECT salesorder.order_id as order_id, salesorder.emp_id as emp_id, employee.emp_lname as emp_lname, salesorder.order_date as order_date, customer.cust_lname as cust_lname FROM salesorder, customer, employee WHERE salesorder.order_id = ? AND salesorder.emp_id = employee.emp_id AND salesorder.cust_id = customer.cust_id";
				
				$inputArr = array($params['order_id']);
				
				if($this->session->userdata['user_role'] == 'regular'  ) {

					$sql = $sql . " AND salesorder.emp_id = ?";
					$inputArr[] = $this->session->userdata['user_id'];
				}
				
				
				$sql = $sql . " ORDER BY order_id";
				
				$query = $this->db->query($sql, $inputArr);
			}
			else {
				
				$sql = "SELECT salesorder.order_id as order_id, employee.emp_lname as emp_lname, salesorder.order_date as order_date, customer.cust_lname as cust_lname, customer.cust_fname as cust_fname FROM salesorder, customer, employee WHERE salesorder.cust_id = customer.cust_id AND salesorder.emp_id = employee.emp_id AND salesorder.cust_id = customer.cust_id";
				$sql = $sql . " AND customer.cust_lname LIKE ? AND customer.cust_fname LIKE ?";
				
				$inputArr = array("%{$params['cust_name']}%", "%{$params['cust_name']}%");
				
				if($this->session->userdata['user_role'] == 'regular'  ) {
					$sql = $sql . " AND salesorder.emp_id = ?";
					$inputArr[] = $this->session->userdata['user_id'];
				}
				
				$sql = $sql. " ORDER BY salesorder.order_id";
				
				$query = $this->db->query($sql, $inputArr);
				
			}
			
			$json = array();
			$json['ResultSet'] = array();
			$json['ResultSet']['totalResultsAvailable'] = (int) $query->num_rows();
			$json['ResultSet']['totalResultsReturned'] = (int) $query->num_rows();
			$json['ResultSet']['firstResultPosition'] = 0;
			$json['ResultSet']['resultSetMapUrl'] = 'http://localhost/';
			$json['ResultSet']['Result'] = $query->result();
			
			$data['json'] = $json;
		}
		
		$this->load->view('json_view', $data);
			
	}
}    


?>
