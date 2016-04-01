<?php
class Card_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function get_card($cardNum, $userId) {
		$this->db->where('CC_NUM', $cardNum);
		$this->db->where('USER_ID', $userId);
		$query = $this->db->get('CC_TBL');
		if ($query->num_rows() == 1) {
			return array(
					'CC_ID' => $query->row()->CC_ID,
					'USER_ID' => $query->row()->USER_ID, 
					'CC_TYPE' => $query->row()->CC_TYPE,
					'CC_NUM' => $query->row()->CC_NUM,					
					'SEC_CD' => $query->row()->SEC_CD,
					'EXP_DT' => $query->row()->EXP_DT,
					'STREET_NUM' => $query->row()->STREET_NUM,
					'STREET_NM' => $query->row()->STREET_NM,
					'STATE_CD' => $query->row()->STATE_CD,
					'ZIP_CD' => $query->row()->ZIP_CD					
			);
		} else {
			return null;
		}
	}
	
	function get_card_insert_id() {
		return $this->db->insert_id();
	}
	
	function insert_card($data) {
		return $this->db->insert('CC_TBL', $data);
	}

}

?>