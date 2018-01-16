<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pelanggans extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('pelanggan');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->pelanggan->ambil_semua_data();

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
		$this->form_validation->set_rules('txt_nama', 'Nama Pelanggan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('txt_alamat', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_notelepon', 'No Telepon', 'trim|required|min_length[10]|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			$this->template->write_view('tambah');
		} else {
			/* membuat variable post data */
			$nama = $this->input->post('txt_nama');
			$email = $this->input->post('txt_email');
			$alamat = $this->input->post('txt_alamat');
			$notelepon = $this->input->post('txt_notelepon');

			$this->db->trans_start();
			/* membuat value */
			$this->pelanggan->setNama($nama);
			$this->pelanggan->setEmail($email);
			$this->pelanggan->setAlamat($alamat);
			$this->pelanggan->setNoTelepon($notelepon);

			if($this->pelanggan->cek_data() != 0){
				$this->session->set_flashdata('pesan', 'data sudah ada');
				redirect($this->uri->segment(1). '/index');
			}else{
				/* fungsi insert data ke database */
				$this->pelanggan->insert_data();
			}
			/* flashdata info error/sukses */
			$this->db->trans_complete();
			$this->session->set_flashdata('pesan', 'sukses');
			redirect($this->uri->segment(1). '/index');
		}
	}

	function edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];
		
		/* membuat value */
		$this->pelanggan->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->pelanggan->ambil_data();

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
		$this->pelanggan->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_nama', 'Nama Pelanggan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('txt_alamat', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_notelepon', 'No Telepon', 'trim|required|min_length[10]|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* fungsi ambil data */
			$result = $this->pelanggan->ambil_data();

			/* hasil data */
			$data['result'] = $result;

			/* load view */
			$this->template->write_view('edit', $data);
		} else {
			/* membuat variable post data */
			$nama = $this->input->post('txt_nama');
			$email = $this->input->post('txt_email');
			$alamat = $this->input->post('txt_alamat');
			$notelepon = $this->input->post('txt_notelepon');

			$this->db->trans_start();
			/* membuat value */
			$this->pelanggan->setNama($nama);
			$this->pelanggan->setEmail($email);
			$this->pelanggan->setAlamat($alamat);
			$this->pelanggan->setNoTelepon($notelepon);

			/* fungsi update data ke database */
			if($this->pelanggan->cek_data() != 0){
				$this->session->set_flashdata('pesan', 'data sudah ada.');
				redirect($this->uri->segment(1). '/index');
			}else{
				/* fungsi insert data ke database */
				$this->pelanggan->update_data();
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
		$this->pelanggan->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->pelanggan->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>