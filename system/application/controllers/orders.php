<?php

class Orders extends Controller {

	function Orders()
	{
		parent::Controller();
	}
	
	function create() {
		
		$this->load->helper('date');
		
		$datestr = "%Y-%m-%d";
		$data['date'] = mdate($datestr);
		
		$sql = 'SELECT product_id, product_name FROM product';
		
		$data['product_query'] = $this->db->query($sql);
		$data['order_status'] = $this->db->get('orderstatus');
		$data['cust_list'] = $this->db->order_by('cust_lname')->get('customer');
		
		if($this->session->userdata['user_role'] == 'regular') {
			$data['emp_list'] = $this->db->get_where('employee', array('emp_id' => $this->session->userdata['user_id']));
		}
		else
			$data['emp_list'] = $this->db->order_by('emp_lname')->get('employee');
		
		
		
		$this->load->view('html_layout/header');
		$this->load->view('orders_create', $data);
		$this->load->view('html_layout/footer');
		
	}
	
	function search()
	{
		
		$query = $this->db->get('salesorder');
		$data['order_query'] = $query;
		
		$this->load->view('html_layout/header');
		$this->load->view('orders_search', $data);
		$this->load->view('html_layout/footer');
	}
	
	function edit()
	{	
		$params = $_GET;
		$data['params'] = $params;
		
		
		$order_id = $params['order_id'];
		$this->db->select('salesorder.order_id,
						   salesorder.cust_id,
						   salesorder.order_date,
						   salesorder.emp_id,
						   salesorder.status_id,
						   employee.emp_lname,
						   employee.emp_fname,
						   customer.cust_lname,
						   customer.cust_fname,
						   orderstatus.status_type');
		$this->db->from('salesorder');
		$this->db->join('employee', 'salesorder.emp_id= employee.emp_id');
		$this->db->join('customer', 'salesorder.cust_id= customer.cust_id');
		$this->db->join('orderstatus', 'salesorder.status_id= orderstatus.status_id');
		$this->db->where('salesorder.order_id', $order_id);
		$query = $this->db->get();
		$data['entry'] = $query->row_array();
		
		$this->db->select('orderitem.product_id,
						   orderitem.item_linenum,
						   orderitem.item_quantity,
						   orderitem.item_unitprice,
						   product.product_name');
		$this->db->from('orderitem');
		$this->db->join('product', 'orderitem.product_id= product.product_id');
		$this->db->where('orderitem.order_id', $order_id);
		$this->db->order_by('item_linenum');
		$query = $this->db->get();
		$data['order_items'] = $query;
		
		$data['product_names'] = $this->db->get('product');
		$data['cust_list'] = $this->db->get('customer');
		if($this->session->userdata['user_role'] == 'regular') {
			$data['emp_list'] = $this->db->get_where('employee', array('emp_id' => $this->session->userdata['user_id']));
		}
		else
			$data['emp_list'] = $this->db->order_by('emp_lname')->get('employee');
		$data['order_status'] = $this->db->get('orderstatus');
		$data['total_cost'] = 0.00;
		
		
		
		$this->load->view('html_layout/header');
		$this->load->view('orders_edit', $data);
		$this->load->view('html_layout/footer');
	}
	
	function delete()
	{
		$params = $_GET;
		$order_id = $params['order_id'];
		
		$data['order_id'] = $order_id;
		
		$this->db->delete(array('salesorder','orderitem'),array('order_id'=> $order_id));
		$this->load->view('html_layout/header');
		$this->load->view('delete', $data);
		$this->load->view('html_layout/footer');
	}
	
	function done()
	{	
		
		$params = $_POST;
		$order_id = -1;
		$data['params'] = $params;
		
		$arr = array();
		if(isset($params['order_num']) == true) {
			$order_id = $params['order_num'];
			$this->db->where('order_id', $order_id);
		}
		
		$sales_order_data = array(
									'cust_id' => $params['customer'],
									'order_date' => $params['order_date'],
									'emp_id' => $params['sales_agent'],
									'status_id' => $params['order_status']
		
		);
		
		
		if(isset($params['order_num'])) {
			
			//update the salesorder table
			$this->db->update('salesorder', $sales_order_data);			
			
			//remove all previous values for this order..
			$this->db->delete('orderitem', array('order_id' => $order_id));
			
			
			$od_products = array();
			foreach($params as $param => $value)
			{
				$pos = stripos($param, 'od_product_');
				if($pos === 0)
				{
					$num = substr($param,11);
					$od_products[] = $num;
				}
			}

			sort($od_products, SORT_NUMERIC);
			
			for($i = 0; $i < sizeof($od_products); $i++)
			{
				$num = $od_products[$i];
				
				$order_item_data = array(
											'order_id' => $order_id,
											'item_linenum' => $i + 1,
											'product_id' => $params['od_product_' . $num],
											'item_quantity' => $params['od_quantity_' . $num],
											'item_unitprice' => str_ireplace(",", "", $params['od_unit_price_' . $num])
				);
				
				$this->db->insert('orderitem', $order_item_data);
			}
				
		}
		else {
			//add new entry to the salesorder table
			$this->db->insert('salesorder', $sales_order_data);
			$this->db->select_max('order_id');
			$query = $this->db->get('salesorder');
			
			$order_id = $query->row(0)->order_id;
			
			
			$i = 1;
			while(isset($params['od_product_'. $i])) {
				$order_item_data = array(
											'order_id' => $order_id,
											'item_linenum' => $i,
											'product_id' => $params['od_product_' . $i],
											'item_quantity' => $params['od_quantity_' . $i],
											'item_unitprice' => $params['od_unit_price_' . $i]
				);
				$this->db->insert('orderitem', $order_item_data);
				$i++;
			}
		}
		
		$data['order_id'] = $order_id;
				
		$this->load->view('html_layout/header');
		$this->load->view('orders_done', $data);
		$this->load->view('html_layout/footer');
	}
}

?>
