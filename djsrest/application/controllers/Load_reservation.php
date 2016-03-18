<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_reservation extends CI_Controller {

	var $email;
	var $party;
	var $resdate;
	var $time;
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
		
		if($this->err_flag) {
			$this->load_err();
		}
		else {
			$this->load_success();
		}
		
	}
	
	function load_success() {
		$data['title'] = 'Done';
		$this->load->helper('email');
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');

		$data['phone'] = $this->phone;
		$data['email'] = $this->email;
		$data['fname'] = $this->fname;
		$data['lname'] = $this->lname;
		$data['party'] = $this->party;
		$data['time'] = $this->time;
		$data['date'] = $this->date;
		
		$this->load->model('table_reservation_model');
		$this->table_reservation_model->set_data($data);
		
		$data['message'] = 'Thank you for your table reservation!';
		$this->load->view('success_view', $data);
		$this->load->view('template/footer');
	}
	
	function load_err() {		
		$data['title'] = 'Error';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		
		$data['phone'] = $this->phone;
		$data['email'] = $this->email;
		$data['fname'] = $this->fname;
		$data['lname'] = $this->lname;
		$data['party'] = $this->party;
		$data['time'] = $this->time;
		$data['date'] = $this->date;
		
		$this->load->view('reservations_view', $data);
		$this->load->view('template/footer');
	}
	
	/**
	 * Validate the form
	 */	
	function validate_form() {
		$this->form_validation->set_rules('date', 'Date', 'callback_date_check');
		$this->form_validation->set_rules('fname', 'First Name', 'callback_fname_check');
		$this->form_validation->set_rules('lname', 'Last Name', 'callback_lname_check');
		$this->form_validation->set_rules('email', 'Email', 'callback_email_check');
		$this->form_validation->set_rules('party', 'Party', 'callback_party_check');
		$this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');
		$this->form_validation->set_rules('time', 'Time', 'callback_time_check');
		
		return $this->form_validation->run();
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
			$this->form_validation->set_message('date_check', '<font color="red">Please, enter correct date. </font>');
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
	
	function fname_check($str) {
		$str = $this->security->xss_clean($str);
		if ($str == NULL)
		{
			$this->form_validation->set_message('fname_check', '<font color="red">Please, enter your first name. </font>');
			$this->fname = "";
			$this->err_flag = TRUE;
			return FALSE;
		}
		else
		{
			$this->fname = $str;
			return TRUE;
		}
	}
	
	function lname_check($str) {
		$str = $this->security->xss_clean($str);
		if ($str == NULL)
		{
			$this->form_validation->set_message('lname_check', '<font color="red">Please, enter your last name. </font>');
			$this->lname = "";
			$this->err_flag = TRUE;
			return FALSE;
		}
		else
		{
			$this->lname = $str;
			return TRUE;
		}
	}
	
	function email_check($str) {
		$str = $this->security->xss_clean($str);
		if ($str == NULL)
		{
			$this->form_validation->set_message('email_check', '<font color="red">Please, enter your valid email. </font>');
			$this->email = "";
			$this->err_flag = TRUE;
			return FALSE;
		}
		else
		{
			$this->email = $str;
			return TRUE;
		}
	}
	
	function phone_check($str) {
		$str = $this->security->xss_clean($str);
		if ($str == NULL)
		{
			$this->form_validation->set_message('phone_check', '<font color="red">Please, enter your phone number. </font>');
			$this->phone = "";
			$this->err_flag = TRUE;
			return FALSE;
		}
		else
		{
			$this->phone = $str;
			return TRUE;
		}
	}
	
/**
 * No need to check value since it is always selected
 * @param the party size is str type
 */	
	function party_check($str) {
			$this->party = $str;
			return TRUE;
		
	}
	
/**
 * No need to check value since it is always selected
 * @param the time is str type
 */	
	function time_check($str) {		
			$this->time = $str;
			return TRUE;
		
	}
}