<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Penjualan extends CI_Model{

	private $id;
	private $pelangganid;
	private $produkid;
	private $kategoriid;
	private $sizeid;
	private $warnaid;
	private $lengan;
	private $jumlah;
	private $jenissablonid;
	private $jumlahwarnaid;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getPelangganID(){return $this->pelangganid;}
	function setPelangganID($pelangganid){$this->pelangganid = $pelangganid;}
	function getNoPenjualan(){return $this->penjualanid;}
	function setNoPenjualan($penjualanid){$this->penjualanid = $penjualanid;}
	function getKeterangan(){return $this->keterangan;}
	function setKeterangan($keterangan){$this->keterangan = $keterangan;}
	function getPenjualanID(){return $this->penjualanid;}
	function setPenjualanID($penjualanid){$this->penjualanid = $penjualanid;}
	function getKategoriID(){return $this->kategoriid;}
	function setKategoriID($kategoriid){$this->kategoriid = $kategoriid;}
	function getProdukID(){return $this->produkid;}
	function setProdukID($produkid){$this->produkid = $produkid;}
	function getSizeID(){return $this->sizeid;}
	function setSizeID($sizeid){$this->sizeid = $sizeid;}
	function getWarnaID(){return $this->warnaid;}
	function setWarnaID($warnaid){$this->warnaid = $warnaid;}
	function getLenganID(){return $this->lenganid;}
	function setLenganID($lenganid){$this->lenganid = $lenganid;}
	function getJenisSablonID(){return $this->jenissablonid;}
	function setJenisSablonID($jenissablonid){$this->jenissablonid = $jenissablonid;}
	function getJumlahWarnaID(){return $this->jumlahwarnaid;}
	function setJumlahWarnaID($jumlahwarnaid){$this->jumlahwarnaid = $jumlahwarnaid;}
	function getJumlah(){return $this->jumlah;}
	function setJumlah($jumlah){$this->jumlah = $jumlah;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}

	function get_harga_by_paramid(){
		$this->db->select('
			produk_detail.id,
			produk_detail.kategoriid,
			produk_detail.stok,
			IFNULL(SUM(produk.harga + size.harga + lengan.harga),0) AS total_harga
			', FALSE);
		$this->db->from('produk_detail');
		$this->db->join('produk', 'produk.id = produk_detail.produkid');
		$this->db->join('kategori', 'kategori.id = produk_detail.kategoriid');
		$this->db->join('size', 'size.id = produk_detail.sizeid');
		$this->db->join('lengan', 'lengan.id = produk_detail.lenganid');
		$this->db->where('produk_detail.kategoriid', $this->getKategoriID());
		$this->db->where('produkid', $this->getProdukID());
		$this->db->where('warnaid', $this->getWarnaID());
		$this->db->where('sizeid', $this->getSizeID());
		$this->db->where('lenganid', $this->getLenganID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_harga_jenissablon(){
		$this->db->select('
			jenis_sablon.harga AS harga_jenissablon
			', FALSE);
		$this->db->from('jenis_sablon');
		$this->db->where('id', $this->getJenisSablonID());
		$query = $this->db->get();
		return $query->row()->harga_jenissablon;
	}

	function get_harga_warnasablon(){
		$this->db->select('
			warna_sablon.harga AS harga_warnasablon
			', FALSE);
		$this->db->from('warna_sablon');
		$this->db->where('id', $this->getJumlahWarnaID());
		$query = $this->db->get();
		return $query->row()->harga_warnasablon;
	}

	function get_data_pelangaan(){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id', $this->getPelangganID());
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>