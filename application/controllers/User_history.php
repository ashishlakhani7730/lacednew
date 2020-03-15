<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_history extends CI_Controller {
	
	function __construct() { 
        parent::__construct(); 
		 $this->load->model('User_historys');
        $this->load->library("pagination");
    } 
	
	public function index()
	{
		if($this->session->userdata("c_id") && $this->session->userdata("username") && $this->session->userdata("email")) 
		{
			$config = array();
			$config["base_url"] = base_url() . "user_history";
			$config["total_rows"] = $this->User_historys->get_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;
			
			// Pagination link format 
			$config['num_tag_open'] = '<li class="page-item">'; 
			$config['num_tag_close'] = '</li>'; 
			$config['cur_tag_open'] = '<li class="btn btn-primary num active"><a href="javascript:void(0);"><strong>'; 
			$config['cur_tag_close'] = '</strong></a></li>'; 
			$config['next_link'] = 'Next'; 
			$config['prev_link'] = 'Prev'; 
			$config['next_tag_open'] = '<li class="page-item">'; 
			$config['next_tag_close'] = '</li>'; 
			$config['prev_tag_open'] = '<li class="page-item">'; 
			$config['prev_tag_close'] = '</li>'; 
			$config['first_tag_open'] = '<li class="page-item">'; 
			$config['first_tag_close'] = '</li>'; 
			$config['last_tag_open'] = '<li class="page-item">'; 
			$config['last_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['posts'] = $this->User_historys->get_product($config["per_page"], $page,$this->session->userdata("c_id"));
			
			$data["total_rows"] = $this->User_historys->get_count();

			//echo "<pre>"; print_r($data); exit;
			$this->load->view("user_history",$data);
		
		}
		else
		{
			redirect("Login");
		}
		
	}
	
	public function bidlist()
	{
		$response = array();
		
			$this->db->select("ab.bid_price,ab.winner,ab.size,c.img, c.username");
			$this->db->from("auction_bid ab");
			$this->db->join('customer c','ab.c_id = c.c_id');
			$this->db->where('ab.p_id',$this->input->post('p_id'));
			$this->db->order_by('ab.bid_price','DESC');
			
			$query = $this->db->get();
			$list = $query->result();
			
			
			if($list)
			{
				$response['code'] = 1;
				$response['datas'] = $list;
			}
			else
			{
				$response['code'] = 0;
				$response['message'] = "Please Try Again";
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
	}
}