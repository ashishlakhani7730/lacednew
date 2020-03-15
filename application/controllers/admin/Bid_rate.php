<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_rate extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("package_bid_rate");
			$query = $this->db->get();
			$data["bidrate"] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			if($data["bidrate"][0]->bid_rate == 0)
			{
				$this->load->view('admin/bid_rate');
			}
			else
			{
				$this->load->view('admin/bid_rate',$data);
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function Add_bid_rate()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$rate = array("bid_rate"=>$this->input->post("bidrate"));
			$this->db->where("pbr_id","1");
			$this->db->update("package_bid_rate",$rate);
			$this->db->trans_complete();
			//if($this->db->affected_rows() >=0)
			if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong!');
			}
			else
			{
				$this->session->set_flashdata('message', 'Bid Rate Added Successfully!');
			}
			redirect("bid_rate");
		}
		else
		{
			redirect('admin/Login');
		}
	}
}