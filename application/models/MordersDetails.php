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

	public function viewDetails($id_order)
	{
		$this->db->where('id_order', $id_order);
		$query = $this->db->get('order_details');
		return $query->row(); //Devuelvo toda la consulta
	}
    
}
