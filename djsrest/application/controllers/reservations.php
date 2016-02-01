<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Reservations';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('reservations');
		$this->load->view('template/footer');
	}
}