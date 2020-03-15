<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_bid extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("package_bids");
			$query = $this->db->get();
			$data["bid"] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			if($data["bid"][0]->num_bids == 0)
			{
				$this->load->view('admin/package_bid');
			}
			else
			{
				$this->load->view('admin/package_bid',$data);
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function Add_bids()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$rate = array("num_bids"=>$this->input->post("num_bids"));
			$this->db->where("pb_id","1");
			$this->db->update("package_bids",$rate);
			$this->db->trans_complete();
			//if($this->db->affected_rows() >=0)
			if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong!');
			}
			else
			{
				$this->session->set_flashdata('message', 'Bids Added Successfully!');
			}
			redirect("package_bid");
		}
		else
		{
			redirect('admin/Login');
		}
	}
}