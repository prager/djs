<?php

/**
 * This is the model for Order
 *
 */
class Order_model extends CI_Model {
	/**
	 * Constructor for order model
	 */
    function __construct()
    {
        parent::__construct();
    }
	
    /**
     * Insert order details into the database
     * 
     * @param boolean returns true if successfully inserted into the database
     */
    function insert_order($data) {
    	return $this->db->insert('TAKEOUT_TBL', $data);    	
    }
    
    /**
     * Insert details of the order items into the database
     * 
     * @param int $orderId menu item id
     * 
     * @return boolean returns true if inserted successfully
     */
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
    
    /**
     * Gets id of the last inserted row
     */
    function get_order_insert_id() {
    	return $this->db->insert_id();
    }
}

?>