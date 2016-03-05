<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {
	
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
		$this->load->view('feedback/feedback_view');
		$this->load->view('template/footer');
	}
	
	public function load_success() {
		$this->load->helper('url');
	
		$data['title'] = 'Thanks!';
	
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('feedback/success_view');
		$this->load->view('template/footer');
	}
	
	public function message_validation() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('feedback', 'Feedback', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load_contact();
		}
		else
		{
			$this->save_feedback();
			$this->load_success();
		}
	}
	
	public function save_feedback() {
		$message = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'feedback' => $this->input->post('feedback')				
		);
		
		$this->load->model('Feedback_model');
		$this->Feedback_model->save_feedback($feedback);
	}
}