<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$data['title'] = 'Home Page';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}
}