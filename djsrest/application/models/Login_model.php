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

}
?>