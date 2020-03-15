<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction_winner extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("product");
			$this->db->where("p_id IN (SELECT DISTINCT p_id FROM auction_bid where completeauction = 1)", NULL, FALSE);
			//$this->db->order_by("p_id","desc");
			$query = $this->db->get();
			$data['bidproduct'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/auction_winner",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
}