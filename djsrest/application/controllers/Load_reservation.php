<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_reservation extends CI_Controller {

	var $email;
	var $party;
	var $resdate;
	var $restime;
	var $phone;
	var $fname;
	var $lname;
	var $err_flag;
	var $date;
	
	public function index()
	{
//load CodeIgniter components		
		$this->loadcomps();
		
		$this->err_flag = FALSE;
	
		$this->validate_form();		
		if(!$this->err_flag) {
			$this->load->model('table_reservation_model');
			$this->load_success();
		}
		else {
			$this->load_err();
		}
		
	}
	
	function load_success() {		
		$data['title'] = 'Done';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('success_view');
		$this->load->view('template/footer');
	}
	
	function load_err() {		
		$data['title'] = 'Error';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('err_view');
		$this->load->view('template/footer');
	}
	
	/**
	 * Validate the form
	 */	
	function validate_form() {
		$this->form_validation->set_rules('date', 'Date', 'callback_date_check');
/******** To-do: validate the rest of the form ***************/
		
		$this->form_validation->run();
	}
	
	/**
	 * Load needed CodeIgniter helpers and libraries
	 */
	function loadcomps() {
		$this->load->library('form_validation');
		$this->load->library('session', 'email');
		$this->load->helper('url', 'html', 'date');
	}
	
	function date_check($str) {
		$str = $this->security->xss_clean($str);
		if ($str == NULL)
		{
			$this->form_validation->set_message('date_check', '<font color="red"><b>Please, enter correct date. </b></font>');
			$this->date = "";
			$this->err_flag = TRUE;
			return FALSE;
		}
		else
		{
			$this->date = $str;
			return TRUE;
		}
	}
}