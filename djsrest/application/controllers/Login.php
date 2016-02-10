<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		
	}
	
	/**
	 * this function creates a user model and use it to verify the 
	 * credentials against the database. 
	 */
	public function validate_credentials() {
		
	}		
}