<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$this->db->select('product.*,COUNT(auction_bid.p_id) as nbis');
		$this->db->from('product');
		$this->db->join('auction_bid', 'product.p_id = auction_bid.p_id','left')->group_by('product.p_id');
		$this->db->where ("(product.end_time >= now())");
		$this->db->order_by("rand()");
		$this->db->limit(15);
		$query=$this->db->get();
		$data['result'] = $query->result();
		
		$this->db->select("*");
		$this->db->from("news_feed");
		$this->db->order_by("n_id","desc");
		$que=$this->db->get();
		$data['news'] = $que->result();
		
		$this->db->select("*");
		$this->db->from("banner");
		$que=$this->db->get();
		$data['banner'] = $que->result();
		
		//echo $im;exit;
		//echo "<pre>"; print_r($array); exit;
		$this->load->view('home',$data);
	}
	
	public function myaccount()
	{
		$this->load->view('myaccount');
	}
	
	public function prodetail()
	{
		$this->load->view('prodetail');
	}
	
	public function login()
	{
		$this->load->view('login');
	}
	
	public function register()
	{
		$this->load->view('register');
	}
	
	public function how_it_work()
	{
		$this->load->view('how_it_work');
	}
	
	public function new_product()
	{
		$this->db->select('*');
		$this->db->from('product');
		$query=$this->db->get();
		$data['result'] = $query->result();
		
		$this->load->view('new_product',$data);
	}
	
	public function all_cats()
	{
		$this->load->view('all_cats');
	}
	
	public function membership()
	{
		$this->load->view('membership');
	}
	
	public function contact()
	{
		$this->load->view('contact');
	}
	
}