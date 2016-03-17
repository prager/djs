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
    
    public function get_user($username) {    	
    	$this->load->model('login_model');
    	$userId = $this->login_model->get_user_id(strtolower($username));
    	
    	$this->db->where('USER_ID', $userId);
    	$query = $this->db->get('USER_TBL');
	    if ($query->num_rows() == 1) {
				return array(
						'user_id' => $query->row()->USER_ID,
						'first_name' => $query->row()->FIRST_NM,
						'last_name' => $query->row()->LAST_NM,
						'full_name' => $query->row()->FIRST_NM . ' ' . $query->row()->LAST_NM,
						'email' => $query->row()->EMAIL_ADDR,
						'address' => $query->row()->STREET_NUM,
						'apt_num' => $query->row()->STREET_NM,
						'state' => $query->row()->STATE_CD,
						'zip' => $query->row()->ZIP_CD,
						'user_type' => $query->row()->USER_TYPE_CD
				);
			} else {
				return null;
			}
	    }
}
?>