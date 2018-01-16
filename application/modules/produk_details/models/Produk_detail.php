<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Produk_detail extends CI_Model{

	private $id;
	private $produkid;
	private $kategoriid;
	private $sizeid;
	private $lenganid;
	private $stok;
	private $harga;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getKategoriID(){return $this->kategoriid;}
	function setKategoriID($kategoriid){$this->kategoriid = $kategoriid;}
	function getSizeID(){return $this->sizeid;}
	function setSizeID($sizeid){$this->sizeid = $sizeid;}
	function getWarnaID(){return $this->warnaid;}
	function setWarnaID($warnaid){$this->warnaid = $warnaid;}
	function getLenganID(){return $this->lenganid;}
	function setLenganID($lenganid){$this->lenganid = $lenganid;}
	function getProdukID(){return $this->produkid;}
	function setProdukID($produkid){$this->produkid = $produkid;}
	function getStok(){return $this->stok;}
	function setStok($stok){$this->stok = $stok;}

	function insert_data(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'produkid' => $this->getProdukID(),
			'stok' => $this->getStok()
		);
		$this->db->insert('produk_detail', $data);
	}

	function update_data(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'produkid' => $this->getProdukID(),
			'stok' => $this->getStok()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('produk_detail', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('produk_detail');
	}
	function cek_data(){
		$this->db->select('id');
		$this->db->from('produk_detail');
		$this->db->where('produkid', $this->getProdukID());
		$this->db->where('kategoriid', $this->getKategoriID());
		$this->db->where('sizeid', $this->getSizeID());
		$this->db->where('warnaid', $this->getWarnaID());
		$this->db->where('lenganid', $this->getLenganID());
		$query = $this->db->get();
		return $query->num_rows();
	}

	function ambil_semua_data(){
		$this->db->select('
			produk_detail.id,
			produk_detail.kategoriid,
			produk_detail.produkid,
			produk_detail.stok,
			produk_detail.tanggal_dibuat,
			kategori.nama_kategori,
			warna.value AS nama_warna,
			size.value AS nama_size,
			lengan.value AS nama_lengan,
			produk.nama_produk,
			produk.harga
			');
		$this->db->from('produk_detail');
		$this->db->join('produk', 'produk.id = produk_detail.produkid');
		$this->db->join('kategori', 'kategori.id = produk_detail.kategoriid');
		$this->db->join('warna', 'warna.id = produk_detail.warnaid');
		$this->db->join('size', 'size.id = produk_detail.sizeid');
		$this->db->join('lengan', 'lengan.id = produk_detail.lenganid');
		$this->db->order_by('produkid', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('produk_detail');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>