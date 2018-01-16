<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Produks extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('produk');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->produk->ambil_semua_data();

		/* hasil data */
		$data['result'] = $list;

		/* Load view */
		$this->template->write_view('list', $data);
	}

	function tambah(){
		/* data dropdown */
		$data['kategori'] = kategori_dropdown();

		/* Load view */
		$this->template->write_view('tambah', $data);
	}

	function prosess_tambah(){
		/* atur form validasi */
		$this->form_validation->set_rules('txt_kategoriid', 'Nama Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_namaproduk', 'Nama Produk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_harga', 'Harga', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* data dropdown */
			$data['kategori'] = kategori_dropdown();

			/* Load view */
			$this->template->write_view('tambah', $data);
		} else {
			/* membuat variable post data */
			$kategoriid = $this->input->post('txt_kategoriid');
			$nama_produk = $this->input->post('txt_namaproduk');
			$harga = $this->input->post('txt_harga');

			$this->db->trans_start();
			/* membuat value */
			$this->produk->setKategoriID($kategoriid);
			$this->produk->setNamaProduk($nama_produk);
			$this->produk->setHarga($harga);

			/* fungsi insert data ke database */
			$this->produk->insert_data();
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
		
		/* membuat value */
		$this->produk->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->produk->ambil_data();

		/* hasil data */
		$data['result'] = $result;

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function proses_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->produk->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_kategoriid', 'Nama Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_namaproduk', 'Nama Produk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_harga', 'Harga', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* fungsi ambil data */
			$result = $this->produk->ambil_data();

			/* hasil data */
			$data['result'] = $result;

			/* data dropdown */
			$data['kategori'] = kategori_dropdown();
			
			/* load view */
			$this->template->write_view('edit', $data);

		} else {
			/* membuat variable post data */
			$kategoriid = $this->input->post('txt_kategoriid');
			$nama_produk = $this->input->post('txt_namaproduk');
			$harga = $this->input->post('txt_harga');

			$this->db->trans_start();
			/* membuat value param */
			$this->produk->setKategoriID($kategoriid);
			$this->produk->setNamaProduk($nama_produk);
			$this->produk->setHarga($harga);

			/* fungsi update data ke database */
			$this->produk->update_data();
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
		$this->produk->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->produk->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>