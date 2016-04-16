<?php
/**
 * This the model for login
 *
 */
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
    	$this->db->where('username', $user);
    	$query = $this->db->get('login');
    	if($query->num_rows() > 0) {
    		$row = $query->row();
    		//echo "hashed pass: " . $row->password;
    		return password_verify($pass, $row->pwd);
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
    	$query = $this->db->get('login');
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
    			'username' => strtolower($this->input->post('username')),
    			'user_id' => $userId,
    			'pwd' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
    	);
    	return $this->db->insert('login', $loginData);
    }
    
    /**
     * Updates the login information
     * 
     * @param string $data login information to be updated
     * 
     * @return boolean reture if the update is successful, if not false
     * 
     */
    function update_login($data) {
    	$userId= $this->session->userdata('user_id');
    	$this->db->where('user_id', $userId);
    	return $this->db->update('login', $data);
    }
    
    /**
     * Get the login information from database
     * 
     * @param string id of the user
     * 
     * @return login information if exists, null if not
     *
     */
    function get_login($userId) {
    	$this->db->where('user_id', $userId);
    	$query = $this->db->get('login');
    	if ($query->num_rows() == 1) {
    		$data = array(
    			'username' => $query->row()->username,
    			'user_id' => $query->row()->user_id,
    			'password' => $query->row()->pwd
    		);
    		return $data;    	
    	} else {
    		return null;
    	}
    }
    
    /**
     * Get user id when username is given
     * 
     * @param string $username username of the user
     * 
     * @return string returns the user id of the user if exists, if not returns null
     *
     */
    function get_user_Id($username) {
    	$this->db->where('username', $username);
    	$query = $this->db->get('login');
    	if ($query->num_rows() == 1) {
    		$row = $query->row();
    		return $row->user_id;
    	} else {
    		return null;
    	}
    	
    }
    
    /**
     * Gets the user information from the database and store it in the session
     * 
     */
    function login() {
    	$username = $this->input->post('user');
    	$this->load->model('User_model', '', TRUE);
    	$user = $this->User_model->get_user($username);
    	
    	$this->db->where('user_type_cd', $user['user_type']);
    	$query = $this->db->get('user_type_ref');
    	$user_type_string = $query->row()->user_type_desc;
    		
    	$data = array(
    			'user_id' => $user['user_id'],
				'username'  => $username,
				'email'     => $user['email'],
    			'first_name' => $user['first_name'],
    			'last_name' => $user['last_name'],
    			'full_name' => $user['full_name'],
    			'user_type' => $user['user_type'],
    			'user_type_string' => $user_type_string,
				'logged_in' => TRUE
		);

		$this->session->set_userdata($data);
    }
    
    /**
     * Checks if a user is logged in 
     * 
     * @return boolean returns true if a user is logged in, if not false
     */
    function is_logged_in() {
    	$sess_id = $this->session->userdata('username');
    	$logged_in = $this->session->userdata('logged_in');
    	if(isset($sess_id) || isset($logged_in))
    	{
    		return $sess_id && $logged_in;
    	
    	}else{
	    	return false;
    	}
    }
    
    /**
     * Clears the session data
     */
    function logout() {
    	$this->load->library('cart');
    	$this->cart->destroy();
    	$this->session->set_userdata('logged_in', false);
    	$this->session->sess_destroy();
    }
    
    /**
     * Checks if the user has enough access
     * 
     * @param int $accessLevel user type code
     * @return boolean returns true if the user has enough access, false if not
     */
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