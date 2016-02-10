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

}
?>