<?php
class Feedback_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	public function save_feedback($data) {
    	$message = array(
    			'NAME' => $data['name'],
    			'EMAIL_ADDR' => $data['email'],
    			'FEEDBACK' => $data['feedback']
    	);  
    	return $this->db->insert('FEEDBACK_TBL', $feedback);
    }
    
    function publish_feedback($primary_key) {
    	$this->db->set('PUBLISH', 'Yes');
    	$this->db->where('FEEDBACK_ID', $primary_key);
    	$this->db->update('FEEDBACK_TBL');
    } 
    
    function unpublish_feedback($primary_key) {
    	$this->db->set('PUBLISH', 'No');
    	$this->db->where('FEEDBACK_ID', $primary_key);
    	$this->db->update('FEEDBACK_TBL');
    }
}

?>