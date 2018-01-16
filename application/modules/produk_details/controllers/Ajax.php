<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* Load model */
		$this->load->model('produk_detail');
	}

	function get_produk_bykategoriid(){
		$kategoriid = $this->input->post('txt_kategoriid');
		$data = produk_bykategoriid_dropdown($kategoriid);
		echo $data;
	}
}