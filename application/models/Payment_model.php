<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {

	function get_card($id)
	{
		$this->db->select("*");
		$this->db->from("card_detail");
		$this->db->where("c_id",$id);
		$query= $this->db->get();
		return $query->result();
	}
	
	function add_card($data)
	{
		$this->db->set('datetime', 'NOW()', FALSE);
		$this->db->insert('card_detail', $data);
	}
	
	function add_transaction($data)
	{
		$this->db->set('datetime', 'NOW()', FALSE);
		$this->db->insert('transaction', $data);
	}
	
	function update_bids($id,$data)
	{
		$this->db->where("c_id",$id);
		$this->db->update("customer",$data);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}