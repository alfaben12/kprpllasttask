<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Produk extends CI_Model{

	private $id;
	private $kategoriid;
	private $nama_produk;
	private $harga;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getKategoriID(){return $this->kategoriid;}
	function setKategoriID($kategoriid){$this->kategoriid = $kategoriid;}
	function getNamaProduk(){return $this->nama_produk;}
	function setNamaProduk($nama_produk){$this->nama_produk = $nama_produk;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}

	function insert_data(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'nama_produk' => $this->getNamaProduk(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('produk', $data);
	}

	function update_data(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'nama_produk' => $this->getNamaProduk(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('produk', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('produk');
	}

	function ambil_semua_data(){
		$this->db->select('produk.nama_produk, produk.id, produk.harga, kategori.nama_kategori');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id = produk.kategoriid');
		$this->db->order_by('nama_produk', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>