<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_and_c extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("tandc");
			$query = $this->db->get();
			$data['about'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/tandc",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_t_and_c()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$data = array("t_desc"=>$this->input->post("t_desc"));
			$this->db->where("t_id",1);
			$this->db->update("tandc",$data);
			
			$id = ($this->db->affected_rows() != 1) ? false : true;
			
			if($id)
			{
				$this->session->set_flashdata('message', "Terms and conditions Added Sucessfully");
				redirect('t_and_c');
			}
			else
			{
				$this->session->set_flashdata('message2', "Somthing Went To Wrong");
				redirect('t_and_c');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}