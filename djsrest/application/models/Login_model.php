<?php
class Login_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

/**
 * Connects to either local or remote db
 * 
 * @param boolean $db_local
 * @return boolean
 */
    function db_connect($db_local) {

//load db_model with two types of connections: local db connection or remote db connection
    	$this->load->model('db_connection_model');
    	
    	if($db_local == TRUE) {
    		$this->db_connection_model->connect_local();
    	}
    	else {
    		$this->db_connection_model->connect_remote();
    	}
    	return TRUE;
    }
    
  /**
   * This routine checks password. Refer to:
   * https://www.youtube.com/watch?v=GHTAyLIjn70
   * http://php.net/manual/en/function.password-hash.php
   * https://crackstation.net/hashing-security.htm
   * password hash for this password: password_hash('a', PASSWORD_BCRYPT, array('cost' => 12));
   * 
   */
    function pass_check($data) {
    	$retval = TRUE;
    	$user = $data['user'];
    	$pass = $data['pass'];
    	$this->db->where('USERNAME', $user);
    	$query = $this->db->get('LOGIN');
    	if($query->num_rows() > 0) {
    		$row = $query->row();
    		//echo "hashed pass: " . $row->password;
    		return password_verify($pass, $row->PWD);
    	}
    	else {
    		$retval = FALSE;
    	}    	
    	
    	return $retval;
    }
    
	/**
	 * Checks for the valid user ID
	 * @param string $user
	 * @return boolean
	 */
    function user_check($user) {
    	$retval = TRUE;
    	$username = strtolower($user);
    	$this->db->where('username', $user);
    	$query = $this->db->get('LOGIN');
    	if ($query->num_rows() == 0) {
    		$retval = FALSE;
    	}    	
    	return $retval;
    }
    
	/**
	 * Creates a login for a given user Id
	 * @param string $userId
	 * @return boolean
	 */    
    function create_login($userId) {
    	$loginData = array(
    			'USERNAME' => strtolower($this->input->post('username')),
    			'USER_ID' => $userId,
    			'PWD' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
    	);
    	return $this->db->insert('LOGIN', $loginData);
    }
    
    function get_user_Id($username) {
    	$this->db->where('username', $username);
    	$query = $this->db->get('LOGIN');
    	if ($query->num_rows() == 1) {
    		$row = $query->row();
    		return $row->USER_ID;
    	} else {
    		return null;
    	}
    	
    }
    
    function login() {
    	$username = $this->input->post('user');
    	$this->load->model('User_model', '', TRUE);
    	$user = $this->User_model->get_user($username);
    		
    	$data = array(
    			'user_id' => $user_id,
				'username'  => $username,
				'email'     => $user['email'],
    			'first_name' => $user['first_name'],
    			'last_name' => $user['last_name'],
    			'user_type' => $user['user_type'],
				'logged_in' => TRUE
		);

		$this->session->set_userdata($data);
    }
    
    function is_logged_in() {
    	$sess_id = $this->session->userdata('username');
    	
    	if(empty($sess_id))
    	{
    		return false;
    	
    	}else{
	    	return true;
    	}
    }
    
    function logout() {
    	$this->session->sess_destroy();
    }
    
    function can_access($accessLevel) {
    	$userType = $this->session->userdata('user_type');
    	if ($userType == $accessLevel) {
    		return true;
    	} else {
    		return false;
    	}
    }

}
?>