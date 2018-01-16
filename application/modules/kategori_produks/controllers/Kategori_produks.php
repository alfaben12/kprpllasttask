<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Kategori_produks extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('kategori_produk');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->kategori_produk->ambil_semua_data();

		/* hasil data */
		$data['result'] = $list;

		/* Load view */
		$this->template->write_view('list', $data);
	}

	function tambah(){
		/* Load view */
		$this->template->write_view('tambah');
	}

	function prosess_tambah(){
		/* atur form validasi */
		$this->form_validation->set_rules('txt_namakategori', 'Nama Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			$this->template->write_view('tambah');
		} else {
			/* membuat variable post data */
			$nama_kategori = $this->input->post('txt_namakategori');

			$this->db->trans_start();
			/* membuat value */
			$this->kategori_produk->setNamaKategori($nama_kategori);

			/* fungsi insert data ke database */
			$this->kategori_produk->insert_data();
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
		$this->kategori_produk->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->kategori_produk->ambil_data();

		/* hasil data */
		$data['result'] = $result;

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function proses_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->kategori_produk->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_namakategori', 'Nama Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* fungsi ambil data */
			$result = $this->kategori_produk->ambil_data();

			/* hasil data */
			$data['result'] = $result;

			/* load view */
			$this->template->write_view('edit', $data);

		} else {
			/* membuat variable post data */
			$nama_kategori = $this->input->post('txt_namakategori');

			$this->db->trans_start();
			/* membuat value param */
			$this->kategori_produk->setNamaKategori($nama_kategori);

			/* fungsi update data ke database */
			$this->kategori_produk->update_data();
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
		$this->kategori_produk->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->kategori_produk->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>