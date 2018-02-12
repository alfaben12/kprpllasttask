<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Model {

	private $id;
	private $tanggal_awal;
	private $tanggal_akhir;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getTanggal_Awal(){return $this->tanggal_awal;}
	function setTanggal_Awal($tanggal_awal){$this->tanggal_awal = $tanggal_awal;}
	function getTanggal_Akhir(){return $this->tanggal_akhir;}
	function setTanggal_Akhir($tanggal_akhir){$this->tanggal_akhir = $tanggal_akhir;}

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
		if($this->getTanggal_Awal()){
			$this->db->where('penjualan.dibuat_tanggal >=', $this->getTanggal_Awal());
		}
		if($this->getTanggal_Akhir()){
			$this->db->where('penjualan.dibuat_tanggal <=', $this->getTanggal_Akhir());
		}				
		$query = $this->db->get();
		return $query->result_array();
	}

	function data_penjualan_detail()
	{
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
		$this->db->order_by('tanggal_pesan', 'desc');
		if($this->getTanggal_Awal()){
			$this->db->where('penjualan.dibuat_tanggal >=', $this->getTanggal_Awal());
		}
		if($this->getTanggal_Akhir()){
			$this->db->where('penjualan.dibuat_tanggal <=', $this->getTanggal_Akhir());
		}				
		$query = $this->db->get();
		return $query->result_array();
	} 

}

/* End of file Report.php */
/* Location: ./application/models/Report.php */