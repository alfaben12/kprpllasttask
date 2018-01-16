<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Model{

	private $id;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}

}
?>