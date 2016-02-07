<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('login_view');
		$this->load->view('template/footer');
	}
}