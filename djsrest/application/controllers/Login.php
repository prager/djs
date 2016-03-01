<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
var $user;
	
	public function index()
	{
		$this->view_login_page();
	}
	
	/**
	 * loads the login page
	 */
	public function view_login_page() {
		$data['title'] = 'Login';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('login_view');
		$this->load->view('template/footer');
	}
	
	/**
	 * this function validates the login data.
	 *  
	 * make sure to trim the data
	 * use md5 for the password field
	 * use xss_clean in order to prevent cross-site scripting 
	 */
	public function login_validation() {
		
//$param will contain data for validation passed from form
		
		if($this->validate_credentials()) {
			redirect('admin');
		}
		else {
			$data['title'] = 'Login Error';
			$data['message'] = "Login Error, try again!";
			$this->load->view('template/header', $data);
			$this->load->view('template/navigation');
			$this->load->view('err_view', $data);
			$this->load->view('template/footer');
		}
	}
	
	/**
	 * this function creates a user model and use it to verify the 
	 * credentials against the database. 
	 */
	public function validate_credentials() {
		
		$this->load->library('form_validation');
		$this->load->model('login_model');		
		$this->form_validation->set_rules('user', 'User', 'callback_user_check');
		$this->form_validation->set_rules('pass', 'Pass', 'callback_pass_check');
		
		return $this->form_validation->run();
		
	}	
	
	public function load_registration() {
		$this->load->helper('form');
		$data['title'] = 'Registration Page';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('registration_view');
		$this->load->view('template/footer');
	}
	
	public function load_registration_success() {
		$data['title'] = 'Success Page';
		$data['message'] = 'Your account has been created';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('success_view',$data);
		$this->load->view('template/footer');
	}
	
	public function registration_validation() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|alpha');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('address1', 'Address line', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[32]|is_unique[LOGIN.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[USER_TBL.email_addr]');
		$this->form_validation->set_rules('emailConf', 'Email Conformation', 'trim|required|matches[email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('passwordConf', 'Password Conformation', 'trim|required|matches[passwordConf]|md5');
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load_registration();
		}
		else
		{
			$this->create_customer_account();
			$this->load_registration_success();
		}
	}
	
	public function create_customer_account() {
		$this->load->model('User_model', '', TRUE);
		$this->User_model->create_user('4');		
	}
	
	function user_check($str) {
		$retval = TRUE;
		$str = $this->security->xss_clean($str);
		$this->user = $str;
		if ($str == NULL)
		{
			$this->form_validation->set_message('subject_check', '<font color="red"><b>Please, enter your username. </b></font>');
			$this->user = "";
			$retval = FALSE;
		}
		else
		{						
			if(!$this->login_model->user_check($str)) {
				$retval = FALSE;
			}
		}
		return $retval;
	}

	function pass_check($str) {
		$retval = TRUE;
		$str = $this->security->xss_clean($str);
		if ($str == NULL) {
			$this->form_validation->set_message('subject_check', '<font color="red"><b>Please, enter correct password. </b></font>');
			$this->pass = "";
			return FALSE;
		}
		else
		{					
			$data['user'] = $this->user;
			$data['pass'] = $str;
			if(!$this->login_model->pass_check($data)) {
				$retval = FALSE;
			}
		}
		return $retval;
	}
}