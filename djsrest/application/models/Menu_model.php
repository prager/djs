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
}

?>