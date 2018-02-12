<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Produksi extends CI_Model{

	private $id;
	private $penualanid;
	private $produksidetailid;
	private $noproduksi;
	private $produkid;
	private $kategoriid;
	private $sizeid;
	private $warnaid;
	private $lenganid;
	private $bahanid;
	private $jumlah;
	private $jumlahbahan;
	private $jenissablonid;
	private $jumlahwarnaid;
	private $statusid;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getPenjualanID(){return $this->penjualanid;}
	function setPenjualanID($penjualanid){$this->penjualanid = $penjualanid;}
	function getProduksiID(){return $this->produksiid;}
	function setProduksiID($produksiid){$this->produksiid = $produksiid;}
	function getNoproduksi(){return $this->noproduksi;}
	function setNoproduksi($noproduksi){$this->noproduksi = $noproduksi;}
	function getproduksiDetailID(){return $this->produksidetailid;}
	function setproduksiDetailID($produksidetailid){$this->produksidetailid = $produksidetailid;}
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
	function getBahanID(){return $this->bahanid;}
	function setBahanID($bahanid){$this->bahanid = $bahanid;}
	function getJumlah(){return $this->jumlah;}
	function setJumlah($jumlah){$this->jumlah = $jumlah;}
	function getJumlahBahan(){return $this->jumlahbahan;}
	function setJumlahBahan($jumlahbahan){$this->jumlahbahan = $jumlahbahan;}
	function getStatusID(){return $this->statusid;}
	function setStatusID($statusid){$this->statusid = $statusid;}

	function get_max_id(){
		$this->db->select_max('id');
		$this->db->from('produksi');
		$query = $this->db->get();
		return $query->row()->id + 1;
	}

	function insert_data(){
		$data = array(
			'penjualanid' => $this->getPenjualanID(),
			'no_produksi' => $this->getNoProduksi(),
			'keterangan' => $this->getKeterangan(),
			'statusid' => 0
		);
		$this->db->insert('produksi', $data);
	}

	function insert_detail(){
		$data = array(
			'produksiid' => $this->getProduksiID(),
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'jumlah' => $this->getJumlah()
		);
		$this->db->insert('produksi_detail', $data);
	}

	function insert_detail_bahan(){
		$data = array(
			'produksiid' => $this->getProduksiID(),
			'bahanid' => $this->getBahanID(),
			'jumlah' => $this->getJumlahBahan()
		);
		$this->db->insert('produksi_bahan', $data);
	}

	function update_data(){
		$data = array(
			'keterangan' => $this->getKeterangan(),
			'statusid' => $this->getStatusID()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('produksi', $data);
	}

	function update_detail(){
		$data = array(
			'kategoriid' => $this->getKategoriID(),
			'produkid' => $this->getProdukID(),
			'sizeid' => $this->getSizeID(),
			'warnaid' => $this->getWarnaID(),
			'lenganid' => $this->getLenganID(),
			'jumlah' => $this->getJumlah(),
		);
		$this->db->where('id', $this->getProduksiDetailID());
		$this->db->update('produksi_detail', $data);
	}

	function update_detail_bahan(){
		$data = array(
			'bahanid' => $this->getBahanID(),
			'jumlah' => $this->getJumlahBahan(),
		);
		$this->db->where('id', $this->getProduksiDetailID());
		$this->db->update('produksi_bahan', $data);
	}

	function verifikasi(){
		$data = array(
			'statusid' => 1
		);
		$this->db->where('id', $this->getID());
		$this->db->update('produksi', $data);
	}

	function delete(){
		$this->db->where('id', $this->getID());
		$this->db->delete('produksi');

		$this->db->where('produksiid', $this->getID());
		$this->db->delete('produksi_detail');
	}

	function delete_detail(){
		$this->db->where('id', $this->getID());
		$this->db->delete('produksi_detail');
	}

	function delete_bahan(){
		$this->db->where('id', $this->getID());
		$this->db->delete('produksi_bahan');
	}

	function delete_detail_detail(){
		$this->db->where('produksiid', $this->getID());
		$this->db->delete('produksi_detail');
	}

	function delete_bahan_bahan(){
		$this->db->where('produksiid', $this->getID());
		$this->db->delete('produksi_bahan');
	}

	function get_data_produksi(){
		$this->db->select('
			produksi.id,
			produksi.no_produksi AS no_produksi,
			produksi.keterangan,
			produksi.dibuat_tanggal AS tanggal_pesan,
			produksi.statusid,
			penjualan.no_penjualan AS no_penjualan
			');
		$this->db->from('produksi');
		$this->db->join('penjualan', 'penjualan.id = produksi.penjualanid');
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('
			produksi.id,
			produksi.penjualanid,
			produksi.no_produksi AS no_produksi,
			produksi.keterangan,
			produksi.dibuat_tanggal AS tanggal_pesan,
			produksi.statusid
			');
		$this->db->from('produksi');
		$this->db->where('produksi.id', $this->getID());
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_detail(){
		$this->db->select('*');
		$this->db->from('produksi_detail');
		$this->db->where('produksiid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_detail_bahan(){
		$this->db->select('*');
		$this->db->from('produksi_bahan');
		$this->db->where('produksiid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_view_detail(){
		$this->db->select('
			produksi_detail.jumlah,
			kategori.nama_kategori AS nama_kategori,
			produk.nama_produk AS nama_produk,
			lengan.value AS nama_lengan,
			size.value AS nama_size,
			warna.value AS nama_warna
			');
		$this->db->from('produksi_detail');
		$this->db->join('kategori', 'kategori.id = produksi_detail.kategoriid');
		$this->db->join('produk', 'produk.id = produksi_detail.produkid');
		$this->db->join('lengan', 'lengan.id = produksi_detail.lenganid');
		$this->db->join('size', 'size.id = produksi_detail.sizeid');
		$this->db->join('warna', 'warna.id = produksi_detail.warnaid');
		$this->db->where('produksiid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_view_detail_bahan(){
		$this->db->select('
			produksi_bahan.id,
			produksi_bahan.bahanid,
			bahan.nama AS nama_bahan,
			produksi_bahan.jumlah,
			');
		$this->db->from('produksi_bahan');
		$this->db->join('bahan', 'bahan.id = produksi_bahan.bahanid');
		$this->db->where('produksiid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>