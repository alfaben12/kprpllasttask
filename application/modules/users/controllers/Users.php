<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('user');
	}

	function index(){
		/* function ambil semua data */
		$list = $this->user->ambil_semua_data();

		/* hasil data */
		$data['result'] = $list;

		/* Load view */
		$this->template->write_view('list', $data);
	}

	function tambah(){
		/* data dropdown */
		$data['role'] = role_dropdown();
		
		/* Load view */
		$this->template->write_view('tambah', $data);
	}

	function prosess_tambah(){
		/* atur form validasi */
		$this->form_validation->set_rules('txt_nama', 'Nama user', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_password', 'Passowrd', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_roleid', 'Role', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* data dropdown */
			$data['role'] = role_dropdown();
			$this->template->write_view('tambah', $data);
		} else {
			/* membuat variable post data */
			$nama = $this->input->post('txt_nama');
			$username = $this->input->post('txt_username');
			$password = $this->input->post('txt_password');
			$roleid = $this->input->post('txt_roleid');

			$this->db->trans_start();
			/* membuat value */
			$this->user->setNama($nama);
			$this->user->setUsername($username);
			$this->user->setPassword($password);
			$this->user->setRoleID($roleid);

			/* fungsi insert data ke database */
			$this->user->insert_data();
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
		$this->user->setID($arr['id']);

		/* fungsi ambil data */
		$result = $this->user->ambil_data();

		/* data dropdown */
		$data['role'] = role_dropdown();
		$data['result'] = $result;

		/* load view */
		$this->template->write_view('edit', $data);
	}

	function proses_edit(){
		/* atur parameter data */
		$arr = $this->uri->uri_to_assoc(3);
		$data['arr'] = $arr['id'];

		/* membuat value */
		$this->user->setID($data['arr']);

		/* atur form validasi */
		$this->form_validation->set_rules('txt_nama', 'Nama user', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_password', 'Passowrd', 'trim|required|xss_clean');
		$this->form_validation->set_rules('txt_roleid', 'Role', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		if($this->form_validation->run() == FALSE) {
			/* data dropdown */
			$data['role'] = role_dropdown();
			$data['result'] = $result;

			/* load view */
			$this->template->write_view('tambah', $data);
		} else {
			/* membuat variable post data */
			$nama = $this->input->post('txt_nama');
			$username = $this->input->post('txt_username');
			$password = $this->input->post('txt_password');
			$roleid = $this->input->post('txt_roleid');

			$this->db->trans_start();
			/* membuat value */
			$this->user->setNama($nama);
			$this->user->setUsername($username);
			$this->user->setPassword($password);
			$this->user->setRoleID($roleid);

			/* fungsi insert data ke database */
			$this->user->update_data();
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
		$this->user->setID($data['arr']);

		/* fungsi hapus data dari database */
		$this->user->delete_data();

		/* flashdata info error/sukses */
		$this->session->set_flashdata('pesan', 'sukses');
		redirect($this->uri->segment(1). '/index');
	}

}
?>