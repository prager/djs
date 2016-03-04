<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function index()
	{		
		$this->load->helper('url');
		$data['title'] = 'Contact us';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('contact_view');
		$this->load->view('template/footer');
	}
}