<?php
class Login_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
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
  * Validates user login
  */
    function validate_login($data) {
 	   	
    	$this->db_connect(TRUE);
    	
    	
    	$this->db_close();
    }

/**
 * Closes db connection
 */
	function db_close() {
		$this->load->model('db_connection_model');
		$this->db_connection_model->db_close();
	}

}
?>