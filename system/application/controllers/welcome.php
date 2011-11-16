<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->helper('cookie');
		$user_role = get_cookie('user_role');
		
		if(isset($user_role) == false )
		{
			$user_role = 'regular';
		}
		
		$data['user_role'] = $user_role;
		$this->load->view('html_layout/header');
		$this->load->view('welcome_message', $data);
		$this->load->view('html_layout/footer');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */