<?php
class Order_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
    function insert_pickup_info($data) {
    	return $this->db->insert('TAKEOUT_TBL', $data);
    }
}

?>