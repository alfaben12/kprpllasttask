<?php
class MY_Profiler extends CI_Profiler {

	function run() {
		if (! isset($_SERVER['HTTP_X_REQUESTED_WITH']) || (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')) {
			$output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";

			$output .= $this->_compile_uri_string();
			$output .= $this->_compile_controller_info();
			$output .= $this->_compile_memory_usage();
			$output .= $this->_compile_benchmarks();
			$output .= $this->_compile_get();
			$output .= $this->_compile_post();
			$output .= $this->_compile_queries();

			$output .= '</div></body></html>';
			$output = '<html><head></head><body><?php if($_SERVER[\'REMOTE_ADDR\'] != \'127.0.0.1\' && $_SERVER[\'SERVER_ADDR\'] != \'::1\') exit; ?>'
				. $output;

			file_put_contents("profiler.php", $output);
		}
	}
}
?>