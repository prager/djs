<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('site_helper');

		$this->load->library('grocery_CRUD');
	}

	public function render_output($page_title, $view_path, $output = null) {
		// i have disabled template stuff just to simplify the page
		//$data['title'] = $page_title;
		//$this->load->view('template/header', $data);
		//$this->load->view('template/navigation');
		//$this->load->view('template/leftNavigation');
		$this->load->view($view_path,$output);
		//$this->load->view('template/footer');
	}

	public function index() {
		$this->render_output('Administrator', 'admin/admin_view', (object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function user_management() {
		$crud = new grocery_CRUD();		
		$crud->set_theme('bootstrap');
		
		$crud->set_table('user_tbl');
		$crud->set_subject('User');
		
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM',  'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');			
		$crud->set_rules('FIRST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('LAST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('EMAIL_ADDR', 'Email', 'trim|required|valid_email|is_unique[user_tbl.EMAIL_ADDR]');
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_relation('USER_TYPE_CD', 'user_type_ref', 'USER_TYPE_DESC');
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
		
		$crud->callback_before_delete(array($this,'callback_delete'));
			
		$output = $crud->render();
		$this->render_output('User Management', 'admin/user_management', $output);
	}
	
	public function employee_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('user_tbl');
		$crud->where('user_tbl.USER_TYPE_CD', '3');	
		$crud->or_where('user_tbl.USER_TYPE_CD', '2');
		$crud->set_subject('Employee');
		
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_rules('FIRST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('LAST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('EMAIL_ADDR', 'Email', 'trim|required|valid_email|is_unique[user_tbl.EMAIL_ADDR]');
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_relation('USER_TYPE_CD', 'user_type_ref', 'USER_TYPE_DESC');	
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
		
		$crud->callback_before_delete(array($this,'callback_delete'));
		
		$output = $crud->render();
		$this->render_output('Employee Management', 'admin/employee_management', $output);
	}
	
	public function customer_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
	
		$crud->set_table('user_tbl');
		$crud->where('user_tbl.USER_TYPE_CD', '4');
		$crud->or_where('user_tbl.USER_TYPE_CD', '5');
		$crud->set_subject('Customer');
	
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_rules('FIRST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('LAST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('EMAIL_ADDR', 'Email', 'trim|required|valid_email|is_unique[user_tbl.EMAIL_ADDR]');
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_relation('USER_TYPE_CD', 'user_type_ref', 'USER_TYPE_DESC');	
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
	
		$crud->callback_before_delete(array($this,'callback_delete'));
	
		$output = $crud->render();
		$this->render_output('Customer Management', 'admin/customer_management', $output);
	}
	
	public function credit_card_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('cc_tbl');
		$crud->set_subject('Credit Card');
		
		$crud->add_fields('USER_ID', 'CC_TYPE', 'CC_NUM', 'SEC_CD', 'EXP_DT', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD');
		$crud->field_type('EXP_DT', 'date');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		$crud->required_fields('USER_ID', 'CC_TYPE', 'CC_NUM', 'SEC_CD', 'EXP_DT', 'STREET_NUM', 'ZIP_CD');
		
		$crud->columns('CC_ID','USER_ID', 'CC_TYPE', 'CC_NUM', 'SEC_CD', 'EXP_DT', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD');
		$crud->set_relation('USER_ID', 'user_tbl', '{FIRST_NM} {LAST_NM}');		
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
		
		$output = $crud->render();		
		$this->render_output('Credit Card Management', 'admin/credit_card_management', $output);
	}
	
	public function reservation_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('reservation_tbl');
		$crud->set_subject('Reservation');
		
		$crud->add_fields('USER_ID', 'RESERVATION_DT', 'RESERVATION_TM', 'PARTY_SIZE');
		$crud->field_type('RESERVATION_DT', 'date');
		$crud->required_fields('USER_ID', 'RESERVATION_DT', 'RESERVATION_TM', 'PARTY_SIZE');
		$crud->edit_fields('USER_ID', 'RESERVATION_DT', 'RESERVATION_TM', 'PARTY_SIZE');
		
		$crud->columns('RESERVATION_ID', 'USER_ID', 'RESERVATION_DT', 'RESERVATION_TM', 'PARTY_SIZE', 'ENTRY_TS');
		$crud->set_relation('USER_ID', 'user_tbl', '{FIRST_NM} {LAST_NM}');		
		$crud
		->display_as('RESERVATION_ID','Reservation Id')
		->display_as('USER_ID', 'Name')
		->display_as('RESERVATION_DT', 'Reservation Date')
		->display_as('RESERVATION_TM', 'Reservation Time')
		->display_as('PARTY_SIZE', 'Party Size')
		->display_as('ENTRY_TS', 'Entry Timestamp');		
		
		$output = $crud->render();
		$this->render_output('Reservation Management', 'admin/reservation_management', $output);
	}
	
	public function user_group_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('user_type_ref');
		$crud->set_subject('User-group');
		
		$crud->required_fields('USER_TYPE_CD', 'USER_TYPE_DESC');
		
		$crud->columns('USER_TYPE_CD', 'USER_TYPE_DESC');		
		$crud
		->display_as('USER_TYPE_CD','Group Code')
		->display_as('USER_TYPE_DESC', 'Description');
		
		$output = $crud->render();
		$this->render_output('User Group Management', 'admin/user_group_management', $output);
	}
	
	public function login_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('login');
		$crud->set_subject('Login Info');
		
		$crud->add_fields('USER_ID', 'USERNAME', 'PWD');
		$crud->unique_fields('USERNAME', 'USER_ID');
		$crud->field_type('PWD', 'password');
		$crud->required_fields('USERNAME', 'PWD');
		$crud->set_rules('PWD', 'Password', 'md5');
		$crud->edit_fields('USERNAME', 'PWD');
		
		$crud->columns('USERNAME', 'USER_ID', 'PWD', 'LOGIN_TS');	
		$crud->set_relation('USER_ID', 'user_tbl', '{FIRST_NM} {LAST_NM}');
		$crud
		->display_as('USERNAME','Username')
		->display_as('USER_ID','Name')
		->display_as('PWD','Password')
		->display_as('LOGIN_TS','Login Timestamp');
		
		$output = $crud->render();
		$this->render_output('Login Management', 'admin/login_management', $output);
	}
	
	public function callback_delete($foreign_key) {
		$this->db->where('USER_ID', $foreign_key);
		$this->db->delete('login');
		$this->db->where('USER_ID', $foreign_key);
		$this->db->delete('cc_tbl');
		$this->db->where('USER_ID', $foreign_key);
		$this->db->delete('reservation_tbl');
	}
}