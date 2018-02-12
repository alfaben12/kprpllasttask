<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pembelian_bahan extends CI_Model{

	private $id;
	private $penualanid;
	private $pembelian_bahandetailid;
	private $nopembelian_bahan;
	private $bahanid;
	private $jumlah;
	private $harga;
	private $jumlahbahan;
	private $jenissablonid;
	private $jumlahwarnaid;
	private $statusid;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getPenjualanID(){return $this->penjualanid;}
	function setPenjualanID($penjualanid){$this->penjualanid = $penjualanid;}
	function getPembelianBahanID(){return $this->pembelian_bahanid;}
	function setPembelianBahanID($pembelian_bahanid){$this->pembelian_bahanid = $pembelian_bahanid;}
	function getNoPembelianBahan(){return $this->nopembelian_bahan;}
	function setNoPembelianBahan($nopembelian_bahan){$this->nopembelian_bahan = $nopembelian_bahan;}
	function getPembelianBahanDetailID(){return $this->pembelian_bahandetailid;}
	function setPembelianBahanDetailID($pembelian_bahandetailid){$this->pembelian_bahandetailid = $pembelian_bahandetailid;}
	function getKeterangan(){return $this->keterangan;}
	function setKeterangan($keterangan){$this->keterangan = $keterangan;}
	function getBahanID(){return $this->bahanid;}
	function setBahanID($bahanid){$this->bahanid = $bahanid;}
	function getJumlah(){return $this->jumlah;}
	function setJumlah($jumlah){$this->jumlah = $jumlah;}
	function getHarga(){return $this->harga;}
	function setHarga($harga){$this->harga = $harga;}
	function getJumlahBahan(){return $this->jumlahbahan;}
	function setJumlahBahan($jumlahbahan){$this->jumlahbahan = $jumlahbahan;}
	function getStatusID(){return $this->statusid;}
	function setStatusID($statusid){$this->statusid = $statusid;}

	function get_max_id(){
		$this->db->select_max('id');
		$this->db->from('pembelian_bahan');
		$query = $this->db->get();
		return $query->row()->id + 1;
	}

	function insert_data(){
		$data = array(
			'no_pembelian_bahan' => $this->getNoPembelianBahan(),
			'keterangan' => $this->getKeterangan(),
			'statusid' => 0
		);
		$this->db->insert('pembelian_bahan', $data);
	}

	function insert_detail_bahan(){
		$data = array(
			'pembelian_bahanid' => $this->getPembelianBahanID(),
			'bahanid' => $this->getBahanID(),
			'jumlah' => $this->getJumlahBahan(),
			'harga' => $this->getHarga()
		);
		$this->db->insert('pembelian_bahan_detail', $data);
	}

	function update_data(){
		$data = array(
			'keterangan' => $this->getKeterangan(),
			'statusid' => $this->getStatusID()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('pembelian_bahan', $data);
	}

	function update_detail_bahan(){
		$data = array(
			'bahanid' => $this->getBahanID(),
			'jumlah' => $this->getJumlahBahan(),
			'harga' => $this->getHarga()
		);
		$this->db->where('id', $this->getPembelianBahanDetailID());
		$this->db->update('pembelian_bahan_detail', $data);
	}

	function verifikasi(){
		$data = array(
			'statusid' => 1
		);
		$this->db->where('id', $this->getID());
		$this->db->update('pembelian_bahan', $data);
	}

	function delete_bahan(){
		$this->db->where('id', $this->getID());
		$this->db->delete('pembelian_bahan');
	}

	function delete_bahan_bahan(){
		$this->db->where('pembelian_bahanid', $this->getID());
		$this->db->delete('pembelian_bahan_detail');
	}

	function get_data_pembelian_bahan(){
		$this->db->select('
			pembelian_bahan.id,
			pembelian_bahan.no_pembelian_bahan AS no_pembelian_bahan,
			pembelian_bahan.keterangan,
			pembelian_bahan.dibuat_tanggal AS tanggal_pesan,
			pembelian_bahan.statusid,
			');
		$this->db->from('pembelian_bahan');
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('
			pembelian_bahan.id,
			pembelian_bahan.no_pembelian_bahan AS no_pembelian_bahan,
			pembelian_bahan.keterangan,
			pembelian_bahan.dibuat_tanggal AS tanggal_pesan,
			pembelian_bahan.statusid
			');
		$this->db->from('pembelian_bahan');
		$this->db->where('pembelian_bahan.id', $this->getID());
		$this->db->order_by('tanggal_pesan', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_detail_bahan(){
		$this->db->select('
			pembelian_bahan_detail.pembelian_bahanid,
			pembelian_bahan_detail.bahanid,
			pembelian_bahan_detail.jumlah,
			pembelian_bahan_detail.harga,
			bahan.nama
			');
		$this->db->from('pembelian_bahan_detail');
		$this->db->join('bahan', 'bahan.id = pembelian_bahan_detail.bahanid');
		$this->db->where('pembelian_bahanid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data_view_detail_bahan(){
		$this->db->select('
			pembelian_bahan_detail.id,
			pembelian_bahan_detail.bahanid,
			bahan.nama AS nama_bahan,
			pembelian_bahan_detail.jumlah,
			pembelian_bahan_detail.harga
			');
		$this->db->from('pembelian_bahan_detail');
		$this->db->join('bahan', 'bahan.id = pembelian_bahan_detail.bahanid');
		$this->db->where('pembelian_bahanid', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>