<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	function add_main_category($data)
	{
		$this->db->set('datetime', 'NOW()', FALSE);
		$this->db->insert("main_category",$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function add_sub_category($data)
	{
		$this->db->set('datetime', 'NOW()', FALSE);
		$this->db->insert("sub_category",$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	function getmaincategory()
	{
		$this->db->select("*");
		$this->db->from("main_category");
		$query = $this->db->get();
		return $query->result();
	}
	
	function getsubcategory()
	{
		$this->db->select('sub_category.*,main_category.cat_name as main_category');
		$this->db->from('sub_category');
		$this->db->join('main_category', 'sub_category.mc_id = main_category.mc_id'); 
		$query = $this->db->get();
		return $query->result();
	}
}