<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Kategori_produk extends CI_Model{

	private $id;
	private $nama_kategori;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getNamaKategori(){return $this->nama_kategori;}
	function setNamaKategori($nama_kategori){$this->nama_kategori = $nama_kategori;}

	function insert_data(){
		$data = array(
			'nama_kategori' => $this->getNamaKategori()
		);
		$this->db->insert('kategori', $data);
	}

	function update_data(){
		$data = array(
			'nama_kategori' => $this->getNamaKategori()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('kategori', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('kategori');
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('kategori');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>