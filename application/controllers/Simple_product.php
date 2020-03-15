<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_product extends CI_Controller {
	
	function __construct() { 
        parent::__construct(); 
        
        $this->load->model('Simple_products');
        $this->load->library("pagination");
    } 
	
	public function index()
	{
		$config = array();
        $config["base_url"] = base_url() . "simple_product";
        $config["total_rows"] = $this->Simple_products->get_count();
        $config["per_page"] = 20;
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

        $data['posts'] = $this->Simple_products->get_product($config["per_page"], $page);
		
		$data["total_rows"] = $this->Simple_products->get_count();

        $this->load->view('simple_product', $data); 
	}
	
}