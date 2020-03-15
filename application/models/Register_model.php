<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

  function username_exists($key)
  {
		$this->db->where('username',$key);
		$query = $this->db->get('customer');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
  }
  
  function mail_exists($key)
  {
		$this->db->where('email',$key);
		$query = $this->db->get('customer');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
  }

  function insertdata($data)
  {
	    $this->db->set('created', 'NOW()', FALSE);
		$this->db->insert('customer',$data);  
		//return ($this->db->affected_rows() != 1) ? false : true;
		$last_id = $this->db->insert_id();
		return $last_id;
  }
  
  function getUser($id)
  {
	  $this->db->select("*");
	  $this->db->from("customer");
	  $this->db->where("c_id",$id);
	  
	  $query = $this->db->get();
	  
	  $data = $query->result();
	  
	  return $data;
  }
  
  function updatedata($data,$id)
  {
	    $this->db->set('modify', 'NOW()', FALSE);
		$this->db->where("c_id",$id);
		$this->db->update('customer',$data);  
		
		return ($this->db->affected_rows() != 1) ? false : true;
  }

}