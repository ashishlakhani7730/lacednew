<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {
	
	public function index()
	{
		$this->db->select("*");
		$this->db->from("about_us");
		$query = $this->db->get();
		$data["content"] = $query->result();
		//echo "<pre>"; print_r($data); exit;
		$this->load->view("about_us",$data);
	}
	
	public function news_letter()
	{
		//print_r($this->input->post("email"));exit;
		$response = array();
		$datas = array("email"=>$this->input->post("email"));
		
		$this->db->select("*");
		$this->db->from("news_letter");
		$this->db->where($datas);
		$que = $this->db->get();
		$emails = $que->result();
		//echo "<pre>"; print_r($emails); exit;
		if(empty($emails))
		{
			$this->db->set('created', 'NOW()', FALSE);
			$this->db->insert('news_letter',$datas);  
			//return ($this->db->affected_rows() != 1) ? false : true;
			$last_id = $this->db->insert_id();
			if($last_id)
			{
				$response["status"] = "ok";
			}
		}
		else
		{
			$response["status"] = "not ok";
		}
		echo json_encode($response);
	}
}