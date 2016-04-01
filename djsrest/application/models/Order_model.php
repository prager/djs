<?php
class Order_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
    function insert_order($data) {
    	return $this->db->insert('TAKEOUT_TBL', $data);    	
    }
    
    function insert_order_items($orderId) {
    	$data = array();
    	foreach ($this->cart->contents() as $item) {
    		array_push($data, array(
    				'ORDER_ID' => $orderId,
    				'MENU_ID' => $item['id'],
    				'QTY' => $item['qty']
    		));
    	}    		
    	return $this->db->insert_batch('TAKEOUT_TO_MENU_TBL', $data);
    }
    
    function get_order_insert_id() {
    	return $this->db->insert_id();
    }
}

?>