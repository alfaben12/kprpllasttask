<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pembelian_bahans extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* load model */
		$this->load->model('pembelian_bahan');
		$this->load->model('produk_details/produk_detail');
		$this->load->model('penjualans/penjualan');
		$this->load->model('bahans/bahan');
	}

	function index(){
		$data['result'] = $this->pembelian_bahan->get_data_pembelian_bahan();
		$this->template->write_view('list', $data);
	}

	function tambah(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'tambah.js', 'header', FALSE, FALSE);

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['lengan'] = sizelengan_dropdown();
		$data['warna'] = warna_dropdown();
		$data['size'] = size_dropdown();
		$data['bahan'] = bahan_dropdown();
		$data['penjualan'] = penjualan_dropdown();

		/* load view */
		$this->template->write_view('tambah', $data);
	}

	function prosess_tambah(){
		$this->db->trans_start();
		$max = $this->pembelian_bahan->get_max_id();
		$nomor = sprintf("%04s", $max);
		$no_pembelian_bahan = config_item('ref_pembelian_bahan'). $nomor;
		$keterangan  = $this->input->post('txt_keterangan');
		$this->pembelian_bahan->setNoPembelianBahan($no_pembelian_bahan);
		$this->pembelian_bahan->setKeterangan($keterangan);
		$this->pembelian_bahan->insert_data();
		$pembelian_bahanid = $this->db->insert_id();

		foreach ($_POST['txt_bahanid'] as $key => $val) {
			$bahanid = $_POST['txt_bahanid'][$key];
			$jumlah_bahan = $_POST['txt_jumlah_bahan'][$key];
			$harga = $_POST['txt_harga'][$key];

			$this->pembelian_bahan->setPembelianBahanID($pembelian_bahanid);
			$this->pembelian_bahan->setBahanID($bahanid);
			$this->pembelian_bahan->setJumlahBahan($jumlah_bahan);
			$this->pembelian_bahan->setHarga($harga);
			$this->pembelian_bahan->insert_detail_bahan();
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
		$this->pembelian_bahan->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->pembelian_bahan->ambil_data();
		$result_bahan = $this->pembelian_bahan->ambil_data_view_detail_bahan();

		/* hasil data */
		$data['result'] = $result;
		$data['result_bahan'] = $result_bahan;

		/* data dropdown */
		$data['bahan'] = bahan_dropdown();

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function prosess_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->pembelian_bahan->setID($arr['id']);

		$this->db->trans_start();
		$keterangan  = $this->input->post('txt_keterangan');
		$statusid  = $this->input->post('txt_statusid');
		$this->pembelian_bahan->setKeterangan($keterangan);
		$this->pembelian_bahan->setStatusid($statusid);
		$this->pembelian_bahan->update_data();

		foreach ($_POST['txt_pembelianbahanid'] as $key => $val) {
			$bahanid = $_POST['txt_bahanid'][$key];
			$jumlah_bahan = $_POST['txt_jumlah_bahan'][$key];
			$harga = $_POST['txt_harga'][$key];
			$pembelianbahanid = $_POST['txt_pembelianbahanid'][$key];

			$this->pembelian_bahan->setPembelianBahanDetailID($pembelianbahanid);
			$this->pembelian_bahan->setBahanID($bahanid);
			$this->pembelian_bahan->setJumlahBahan($jumlah_bahan);
			$this->pembelian_bahan->setHarga($harga);
			/* insert data bahan */
			$this->pembelian_bahan->update_detail_bahan();
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
		$this->pembelian_bahan->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->pembelian_bahan->ambil_data();
		$result_bahan = $this->pembelian_bahan->ambil_data_view_detail_bahan();

		/* hasil data */
		$data['result'] = $result;
		$data['result_bahan'] = $result_bahan;

		/* load view */
		$this->template->write_view('detail', $data);
	}

	function verifikasi(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->pembelian_bahan->setID($arr['id']);

		$this->pembelian_bahan->verifikasi();
		$bahan = $this->pembelian_bahan->ambil_data_detail_bahan();

		foreach ($bahan as $key => $val) {
			$this->bahan->setID($val['bahanid']);

			$sisa_stok = $this->bahan->get_sisa_Stok();
			$this->bahan->setNama($val['nama']);
			$this->bahan->setStok($sisa_stok['stok'] + $val['jumlah']);
			$this->bahan->update_data();
		}

		$this->db->trans_complete();
		redirect($this->uri->segment(1));
	}

	function hapus(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->pembelian_bahan->setID($arr['id']);

		$this->pembelian_bahan->delete_bahan();
		$this->pembelian_bahan->delete_bahan_bahan();
		$this->db->trans_complete();
		redirect($this->uri->segment(1));
	}

	function hapus_detail(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->pembelian_bahan->setID($arr['id']);

		$this->pembelian_bahan->delete_detail();
		$this->db->trans_complete();
		redirect($this->agent->referrer());
	}

	function hapus_bahan(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->pembelian_bahan->setID($arr['id']);

		$this->pembelian_bahan->delete_bahan();
		$this->db->trans_complete();
		redirect($this->agent->referrer());
	}

}
?>