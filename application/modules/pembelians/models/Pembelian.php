<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pembelian extends CI_Model{

	private $id;
	private $pembeliandetailid;
	private $nopembelian;
	private $produkid;
	private $kategoriid;
	private $sizeid;
	private $warnaid;
	private $lengan;
	private $jumlah;
	private $jenissablonid;
	private $jumlahwarnaid;
	private $statusid;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getPembelianID(){return $this->pembelianid;}
	function setPembelianID($pembelianid){$this->pembelianid = $pembelianid;}
	function getNopembelian(){return $this->nopembelian;}
	function setNopembelian($nopembelian){$this->nopembelian = $nopembelian;}
	function getPembelianDetailID(){return $this->pembeliandetailid;}
	function setPembelianDetailID($pembeliandetailid){$this->pembeliandetailid = $pembeliandetailid;}
	function getKeterangan(){return $this->keterangan;}
	function setKeterangan($keterangan){$this->keterangan = $keterangan;}
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
	function getJumlah(){return $this->jumlah;}
	function setJumlah($jumlah){$this->jumlah = $jumlah;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}
	function getStatusID(){return $this->statusid;}
	function setStatusID($statusid){$this->statusid = $statusid;}

	function get_max_id(){
		$this->db->select_max('id');
		$this->db->from('pembelian');
		$query = $this->db->get();
		return $query->row()->id + 1;
	}

	function insert_data(){
		$data = array(
			'no_pembelian' => $this->getNopembelian(),
			'keterangan' => $this->getKeterangan(),
			'statusid' => 0
		);
		$this->db->insert('pembelian', $data);
	}

	function insert_detail(){
		$data = array(
			'pembelianid' => $this->getPembelianID(),
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'jumlah' => $this->getJumlah(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('pembelian_detail', $data);
	}

	function update_data(){
		$data = array(
			'keterangan' => $this->getKeterangan(),
			'statusid' => $this->getStatusID()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('pembelian', $data);
	}

	function update_detail(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'jumlah' => $this->getJumlah(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getPembelianDetailID());
		$this->db->update('pembelian_detail', $data);
	}

	function verifikasi(){
		$data = array(
			'statusid' => 1
		);
		$this->db->where('id', $this->getID());
		$this->db->update('pembelian', $data);
	}

	function delete(){
		$this->db->where('id', $this->getID());
		$this->db->delete('pembelian');

		$this->db->where('pembelianid', $this->getID());
		$this->db->delete('pembelian_detail');
	}

	function delete_detail(){
		$this->db->where('id', $this->getID());
		$this->db->delete('pembelian_detail');
	}

	function get_data_pembelian(){
		$this->db->select('
			pembelian.id,
			pembelian.no_pembelian AS no_pembelian,
			pembelian.keterangan,
			pembelian.dibuat_tanggal AS tanggal_pesan,
			pembelian.statusid
			');
		$this->db->from('pembelian');
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('
			pembelian.id,
			pembelian.no_pembelian AS no_pembelian,
			pembelian.keterangan,
			pembelian.dibuat_tanggal AS tanggal_pesan,
			pembelian.statusid
			');
		$this->db->from('pembelian');
		$this->db->where('pembelian.id', $this->getID());
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_detail(){
		$this->db->select('*');
		$this->db->from('pembelian_detail');
		$this->db->where('pembelianid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_view_detail(){
		$this->db->select('
			pembelian_detail.jumlah,
			pembelian_detail.harga,
			kategori.nama_kategori AS nama_kategori,
			produk.nama_produk AS nama_produk,
			lengan.value AS nama_lengan,
			size.value AS nama_size,
			warna.value AS nama_warna,
			');
		$this->db->from('pembelian_detail');
		$this->db->join('kategori', 'kategori.id = pembelian_detail.kategoriid');
		$this->db->join('produk', 'produk.id = pembelian_detail.produkid');
		$this->db->join('lengan', 'lengan.id = pembelian_detail.lenganid');
		$this->db->join('size', 'size.id = pembelian_detail.sizeid');
		$this->db->join('warna', 'warna.id = pembelian_detail.warnaid');
		$this->db->where('pembelianid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

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

}
?>