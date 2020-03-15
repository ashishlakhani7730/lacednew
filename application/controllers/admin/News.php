<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("news_feed");
			$query = $this->db->get();
			$data['news'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/news",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function add_news()
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
						redirect('news');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["img1"] = $uploadedImage['file_name'];
					} 
			}
			
			if(!isset($image["img1"]))
			{
				$image["img1"] = "news.png";
			}
			
			$add_feed = array(
								"image" => $image["img1"],
								"news_line" => $this->input->post("n_caption"),
						  );
			
			$this->db->set('creadted', 'NOW()', FALSE);
			$this->db->insert("news_feed",$add_feed);
			$id = $this->db->insert_id();
			
			if($id)
			{
				$this->session->set_flashdata('message', "News Added Sucessfully");
				redirect('news');
			}
			else
			{
				$this->session->set_flashdata('message2', "Somthing Went To Wrong");
				redirect('news');
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function delete_news()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			if($this->uri->segment(2))
			{
				$query = $this->db->select("*")->from("news_feed")->where("n_id",$this->uri->segment(2))->get();
				$images = $query->result(); 
			
				//echo "<pre>"; print_r($images); exit;
				if($images[0]->image != "news.png")
				{
					unlink("assets/img/".$images[0]->image);
				}
				$delete = array("n_id"=>$this->uri->segment(2));
				
				$this->db->where($delete);
				$this->db->delete('news_feed');
				$del = ($this->db->affected_rows() != 1) ? false : true;
				
				if($del)
				{
					$this->session->set_flashdata('message', "News Deleted Sucessfully");
					redirect('news');
				}
				else
				{
					$this->session->set_flashdata('message2', "Somthing Went To Wrong");
					redirect('news');
				}
			}
		}
		else
		{
			redirect('admin/Login');
		}
	}
}