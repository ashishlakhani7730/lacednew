<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("customer");
			$que = $this->db->get();
			$data["user"] = $que->result();
			
			$this->load->view("admin/user",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}