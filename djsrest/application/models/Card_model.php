<?php
/**
 * this is model represent credit card
 *
 */
class Card_model extends CI_Model {
	/**
	 * Constructor for this model
	 * 
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Get the user types from the database
	 * 
	 * @param string $cardNum credit card number
	 * @param string $userId user id of the card holder
	 * 
	 * @return array returns an array with credit card information,
	 * if the credit card doesnt exist in the data base returns null
	 * 
	 */
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
	
	/**
	 * Get the id of the last inserted row
	 *
	 * @return int returns the row id
	 *
	 */
	function get_card_insert_id() {
		return $this->db->insert_id();
	}
	
	/**
	 * Insert a credit card into ths database
	 *
	 * @return boolean returns true if successfully inserted the card, if not false
	 *
	 */
	function insert_card($data) {
		return $this->db->insert('CC_TBL', $data);
	}

}

?>