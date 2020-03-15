<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->load->model("admin/Category_model");
			$data["main_category"] = $this->Category_model->getmaincategory();
			$this->load->view('admin/add_product',$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function get_category()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where("mc_id",$this->input->post("main_category_id"));
			
			$query = $this->db->get();
			$sub_category = $query->result();

			foreach($sub_category as $sc)
			{
				echo '<option value="'.$sc->sc_id.'">'.$sc->sub_cat_name.'</option>';
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function addproduct()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			//echo "<pre>"; print_r($this->input->post()); exit;
			$image = array();
			if($_FILES['img1']['error'] == 0)
			{
					$config['upload_path'] = 'uploads/product/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("img1"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('add_product');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img1"] = $uploadedImage['file_name'];
					} 
			}
			if($_FILES['img2']['error'] == 0)
			{
					$config['upload_path'] = 'uploads/product/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("img2"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('add_product');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img2"] = $uploadedImage['file_name'];
					} 
			}
			if($_FILES['img3']['error'] == 0)
			{
					$config['upload_path'] = 'uploads/product/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("img3"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('add_product');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img3"] = $uploadedImage['file_name'];
					} 
			}
			if($_FILES['img4']['error'] == 0)
			{
					$config['upload_path'] = 'uploads/product/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("img4"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('add_product');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img4"] = $uploadedImage['file_name'];
					} 
			}
			if($_FILES['img5']['error'] == 0)
			{
					$config['upload_path'] = 'uploads/product/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("img5"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('add_product');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img5"] = $uploadedImage['file_name'];
					} 
			}
			$live_simple = "";
			if($this->input->post("radio1") == "1")
			{
				$date = explode("-",$this->input->post("date"));
				$date1 = date("Y-m-d h:i:s", strtotime($date[0]));
				$date2 = date("Y-m-d h:i:s", strtotime($date[1]));
				$live_simple = 1;
				//echo "<pre>"; print_r($date1); print_r($date2);exit;
			}
			else
			{
				$date1 = "0000-00-00 00:00:00";
				$date2 = "0000-00-00 00:00:00";
				$live_simple = 2;
			}
			
			$addproduct = array(
						  "mc_id"      => $this->input->post("main_category_id"),
						  "sc_id"      => $this->input->post("sub_category_id"),
						  "pro_type"   => $live_simple,
						  "pro_image1" => $image["img1"],
						  "pro_image2" => $image["img2"],
						  "pro_image3" => $image["img3"],
						  "pro_image4" => $image["img4"],
						  "pro_image5" => $image["img5"],
						  "pro_name"   => $this->input->post("pro_name"),
						  "pro_des"    => $this->input->post("pro_des"),
						  "pro_price"  => $this->input->post("pro_price"),
						  "start_time" => $date1, 
						  "end_time"   => $date2,
						  "created"    => date("Y-m-d h:i:s"),
			);
			
			
			//echo "<pre>"; print_r($addproduct);exit;
			
			$this->load->model("admin/Product_model");
			$insert = $this->Product_model->add_product($addproduct);
			
			if($insert)
			{
				$this->session->set_flashdata('message','Product Added Successfully');
				redirect('add_product');
			}
			else
			{
				$this->session->set_flashdata('message2','Somthing Went To Wrong To Add Product');
				redirect('add_product');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
}