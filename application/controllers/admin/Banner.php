<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("banner");
			$query = $this->db->get();
			$data['banner'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/banner",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_banner()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$image = array();
			if($_FILES['img1']['error'] == 0)
			{
					$config['upload_path'] = 'assets/img/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("img1"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('banner');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img1"] = $uploadedImage['file_name'];
					} 
			}
			
			$add_banner = array(
								"image" => $image["img1"],
								"caption" => $this->input->post("b_caption"),
						  );
			
			$this->db->insert("banner",$add_banner);
			$id = $this->db->insert_id();
			
			if($id)
			{
				$this->session->set_flashdata('message', "Banner Added Sucessfully");
				redirect('banner');
			}
			else
			{
				$this->session->set_flashdata('message2', "Somthing Went To Wrong");
				redirect('banner');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function delete_banner()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			if($this->uri->segment(2))
			{
				$query = $this->db->select("*")->from("banner")->where("br_id",$this->uri->segment(2))->get();
				$images = $query->result(); 
			
				//echo "<pre>"; print_r($images); exit;
			
				unlink("assets/img/".$images[0]->image);
			
				$delete = array("br_id"=>$this->uri->segment(2));
				
				$this->db->where($delete);
				$this->db->delete('banner');
				$del = ($this->db->affected_rows() != 1) ? false : true;
				
				if($del)
				{
					$this->session->set_flashdata('message', "Banner Deleted Sucessfully");
					redirect('banner');
				}
				else
				{
					$this->session->set_flashdata('message2', "Somthing Went To Wrong");
					redirect('banner');
				}
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}		
}