<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Logins extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('login');
	}

	function index(){
		$exactbrowsername = $_SERVER['HTTP_USER_AGENT'];

		if (strpos(strtolower($exactbrowsername), "safari/") and strpos(strtolower($exactbrowsername), "opr/")) {
			$browsername="opera";
		} elseIf (strpos(strtolower($exactbrowsername), "safari/") and strpos(strtolower($exactbrowsername), "chrome/")) {
			$browsername="chrome";
		} elseIf (strpos(strtolower($exactbrowsername), "msie")) {
			$browsername="internetexplorer";
		} elseIf (strpos(strtolower($exactbrowsername), "firefox/")) {
			$browsername="firefox";
		} elseIf (strpos(strtolower($exactbrowsername), "safari/") and strpos(strtolower($exactbrowsername), "opr/")==false and strpos(strtolower($exactbrowsername), "chrome/")==false) {
			$browsername="safari";
		} else {
			$browsername="unknown";
		};
		if ($this->login->check_is_login_user()) {
			redirect('welcomes');
		}else{
			redirect('logins/login/inv?agent='.strtolower(str_replace('$', '', getenv("username"))).'&browser='.$browsername.'&os='.strtolower(str_replace(' ', '', $this->agent->platform()).''));
		}
	}

	function login(){
		if ($this->login->check_is_login_user()) {
			redirect('welcomes');
		}else{
			$this->load->view('index');
		}
	}

	function prosess_login(){
		$exactbrowsername = $_SERVER['HTTP_USER_AGENT'];

		if (strpos(strtolower($exactbrowsername), "safari/") and strpos(strtolower($exactbrowsername), "opr/")) {
			$browsername="opera";
		} elseIf (strpos(strtolower($exactbrowsername), "safari/") and strpos(strtolower($exactbrowsername), "chrome/")) {
			$browsername="chrome";
		} elseIf (strpos(strtolower($exactbrowsername), "msie")) {
			$browsername="internetexplorer";
		} elseIf (strpos(strtolower($exactbrowsername), "firefox/")) {
			$browsername="firefox";
		} elseIf (strpos(strtolower($exactbrowsername), "safari/") and strpos(strtolower($exactbrowsername), "opr/")==false and strpos(strtolower($exactbrowsername), "chrome/")==false) {
			$browsername="safari";
		} else {
			$browsername="unknown";
		};
		$username   =  $this->input->post('txt_username');
		$password   =  $this->input->post('txt_password');
		$this->login->setUsername($username);
		$this->login->setPassword($password);
		$dataarr = array(
			'username'=>$username,
			'password'=>$password,
		);
		$login = $this->db->get_where('user', $dataarr);
		if($login->num_rows()>0){
			if ($this->login->get_statusid_user() == 3) {
				$this->session->set_flashdata('pesan','Terblokir !');
				redirect('logins/login/inv?agent='.strtolower(str_replace('$', '', getenv("username"))).'&browser='.$browsername.'&os='.strtolower(str_replace(' ', '', $this->agent->platform()).''));
			}else if ($this->login->get_statusid_user() == 2) {
				$this->session->set_flashdata('pesan','user sedang online !');
				redirect('logins/login/inv?agent='.strtolower(str_replace('$', '', getenv("username"))).'&browser='.$browsername.'&os='.strtolower(str_replace(' ', '', $this->agent->platform()).''));
			}else{
				$sess=  $login->row_array();
				$data=array(
					'id'=>$sess['id'],
					'roleid'=>$sess['roleid'],
					'statusid'=>$sess['statusid'],
					'nama'=>$sess['nama'],
					'username'=>$sess['username'],
				);
				$this->session->set_userdata($data);
				redirect('welcomes');
			}
		}else{
			$this->session->set_flashdata('pesan','Username dan Password salah !');
			redirect('logins/login/inv?agent='.strtolower(str_replace('$', '', getenv("username"))).'&browser='.$browsername.'&os='.strtolower(str_replace(' ', '', $this->agent->platform()).''));
		}
	}

	function keluar(){
		$pesan = 'Terimakasih telah menggunakan aplikasi ini.';
		$data['pesan'] = $pesan;
		$this->session->sess_destroy();
		redirect('logins');
	}
}