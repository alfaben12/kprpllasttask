<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Lengan extends CI_Model{

	private $id;
	private $size_lengan;
	private $harga;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getSizeLengan(){return $this->size_lengan;}
	function setSizeLengan($size_lengan){$this->size_lengan = $size_lengan;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}

	function insert_data(){
		$data = array(
			'value' => $this->getSizeLengan(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('lengan', $data);
	}

	function update_data(){
		$data = array(
			'value' => $this->getSizeLengan(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('lengan', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('lengan');
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('lengan');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('lengan');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>