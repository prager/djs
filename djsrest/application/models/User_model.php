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
    			'username' => $this->input->post('username'),
    			'first_nm' => md5($this->input->post('firstName')),
    			'last_nm' => $this->input->post('lastName'),
    			'email_addr' => $this->input->post('email'),
    			'addr_line1' => $this->input->post('address1'),
    			'addr_line2' => $this->input->post('address2'),
    			'state_cd' => $this->input->post('state'),
    			'zip_cd' => $this->input->post('zip'),
    			'user_type_cd' => $user_type
    	);
    
    	return $this->db->insert('user_tbl', $data);
    }
}
?>