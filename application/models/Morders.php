<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Morders extends CI_Model {

	//Función para guardar los datos del cliente
	public function saveData($data)
	{
		$this->db->insert('orders', $data);
		$res = $this->db->insert_id(); //Devuelvo el Id de la orden
		return $res;
	}

	public function viewOrder($id_order)
	{
		$this->db->where('id', $id_order);
		$query = $this->db->get('orders');
		return $query->row(); //Devuelvo solo una fila
	}
    
}
