<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Produksis extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* load model */
		$this->load->model('produksi');
		$this->load->model('produk_details/produk_detail');
		$this->load->model('penjualans/penjualan');
		$this->load->model('bahans/bahan');
	}

	function index(){
		$data['result'] = $this->produksi->get_data_produksi();
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
		$max = $this->produksi->get_max_id();
		$nomor = sprintf("%04s", $max);
		$no_produksi = config_item('ref_produksi'). $nomor;
		$keterangan  = $this->input->post('txt_keterangan');
		$penjualanid  = $this->input->post('txt_penjualanid');
		$this->produksi->setPenjualanID($penjualanid);
		$this->produksi->setNoProduksi($no_produksi);
		$this->produksi->setKeterangan($keterangan);
		$this->produksi->insert_data();
		$produksiid = $this->db->insert_id();

		$this->penjualan->setID($penjualanid);
		$this->penjualan->setStatusID(2);
		$this->penjualan->update_status();

		foreach ($_POST['txt_kategoriid'] as $key => $val) {
			$kategoriid = $_POST['txt_kategoriid'][$key];
			$produkid = $_POST['txt_produkid'][$key];
			$sizeid = $_POST['txt_sizeid'][$key];
			$warnaid = $_POST['txt_warnaid'][$key];
			$lenganid = $_POST['txt_lenganid'][$key];
			$bahanid = $_POST['txt_bahanid'][$key];
			$jumlah = $_POST['txt_jumlah'][$key];

			$this->produksi->setProduksiID($produksiid);
			$this->produksi->setKategoriID($kategoriid);
			$this->produksi->setProdukID($produkid);
			$this->produksi->setSizeID($sizeid);
			$this->produksi->setWarnaID($warnaid);
			$this->produksi->setLenganID($lenganid);
			$this->produksi->setJumlah($jumlah);
			/* insert data produk */
			$this->produksi->insert_detail();
		}

		foreach ($_POST['txt_bahanid'] as $key => $val) {
			$bahanid = $_POST['txt_bahanid'][$key];
			$jumlah_bahan = $_POST['txt_jumlah_bahan'][$key];

			$this->produksi->setProduksiID($produksiid);
			$this->produksi->setBahanID($bahanid);
			$this->produksi->setJumlahBahan($jumlah_bahan);
			/* insert data bahan */
			$this->produksi->insert_detail_bahan();
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
		$this->produksi->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->produksi->ambil_data();
		$result_detail = $this->produksi->ambil_data_detail();
		$result_bahan = $this->produksi->ambil_data_view_detail_bahan();

		/* hasil data */
		$data['result'] = $result;
		$data['result_detail'] = $result_detail;
		$data['result_bahan'] = $result_bahan;

		/* fungsi ambil data */
		$this->penjualan->setID($data['result'][0]['penjualanid']);
		$result = $this->penjualan->ambil_data();
		$result_detail = $this->penjualan->ambil_data_view_detail();

		/* hasil data */
		$data['result_penjualan'] = $result;
		$data['result_detail_penjualan'] = $result_detail;

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['lengan'] = sizelengan_dropdown();
		$data['warna'] = warna_dropdown();
		$data['size'] = size_dropdown();
		$data['bahan'] = bahan_dropdown();

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function prosess_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->produksi->setID($arr['id']);

		$this->db->trans_start();
		$keterangan  = $this->input->post('txt_keterangan');
		$statusid  = $this->input->post('txt_statusid');
		$this->produksi->setKeterangan($keterangan);
		$this->produksi->setStatusid($statusid);
		foreach ($_POST['txt_produksidetailid'] as $key => $val) {
			$kategoriid = $_POST['txt_kategoriid'][$key];
			$produkid = $_POST['txt_produkid'][$key];
			$sizeid = $_POST['txt_sizeid'][$key];
			$warnaid = $_POST['txt_warnaid'][$key];
			$lenganid = $_POST['txt_lenganid'][$key];
			$bahanid = $_POST['txt_bahanid'][$key];
			$jumlah = $_POST['txt_jumlah'][$key];
			$produksidetailid = $_POST['txt_produksidetailid'][$key];

			$this->produksi->setProduksiDetailID($produksidetailid);
			$this->produksi->setKategoriID($kategoriid);
			$this->produksi->setProdukID($produkid);
			$this->produksi->setSizeID($sizeid);
			$this->produksi->setWarnaID($warnaid);
			$this->produksi->setLenganID($lenganid);
			$this->produksi->setJumlah($jumlah);
			/* insert data produk */
			$this->produksi->update_detail();
		}

		foreach ($_POST['txt_produksibahanid'] as $key => $val) {
			$bahanid = $_POST['txt_bahanid'][$key];
			$jumlah_bahan = $_POST['txt_jumlah_bahan'][$key];
			$produksidetailid = $_POST['txt_produksibahanid'][$key];

			$this->produksi->setProduksiDetailID($produksidetailid);
			$this->produksi->setBahanID($bahanid);
			$this->produksi->setJumlahBahan($jumlah_bahan);
			/* insert data bahan */
			$this->produksi->update_detail_bahan();
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
		$this->produksi->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->produksi->ambil_data();
		$this->penjualan->setID($result[0]['penjualanid']);
		$result_detail = $this->produksi->ambil_data_view_detail();
		$result_bahan = $this->produksi->ambil_data_view_detail_bahan();
		$result = $this->penjualan->ambil_data();
		$result_detail = $this->penjualan->ambil_data_view_detail();

		/* hasil data */
		$data['result_penjualan'] = $result;
		$data['result_detail_penjualan'] = $result_detail;
		$data['result'] = $result;
		$data['result_detail'] = $result_detail;
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
		$this->produksi->setID($arr['id']);

		$this->produksi->verifikasi();
		$detail = $this->produksi->ambil_data_detail();
		$bahan = $this->produksi->ambil_data_detail_bahan();
		foreach ($detail as $key => $val) {
			$this->produk_detail->setKategoriID($val['kategoriid']);
			$this->produk_detail->setProdukID($val['produkid']);
			$this->produk_detail->setSizeID($val['sizeid']);
			$this->produk_detail->setWarnaID($val['warnaid']);
			$this->produk_detail->setLenganID($val['lenganid']);

			$sisa_stok = $this->produk_detail->get_sisa_Stok();
			$this->produk_detail->setID($sisa_stok['id']);
			$this->produk_detail->setStok($sisa_stok['stok'] - $val['jumlah']);
			$this->produk_detail->update_data();
		}

		foreach ($bahan as $key => $val) {
			$this->bahan->setID($val['bahanid']);

			$sisa_stok = $this->bahan->get_sisa_Stok();
			$this->bahan->setStok($sisa_stok['stok'] - $val['jumlah']);
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
		$this->produksi->setID($arr['id']);

		$this->produksi->delete();
		$this->produksi->delete_detail_detail();
		$this->produksi->delete_bahan_bahan();
		$this->db->trans_complete();
		redirect($this->uri->segment(1));
	}

	function hapus_detail(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->produksi->setID($arr['id']);

		$this->produksi->delete_detail();
		$this->db->trans_complete();
		redirect($this->agent->referrer());
	}

	function hapus_bahan(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->produksi->setID($arr['id']);

		$this->produksi->delete_bahan();
		$this->db->trans_complete();
		redirect($this->agent->referrer());
	}

}
?>