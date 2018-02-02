<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $hook['post_controller_constructor'][] = array(
// 	'filename' => 'security_login.php',
// 	'function' => 'session_cek',
// 	'filepath' => 'hooks'
// 	);

$hook['post_controller_constructor'][] = array(
	'function' => 'output_profiler',
	'filename' => 'profiler.php',
	'filepath' => 'hooks'
);

$hook['post_controller_constructor'][] = array(
	'function' => 'header_no_cache',
	'filename' => 'profiler.php',
	'filepath' => 'hooks'
);

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
