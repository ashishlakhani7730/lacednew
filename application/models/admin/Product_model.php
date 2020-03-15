<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	function add_product($data)
	{
		$this->db->insert("product",$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
}