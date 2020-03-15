<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_it_works extends CI_Controller {
	
	public function index()
	{
		$this->db->select("*");
		$this->db->from("how_it_work");
		$query = $this->db->get();
		$data['how'] = $query->result();
		$this->load->view('how_it_work',$data);
	}
}