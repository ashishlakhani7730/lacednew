<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("about_us");
			$query = $this->db->get();
			$data['about'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/aboutus",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_aboutus()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$data = array("about_content"=>$this->input->post("aboutus"));
			$this->db->where("a_id",1);
			$this->db->update("about_us",$data);
			
			$id = ($this->db->affected_rows() != 1) ? false : true;
			
			if($id)
			{
				$this->session->set_flashdata('message', "Aboutus Added Sucessfully");
				redirect('aboutus');
			}
			else
			{
				$this->session->set_flashdata('message2', "Somthing Went To Wrong");
				redirect('aboutus');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}