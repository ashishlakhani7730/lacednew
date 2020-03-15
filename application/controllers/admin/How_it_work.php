<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_it_work extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("how_it_work");
			$query = $this->db->get();
			$data['about'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/how_it_work",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_how_it_work()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$data = array("h_desc"=>$this->input->post("h_desc"));
			$this->db->where("h_id",1);
			$this->db->update("how_it_work",$data);
			
			$id = ($this->db->affected_rows() != 1) ? false : true;
			
			if($id)
			{
				$this->session->set_flashdata('message', "How It Works Added Sucessfully");
				redirect('how_it_work');
			}
			else
			{
				$this->session->set_flashdata('message2', "Somthing Went To Wrong");
				redirect('how_it_work');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}