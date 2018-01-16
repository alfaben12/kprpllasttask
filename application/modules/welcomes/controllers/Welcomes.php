<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Welcomes extends CI_Controller{
	
	function __construct(){
		parent :: __construct();
		/* load model */
		$this->load->model('welcome');
	}

	function index(){
		/* INCLUDE JS FILE */
		$this->template->add_includes('js', config_item('url_javascript_main') .'list.js', 'header', FALSE, FALSE);
		
		/* load view */
		$this->template->write_view('list');
	}

}
?>