<?php

include_once APPPATH."../../webbase.php";

class AuthorizationHook
{
	var $CI;
	
	function AuthorizationHook()
    {
        $this->CI=&get_instance(); //grab a reference to the controller
        $this->CI->load->library("session");
		$this->CI->load->helper('url'); 
    }
	
	function checkUser(){
		
		if(isset($this->CI->goahead) == false || $this->CI->goahead == false)
		{
			if ( $this->CI->session->userdata('user_id') == null )
			{
				redirect('/login/start');
				showerror('Sorry, could not continue'); 
			}
		}
		
	}
}


?>