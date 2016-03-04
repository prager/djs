<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function index()
	{		
		$this->load_contact();
	}
	
	public function load_contact() {
		$this->load->helper('url');
		
		$data['title'] = 'Contact us';
		
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('contact/contact_view');
		$this->load->view('template/footer');
	}
	
	public function load_success() {
		$this->load->helper('url');
	
		$data['title'] = 'Thanks!';
	
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('contact/success_view');
		$this->load->view('template/footer');
	}
	
	public function message_validation() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', 'Feedback', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load_contact();
		}
		else
		{
			$this->save_message();
			$this->load_success();
		}
	}
	
	public function save_message() {
		$message = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'message' => $this->input->post('message')				
		);
		
		$this->load->model('Contact_model');
		$this->Contact_model->save_message($message);
	}
}