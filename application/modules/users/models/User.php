<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{

	private $id;
	private $roleid;
	private $nama;
	private $username;
	private $password;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getRoleID(){return $this->roleid;}
	function setRoleID($roleid){$this->roleid = $roleid;}
	function getNama(){return $this->nama;}
	function setNama($nama){$this->nama = $nama;}
	function getUsername(){return $this->username;}
	function setUsername($username){$this->username = $username;}
	function getPassword(){return $this->password;}
	function setPassword($password){$this->password = $password;}

	function insert_data(){
		$data = array(
			'roleid' => $this->getRoleID(),
			'nama' => $this->getNama(),
			'username' => $this->getUsername(),
			'password' => $this->getPassword()
		);
		$this->db->insert('user', $data);
	}

	function update_data(){
		$data = array(
			'roleid' => $this->getRoleID(),
			'nama' => $this->getNama(),
			'username' => $this->getUsername(),
			'password' => $this->getPassword()
		);
		$this->db->where('id', $this->getID());
		$this->db->update('user', $data);
	}

	function delete_data(){
		$this->db->where('id', $this->getID());
		$this->db->delete('user');
	}

	function ambil_semua_data(){
		$this->db->select('
			user.id,
			user.roleid,
			user.nama,
			user.username,
			user.tanggal_dibuat,
			role.nama AS nama_role
			');
		$this->db->from('user');
		$this->db->join('role', 'role.value = user.roleid');
		$query = $this->db->get();
		return $query->result_array();
	}

	function ambil_data(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $this->getID());
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>