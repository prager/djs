<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Controller for takeout orders
 *
 */
class Orders extends CI_Controller {
	
	/*
	 * Constructor for the controller
	 *
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
	}
	
	/*
	 * Loads the menu
	 *
	 */
	public function index()
	{
		$this->load_menu();
	}	
	
	/*
	 * Loads the takeout page
	 *
	 */
	public function load_menu() {
		$this->load->helper('url');
		$this->load->model('Menu_model');
		
		$data['menu'] = $this->Menu_model->get_menu();
		$data['title'] = 'Take-out';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('orders/orders_view', $data);
		$this->load->view('template/footer');
	}
	
	/*
	 * Loads the shopping cart
	 *
	 */
	public function load_cart() {
		$this->load->helper('url');		
		
		$data['cart'] = $this->cart->contents();
		$data['title'] = 'Cart';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('orders/cart_view', $data);
		$this->load->view('template/footer');
	}
	
	/*
	 * Loads the checkout page
	 *
	 */
	public function load_checkout() {
		$this->load->helper('url');
		
		$data['cart'] = $this->cart->contents();
		$data['title'] = 'Cart';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('orders/checkout_view', $data);
		$this->load->view('template/footer');
	}
	
	/*
	 * Loads the success page
	 *
	 */
	public function load_success() {
		$this->load->helper('url');
		$data['title'] = 'Take-out';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('orders/success_view', $data);
		$this->load->view('template/footer');
	}
	
	/*
	 * Loads the error page
	 *
	 */
	public function load_error() {
		$this->load->helper('url');
		$data['title'] = 'Take-out';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('orders/err_view');
		$this->load->view('template/footer');
	}
	
	/*
	 * Insert food item to the card
	 *
	 */
	function insert_items(){
		$this->load->model('Menu_model');
		
		$cartInput = $this->input->post('cartInput');
		$lines = explode(',', $cartInput);
		foreach ($lines as $line) {
			if (!empty($line)) {
				$itemLine = preg_split("/[\s]+/", $line, 2);			
				$item = $this->Menu_model->get_menu_item($itemLine[0]);
				$rowId = $this->get_row_id($itemLine[0]);
				if(empty($rowId)) {
					$data = array(
							'id'      => $itemLine[0],
							'qty'     => $itemLine[1],
							'price'   => $item['PRICE'],
							'name'    => $item['ITEM_NAME']
					);
					$this->cart->insert($data);
				} else {
					$data = array(
							'rowid' => $rowId,
							'qty'   => $itemLine[1]
					);
					$this->cart->update($data);
				}
			}					
		}
		$this->load_cart();
	}
	
	/*
	 * Process the order
	 *
	 */
	function process_order() {
		$this->load->model('Order_model');
		$this->load->model('Card_model');
		$pickupData = array(
				'USER_ID' => null,
				'CUS_NAME' => $this->input->post('customer_name'),
				'PHONE_NM' => $this->input->post('phone'),
				'PICKUP' => $this->input->post('method') == 'pickup' ? 'Yes' : 'No',
				'CC_ID' => null
		);
		
		$billingData = array(
				'CC_TYPE' => $this->input->post('cardType'),
				'USER_ID' => null,
				'CC_NUM' => $this->input->post('cardNum'),
				'SEC_CD' => $this->input->post('secCode'),
				'EXP_DT' => $this->input->post('expDate'),
				'STREET_NUM' => $this->input->post('address'),
				'STREET_NM' => $this->input->post('apt_num'),
				'STATE_CD' => $this->input->post('state'),
				'ZIP_CD' => $this->input->post('zip')
		);
		
		$logged_in = $this->Login_model->is_logged_in();
		if ($logged_in) {
			$pickupData['USER_ID'] = $this->session->userdata('user_id');
			$billingData['USER_ID'] = $this->session->userdata('user_id');
		}
		
		$pickup = $this->input->post('method') == 'pickup' ? 'Yes' : 'No';			
		if ($logged_in && $pickup == 'No') {
			$userId = $this->session->userdata('user_id');
			$card = $this->Card_model->get_card($this->input->post('cardNum'), $userId);
			if(!empty($card)) {
				$pickupData['CC_ID'] = $card['CC_ID'];
			} else {
				$this->save_billing_info($billingData);
				$pickupData['CC_ID'] = $this->Card_model->get_card_insert_id();
			}
		} elseif ($pickup == 'No') {
			$this->save_billing_info($billingData);
			$pickupData['CC_ID'] = $this->Card_model->get_card_insert_id();
		}
		if ($this->save_pickup_info($pickupData) && $this->save_order_items($this->Order_model->get_order_insert_id())) {
			$this->distroy_cart();
			$this->load_success();
		} else {
			$this->distroy_cart();
			$this->load_error();
		}		
	}
	
	/*
	 * Save order items to the database
	 *
	 */
	function save_order_items($orderId) {
		$this->load->model('Order_model');
		return $this->Order_model->insert_order_items($orderId);
	}
	
	/*
	 * Save the billing information to the database
	 *
	 */
	function save_billing_info($data) {
		$this->load->model('Card_model');
		return $this->Card_model->insert_card($data);
	}
	
	/*
	 * Save the pickup information to the database
	 *
	 */
	function save_pickup_info($data) {
		$this->load->model('Order_model');
		return $this->Order_model->insert_order($data);
	}
	
	/*
	 * Get item's row id in cart
	 *
	 * @param string $itemId food item id
	 * 
	 * @return int | null retuns the row id if the item exist in the cart, null if its not
	 */
	function get_row_id($itemId) {
		$shoppingCart = $this->cart->contents();
		if (!empty($shoppingCart)) {
			foreach ($shoppingCart as $item) {
				if($item['id'] == $itemId) {
					return $item['rowid'];
				}
			}
		} else {		
			return null;
		}
	}
	
	/* 
	 * Removes item from the cart and refresh the page
	 *
	 */
	public function remove_item() {
		$data = array(
				'rowid' => $this->input->post('row_id'),
				'qty'   => 0
		);		
		$this->cart->update($data);
		$this->load_cart();
	}
	
	/*
	 * Updates an item in the cart and refresh the page
	 *
	 */
	public function update_item() {
		$data = array(
				'rowid' => $this->input->post('row_id'),
				'qty'   => $this->input->post('qty')
		);
		$this->cart->update($data);
		$this->load_cart();
	}
	
	/*
	 * Distroy the cart and refresh the page
	 *
	 */
	public function distroy_cart() {
		$this->cart->destroy();
		$this->load_menu();
	}
}