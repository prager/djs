<?php

/**
 * This the model for menu
 *
 */
class Menu_model extends CI_Model {
	/**
	 * constructor for the menu model
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Gets all the menu items from the database
	 * 
	 * @return array returns an array of menu items
	 */
	public function get_menu() {
		$query = $this->db->get('menu_tbl');
		return $query->result_array();
	}
	
	public function get_menu_item($itemId) {
		$this->db->where('menu_id', $itemId);
		$query = $this->db->get('menu_tbl');
		if ($query->num_rows() == 1) {
			return array(
					'menu_id' => $query->row()->menu_id,
					'item_name' => $query->row()->item_name,
					'price' => $query->row()->price,
					'description' => $query->row()->description);
		} else {
			return null;
		}
	}
}

?>