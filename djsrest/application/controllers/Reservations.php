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
		$data['fname'] = "";
		$data['lname'] = "";
		$data['email'] = "";
		$data['date'] = "";
		$data['party'] = "";
		$data['phone'] = "";
		$data['time'] ="";
		$data['message'] = "";
		$this->load->view('reservations_view', $data);
		$this->load->view('template/footer');
	}
}