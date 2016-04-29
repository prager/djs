<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This is the controller for admin page 
 *
 */
class Admin extends CI_Controller {

	/**
	 * the consturctor for admin  controller
	 *
	 */
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("America/New_York");
		$logged_in = $this->Login_model->is_logged_in();
		$allowed = $this->Login_model->can_access('1');
		
		if (!$logged_in) {
 			redirect('login');
		}
		
		if (!$allowed) {
			$data['title'] = 'Access Denied!';
			$this->load->view('template/header', $data);
			$this->load->view('template/navigation');
			$this->load->view('template/leftNavigation');
			$this->load->view('admin/access_denied_view');
			$this->load->view('template/footer');
		}		

		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('site_helper');
		$this->load->library('grocery_CRUD');
	}

	/**
	 * Render output to the view
	 *
	 * @param string $page_title title of the page
	 * @param string $view_path path to the view
	 * @param $output rendered output from groceryCRUD
	 *
	 */
	public function render_output($page_title, $view_path, $output = null) {
		$data['title'] = $page_title;
		$this->load->view('admin/admin_header', $data);
		$this->load->view($view_path, $output);
		$this->load->view('admin/admin_footer');
	}
	
	/**
	 * Loads the user management page as the index page of the controller
	 *
	 * @param string $page_title title of the page
	 * @param string $view_path path to the view
	 * @param $output rendered output from groceryCRUD
	 *
	 */
	public function index() {
		$this->user_management();
	}
	
	/**
	 * Loads the user management page
	 *
	 */
	public function user_management() {
		$crud = new grocery_CRUD();		
		$crud->set_theme('bootstrap');
		
		$crud->set_table('user_tbl');
		$crud->set_subject('User');
		
		$crud->add_fields('first_nm', 'last_nm', 'street',  'state_cd', 'zip_cd', 'email_addr', 'user_type_cd');
		$crud->field_type('state_cd','dropdown', get_states_array());
		$crud->required_fields('first_nm', 'last_nm', 'street', 'state_cd', 'zip_cd', 'email_addr', 'user_type_cd');			
		$crud->set_rules('first_nm', 'First Name', 'trim|required|alpha');
		$crud->set_rules('last_nm', 'First Name', 'trim|required|alpha');
		$crud->set_rules('email_addr', 'Email', 'trim|required|valid_email|is_unique[user_tbl.email_addr]');
		//$crud->set_rules('email_addr', 'Email', 'trim|required|valid_email');
		//$crud->set_rules('email_addr', 'Email', 'trim|required');
		
		$crud->columns('first_nm', 'last_nm', 'street',  'state_cd', 'zip_cd', 'email_addr', 'user_type_cd');
		$crud->set_relation('user_type_cd', 'user_type_ref', 'user_type_desc');
		$crud
			->display_as('user_id','Id')
			->display_as('first_nm','First Name')
			->display_as('last_nm','Last Name')
			->display_as('street','Street')
			->display_as('state_cd','State')
			->display_as('zip_cd','Zip Code')
			->display_as('email_addr','Email')
			->display_as('user_type_cd', 'User Type');
		
		$crud->callback_before_delete(array($this,'delete_records'));
		
		$output = $crud->render();
		$this->render_output('User Management', 'admin/user_management', $output);
	}

//this one is for troubleshooting
	/*public function user_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
	
		$crud->set_table('user_tbl');
		$crud->set_subject('User');
	
		//$crud->add_fields('first_nm', 'last_nm', 'street_num', 'street_nm',  'state_cd', 'zip_cd');
		$crud->add_fields('first_nm', 'last_nm', 'street_num', 'street_nm',  'state_cd', 'zip_cd', 'email_addr', 'user_type_cd');
		$crud->field_type('state_cd','dropdown', get_states_array());
	
		$crud->columns('first_nm', 'last_nm', 'street_num', 'street_nm',  'state_cd', 'zip_cd', 'email_addr', 'user_type_cd');
		//$crud->set_relation('user_type_cd', 'user_type_ref', 'user_type_desc');
		$crud
		->display_as('first_nm','First Name')
		->display_as('last_nm','Last Name')
		->display_as('street_num','Street Number')
		->display_as('street_nm','Street Name')
		->display_as('state_cd','State')
		->display_as('zip_cd','Zip Code')
		->display_as('email_addr','Email')
		->display_as('user_type_cd', 'User Type');
	
		$crud->callback_before_delete(array($this,'delete_records'));
	
		$output = $crud->render();
		$this->render_output('User Management', 'admin/user_management', $output);
	}*/

	/**
	 * Loads the employee management page
	 *
	 */
	public function employee_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('USER_TBL');
		$crud->where('USER_TBL.USER_TYPE_CD', '3');	
		$crud->or_where('USER_TBL.USER_TYPE_CD', '2');
		$crud->or_where('USER_TBL.USER_TYPE_CD', '1');
		$crud->set_subject('Employee');
		
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_rules('FIRST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('LAST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('EMAIL_ADDR', 'Email', 'trim|required|valid_email|is_unique[USER_TBL.EMAIL_ADDR]');
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_relation('USER_TYPE_CD', 'USER_TYPE_REF', 'USER_TYPE_DESC');	
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
		
		$crud->callback_before_delete(array($this,'delete_records'));
		
		$output = $crud->render();
		$this->render_output('Employee Management', 'admin/employee_management', $output);
	}

	/**
	 * Loads the customer management page
	 *
	 */
	public function customer_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
	
		$crud->set_table('USER_TBL');
		$crud->where('USER_TBL.USER_TYPE_CD', '4');
		$crud->or_where('USER_TBL.USER_TYPE_CD', '5');
		$crud->set_subject('Customer');
	
		$crud->add_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->field_type('STATE_CD','dropdown',get_states_array());
		$crud->required_fields('FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STATE_CD', 'ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_rules('FIRST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('LAST_NM', 'First Name', 'trim|required|alpha');
		$crud->set_rules('EMAIL_ADDR', 'Email', 'trim|required|valid_email|is_unique[USER_TBL.EMAIL_ADDR]');
		
		$crud->columns('USER_ID', 'FIRST_NM', 'LAST_NM', 'STREET_NUM', 'STREET_NM','ZIP_CD', 'EMAIL_ADDR', 'USER_TYPE_CD');
		$crud->set_relation('USER_TYPE_CD', 'USER_TYPE_REF', 'USER_TYPE_DESC');	
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
	
		$crud->callback_before_delete(array($this,'delete_records'));
	
		$output = $crud->render();
		$this->render_output('Customer Management', 'admin/customer_management', $output);
	}
	
	/*
	 * Loads the food menu management page
	 *
	 */	
	public function food_menu_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('menu_tbl');
		$crud->set_subject('');
		
		$crud->field_type('price','integer');
		
		$crud
		->display_as('item_name','Food Item')
		->display_as('price','Price')
		->display_as('description','Description');
		
		$output = $crud->render();
		$this->render_output('Food Menu Management', 'admin/food_menu_management', $output);
	}
	
	/*
	 * Loads the feedback management page
	 *
	 */
	public function feedback_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
	
		$crud->set_table('FEEDBACK_TBL');
		$crud->set_subject('Feedback');
		
		$crud->required_fields('NAME', 'EMAIL', 'FEEDBACK', 'PUBLISH');
		
		$crud
		->display_as('NAME','Sender')
		->display_as('EMAIL_ADDR','Email')
		->display_as('FEEDBACK','Feedback')
		->display_as('PUBLISH','Published');
		
 		$crud->field_type('PUBLISH', 'enum', array('Yes', 'No'));
 		$crud->field_type('FEEDBACK', 'textbox');
 			
		$output = $crud->render();
		$this->render_output('Feedback Management', 'admin/feedback_management', $output);
	}
	
	/*
	 * Loads credit card management page
	 *
	 */	
	public function credit_card_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('cc_tbl');
		$crud->set_subject('Credit Card');
		
		$crud->add_fields('user_id', 'cc_type', 'cc_num', 'sec_cd', 'exp_dt', 'street_num', 'street_nm', 'state_cd', 'zip_cd');
		$crud->field_type('exp_dt', 'date');
		$crud->field_type('state_cd','dropdown',get_states_array());
		$crud->required_fields('user_id', 'cc_type', 'cc_num', 'sec_cd', 'exp_dt', 'street_num', 'zip_cd');
		
		$crud->columns('cc_id','user_id', 'cc_type', 'cc_num', 'sec_cd', 'exp_dt', 'street_num', 'street_nm', 'state_cd', 'zip_cd');
		$crud->set_relation('user_id', 'user_tbl', '{first_nm} {last_nm}');		
		$crud
		->display_as('cc_id', 'Id')
		->display_as('user_id', 'Name')
		->display_as('cc_type', 'Type')
		->display_as('cc_num', 'Credit Card #')
		->display_as('sec_cd', 'Security Code')
		->display_as('exp_dt', 'Expire Date')
		->display_as('street_num', 'Address Line 1')
		->display_as('street_nm', 'Address Line 2')
		->display_as('state_cd', 'State')
		->display_as('zip_cd', 'Zip Code');
		
		$output = $crud->render();		
		$this->render_output('Credit Card Management', 'admin/credit_card_management', $output);
	}
	
	public function reservation_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('reservation_tbl');
		$crud->set_subject('Reservation');
		
		$crud->add_fields('first_nm', 'last_nm', 'reservation_dt', 'reservation_tm', 'party_size');
		//$crud->field_type('RESERVATION_DT', 'string');
		$crud->required_fields('first_nm', 'last_nm', 'reservation_dt', 'reservation_tm', 'party_size');
		$crud->edit_fields('first_nm', 'last_nm', 'reservation_dt', 'reservation_tm', 'party_size');
		
		$crud->columns('first_nm', 'last_nm', 'reservation_dt', 'reservation_tm', 'party_size', 'entry_ts');
		//$crud->set_relation('USER_ID', 'USER_TBL', '{FIRST_NM} {LAST_NM}');		
		$crud
		->display_as('reservation_id','Reservation Id')
		->display_as('first_nm', 'First Name')
		->display_as('last_nm', 'Last Name')
		->display_as('reservation_dt', 'Reservation Date')
		->display_as('reservation_tm', 'Reservation Time')
		->display_as('party_size', 'Party Size')
		->display_as('entry_ts', 'Entry Timestamp');	
			
		$crud->order_by('reservation_dt','desc');
		$output = $crud->render();
		$this->render_output('Reservation Management', 'admin/reservation_management', $output);
	}
	
	/*
	 * Loads the user group management page
	 *
	 */	
	public function user_group_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('user_type_ref');
		$crud->set_subject('User-group');
		
		$crud->required_fields('user_type_cd', 'user_type_desc');
		
		$crud->columns('user_type_cd', 'user_type_desc');		
		$crud
		->display_as('user_type_cd','Group Code')
		->display_as('user_type_desc', 'Description');
		
		$output = $crud->render();
		$this->render_output('User Group Management', 'admin/user_group_management', $output);
	}
	
	/*
	 * Loads the login management page
	 *
	 */
	public function login_management() {
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		
		$crud->set_table('login');
		$crud->set_subject('Login Info');
		
		$crud->add_fields('user_id', 'username', 'pwd');
		$crud->unique_fields('username', 'user_id');
		$crud->field_type('pwd', 'password');
		$crud->required_fields('username', 'pwd');
		$crud->edit_fields('username', 'pwd');
		$crud->callback_before_insert(array($this,'password_encrypt'));
		$crud->callback_before_update(array($this,'password_encrypt'));
		
		$crud->columns('username', 'user_id', 'pwd', 'login_ts');	
		$crud->set_relation('user_id', 'user_tbl', '{first_nm} {last_nm}');
		$crud
		->display_as('username','Username')
		->display_as('user_id','Name')
		->display_as('pwd','Password')
		->display_as('login_ts','Login Timestamp');
		
		$output = $crud->render();
		$this->render_output('Login Management', 'admin/login_management', $output);
	}
	
	/*
	 * Callback function for deleting records connected to 
	 * foreign tables
	 * 
	 * @param string $foreign_key foreign key of the record 
	 * 
	 */
	function delete_records($foreign_key) {
		$this->db->where('user_id', $foreign_key);
		$this->db->delete('login');
		$this->db->where('user_id', $foreign_key);
		$this->db->delete('cc_tbl');
		$this->db->where('user_id', $foreign_key);
		$this->db->delete('reservation_tbl');
	}
	
	/*
	 * Callback function for hashing passwords
	 * 
	 * @param array $post_arry current row of the posting data
	 * @param string $primary_key primary key of the current row
	 *
	 */
	function password_encrypt($post_array, $primary_key = null)
	{
		$post_array['pwd'] = password_hash($this->input->post('pwd'), PASSWORD_BCRYPT);
		return $post_array;
	}	
}
