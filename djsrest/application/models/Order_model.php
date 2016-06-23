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
    	return $this->db->insert('takeout_tbl', $data);    	
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
    	$retval = TRUE;

    	
    	foreach ($this->cart->contents() as $item) {
    		$data = array(
    			'order_id' => $orderId,
    			'menu_id' => $item['id'],
    			'qty' => $item['qty']
    		);
    		/*array_push($data, array(
    				'order_id' => $orderId,
    				'menu_id' => $item['id'],
    				'qty' => $item['qty']
    		));*/
    		if (!$this->db->insert('takeout_to_menu_tbl', $data)) {
    			$retval = FALSE;
    			break;
    		}
    		else {
    			$data = NULL;
    		}
    	}   
    	
    	return $retval;
    }
    
    /**
     * Gets id of the last inserted row
     */
    function get_order_insert_id() {
    	return $this->db->insert_id();
    }
}

?>