<?php
    class Reports extends  Controller {
    	
		function Reports() {
    		parent::Controller();
			$this->load->library('session');
    	}
		
		function index() {
			
		$this->load->helper('cookie');
		$user_role = get_cookie('user_role');
		
		$data['user_role'] = $user_role;
		
		if(isset($user_role) == false )
		{
			$user_role = 'regular';
		}
			
			$this->load->view('html_layout/header');
			$this->load->view('reports', $data);
			$this->load->view('html_layout/footer');
		}
		
		function analysis() {
			
			$this->load->view('html_layout/header');
			$this->load->view('analysis');
			$this->load->view('html_layout/footer');
		}
		
		
		function performance()
		{
			$params = $_REQUEST;
			$nosidebar['no_sidebar'] = true;
			$fname = $this->session->userdata('emp_fname');
			$lname = $this->session->userdata('emp_lname');
			$uid = $this->session->userdata('user_id');
			$user_role = $this->session->userdata('user_role');
			$sdate = '2006-01-01';
			$edate = '2006-12-31';
			$compare1 = 'region_name as Region';
			$runquery = false;
			
			if(isset($params['employee']))
			{
				$uid = $params['employee'];
				
				//set fname and lname
				$sql = "select emp_fname, emp_lname from employee where emp_id = ?";
				$query = $this->db->query($sql, array($uid));
				
				foreach ($query->result() as $row)
				{
				   $fname = $row->emp_fname;
				   $lname = $row->emp_lname;
				}
				
			}
			
			if(isset($params['date']))
			{
				$sdate = $params['date'];
				$edate = $params['date2'];
			}
			
			if(isset($params['groupby']))
			{
				$compare1 = $params['groupby'];
			}
			
			if(!isset($params['start']))
			{
				$runquery = true;
			}
			
			
			
			$sql_params = array();
			
			$compare2 = substr($compare1, stripos($compare1, ' as ') + 4);
			$strSQL =  "SELECT " . $compare1 . ", CONCAT('$',FORMAT(SUM(item_quantity*item_unitprice),2)) AS Sales FROM region, customer, salesorder, orderitem, category, product, employee WHERE region.region_id = customer.region_id AND customer.cust_id = salesorder.cust_id AND salesorder.order_id  = orderitem.order_id AND orderitem.product_id = product.product_id AND product.category_id = category.category_id AND employee.emp_id = salesorder.emp_id";
			$strSQL .= " AND order_date BETWEEN ? AND ?";
			$sql_params[] = $sdate;
			$sql_params[] = $edate;
			
			if($user_role == 'regular')
			{
				$strSQL .= " AND employee.emp_id = ?";
				$sql_params[] = $this->session->userdata('user_id');
			}
			
			if($uid != -1)
			{
				$strSQL .= " AND employee.emp_id = ?";
				$sql_params[] = $uid;
			}
			
			$strSQL .= " GROUP BY " . $compare2 . "  ORDER BY SUM(item_quantity*item_unitprice) DESC, " . $compare2;
			
			if($runquery == true)
			{
				$query = $this->db->query($strSQL, $sql_params);
				$data['data'] = $query->result_array();
			}
			
			$data['ufname'] = $fname;
			$data['ulname'] = $lname;
			$data['user_role'] = $user_role;
			$data['sdate'] = $sdate;
			$data['edate'] = $edate;
			$data['uid'] = $uid;
			
			$this->load->view('html_layout/header');
			$this->load->view('reports/performance', $data);
			$this->load->view('html_layout/footer');
		}
		
		function sales()
		{
			$nosidebar['no_sidebar'] = true;
			$params = $_REQUEST;
			
			
			$user_role = $this->session->userdata('user_role');
			$user_id = $this->session->userdata('user_id');
			
			//Get the reports from the database
			$this->db->select("orderitem.*,salesorder.cust_id,salesorder.order_date,salesorder.emp_id,orderstatus.status_type", false);
			$this->db->from('orderstatus,orderitem,salesorder');
			$this->db->where('orderitem.order_id', 'salesorder.order_id', false);
			$this->db->where('salesorder.status_id','orderstatus.status_id', false);
			
			
			
			if(isset($params['all']) == false)
			{
				if(isset($params['date']) && isset($params['date2']) && trim($params['date']) != "" && trim($params['date2']) != "")
				{
					$this->db->where('salesorder.order_date >=', str_replace("/","-",$params['date']));
					$this->db->where('salesorder.order_date <=', str_replace("/","-",$params['date2']));
				}
				
				if(isset($params['tgt']) && trim($params['tgt']) != "" && is_numeric($params['tgt'])  && isset($params['tlt']) && trim($params['tlt']) != "" && is_numeric($params['tlt']) && isset($params['nf']))
				{
					$this->db->where('(orderitem.item_quantity * orderitem.item_unitprice) >=', (int) $params['tgt']);
					$this->db->where('(orderitem.item_quantity * orderitem.item_unitprice) <=', (int) $params['tlt']);
				}
				
				if(isset($params['orderstatus']) && trim($params['orderstatus']) != "" && is_numeric($params['orderstatus']) && $params['orderstatus'] != -1)
				{
					$this->db->where('orderstatus.status_id', $params['orderstatus']);
				}
				
				if(isset($params['employee']) && trim($params['employee']) != "" && is_numeric($params['employee']) && $params['employee'] != -1)
				{
					$this->db->where('salesorder.emp_id', (int) $params['employee']);
				}
				
				if(isset($params['start']))
				{
					$this->db->where('orderstatus.status_id', 1);
				}
				
			}
			
			if($user_role == 'regular')
			{
				$this->db->where('salesorder.emp_id', $user_id);
			}

			$query = $this->db->get();
			
			
			$table_data = array();
			$c = 0;
			$overallTotal = 0;
			foreach($query->result_array() as $row)
			{
				$table_data[$c]['Order #'] = $row['order_id'];
				$table_data[$c]['Customer ID'] = $row['cust_id'];
				$table_data[$c]['Agent ID'] = $row['emp_id'];
				
				//Switch the date
				$date = $row['order_date'];
				$date = split('-',$date);
			
				if(sizeof($date) == 3 && is_string($date[0]) && strlen($date[0]) == 4)
				{
					$table_data[$c]['Date'] = $date[1].'/'.$date[2].'/'.$date[0][2].$date[0][3];
				}
				else
				{
					$table_data[$c]['Date'] = 'Not Available';
				}
				
				$table_data[$c]['Status'] = $row['status_type'];
				$table_data[$c]['Item #'] = $row['product_id'];
				$table_data[$c]['Quantity'] = $row['item_quantity'];
				$table_data[$c]['Price'] = '$'.($row['item_unitprice'] * 1);
				
				//calculate total and update overall total
				$total = $row['item_unitprice'] * $row['item_quantity'];
				$overallTotal += $total;
				
				$table_data[$c]['Total'] = '$'.$total;
				
				$c++;
			}
			$data['total_total'] = $overallTotal;
			$data['table_data'] = $table_data;
			$data['user_role'] = $user_role;
			
			$sql = 'select * from employee';
			$query = $this->db->query($sql);
			$data['employees'] = $query;
			
			if(!isset($params['genxml']))
			{
				$this->load->view('html_layout/header', $nosidebar);
				$this->load->view('reports/sales', $data);
				$this->load->view('html_layout/footer', $nosidebar);
			}
			else
			{
				$xml = '<?xml version="1.0"?>';
				$xml.='<!DOCTYPE SalesReport SYSTEM "SalesReport.dtd">';
				$xml .= '<SalesReport>';
				
				foreach($table_data as $row)
				{
					$xml.='<Order>';
					foreach($row as $key => $value)
					{
						$tagName = str_replace("#","Num",str_replace(" ","",$key));
						$xml.='<'.$tagName.'>'.$value.'</'.$tagName.'>';
					}
					
					$xml.='</Order>';
				}
				//echo $xml;
				$xml .= '</SalesReport>';
				
				$fileName = $this->session->userdata('emp_fname')."ItemizedSalesReport.xml";
				$xmlOut = APPPATH."../../".$fileName;
				$fh = fopen($xmlOut, 'w') or die("can't open file");
				fwrite($fh, $xml);
				fclose($fh);
				
				$data['xml_loc'] = $fileName;
				$this->load->view('html_layout/header', $nosidebar);
				$this->load->view('reports/xml', $data);
				$this->load->view('html_layout/footer', $nosidebar);
			}
			
		}
    }
?>