<?php

/**
 * This model represents the feedback
 *
 */
class Feedback_model extends CI_Model {
	/**
	 * Constructor for the feedback model
	 *
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Insert feedback to the database
	 * 
	 * @param $data array feedback data
	 * 
	 * @return boolean returns true if the feedbcak is successfully added, if not false
	 *
	 */
	public function save_feedback($data) {
    	$message = array(
    			'NAME' => $data['name'],
    			'EMAIL_ADDR' => $data['email'],
    			'FEEDBACK' => $data['feedback']
    	);  
    	return $this->db->insert('FEEDBACK_TBL', $message);
    }
    
    /**
     * Sets the value for published field to 'Yes'
     * 
     * @param string primary key of the record
     *
     */
    function publish_feedback($primary_key) {
    	$this->db->set('PUBLISH', 'Yes');
    	$this->db->where('FEEDBACK_ID', $primary_key);
    	$this->db->update('FEEDBACK_TBL');
    } 
    
    /**
     * Sets the value for published field to 'No'
     *
     * @param string primary key of the record
     *
     */
    function unpublish_feedback($primary_key) {
    	$this->db->set('PUBLISH', 'No');
    	$this->db->where('FEEDBACK_ID', $primary_key);
    	$this->db->update('FEEDBACK_TBL');
    }
}

?>