<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller{

	function __construct(){
		parent :: __construct();
		$this->load->model('pembelian');
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
		$this->pembelian->setKategoriID($kategoriid);
		$this->pembelian->setProdukID($produkid);
		$this->pembelian->setSizeID($sizeid);
		$this->pembelian->setWarnaID($warnaid);
		$this->pembelian->setLenganID($lenganid);
		$this->pembelian->setJenisSablonID($jenissablon);
		$this->pembelian->setJumlahWarnaID($warnasablon);
		$this->pembelian->setJumlah($jumlah);

		/* function get result */
		$result = $this->pembelian->get_harga_by_paramid();
		$hargajenissablon = $this->pembelian->get_harga_jenissablon();
		$hargawarnasablon = $this->pembelian->get_harga_warnasablon();
		$this->db->trans_complete();

		foreach ($result as $key => $val) {
			$data['recheck_harga'] = $val['total_harga'];
			$data['total_harga'] = (($val['total_harga'] + $hargajenissablon + $hargawarnasablon) * $jumlah);
			$data['stok'] = $val['stok'];
			$data['id'] = $val['id'];
		}

		echo json_encode($data);
	}

	function get_sisa_stok(){
		/* membuat variable post data */
		$kategoriid = $this->input->post('txt_kategoriid');
		$produkid = $this->input->post('txt_produkid');
		$sizeid = $this->input->post('txt_sizeid');
		$warnaid = $this->input->post('txt_warnaid');
		$lenganid = $this->input->post('txt_lenganid');

		$this->db->trans_start();
		/* membuat value */
		$this->pembelian->setKategoriID($kategoriid);
		$this->pembelian->setProdukID($produkid);
		$this->pembelian->setSizeID($sizeid);
		$this->pembelian->setWarnaID($warnaid);
		$this->pembelian->setLenganID($lenganid);

		/* function get result */
		$result = $this->pembelian->get_harga_by_paramid();
		$this->db->trans_complete();

		foreach ($result as $key => $val) {
			$data['stok'] = $val['stok'] == null ? 0 : $val['stok'];
			$data['id'] = $val['id'] == null ? 0 : $val['id'];
		}

		echo json_encode($data);
	}
}
?>