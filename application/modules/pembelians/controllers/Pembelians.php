<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pembelians extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* load model */
		$this->load->model('pembelian');
		$this->load->model('produk_details/produk_detail');
	}

	function index(){
		$data['result'] = $this->pembelian->get_data_pembelian();
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

		/* load view */
		$this->template->write_view('tambah', $data);
	}

	function prosess_tambah(){
		$this->db->trans_start();
		$max = $this->pembelian->get_max_id();
		$nomor = sprintf("%04s", $max);
		$no_pembelian = config_item('ref_pembelian'). $nomor;
		$keterangan  = $this->input->post('txt_keterangan');
		$this->pembelian->setNopembelian($no_pembelian);
		$this->pembelian->setKeterangan($keterangan);
		$this->pembelian->insert_data();
		$pembelianid = $this->db->insert_id();
		foreach ($_POST['txt_kategoriid'] as $key => $val) {
			$kategoriid = $_POST['txt_kategoriid'][$key];
			$produkid = $_POST['txt_produkid'][$key];
			$sizeid = $_POST['txt_sizeid'][$key];
			$warnaid = $_POST['txt_warnaid'][$key];
			$lenganid = $_POST['txt_lenganid'][$key];
			$jumlah = $_POST['txt_jumlah'][$key];
			$harga = $_POST['txt_harga'][$key];

			$this->pembelian->setPembelianID($pembelianid);
			$this->pembelian->setKategoriID($kategoriid);
			$this->pembelian->setProdukID($produkid);
			$this->pembelian->setSizeID($sizeid);
			$this->pembelian->setWarnaID($warnaid);
			$this->pembelian->setLenganID($lenganid);
			$this->pembelian->setJumlah($jumlah);
			$this->pembelian->setHarga($harga);

			$this->pembelian->insert_detail();
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
		$this->pembelian->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->pembelian->ambil_data();
		$result_detail = $this->pembelian->ambil_data_detail();

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

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function prosess_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->pembelian->setID($arr['id']);

		$this->db->trans_start();
		$keterangan  = $this->input->post('txt_keterangan');
		$statusid  = $this->input->post('txt_statusid');
		$this->pembelian->setKeterangan($keterangan);
		$this->pembelian->setStatusid($statusid);
		$this->pembelian->update_data();
		foreach ($_POST['txt_pembeliandetailid'] as $key => $val) {
			$pembeliandetailid = $_POST['txt_pembeliandetailid'][$key];
			$kategoriid = $_POST['txt_kategoriid'][$key];
			$produkid = $_POST['txt_produkid'][$key];
			$lenganid = $_POST['txt_lenganid'][$key];
			$sizeid = $_POST['txt_sizeid'][$key];
			$warnaid = $_POST['txt_warnaid'][$key];
			$jumlah = $_POST['txt_jumlah'][$key];
			$harga = $_POST['txt_harga'][$key];

			$this->pembelian->setPembelianDetailID($pembeliandetailid);
			$this->pembelian->setKategoriID($kategoriid);
			$this->pembelian->setProdukID($produkid);
			$this->pembelian->setSizeID($sizeid);
			$this->pembelian->setWarnaID($warnaid);
			$this->pembelian->setLenganID($lenganid);
			$this->pembelian->setJumlah($jumlah);
			$this->pembelian->setHarga($harga);
			$this->pembelian->update_detail();
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
		$this->pembelian->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->pembelian->ambil_data();
		$result_detail = $this->pembelian->ambil_data_view_detail();

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
		$this->pembelian->setID($arr['id']);

		$this->pembelian->verifikasi();
		$detail = $this->pembelian->ambil_data_detail();
		foreach ($detail as $key => $val) {
			$this->produk_detail->setKategoriID($val['kategoriid']);
			$this->produk_detail->setProdukID($val['produkid']);
			$this->produk_detail->setSizeID($val['sizeid']);
			$this->produk_detail->setWarnaID($val['warnaid']);
			$this->produk_detail->setLenganID($val['lenganid']);
			$checking = $this->produk_detail->check_data_produk();
			if ($checking == 0) {
				$sisa_stok = 0;
				$this->produk_detail->setStok($val['jumlah']);
				$this->produk_detail->insert_data();
			}else{
				$sisa_stok = $this->produk_detail->get_sisa_Stok();
				$this->produk_detail->setID($sisa_stok['id']);
				$this->produk_detail->setStok($sisa_stok['stok'] + $val['jumlah']);
				$this->produk_detail->update_data();
			}
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
		$this->pembelian->setID($arr['id']);

		$this->pembelian->delete();
		$this->db->trans_complete();
		redirect($this->uri->segment(1));
	}

	function hapus_detail(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->db->trans_start();
		$this->pembelian->setID($arr['id']);

		$this->pembelian->delete_detail();
		$this->db->trans_complete();
		redirect($this->agent->referrer());
	}

}
?>