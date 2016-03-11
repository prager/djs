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
	
	public function insert_item($id) {
		$this->load->model('Menu_model');
		$item = $this->Menu_model->get_menu_item($id);
		$data = array(
               'id'      => $item['MENU_ID'],
               'qty'     => 1,
               'price'   => $item['PRICE'],
               'name'    => $item['ITEM_NAME']
		);

		$this->cart->insert($data);
		$this->load_cart();
	}
}