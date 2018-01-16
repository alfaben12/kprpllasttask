<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Produk_details extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('produk_detail');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->produk_detail->ambil_semua_data();

		/* hasil data */
		$data['result'] = $list;

		/* Load view */
		$this->template->write_view('list', $data);
	}

	function tambah(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'tambah.js', 'header', FALSE, FALSE);

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['size'] = size_dropdown();
		$data['warna'] = warna_dropdown();
		$data['lengan'] = sizelengan_dropdown();
		$data['produk'] = produk_bykategoriid_dropdown(0);
		
		/* Load view */
		$this->template->write_view('tambah', $data);
	}

	function prosess_tambah(){
		/* atur form validasi */
		$this->form_validation->set_rules('txt_kategoriid', 'Nama Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_sizeid', 'Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_warnaid', 'Warna', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_lenganid', 'Size Lengan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_stok', 'Stok', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* INCLUDE JS FILE */
			$this->template->add_includes('js', config_item('url_javascript_main') .'tambah.js', 'header', FALSE, FALSE);
			/* data dropdown */
			$data['kategori'] = kategori_dropdown();
			$data['size'] = size_dropdown();
			$data['warna'] = warna_dropdown();
			$data['lengan'] = sizelengan_dropdown();

			/* Load view */
			$this->template->write_view('tambah', $data);
		} else {
			/* membuat variable post data */
			$kategoriid = $this->input->post('txt_kategoriid');
			$produkid = $this->input->post('txt_produkid');
			$sizeid = $this->input->post('txt_sizeid');
			$warnaid = $this->input->post('txt_warnaid');
			$lenganid = $this->input->post('txt_lenganid');
			$stok = $this->input->post('txt_stok');

			$this->db->trans_start();
			/* membuat value */
			$this->produk_detail->setKategoriID($kategoriid);
			$this->produk_detail->setProdukID($produkid);
			$this->produk_detail->setSizeID($sizeid);
			$this->produk_detail->setWarnaID($warnaid);
			$this->produk_detail->setLenganID($lenganid);
			$this->produk_detail->setStok($stok);

			if($this->produk_detail->cek_data() != 0){
				$this->session->set_flashdata('pesan', 'data sudah ada');
				redirect($this->uri->segment(1). '/index');
			}else{
				/* fungsi insert data ke database */
				$this->produk_detail->insert_data();
			}
			$this->db->trans_complete();

			/* flashdata info error/sukses */
			$this->session->set_flashdata('pesan', 'sukses');
			redirect($this->uri->segment(1). '/index');
		}
	}

	function edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'edit.js', 'header', FALSE, FALSE);

		/* membuat value */
		$this->produk_detail->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->produk_detail->ambil_data();

		/* hasil data */
		$data['result'] = $result;

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['size'] = size_dropdown();
		$data['warna'] = warna_dropdown();
		$data['lengan'] = sizelengan_dropdown();

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function proses_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->produk_detail->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_kategoriid', 'Nama Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_sizeid', 'Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_warnaid', 'Warna', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_lenganid', 'Size Lengan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_stok', 'Stok', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* INCLUDE JS FILE */
			$this->template->add_includes('js', config_item('url_javascript_main') .'edit.js', 'header', FALSE, FALSE);

			/* fungsi ambil data */
			$result = $this->produk_detail->ambil_data();

			/* hasil data */
			$data['result'] = $result;

			/* data dropdown */
			$data['kategori'] = kategori_dropdown();
			$data['size'] = size_dropdown();
			$data['warna'] = warna_dropdown();
			$data['lengan'] = sizelengan_dropdown();

			/* load view */
			$this->template->write_view('edit', $data);
		} else {
			/* membuat variable post data */
			$kategoriid = $this->input->post('txt_kategoriid');
			$produkid = $this->input->post('txt_produkid');
			$sizeid = $this->input->post('txt_sizeid');
			$warnaid = $this->input->post('txt_warnaid');
			$lenganid = $this->input->post('txt_lenganid');
			$stok = $this->input->post('txt_stok');

			$this->db->trans_start();
			/* membuat value */
			$this->produk_detail->setKategoriID($kategoriid);
			$this->produk_detail->setProdukID($produkid);
			$this->produk_detail->setSizeID($sizeid);
			$this->produk_detail->setWarnaID($warnaid);
			$this->produk_detail->setLenganID($lenganid);
			$this->produk_detail->setStok($stok);

			if($this->produk_detail->cek_data() != 0){
				$this->session->set_flashdata('pesan', 'data sudah ada');
				redirect($this->uri->segment(1). '/index');
			}else{
				/* fungsi update data ke database */
				$this->produk_detail->update_data();
			}
			$this->db->trans_complete();

			/* flashdata info error/sukses */
			$this->session->set_flashdata('pesan', 'sukses');
			redirect($this->uri->segment(1). '/index');
		}
	}

	function hapus(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->produk_detail->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->produk_detail->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>