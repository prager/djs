<?php
class User_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Creates a new user
     * @param string $userType
     * @return boolean
     */    
    public function create_user($user_type) {
    	$userData = array(
    			'FIRST_NM' => $this->input->post('firstName'),
    			'LAST_NM' => $this->input->post('lastName'),
    			'EMAIL_ADDR' => $this->input->post('email'),
    			'STREET_NUM' => $this->input->post('address1'),
    			'STREET_NM' => $this->input->post('address2'),
    			'STATE_CD' => $this->input->post('state'),
    			'ZIP_CD' => $this->input->post('zip'),
    			'USER_TYPE_CD' => $user_type
    	);  
    	
    	$userAdded = $this->db->insert('USER_TBL', $userData);    	
	   
		$this->load->model('login_model');
    	$loginAdded = $this->login_model->create_login($this->db->insert_id());
    	
    	return $userAdded && $loginAdded;
    }
    
    public function get_user_type($username) {
    	$this->load->model('login_model');
    	$userId = $this->login_model->get_user_id($username);
    	
    	$this->db->where('USER_ID', $userId);
    	$query = $this->db->get('USER_TBL');
    	if ($query->num_rows() == 1) {
    		return $query->row()->USER_TYPE_CD;
    	} else {
    		return null;
    	}
    }
}
?>