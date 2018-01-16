<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Lengans extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('lengan');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->lengan->ambil_semua_data();

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
		$this->form_validation->set_rules('txt_sizelengan', 'Size lengan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_harga', 'Harga', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* Load view */
			$this->template->write_view('tambah');
		} else {
			/* membuat variable post data */
			$size_lengan = $this->input->post('txt_sizelengan');
			$harga = $this->input->post('txt_harga');

			$this->db->trans_start();
			/* membuat value */
			$this->lengan->setSizeLengan($size_lengan);
			$this->lengan->setHarga($harga);

			/* fungsi insert data ke database */
			$this->lengan->insert_data();
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
		$this->lengan->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->lengan->ambil_data();

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
		$this->lengan->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_sizelengan', 'Size lengan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_harga', 'Harga', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		
		if($this->form_validation->run() == FALSE) {
			/* fungsi ambil data */
			$result = $this->lengan->ambil_data();

			/* hasil data */
			$data['result'] = $result;

			/* Load view */
			$this->template->write_view('edit', $data);
		} else {
			/* membuat variable post data */
			$size_lengan = $this->input->post('txt_sizelengan');
			$harga = $this->input->post('txt_harga');

			$this->db->trans_start();
			/* membuat value */
			$this->lengan->setSizeLengan($size_lengan);
			$this->lengan->setHarga($harga);

			/* fungsi insert data ke database */
			$this->lengan->update_data();
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
		$this->lengan->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->lengan->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>