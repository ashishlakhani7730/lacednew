<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Categorys extends CI_Model{ 
     
    protected $table = 'product';

    public function __construct() {
        parent::__construct();
    }

    public function get_count($mid, $sid) {
        $this->db->select('*');
		$this->db->from('product');
		$this->db->where("mc_id",$mid);
		$this->db->where("sc_id",$sid);
		$query=$this->db->get();
		return $query->num_rows();
    }

    public function get_product($limit, $start, $mid, $sid) {
		
		$this->db->select('product.*,COUNT(auction_bid.p_id) as nbis');
		$this->db->from('product');
		$this->db->join('auction_bid', 'product.p_id = auction_bid.p_id','left')->group_by('product.p_id');
		$this->db->where("mc_id",$mid);
		$this->db->where("sc_id",$sid);
		$this->db->limit($limit, $start);
		$query=$this->db->get();
		return $query->result();
		
		
    }
}