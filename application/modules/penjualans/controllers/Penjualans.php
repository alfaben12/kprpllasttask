<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Penjualans extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* load model */
		$this->load->model('penjualan');
	}

	function index(){
		$data['result'] = $this->penjualan->get_data_penjualan();
		$this->template->write_view('list', $data);
	}

	function tambah(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'tambah.js', 'header', FALSE, FALSE);

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['lengan'] = sizelengan_dropdown();
		$data['warna'] = warna_dropdown();
		$data['jenissablon'] = jenissablon_dropdown();
		$data['warnasablon'] = warnasablon_dropdown();
		$data['size'] = size_dropdown();
		$data['pelanggan'] = pelanggan_dropdown();

		/* load view */
		$this->template->write_view('tambah', $data);
	}

	function prosess_tambah(){
		$this->db->trans_start();
		$max = $this->penjualan->get_max_id();
		$nomor = sprintf("%04s", $max);
		$no_penjualan = config_item('ref_penjualan'). $nomor;
		$pelangganid = $this->input->post('txt_pelangganid');
		$keterangan  = $this->input->post('txt_keterangan');
		$this->penjualan->setNoPenjualan($no_penjualan);
		$this->penjualan->setPelangganID($pelangganid);
		$this->penjualan->setKeterangan($keterangan);
		$this->penjualan->insert_data();
		$penjualanid = $this->db->insert_id();
		foreach ($_POST['txt_kategoriid'] as $key => $val) {
			$kategoriid = $_POST['txt_kategoriid'][$key];
			$produkid = $_POST['txt_produkid'][$key];
			$sizeid = $_POST['txt_sizeid'][$key];
			$warnaid = $_POST['txt_warnaid'][$key];
			$lenganid = $_POST['txt_lenganid'][$key];
			$jenissablonid = $_POST['txt_jenissablonid'][$key];
			$warnasablonid = $_POST['txt_warnasablonid'][$key];
			$jumlah = $_POST['txt_jumlah'][$key];
			$harga = $_POST['txt_harga'][$key];

			$this->penjualan->setPenjualanID($penjualanid);
			$this->penjualan->setKategoriID($kategoriid);
			$this->penjualan->setProdukID($produkid);
			$this->penjualan->setSizeID($sizeid);
			$this->penjualan->setWarnaID($warnaid);
			$this->penjualan->setLenganID($lenganid);
			$this->penjualan->setJenisSablonID($jenissablonid);
			$this->penjualan->setJumlahWarnaID($warnasablonid);
			$this->penjualan->setJumlah($jumlah);
			$this->penjualan->setHarga($harga);

			$this->penjualan->insert_detail();
		}
		$this->db->trans_complete();
		$this->session->set_flashdata('pesan', 'Data berhasil tersimpan');
		redirect($this->uri->segment(1));
	}

	function edit(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'edit.js', 'header', FALSE, FALSE);

		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->penjualan->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->penjualan->ambil_data();
		$result_detail = $this->penjualan->ambil_data_detail();

		/* hasil data */
		$data['result'] = $result;
		$data['result_detail'] = $result_detail;

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['lengan'] = sizelengan_dropdown();
		$data['warna'] = warna_dropdown();
		$data['jenissablon'] = jenissablon_dropdown();
		$data['warnasablon'] = warnasablon_dropdown();
		$data['size'] = size_dropdown();
		$data['pelanggan'] = pelanggan_dropdown();

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function prosess_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->penjualan->setID($arr['id']);

		$this->db->trans_start();
		$pelangganid = $this->input->post('txt_pelangganid');
		$keterangan  = $this->input->post('txt_keterangan');
		$statusid  = $this->input->post('txt_statusid');
		$this->penjualan->setPelangganID($pelangganid);
		$this->penjualan->setKeterangan($keterangan);
		$this->penjualan->setStatusid($statusid);
		$this->penjualan->update_data();
		foreach ($_POST['txt_penjualandetailid'] as $key => $val) {
			$penjualandetailid = $_POST['txt_penjualandetailid'][$key];
			$kategoriid = $_POST['txt_kategoriid'][$key];
			$produkid = $_POST['txt_produkid'][$key];
			$lenganid = $_POST['txt_lenganid'][$key];
			$sizeid = $_POST['txt_sizeid'][$key];
			$warnaid = $_POST['txt_warnaid'][$key];
			$jenissablonid = $_POST['txt_jenissablonid'][$key];
			$warnasablonid = $_POST['txt_warnasablonid'][$key];
			$jumlah = $_POST['txt_jumlah'][$key];
			$harga = $_POST['txt_harga'][$key];

			$this->penjualan->setPenjualanDetailID($penjualandetailid);
			$this->penjualan->setKategoriID($kategoriid);
			$this->penjualan->setProdukID($produkid);
			$this->penjualan->setSizeID($sizeid);
			$this->penjualan->setWarnaID($warnaid);
			$this->penjualan->setLenganID($lenganid);
			$this->penjualan->setJenisSablonID($jenissablonid);
			$this->penjualan->setJumlahWarnaID($warnasablonid);
			$this->penjualan->setJumlah($jumlah);
			$this->penjualan->setHarga($harga);
			$this->penjualan->update_detail();
		}
		$this->db->trans_complete();
		$this->session->set_flashdata('pesan', 'Data berhasil tersimpan');
		redirect($this->uri->segment(1));
	}

	function detail(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->penjualan->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->penjualan->ambil_data();
		$result_detail = $this->penjualan->ambil_data_view_detail();

		/* hasil data */
		$data['result'] = $result;
		$data['result_detail'] = $result_detail;

		/* load view */
		$this->template->write_view('detail', $data);
	}

	function verifikasi(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->penjualan->setID($arr['id']);

		$this->penjualan->verifikasi();
		$this->db->trans_complete();
		redirect($this->uri->segment(1));
	}

	function hapus(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->penjualan->setID($arr['id']);

		$this->penjualan->delete();
		$this->db->trans_complete();
		redirect($this->uri->segment(1));
	}

	function hapus_detail(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->penjualan->setID($arr['id']);

		$this->penjualan->delete_detail();
		$this->db->trans_complete();
		redirect($this->agent->referrer());
	}

}
?>