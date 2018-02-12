<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Load_view extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function kasir()
	{
		$this->template->write_view('index');
	}

	public function report()
	{
		// $this->template->add_includes('css',base_url().'stylesheet/css/css.css', 'header', FALSE, FALSE);
		$this->template->write_view('report');
	}

}

/* End of file Load_view.php */
/* Location: ./application/controllers/Load_view.php */