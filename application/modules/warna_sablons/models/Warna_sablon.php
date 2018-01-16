<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Warna_sablon extends CI_Model{

	private $id;
	private $jenis;
	private $harga;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getWarnaSablon(){return $this->jenis;}
	function setWarnaSablon($jenis){$this->jenis = $jenis;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}

	function insert_data(){
		$data = array(
			'value' => $this->getWarnaSablon(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('warna_sablon', $data);
	}

	function update_data(){
		$data = array(
			'value' => $this->getWarnaSablon(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('warna_sablon', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('warna_sablon');
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('warna_sablon');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('warna_sablon');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>