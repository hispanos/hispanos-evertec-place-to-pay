<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tienda extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('mproducts');
    }

    public function index() 
    {
        
    }

}
