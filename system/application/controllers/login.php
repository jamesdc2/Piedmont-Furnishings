<?php

include_once (APPPATH."../../webbase.php");


class Login extends Controller {
	
	var $goahead = true;
	
	function Login()
	{
		parent::Controller();
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header("location: ".wp."login.php");
	}
	
	function start()
	{
		$this->load->library('session');
		
		
		//Get password and username if they were posted.
		$username= '';
		$pass = '';
		$isValidated = false;
		$header = null;
		
		if(isset($_POST['password']))
		{
			$pass = $_POST['password'];
		}
		
		if(isset($_POST['username']))
		{
			$username = $_POST['username'];
		}
		
		//Get the real password for the user
		$sql = "select * from employee where emp_username like BINARY ?";
		$pwordQuery = $this->db->query($sql, array($username));
		
		if ($pwordQuery->num_rows() == 1)
		{
			//Manipulate the result object
			$row = $pwordQuery->result();
			$row = $row[0];
			
			if($row->emp_pword === $pass)
			{
				$isValidated = true;
				$this->session->set_userdata('user_id', $row->emp_id);
				$this->session->set_userdata('emp_lname', $row->emp_lname);
				$this->session->set_userdata('emp_fname', $row->emp_fname);
				//Find users role.
				if($row->job_id == 4)
				{
					$this->session->set_userdata('user_role', 'regular');
				}
				else
				{
					$this->session->set_userdata('user_role', 'manager');
				}
				
				//Set the header to send them to the main page
				$header = 'Location: '.wp.'index.php/welcome/index';
			}
		}
		
		$num_tries = 0;
		if(isset($_POST['num_tries']) && is_numeric($_POST['num_tries']))
		{
			$num_tries = $_POST['num_tries'] + 1;
		}
		else
		{
			$num_tries = 0;
		}
		
		if($isValidated == false)
		{
			
		}
		else if ($isValidated == true && $num_tries < 3)
		{
			header($header);
		}
	
		$data['num_tries'] = $num_tries;
		$data['wp'] = wp;
		
		$this->load->view('login', $data);
	}
	
}
?>