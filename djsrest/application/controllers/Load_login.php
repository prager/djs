<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_login extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('logged_view');
		$this->load->view('template/footer');
	}
}