<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_category extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->load->model("admin/Category_model");
			$data["category"] = $this->Category_model->getmaincategory();
			
			$this->load->view("admin/main_category",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_category()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->load->model("admin/Category_model");
			$category = array("cat_name"=>$this->input->post("main_category"));
			$add = $this->Category_model->add_main_category($category);
			
			if($add)
			{
				$this->session->set_flashdata('message', 'Main Category Added Successfully!');
			}
			else
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong!');
			}
			
			redirect("main_category");
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function update_cateogry()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("main_category");
			$this->db->where("mc_id",$this->uri->segment(2));
			$query = $this->db->get();
			$data["main_cat"] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			$this->load->view("admin/update_main_category",$data);
			
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function updated_cateogry()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$datas = array("cat_name"=>$this->input->post("cat_name"));
			
			$this->db->set('datetime', 'NOW()', FALSE);
			$this->db->where("mc_id",$this->input->post("mc_id"));
			$this->db->update('main_category',$datas);
			$update = ($this->db->affected_rows() != 1) ? false : true;
			
			if($update)
			{
				$this->session->set_flashdata('message', 'Main Category Updated Successfully!');
			}
			else
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong!');
			}
			
			redirect("main_category");
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function delete_cateogry()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->where('mc_id',$this->uri->segment(2));
			$this->db->delete('main_category');
			$this->session->set_flashdata('message', 'Main Category Deleted Successfully!');
			redirect("main_category");
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}