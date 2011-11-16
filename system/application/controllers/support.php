<?php
	class Support extends Controller {
		
		function Support() {
			parent::Controller();
		}
		
		function index() {
			
			$this->load->view('html_layout/header');
			$this->load->view('support');
			$this->load->view('html_layout/footer');
			
		}
				
	}	
	
?>