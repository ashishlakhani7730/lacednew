<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

  function insertdata($data)
  {
	    $this->db->set('created', 'NOW()', FALSE);
		$this->db->insert('auction_bid',$data);  
		//return ($this->db->affected_rows() != 1) ? false : true;
		$last_id = $this->db->insert_id();
		return $last_id;
  }

}