<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		
		$data['title'] = 'Reservations';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('reservations_view');
		$this->load->view('template/footer');
	}
}