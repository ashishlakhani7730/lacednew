<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("product");
			$this->db->order_by("p_id","desc");
			$query = $this->db->get();
			$data["product"] = $query->result();
			
			$this->load->view("admin/product",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function update_product()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("product");
			$this->db->where("p_id",$this->uri->segment(2));
			$query = $this->db->get();
			$data["up_pro"] = $query->result();
			$this->load->view("admin/update_product",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function updated_product()
	{
		
	}
	
	public function delete_product()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			//delete image.
			$query = $this->db->select("*")->from("product")->where("p_id",$this->uri->segment(2))->get();
			$images = $query->result(); 
			
			//echo "<pre>"; print_r($images); exit;
			
			unlink("uploads/product/".$images[0]->pro_image1);
			unlink("uploads/product/".$images[0]->pro_image2);
			unlink("uploads/product/".$images[0]->pro_image3);
			unlink("uploads/product/".$images[0]->pro_image4);
			unlink("uploads/product/".$images[0]->pro_image5);
			
			$this->db->where('p_id',$this->uri->segment(2));
			$this->db->delete('product');
			
			$this->session->set_flashdata('message', 'Product Deleted Successfully!');
			redirect("product");
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}