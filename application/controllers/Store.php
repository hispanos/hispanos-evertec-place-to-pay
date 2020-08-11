<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('mproducts'); //Cargo el modelo de productos
        $this->load->model('morders'); //Cargo el modelo de las órdenes
        $this->load->model('mordersdetails'); //Cargo el modelo detalle de las órdenes
    }

    public function index() 
    {
    	//Consulto el modelo con el producto a mostrar
        $data['product'] = $this->mproducts->listProducts();

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

    //Función que recibe los datos de usuario y guarda
    public function saveData()
    {
        $data['customer_name'] = $this->input->post('customer_name');
        $data['customer_email'] = $this->input->post('customer_email');
        $data['customer_mobile'] = $this->input->post('customer_mobile');
        $data['status'] = "CREATED";
        $data['created_at'] = date('Y-m-d H:i:s');

        //Procedo a guardar los datos de la orden
        $details['id_order'] = $this->morders->saveData($data);
        $details['id_product'] = $this->session->userdata('id_product_buyed');

        //Procedo a guardar los detalles de la orden
        $saved = $this->mordersdetails->saveDetails($details);

        //
        if ($saved >= 1) { //Si se registró la orden
            $response = array(
                'estado' => "bien",
                'id_order' => $details['id_order'] 
            );
            echo json_encode($response);
        }else{
            $response = array(
                'estado' => "Error",
                'mensaje' => "No se pudo realizar el registro, Verifica los datos." 
            );
            echo json_encode($response);
        }
    }

    public function resume($id_order)
    {
        //Consulto los datos en el modelo
        $data['order'] = $this->morders->viewOrder($id_order);
        $data['details'] = $this->mordersdetails->viewDetails($id_order);
        //Cargo las vistas de la información
        $this->load->view('template/header');
        $this->load->view('store/resume',$data);
        $this->load->view('template/footer');
    }

}
