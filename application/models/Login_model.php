<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	function check_login($email,$password)
	{
		$this->db->select("*");
		$this->db->from("customer");
		$this->db->where("email",$email);
	    $this->db->where("password",$password);
		
		$query = $this->db->get();
	  
		$data = $query->result();
	  
		return $data;
	}
}