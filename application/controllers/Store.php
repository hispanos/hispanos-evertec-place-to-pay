<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('mproducts'); //Cargo el modelo de productos
    }

    public function index() 
    {
    	//Consulto el modelo con el producto a mostrar
        $data['product'] = $this->mproducts->list_products();

        $this->load->view('template/header');
        $this->load->view('store/view_product',$data);
        $this->load->view('template/footer');
    }

    //Función para cargar la vista de los datos del cliente
    public function checkout($id_product) //Recibo el id producto por URL
    {
        //Guardo en sesión el Id del producto comprado
        $this->session->set_userdata('id_product_buyed', $id_product);
        //Cargo las vistas del formulario
    	$this->load->view('template/header');
    	$this->load->view('store/checkout');
		$this->load->view('template/footer');
    }

}
