<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . ('../vendor/autoload.php'); //Cargo autolad

class Buy extends CI_Controller {

	private $placetopay;

    public function __construct() {
        parent::__construct();
        //Cargo los modelos necesarios
        $this->load->model('morders'); //Cargo el modelo de las órdenes
        $this->load->model('mordersdetails'); //Cargo el modelo detalle de las órdenes
        //Accedo a las variables de entorno
		$dotenv = Dotenv\Dotenv::createImmutable('../'); 
		$dotenv->load();

		//Creo el objeto con las configuraciones
		$this->placetopay = new Dnetix\Redirection\PlacetoPay([
		    'login' => $_ENV['PAY_LOGIN'],
		    'tranKey' => $_ENV['PAY_TRANKEY'],
		    'url' => $_ENV['PAY_URL'],
		    'rest' => [
		        'timeout' => 45, // (optional) 15 by default
		        'connect_timeout' => 30, // (optional) 5 by default
		    ]
		]);
    }

    public function index() {
        
    }

    public function receive($id_order='')
    {
    	//Consulto los detalles de la orden
    	$order = $this->morders->viewOrder($id_order);
        $details = $this->mordersdetails->viewDetailsUnique($id_order);
		//Creo la solicitud de pago
		$reference = $id_order;
		$request = [
			'buyer' => [
		        'email' => $order->customer_email,
		        'documentType' => 'CC',
		        'mobile' => $order->customer_mobile,
		    ],
		    'payment' => [
		        'reference' => $reference,
		        'description' => $details->name_product,
		        'amount' => [
		            'currency' => 'COP',
		            'total' => $details->price,
		        ],
		    ],
		    'expiration' => date('c', strtotime('+2 days')),
		    'returnUrl' => base_url().'buy/response/' . $reference,
		    'ipAddress' => '127.0.0.1',
		    'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
		];

		$response = $this->placetopay->request($request);
		if ($response->isSuccessful()) {
		    // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
		    //Guardo los datos obtenidos 
		    $data['requestId'] = $response->requestId();
        	$data['processUrl'] = $response->processUrl();
        	$this->morders->updatedOrder($id_order,$data);
		    // Redirect the client to the processUrl or display it on the JS extension
		    header('Location: ' . $response->processUrl());
		} else {
		    // There was some error so check the message and log it
		    $response->status()->message();
		}

    }

    //Función para recibir el estado del pago
    public function response($id_order='')
    {
    	//Consulto el requestId de esta Orden
    	$order = $this->morders->viewOrder($id_order);
    	$requestId = $order->requestId;
    	$response = $this->placetopay->query($requestId);

		if ($response->isSuccessful()) {
		    // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

		    if ($response->status()->isApproved()) {
		        // The payment has been approved
		        //Guardo el estado PAYED
		        $data['status'] = "PAYED";
		    }else{ //Si no fue aprobado
		    	//Guardo el estado REJECTED
		    	$data['status'] = "REJECTED";
		    }
		    $this->morders->updatedOrder($id_order,$data);
		} else {
		    // There was some error with the connection so check the message
		    print_r($response->status()->message() . "\n");
		}

		redirect('buy/status/'.$id_order);
    }

    //Función para mostrar la orden y su respectivo estado
    public function status($id_order='')
    {
    	//Consulto los datos en el modelo
        $data['order'] = $this->morders->viewOrder($id_order);
        $data['details'] = $this->mordersdetails->viewDetails($id_order);

        //Condiciono el mensaje a mostrar según el estado
        $order = $data['order'];
        switch ($order->status) {
         	case 'CREATED':
         		if (!empty($order->processUrl)) { //Si ya se creó una URL
         			$data['class'] = "warning";
         			$data['message'] = "Parece que no completaste el pago, intenta volviendo a la pasarela de pago.";
         			$data['action'] = "retry";
         		}else{
         			$data['class'] = "primary";
         			$data['message'] = "Aún no has completado tu proceso de pago. Realízalo ahora.";
         			$data['action'] = "new";
         		}
         		break;
         	
         	case 'PAYED':
         		$data['class'] = "success";
         		$data['message'] = "Tu pedido fue realizado y pagado con éxito.";
         		$data['action'] = "none";
         		break;

         	case 'REJECTED':
         		$data['class'] = "danger";
         		$data['message'] = "Tu pago ha sido rechazado, puedes intentar volver a comprar el producto.";
         		$data['action'] = "new";
         		break;
        }

        //Cargo las vistas de la información
        $this->load->view('template/header');
        $this->load->view('store/status',$data);
        $this->load->view('template/footer');
    }
}
