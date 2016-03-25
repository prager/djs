<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$logged_in = $this->Login_model->is_logged_in();
		$allowed = $this->Login_model->can_access('1');
	
		if (!$logged_in) {
			redirect('login');
		}
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('site_helper');
	}
	
	public function index()
	{
		$this->load_profile();
	}
	
	public function load_profile() {
		$username= $this->session->userdata('username');
		$this->load->model('user_model');
		
		$data['user'] = $this->user_model->get_user($username);		
		$data['title'] = 'Profile';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('profile/profile_view', $data);
		$this->load->view('template/footer');
	}
	
	public function load_edit_contact_info() {
		$username= $this->session->userdata('username');
		$userId= $this->session->userdata('user_id');
		$this->load->model('user_model');
		$this->load->model('login_model');
		
		$data['login'] = $this->login_model->get_login($userId);
		$data['user'] = $this->user_model->get_user($username);
		$data['title'] = 'Profile';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('profile/edit_contact_info_view', $data);
		$this->load->view('template/footer');
	}
	
	public function load_edit_login_info() {
		$username= $this->session->userdata('username');
		$userId= $this->session->userdata('user_id');
		$this->load->model('user_model');
		$this->load->model('login_model');
	
		$data['login'] = $this->login_model->get_login($userId);
		$data['user'] = $this->user_model->get_user($username);
		$data['title'] = 'Profile';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('profile/edit_login_info_view', $data);
		$this->load->view('template/footer');
	}
	
	public function load_error() {
		$data['title'] = 'Login Error';
		$data['message'] = "Could not update you profile at this time.";
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('profile/err_view', $data);
		$this->load->view('template/footer');
	}
	
	public function load_success() {
		$data['title'] = 'Success Page';
		$data['message'] = 'Your profile has been updated';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('profile/success_view',$data);
		$this->load->view('template/footer');
	}
	
	public function contact_info_validation() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		
		if ($this->session->userdata('email') != $this->input->post('email')) {
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[USER_TBL.email_addr]');
			$this->form_validation->set_message('is_unique', 'Please use a different email');
		}
				
		return $this->form_validation->run();		
	}
	
	public function login_info_validation() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('passwordConf', 'Password Conformation', 'trim|required|matches[passwordConf]');
		
		return $this->form_validation->run();
	}
	
	public function update_login_info() {
		if ($this->login_info_validation() == TRUE) {
			$newUsername = strtolower($this->input->post('username'));
			$loginData = array(
					'USERNAME' => $newUsername,
					'PWD' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
			);
	
				
			$this->load->model('Login_model');
			$user_updated= $this->Login_model->update_login($loginData);
			$this->session->set_userdata('username', $newUsername);
				
			if ($user_updated) {
				$this->load_success();
			} else {
				$this->load_error();
			}
				
		} else {
			$this->load_edit_login_info();
		}
	
	}
	
	public function update_contact_info() {
		if ($this->contact_info_validation() == TRUE) {
			$userData = array(
					'FIRST_NM' => $this->input->post('firstName'),
					'LAST_NM' => $this->input->post('lastName'),
					'EMAIL_ADDR' => $this->input->post('email'),
					'STREET_NUM' => $this->input->post('address'),
					'STREET_NM' => $this->input->post('apt_num'),
					'STATE_CD' => $this->input->post('state'),
					'ZIP_CD' => $this->input->post('zip')					
			);
						
			
			$this->load->model('User_model');
			$user_updated= $this->User_model->update_user($userData);
			
			if ($user_updated) {
				$this->load_success();
			} else {
				$this->load_error();
			}
			
		} else {
			$this->load_edit_contact_info();
		}
		
	}
}