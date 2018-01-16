<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Penjualans extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* load model */
		$this->load->model('penjualan');
	}

	function index(){
		echo "string";
	}

	function tambah(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'tambah.js', 'header', FALSE, FALSE);

		/* data dropdown */
		$data['kategori'] = kategori_dropdown();
		$data['lengan'] = sizelengan_dropdown();
		$data['warna'] = warna_dropdown();
		$data['jenissablon'] = jenissablon_dropdown();
		$data['warnasablon'] = warnasablon_dropdown();
		$data['size'] = size_dropdown();
		$data['pelanggan'] = pelanggan_dropdown();

		/* load view */
		$this->template->write_view('tambah', $data);
	}

}
?>