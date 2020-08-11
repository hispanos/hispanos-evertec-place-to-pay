<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . ('../vendor/autoload.php'); //Cargo autolad

class Buy extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function receive($id_order='')
    {
    	$dotenv = Dotenv\Dotenv::createImmutable('../'); //Accedo a las variables de entorno
		$dotenv->load();
    }
}
