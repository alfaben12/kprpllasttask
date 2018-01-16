<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/*-------- KATEGORI DROPDOWN --------*/
if(!function_exists('kategori_dropdown')) {
	function kategori_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			kategori.id,
			kategori.nama_kategori
			');
		$CI->db->from('kategori');
		$CI->db->order_by('nama_kategori','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['nama_kategori'];
			}
		}
		return($data);
	}
}

/*-------- ROLE DROPDOWN --------*/
if(!function_exists('role_dropdown')) {
	function role_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			role.id,
			role.nama
			');
		$CI->db->from('role');
		$CI->db->order_by('nama','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['nama'];
			}
		}
		return($data);
	}
}

/*-------- SIZE LENGAN DROPDOWN --------*/
if(!function_exists('sizelengan_dropdown')) {
	function sizelengan_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			lengan.id,
			lengan.value,
			lengan.harga
			');
		$CI->db->from('lengan');
		$CI->db->order_by('value','asc');
		$data[''] = ' Lengan';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['value'];
			}
		}
		return($data);
	}
}

/*-------- SIZE DROPDOWN --------*/
if(!function_exists('size_dropdown')) {
	function size_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			size.id,
			size.value,
			size.harga
			');
		$CI->db->from('size');
		$CI->db->order_by('value','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['value'];
			}
		}
		return($data);
	}
}


/*-------- WARNA DROPDOWN --------*/
if(!function_exists('warna_dropdown')) {
	function warna_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			warna.id,
			warna.value
			');
		$CI->db->from('warna');
		$CI->db->order_by('value','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['value'];
			}
		}
		return($data);
	}
}

/*-------- JENIS SABLON DROPDOWN --------*/
if(!function_exists('jenissablon_dropdown')) {
	function jenissablon_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			jenis_sablon.id,
			jenis_sablon.value
			');
		$CI->db->from('jenis_sablon');
		$CI->db->order_by('value','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['value'];
			}
		}
		return($data);
	}
}

/*-------- JENIS SABLON DROPDOWN --------*/
if(!function_exists('warnasablon_dropdown')) {
	function warnasablon_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			warna_sablon.id,
			warna_sablon.value
			');
		$CI->db->from('warna_sablon');
		$CI->db->order_by('value','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['value']. ' Warna';
			}
		}
		return($data);
	}
}

/*-------- JENIS SABLON DROPDOWN --------*/
if(!function_exists('pelanggan_dropdown')) {
	function pelanggan_dropdown() {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			pelanggan.id,
			pelanggan.nama,
			pelanggan.email
			');
		$CI->db->from('pelanggan');
		$CI->db->order_by('nama','asc');
		$data[''] = '';
		$result = $CI->db->get();
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['nama']. ' ('.$val['email'].')';
			}
		}
		return($data);
	}
}

/*-------- PRODUK BY KATEGORIID DROPDOWN --------*/
if(!function_exists('produk_bykategoriid_dropdown')) {
	function produk_bykategoriid_dropdown($kategoriid) {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			produk.id,
			produk.nama_produk
			');
		$CI->db->from('produk');
		$CI->db->where('kategoriid', $kategoriid);
		$CI->db->order_by('nama_produk','asc');
		$result = $CI->db->get();
		$dropdown = '';
		$dropdown .= '<option readonly=""></option>';
		foreach ($result->result_array() as $key => $val) {
			$dropdown .= '<option value="'.$val['id'].'">'.$val['nama_produk'].'</option>';
		}
		return $dropdown;
	}
}

/*-------- PRODUK BY KATEGORIID DROPDOWN --------*/
if(!function_exists('produk_bykategoriid_dropdown_edit')) {
	function produk_bykategoriid_dropdown_edit($kategoriid) {
		$CI = &get_instance();
		$CI->load->database();

		$data = array();
		$CI->db->select('
			produk.id,
			produk.nama_produk
			');
		$CI->db->from('produk');
		$CI->db->where('kategoriid', $kategoriid);
		$CI->db->order_by('nama_produk','asc');
		$result = $CI->db->get();
		$data[''] = '';
		if($result->num_rows() > 0) {
			foreach ($result->result_array() as $key => $val) {
				$data[$val['id']] = $val['nama_produk'];
			}
		}
		return($data);
	}
}