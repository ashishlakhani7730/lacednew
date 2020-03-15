<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_policy extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("p_policy");
			$query = $this->db->get();
			$data['about'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/p_policy",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_p_policy()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$data = array("p_desc"=>$this->input->post("p_desc"));
			$this->db->where("p_id",1);
			$this->db->update("p_policy",$data);
			
			$id = ($this->db->affected_rows() != 1) ? false : true;
			
			if($id)
			{
				$this->session->set_flashdata('message', "Privacy Policy Added Sucessfully");
				redirect('p_policy');
			}
			else
			{
				$this->session->set_flashdata('message2', "Somthing Went To Wrong");
				redirect('p_policy');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}