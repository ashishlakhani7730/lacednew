<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_category extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->load->model("admin/Category_model");
			$data["main_category"] = $this->Category_model->getmaincategory();
			$data["category"] = $this->Category_model->getsubcategory();
			//echo "<pre>"; print_r($data); exit;
			$this->load->view("admin/sub_category",$data);
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
			$category = array(
						"mc_id"=>$this->input->post("main_category_id"),
						"sub_cat_name"=>$this->input->post("sub_category")
						);
			$add = $this->Category_model->add_sub_category($category);
			
			if($add)
			{
				$this->session->set_flashdata('message', 'Sub Category Added Successfully!');
			}
			else
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong!');
			}
			
			redirect("sub_category");
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
			$this->load->model("admin/Category_model");
			$data["main_category"] = $this->Category_model->getmaincategory();
			
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where("sc_id",$this->uri->segment(2));
			$query = $this->db->get();
			$data["sub_cat"] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			$this->load->view("admin/update_sub_category",$data);
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
			//echo "<pre>"; print_r($this->input->post()); exit;
			$datas = array(
						"mc_id"=>$this->input->post("main_category_id"),
						"sub_cat_name"=>$this->input->post("sub_cat_name")
					 );
			
			$this->db->set('datetime', 'NOW()', FALSE);
			$this->db->where("sc_id",$this->input->post("sc_id"));
			$this->db->update('sub_category',$datas);
			$update = ($this->db->affected_rows() != 1) ? false : true;
			
			if($update)
			{
				$this->session->set_flashdata('message', 'Sub Category Updated Successfully!');
			}
			else
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong!');
			}
			
			redirect("sub_category");
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
			$this->db->where('sc_id',$this->uri->segment(2));
			$this->db->delete('sub_category');
			$this->session->set_flashdata('message', 'Sub Category Deleted Successfully!');
			redirect("sub_category");
		}
		else
		{
			redirect('admin/Login');
		}
	}
}