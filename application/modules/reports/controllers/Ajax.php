<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report');
	}

	public function ambil_penjualan()
	{
		$this->report->setTanggal_Awal($_POST['txt_tanggal_awal']);
		$this->report->setTanggal_Akhir($_POST['txt_tanggal_akhir']);
		$data['data'] = $this->report->get_data_penjualan();
		$this->load->view('data_penjualan', $data);
	}

	public function ambil_pembelian()
	{
		$this->load->view('pembelian', $data);
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */