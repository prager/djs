<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	public function index()
	{	
		$this->load->model('Menu_model');
		$data['menu'] = $this->Menu_model->get_menu();
		$this->load->helper('url');
		$data['title'] = 'Menu';
		$this->load->view('template/header', $data);
		$this->load->view('template/navigation');
		$this->load->view('template/leftNavigation');
		$this->load->view('menu_view', $data);
		$this->load->view('template/footer');
	}
}