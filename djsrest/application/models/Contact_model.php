<?php
class Contact_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	public function save_message($data) {
    	$message = array(
    			'NAME' => $data['name'],
    			'EMAIL_ADDR' => $data['email'],
    			'MESSAGE' => $data['message']
    	);  
    	return $this->db->insert('MESSAGE_TBL', $message);
    }
}

?>