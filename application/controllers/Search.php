<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function index()
	{
		$keyword = $this->input->post('myCountry');
		$this->db->select('product.*,COUNT(auction_bid.p_id) as nbis');
		$this->db->from("product");
		$this->db->join('auction_bid', 'product.p_id = auction_bid.p_id','left')->group_by('product.p_id');
		$this->db->where("pro_name LIKE '%$keyword%'");
		$query = $this->db->get();
		$data["product"] = $query->result();
		//echo "<pre>"; print_r($data); exit;
		$this->load->view("search",$data);
	}
}