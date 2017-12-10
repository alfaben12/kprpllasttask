<?php
class Welcomes extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		$this->load->model('welcome');
	}

	function index(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'list.js', 'header', FALSE, FALSE);
		
		$this->template->write_view('list');
	}

}
?>