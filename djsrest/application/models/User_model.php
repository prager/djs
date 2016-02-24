<?php
class User_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * check if the user exist in the database and passsword entered 
     * matches with the password in database.
     * 
     * return true if credentials are valid
     * 
     */
    public function can_login() {
    	
    }
    
    public function create_user($user_type) {
    	$data = array(
    			'USERNAME' => $this->input->post('username'),
    			'FIRST_NM' => md5($this->input->post('firstName')),
    			'LAST_NM' => $this->input->post('lastName'),
    			'EMAIL_ADDR' => $this->input->post('email'),
    			'STREET_NUM' => $this->input->post('address1'),
    			'STREET_NM' => $this->input->post('address2'),
    			'STATE_CD' => $this->input->post('state'),
    			'ZIP_CD' => $this->input->post('zip'),
    			'USER_TYPE_CD' => $user_type
    	);    
    	return $this->db->insert('user_tbl', $data);
    }
    
    public function getAllCustomers() {
    	
    }
    
    public function getAllEmployees() {
    	
    }
    
    public function getAllUsers() {
    	
    }
}
?>