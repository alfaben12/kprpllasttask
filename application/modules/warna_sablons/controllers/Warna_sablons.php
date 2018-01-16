<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Warna_sablons extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('warna_sablon');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->warna_sablon->ambil_semua_data();

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
		$this->form_validation->set_rules('txt_warnasablon', 'Warna Sablon', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_harga', 'Harga', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* Load view */
			$this->template->write_view('tambah');
		} else {
			/* membuat variable post data */
			$warna_sablon = $this->input->post('txt_warnasablon');
			$harga = $this->input->post('txt_harga');

			$this->db->trans_start();
			/* membuat value */
			$this->warna_sablon->setWarnaSablon($warna_sablon);
			$this->warna_sablon->setHarga($harga);

			/* fungsi insert data ke database */
			$this->warna_sablon->insert_data();
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
		$this->warna_sablon->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->warna_sablon->ambil_data();

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
		$this->warna_sablon->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_warnasablon', 'Warna Sablon', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_harga', 'Harga', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* fungsi ambil data */
			$result = $this->warna_sablon->ambil_data();

			/* hasil data */
			$data['result'] = $result;

			/* Load view */
			$this->template->write_view('edit', $data);
		} else {
			/* membuat variable post data */
			$warna_sablon = $this->input->post('txt_warnasablon');
			$harga = $this->input->post('txt_harga');

			$this->db->trans_start();
			/* membuat value */
			$this->warna_sablon->setWarnaSablon($warna_sablon);
			$this->warna_sablon->setHarga($harga);

			/* fungsi insert data ke database */
			$this->warna_sablon->update_data();
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
		$this->warna_sablon->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->warna_sablon->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>