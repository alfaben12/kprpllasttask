<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Model{

	private $id;
	private $username;
	private $password;
	private $statusid;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}
	function getUsername(){return $this->username;}
	function setUsername($username){$this->username = $username;}
	function getPassword(){return $this->password;}
	function setPassword($password){$this->password = $password;}
	function getStatusID(){return $this->statusid;}
	function setStatusID($statusid){$this->statusid = $statusid;}

	function get_statusid_user(){
		$this->db->select('statusid');
		$this->db->from('user');
		$this->db->where('username', $this->getUsername());
		$this->db->where('password', $this->getPassword());
		$query = $this->db->get();
		return $query->row()->statusid;
	}

	function check_is_login_user() {
			if (($this->session->userdata('username')) && ($this->session->userdata('id'))) {
				// jika masih ada session || belum logout
				return TRUE;
			} else {//jika session belum ada || udah logout
				return FALSE;
			}
		}
}