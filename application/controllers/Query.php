<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Query extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('morders');
    }

    //Función para listar todas las órdenes de la tienda
    public function index() 
    {
    	//Consulto las órdenes
        $data['orders'] = $this->morders->listOrders();

        $this->load->view('template/header');
        $this->load->view('store/orders',$data);
        $this->load->view('template/footer');
    }
}
