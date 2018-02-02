<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Bahan extends CI_Model{

	private $id;
	private $bahan;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getNama(){return $this->nama;}
	function setNama($nama){$this->nama = $nama;}
	function getStok(){return $this->stok;}
	function setStok($stok){$this->stok = $stok;}

	function insert_data(){
		$data = array(
			'nama' => $this->getNama(),
			'stok' => $this->getStok()
		);
		$this->db->insert('bahan', $data);
	}

	function update_data(){
		$data = array(
			'nama' => $this->getNama(),
			'stok' => $this->getStok()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('bahan', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('bahan');
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('bahan');
		$this->db->order_by('nama', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('bahan');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>