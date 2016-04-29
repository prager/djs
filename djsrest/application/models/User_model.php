<?php

/**
 * This is the model for the user
 *
 */
class User_model extends CI_Model {
	/**
	 * Constructor for user model
	 */
    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Insert a user into the database
     * 
     * @param int $user_type user type of the new user
     * 
     * @return boolean returns true if user added successsfully
     */
    public function create_user($user_type) {
    	$userData = array(
    			'first_nm' => $this->input->post('firstName'),
    			'last_nm' => $this->input->post('lastName'),
    			'email_addr' => $this->input->post('email'),
    			'street_num' => $this->input->post('address1'),
    			'street_nm' => $this->input->post('address2'),
    			'state_cd' => $this->input->post('state'),
    			'zip_cd' => $this->input->post('zip'),
    			'user_type_cd' => $user_type
    	);  
    	
    	$userAdded = $this->db->insert('user_tbl', $userData);    	
	   
		$this->load->model('login_model');
    	$loginAdded = $this->login_model->create_login($this->db->insert_id());
    	
    	return $userAdded && $loginAdded;
    }
    
    /**
     * Gets the user based on username
     * 
     * @param string $username username of the user
     * 
     * @return array|if user exists|NULL|if not
     */
    public function get_user($username) {    	
    	$this->load->model('login_model');
    	$userId = $this->login_model->get_user_id(strtolower($username));
    	
    	$this->db->where('user_id', $userId);
    	$query = $this->db->get('user_tbl');
	    if ($query->num_rows() == 1) {
			return array(
					'user_id' => $query->row()->user_id,
					'username' => $username,
					'first_name' => $query->row()->first_nm,
					'last_name' => $query->row()->last_nm,
					'full_name' => $query->row()->first_nm . ' ' . $query->row()->last_nm,
					'email' => $query->row()->email_addr,
					'address' => $query->row()->street_num,
					'apt_num' => $query->row()->street_nm,
					'state' => $query->row()->state_cd,
					'zip' => $query->row()->zip_cd,
					'user_type' => $query->row()->user_type_cd,
					'user_type_string' => $this->get_user_type_string($query->row()->user_type_cd)
			);
		} else {
			return null;
		}
    }
    
    /**
     * Updates the user information in the database
     * 
     * @param array $data user information to be updated
     * @return true if the update was successfull
     */
    public function update_user($data) {
    	$userId= $this->session->userdata('user_id');
    	$this->db->where('user_id', $userId);
		return $this->db->update('user_tbl', $data);
    }
    
    /**
     * Gets the user type
     * 
     * @param int $type_code user type code
     * 
     * @return string user type description
     */
    public function get_user_type_string($type_code) {
    	$this->db->where('user_type_cd', $type_code);
    	$query = $this->db->get('user_type_ref');
    	
    	if ($query->num_rows() == 1) {
    		return $query->row()->user_type_desc;
    	} else {
    		return null;
    	}
    }
    
    /**
     * get all the user types
     * 
     * @return array of user types
     */
    public function get_user_types() {
    	$query = $this->db->get('user_type_ref');
		return $query->result_array();
    }
}
?>