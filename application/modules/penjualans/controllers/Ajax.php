<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller{

	function __construct(){
		parent :: __construct();
		$this->load->model('penjualan');
	}

	function get_produk_bykategoriid(){
		$kategoriid = $this->input->post('txt_kategoriid');
		$data = produk_bykategoriid_dropdown($kategoriid);
		echo $data;
	}

	function generate_total_harga(){
		/* membuat variable post data */
		$kategoriid = $this->input->post('txt_kategoriid');
		$produkid = $this->input->post('txt_produkid');
		$sizeid = $this->input->post('txt_sizeid');
		$warnaid = $this->input->post('txt_warnaid');
		$lenganid = $this->input->post('txt_lenganid');
		$jenissablon = $this->input->post('txt_jenissablonid');
		$warnasablon = $this->input->post('txt_jumlahwarnasablonid');
		$jumlah = $this->input->post('txt_jumlah');

		$this->db->trans_start();
		/* membuat value */
		$this->penjualan->setKategoriID($kategoriid);
		$this->penjualan->setProdukID($produkid);
		$this->penjualan->setSizeID($sizeid);
		$this->penjualan->setWarnaID($warnaid);
		$this->penjualan->setLenganID($lenganid);
		$this->penjualan->setJenisSablonID($jenissablon);
		$this->penjualan->setJumlahWarnaID($warnasablon);
		$this->penjualan->setJumlah($jumlah);

		/* function get result */
		$result = $this->penjualan->get_harga_by_paramid();
		$hargajenissablon = $this->penjualan->get_harga_jenissablon();
		$hargawarnasablon = $this->penjualan->get_harga_warnasablon();
		$this->db->trans_complete();

		foreach ($result as $key => $val) {
			$data['total_harga'] = (($val['total_harga'] + $hargajenissablon + $hargawarnasablon) * $jumlah);
			$data['stok'] = $val['stok'];
			$data['id'] = $val['id'];
		}

		echo json_encode($data);
	}

	function get_info_data_pelanggan(){
		$pelangganid = $this->input->post('txt_pelangganid');

		$this->db->trans_start();
		$this->penjualan->setPelangganID($pelangganid);
		$data['data'] = $this->penjualan->get_data_pelangaan();
		$this->db->trans_complete();

		foreach ($data['data'] as $key => $val) {
			$result['id'] = $val['id'];
			$result['nama'] = $val['nama'];
			$result['alamat'] = $val['alamat'];
			$result['no_telepon'] = $val['no_telepon'];
			$result['email'] = $val['email'];
			$result['dibuat_tanggal'] = $val['dibuat_tanggal'];
		}

		echo json_encode($result);
	}
}
?>