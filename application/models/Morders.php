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

	//Función para ver la orden por id
	public function viewOrder($id_order)
	{
		$this->db->where('id', $id_order);
		$query = $this->db->get('orders');
		return $query->row(); //Devuelvo solo una fila
	}

	public function updatedOrder($id_order,$data)
	{
		$this->db->where('id', $id_order);
  		$this->db->update('orders', $data);
	}
    
}
