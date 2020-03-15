<?php 
   class Login_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function loginMatch($data) {
		  
			$this->db->select("*");
			$this->db->from("admin");
			$this->db->where("email", $data['email']);
			$this->db->where("password", $data['password']);
			$query = $this->db->get();
		
			if(!empty($query->result()))
			{
				return $query->result();
			}
			else
			{
				return false;
			}
			
      }
}