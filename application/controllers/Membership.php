<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Controller {
	
	public function index()
	{
		$this->db->select("*");
		$this->db->from("package_bid_rate");
		$que = $this->db->get();
		$data["bid_rate"] = $que->result();
		
		$this->db->select("*");
		$this->db->from("package_bids");
		$que = $this->db->get();
		$data["bids"] = $que->result();
		
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('membership',$data);
	}
	
}