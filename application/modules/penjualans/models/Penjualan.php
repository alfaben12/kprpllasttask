<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Penjualan extends CI_Model{

	private $id;
	private $penjualandetailid;
	private $pelangganid;
	private $nopenjualan;
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
	function getPenjualanID(){return $this->penjualanid;}
	function setPenjualanID($penjualanid){$this->penjualanid = $penjualanid;}
	function getPelangganID(){return $this->pelangganid;}
	function setPelangganID($pelangganid){$this->pelangganid = $pelangganid;}
	function getNoPenjualan(){return $this->nopenjualan;}
	function setNoPenjualan($nopenjualan){$this->nopenjualan = $nopenjualan;}
	function getPenjualanDetailID(){return $this->penjualandetailid;}
	function setPenjualanDetailID($penjualandetailid){$this->penjualandetailid = $penjualandetailid;}
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
	function getJenisSablonID(){return $this->jenissablonid;}
	function setJenisSablonID($jenissablonid){$this->jenissablonid = $jenissablonid;}
	function getJumlahWarnaID(){return $this->jumlahwarnaid;}
	function setJumlahWarnaID($jumlahwarnaid){$this->jumlahwarnaid = $jumlahwarnaid;}
	function getJumlah(){return $this->jumlah;}
	function setJumlah($jumlah){$this->jumlah = $jumlah;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}
	function getStatusID(){return $this->statusid;}
	function setStatusID($statusid){$this->statusid = $statusid;}

	function get_max_id(){
		$this->db->select_max('id');
		$this->db->from('penjualan');
		$query = $this->db->get();
		return $query->row()->id + 1;
	}

	function insert_data(){
		$data = array(
			'pelangganid' => $this->getPelangganID(),
			'no_penjualan' => $this->getNoPenjualan(),
			'keterangan' => $this->getKeterangan(),
			'statusid' => 0
		);
		$this->db->insert('penjualan', $data);
	}

	function insert_detail(){
		$data = array(
			'penjualanid' => $this->getPenjualanID(),
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'jenissablonid' => $this->getJenisSablonID(),
			'warnasablonid' => $this->getJumlahWarnaID(),
			'jumlah' => $this->getJumlah(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('penjualan_detail', $data);
	}

	function update_data(){
		$data = array(
			'keterangan' => $this->getKeterangan(),
			'statusid' => $this->getStatusID()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('penjualan', $data);
	}

	function update_status(){
		$data = array(
			'statusid' => $this->getStatusID()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('penjualan', $data);
	}

	function update_detail(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'jenissablonid' => $this->getJenisSablonID(),
			'warnasablonid' => $this->getJumlahWarnaID(),
			'jumlah' => $this->getJumlah(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getPenjualanDetailID());
		$this->db->update('penjualan_detail', $data);
	}

	function verifikasi(){
		$data = array(
			'statusid' => 1
		);
		$this->db->where('id', $this->getID());
		$this->db->update('penjualan', $data);
	}

	function delete(){
		$this->db->where('id', $this->getID());
		$this->db->delete('penjualan');

		$this->db->where('penjualanid', $this->getID());
		$this->db->delete('penjualan_detail');
	}

	function delete_detail(){
		$this->db->where('id', $this->getID());
		$this->db->delete('penjualan_detail');
	}

	function get_data_penjualan(){
		$this->db->select('
			penjualan.id,
			penjualan.no_penjualan AS no_penjualan,
			penjualan.keterangan,
			penjualan.dibuat_tanggal AS tanggal_pesan,
			penjualan.statusid,
			pelanggan.nama,
			pelanggan.email
			');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'pelanggan.id = penjualan.pelangganid');
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('
			penjualan.id,
			penjualan.no_penjualan AS no_penjualan,
			penjualan.keterangan,
			penjualan.dibuat_tanggal AS tanggal_pesan,
			penjualan.statusid,
			pelanggan.nama,
			pelanggan.email,
			pelanggan.alamat,
			pelanggan.no_telepon
			');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'pelanggan.id = penjualan.pelangganid');
		$this->db->where('penjualan.id', $this->getID());
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_detail(){
		$this->db->select('*');
		$this->db->from('penjualan_detail');
		$this->db->where('penjualanid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_view_detail(){
		$this->db->select('
				penjualan_detail.jumlah,
				penjualan_detail.harga,
				kategori.nama_kategori AS nama_kategori,
				produk.nama_produk AS nama_produk,
				lengan.value AS nama_lengan,
				size.value AS nama_size,
				warna.value AS nama_warna,
				jenis_sablon.value AS nama_sablon,
				warna_sablon.value AS nama_warnasablon
			');
		$this->db->from('penjualan_detail');
		$this->db->join('kategori', 'kategori.id = penjualan_detail.kategoriid');
		$this->db->join('produk', 'produk.id = penjualan_detail.produkid');
		$this->db->join('lengan', 'lengan.id = penjualan_detail.lenganid');
		$this->db->join('size', 'size.id = penjualan_detail.sizeid');
		$this->db->join('warna', 'warna.id = penjualan_detail.warnaid');
		$this->db->join('jenis_sablon', 'jenis_sablon.id = penjualan_detail.jenissablonid');
		$this->db->join('warna_sablon', 'warna_sablon.id = penjualan_detail.warnasablonid');
		$this->db->where('penjualanid', $this->getID());
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

	function get_data_pelangaan(){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id', $this->getPelangganID());
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>