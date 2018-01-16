<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pelanggan extends CI_Model{

	private $id;
	private $nama;
	private $no_telepon;
	private $email;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getNama(){return $this->nama;}
	function setNama($nama){$this->nama = $nama;}
	function getEmail(){return $this->email;}
	function setEmail($email){$this->email = $email;}
	function getAlamat(){return $this->alamat;}
	function setAlamat($alamat){$this->alamat = $alamat;}
	function getNoTelepon(){return $this->no_telepon;}
	function setNoTelepon($no_telepon){$this->no_telepon = $no_telepon;}

	function insert_data(){
		$data = array(
			'nama' => $this->getNama(),
			'email' => $this->getEmail(),
			'alamat' => $this->getAlamat(),
			'no_telepon' => $this->getNoTelepon()
		);
		$this->db->insert('pelanggan', $data);
	}

	function update_data(){
		$data = array(
			'nama' => $this->getNama(),
			'email' => $this->getEmail(),
			'alamat' => $this->getAlamat(),
			'no_telepon' => $this->getNoTelepon()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('pelanggan', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('pelanggan');
	}

	function cek_data(){
		$this->db->select('nama');
		$this->db->from('pelanggan');
		$this->db->where('nama', $this->getNama());
		$this->db->where('email', $this->getEmail());
		$this->db->where('alamat', $this->getAlamat());
		$this->db->where('no_telepon', $this->getNoTelepon());
		$query = $this->db->get();
		return $query->num_rows(); 
	}

	function ambil_semua_data(){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>