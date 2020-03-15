<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {
	
	public function index()
	{
		$this->db->select("*");
		$this->db->from("p_policy");
		$query = $this->db->get();
		$data["pp"] = $query->result();
		//echo "<pre>"; print_r($data); exit;
		$this->load->view("privacypolicy",$data);
	}
}