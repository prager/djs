<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for login 
 *
 */
class Login extends CI_Controller {	
	/*
	 * loads the login page when the controller is called
	 *
	 */
	public function index()
	{
		$this->load_login();
	}
	
	/*
	 * Loads the login page
	 *
	 */
	public function load_login() {
		$data['title'] = 'Login';
		$data['collapsed_form'] = 'login_form_tab';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('login/login_view');
		$this->load->view('template/footer');
	}	
	
	/*
	 * Loads the registration page
	 *
	 */
	public function load_registration() {
		$this->load->helper('form');
		$data['title'] = 'Registration Page';
		$data['collapsed_form'] = 'registration_form_tab';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('login/login_view');
		$this->load->view('template/footer');
	}
	
	/*
	 * loads the success page after successful registration
	 *
	 */
	public function load_registration_success() {
		$data['title'] = 'Success Page';
		$data['message'] = 'Your account has been created';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('login/success_view',$data);
		$this->load->view('template/footer');
	}
	
	/*
	 * Loads the error page
	 *
	 */
	public function load_login_error() {
		$data['title'] = 'Login Error';
		$data['message'] = "Login Error, try again!";
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('login/err_view', $data);
		$this->load->view('template/footer');
	}
	
	/*
	 * Validates the input from login form
	 *
	 */
	public function login_validation() {	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user', 'Username', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim');
	
		if($this->form_validation->run()) {
			$this->load->model('Login_model');
			$this->Login_model->login();
			$this->redirect_view();
		}
		else {
			$this->load_login();
		}
	}
	
	/*
	 * Redirects the view according to the user type
	 *
	 */
	public function redirect_view() {
		$userType = $this->session->userdata('user_type');
		switch ($userType) {
		    case "1":
		        redirect('admin');
		        break;
		    default:
		        redirect('home');
		}
	}
	
	/*
	 * Validates the users credentials
	 * 
	 * @return boolean true if information is valid and false if not
	 *
	 */
	public function validate_credentials() {
		$this->load->model('Login_model', '', TRUE);
		
		$username = strtolower($this->input->post('user'));
		$password = $this->input->post('pass');
		
		$data['user'] = $username;
		$data['pass'] = $password;
				
		if ($this->Login_model->user_check($username) && $this->Login_model->pass_check($data)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('validate_credentials', 'Incorrect username/ password');
			return FALSE;
		}	
	}	
	
	/*
	 * Validates the input from registration form
	 *
	 */
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
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('passwordConf', 'Password Conformation', 'trim|required|matches[passwordConf]');
	
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
	
	/*
	 * Logout the user
	 *
	 */
	public function logout() {
		$this->Login_model->logout();
		$this->load_login();
	}
	
	/*
	 * Creates new customer account 
	 *
	 */
	public function create_customer_account() {
		$this->load->model('User_model', '', TRUE);
		$this->User_model->create_user('4');		
	}
}