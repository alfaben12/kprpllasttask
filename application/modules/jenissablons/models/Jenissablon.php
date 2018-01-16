<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Jenissablon extends CI_Model{

	private $id;
	private $jenis;
	private $harga;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getJenisSablon(){return $this->jenis;}
	function setJenisSablon($jenis){$this->jenis = $jenis;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}

	function insert_data(){
		$data = array(
			'value' => $this->getJenisSablon(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('jenis_sablon', $data);
	}

	function update_data(){
		$data = array(
			'value' => $this->getJenisSablon(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('jenis_sablon', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('jenis_sablon');
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('jenis_sablon');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('jenis_sablon');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>