<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MordersDetails extends CI_Model {

	//Función para guardar los datos del cliente
	public function saveDetails($details)
	{
		$this->db->insert('order_details', $details);
		$res = $this->db->affected_rows(); //Devuelvo las filas afectadas
		return $res;
	}

	//Función para ver los detalles de la orden por id
	public function viewDetails($id_order)
	{
		$this->db->where('id_order', $id_order);
		$this->db->join('products p','o.id_product = p.id_product');
		$query = $this->db->get('order_details o');
		return $query->result(); //Devuelvo toda la consulta
	}

	//Función para ver los detalles de la orden por id
	public function viewDetailsUnique($id_order)
	{
		$this->db->where('id_order', $id_order);
		$this->db->join('products p','o.id_product = p.id_product');
		$query = $this->db->get('order_details o');
		return $query->row(); //Devuelvo toda la consulta
	}
    
}
