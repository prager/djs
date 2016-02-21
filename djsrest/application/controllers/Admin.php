<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load_admin_page();
	}
	
	public function load_admin_page() {
		$data['title'] = 'Administrator';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftnavigation');
		$this->load->view('admin_view');
		$this->load->view('template/footer');
	}
}