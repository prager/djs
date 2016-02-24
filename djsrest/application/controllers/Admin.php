<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('site_helper');

		$this->load->library('grocery_CRUD');
	}

	public function render_output($page_title, $view_path, $output = null)
	{
		//$data['title'] = $page_title;
		//$this->load->view('template/header', $data);
	//	$this->load->view('template/navigation');
		//$this->load->view('template/leftNavigation');
		$this->load->view($view_path,$output);
		//$this->load->view('template/footer');
	}

	public function index()
	{
		$this->render_output('Administrator', 'admin/admin_view', (object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function user_management()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');

		$crud->set_table('user_tbl');				
		
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');			
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		
		$crud->field_type('STATE_CD','dropdown',get_states_array());			
			
		$crud
			->display_as('USER_ID','Id')
			->display_as('FIRST_NM','First Name')
			->display_as('LAST_NM','Last Name')
			->display_as('STREET_NUM','Address Line 1')
			->display_as('STREET_NM','Address Line 2')
			->display_as('STATE_CD','State')
			->display_as('ZIP_CD','Zip Code')
			->display_as('EMAIL_ADDR','Email')
			->display_as('USER_TYPE_CD', 'User Type');
		
		$crud->set_relation('USER_TYPE_CD', 'user_type_ref', 'USER_TYPE_DESC');
		
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
			
		$output = $crud->render();

		$this->render_output('User Management', 'admin/user_management', $output);
	}
	
	public function employee_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('user_tbl');
		$crud->where('user_tbl.USER_TYPE_CD', '3');	
		$crud->or_where('user_tbl.USER_TYPE_CD', '2');
		
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		
		$crud->field_type('STATE_CD','dropdown',get_states_array());
			
		$crud
		->display_as('USER_ID','Id')
		->display_as('FIRST_NM','First Name')
		->display_as('LAST_NM','Last Name')
		->display_as('STREET_NUM','Address Line 1')
		->display_as('STREET_NM','Address Line 2')
		->display_as('STATE_CD','State')
		->display_as('ZIP_CD','Zip Code')
		->display_as('EMAIL_ADDR','Email')
		->display_as('USER_TYPE_CD', 'User Type');		
		
		$crud->set_relation('USER_TYPE_CD', 'user_type_ref', 'USER_TYPE_DESC');
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		
		$output = $crud->render();
		$this->render_output('Employee Management', 'admin/employee_management', $output);
	}
	
	public function credit_card_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('cc_tbl');
		
		$crud->required_fields('USER_ID', 'CC_TYPE', 'CC_NUM', 'SEC_CD', 'EXP_DT', 'STREET_NUM', 'ZIP_CD');
		
		$crud->columns('CC_ID','USER_ID', 'CC_TYPE', 'CC_NUM', 'SEC_CD', 'EXP_DT', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD');
		
		$crud->field_type('EXP_DT', 'date');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		
		$crud
		->display_as('CC_ID', 'Id')
		->display_as('USER_ID', 'Name')
		->display_as('CC_TYPE', 'Type')
		->display_as('CC_NUM', 'Credit Card #')
		->display_as('SEC_CD', 'Security Code')
		->display_as('EXP_DT', 'Expire Date')
		->display_as('STREET_NUM', 'Address Line 1')
		->display_as('STREET_NM', 'Address Line 2')
		->display_as('STATE_CD', 'State')
		->display_as('ZIP_CD', 'Zip Code');
		
		$crud->set_relation('USER_ID', 'user_tbl', '{FIRST_NM} {LAST_NM}');
		
		$crud->add_fields('USER_ID', 'CC_TYPE', 'CC_NUM', 'SEC_CD', 'EXP_DT', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD');
		
		$output = $crud->render();
		$this->render_output('Credit Card Management', 'admin/credit_card_management', $output);
	}	
}