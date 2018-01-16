<?php
	/*#### Security For Login ####*/
	if(!function_exists('bypass')) {
	function session_cek(){
		$CI = &get_instance();
		$CI->load->database();
		if(!($CI->session->userdata('id'))) {
			if($CI->uri->segment(1) != "logins" &&
				$CI->uri->segment(1) != "")	{
					return redirect('logins');
				}
			}
		}
	}
?>