<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class All_products extends CI_Model{ 
     
    protected $table = 'product';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
		$this->db->select("*");
		$this->db->from('product');
		$query = $this->db->get();
		$num = $query->num_rows();
        return $num;
    }

    public function get_product($limit, $start) {
		
		$this->db->select('product.*,COUNT(auction_bid.p_id) as nbis');
		$this->db->from('product');
		$this->db->join('auction_bid', 'product.p_id = auction_bid.p_id','left')->group_by('product.p_id');
		$this->db->order_by("p_id", "desc");
		$this->db->limit($limit, $start);
		$query=$this->db->get();
		return $query->result();
		
    }
}