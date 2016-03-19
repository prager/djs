<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
	}
	
	public function index()
	{
		$this->load_menu();
	}	
		
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
	
	public function remove_item() {
		$data = array(
				'rowid' => $this->input->post('row_id'),
				'qty'   => 0
		);		
		$this->cart->update($data);
		$this->load_cart();
	}
	
	public function update_item() {
		$data = array(
				'rowid' => $this->input->post('row_id'),
				'qty'   => $this->input->post('qty')
		);
		$this->cart->update($data);
		$this->load_cart();
	}
	
	public function distroy_cart() {
		$this->cart->destroy();
		$this->load_menu();
	}
}