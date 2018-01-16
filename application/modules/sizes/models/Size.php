<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Size extends CI_Model{

	private $id;
	private $nama_size;
	private $harga;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getNamaSize(){return $this->nama_size;}
	function setNamaSize($nama_size){$this->nama_size = $nama_size;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}

	function insert_data(){
		$data = array(
			'value' => $this->getNamaSize(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('size', $data);
	}

	function update_data(){
		$data = array(
			'value' => $this->getNamaSize(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('size', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('size');
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('size');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('size');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>