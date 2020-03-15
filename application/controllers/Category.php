<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	function __construct() { 
        parent::__construct(); 
        
        $this->load->model('Categorys');
        $this->load->library("pagination");
    } 
	
	public function index()
	{
		/*
		$this->db->select('*');
		$this->db->from('product');
		$query=$this->db->get();
		$data['result'] = $query->result();
		
		$this->load->view('new_product',$data);
		*/
		
		$config = array();
        $config["base_url"] = base_url() . "category/".$this->uri->segment(2)."/".$this->uri->segment(3);
        $config["total_rows"] = $this->Categorys->get_count($this->uri->segment(2),$this->uri->segment(3));
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
		
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['posts'] = $this->Categorys->get_product($config["per_page"], $page, $this->uri->segment(2), $this->uri->segment(3));
		
		$data["total_rows"] = $this->Categorys->get_count($this->uri->segment(2),$this->uri->segment(3));

        $this->load->view('category', $data); 
	}
}