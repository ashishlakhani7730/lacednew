<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_historys extends CI_Model{ 
     
    protected $table = 'product';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
		
		$this->db->select("*");
		$this->db->select_max('bid_price');
		$this->db->from("auction_bid");
		$this->db->where("c_id",$this->session->userdata("c_id"));
		$this->db->group_by("p_id");
		$query = $this->db->get();
		$num = $query->num_rows();
        return $num;
		
    }

    public function get_product($limit, $start, $c_id) {
		
		$this->db->select("*");
		$this->db->select_max('bid_price');
		$this->db->from("auction_bid");
		$this->db->where("c_id",$c_id);
		$this->db->group_by("p_id");
		$this->db->order_by("bid_id", "desc");
		$this->db->limit($limit, $start);
		$que = $this->db->get();
		return $que->result();
		/*
		$this->db->select("*");
		$this->db->from("product");
		$this->db->where("p_id IN (SELECT DISTINCT p_id FROM auction_bid where c_id = ".$c_id." order by bid_id desc)", NULL, FALSE);
		$this->db->limit($limit, $start);
		$que = $this->db->get();
		return $que->result();*/
    }
}