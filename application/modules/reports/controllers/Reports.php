<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report');
	}

	public function report_penjualan()
	{
		$this->template->add_includes('js', config_item('url_javascript_main') .'report.js', 'header', FALSE, FALSE);
		$this->template->write_view('penjualan');
	}

	public function report_pembelian()
	{
		$this->template->write_view('pembelian');
	}

}

/* End of file Reports.php */
/* Location: ./application/controllers/Reports.php */