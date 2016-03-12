<?php
class Menu_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	public function get_menu() {
		$query = $this->db->get('MENU_TBL');
		return $query->result_array();
	}
	
	public function get_menu_item($itemId) {
		$this->db->where('MENU_ID', $itemId);
		$query = $this->db->get('MENU_TBL');
		if ($query->num_rows() == 1) {
			return array(
					'MENU_ID' => $query->row()->MENU_ID,
					'ITEM_NAME' => $query->row()->ITEM_NAME,
					'PRICE' => $query->row()->PRICE,
					'DESCRIPTION' => $query->row()->DESCRIPTION,
			);
		} else {
			return null;
		}
	}
}

?>