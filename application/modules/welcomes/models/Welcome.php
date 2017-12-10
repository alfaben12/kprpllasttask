<?php
class Welcome extends CI_Model{

	private $keyword;

	function __construct(){parent :: __construct();}
	function getID(){return $this->id;}
	function setID($id){$this->id = $id;}

}
?>