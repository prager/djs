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
    	$sql = "SELECT pwd FROM login WHERE username=\"$user\"";
    	$query = $this->db->query($sql);
    	if($query->num_rows() > 0) {
    		$row = $query->row();
    		//echo "hashed pass: " . $row->password;
    		if(!password_verify($data['pass'], $row->pwd)) {
    			$retval = FALSE;
    		}
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
    	$sql = "SELECT username FROM login WHERE username=\"$username\"";
    	$query = $this->db->query($sql);
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
    			'PWD' => md5($this->input->post('password'))
    	);
    	return $this->db->insert('LOGIN', $loginData);
    }

}
?>