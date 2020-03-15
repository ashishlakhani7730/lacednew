<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Termsandconditions extends CI_Controller {
	
	public function index()
	{
		$this->db->select("*");
		$this->db->from("tandc");
		$query = $this->db->get();
		$data["tandc"] = $query->result();
		//echo "<pre>"; print_r($data); exit;
		$this->load->view("termsandconditions",$data);
	}
}