<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mproducts extends CI_Model {

	//Función para consultar la lista de productos
	public function list_products()
	{
		$this->db->select('id_product,name_product,price,description,image');
		$this->db->from('products');

		$r = $this->db->get();
		return $r->row(); //Devuelvo solo una fila
	}
    
}
