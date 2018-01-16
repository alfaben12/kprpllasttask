<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Warna extends CI_Model{

	private $id;
	private $nama_warna;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getNamaWarna(){return $this->nama_warna;}
	function setNamaWarna($nama_warna){$this->nama_warna = $nama_warna;}

	function insert_data(){
		$data = array(
			'value' => $this->getNamaWarna()
		);
		$this->db->insert('warna', $data);
	}

	function update_data(){
		$data = array(
			'value' => $this->getNamaWarna()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('warna', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('warna');
	}

	function cek_data(){
		$this->db->select('value');
		$this->db->from('warna');
		$this->db->where('value', $this->getNamaWarna());
		$query = $this->db->get();
		return $query->num_rows();
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('warna');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('warna');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>