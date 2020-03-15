<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata("c_id") && $this->session->userdata("username") && $this->session->userdata("email")) 
		{
			$this->db->select("*");
			$this->db->from("customer");
			$this->db->where("c_id",$this->session->userdata("c_id"));
			$query = $this->db->get();
			$data['user'] = $query->result();
			
			$this->load->view('myaccount',$data);
		}
		else
		{
			redirect("Login");
		}
	}	
	
	public function update_profile()
	{
		//echo "<pre>"; print_r($_FILES); print_r($this->input->post()); exit;
		if($this->session->userdata("c_id") && $this->session->userdata("username") && $this->session->userdata("email")) 
		{
			$image = array();
			if($_FILES['userimage']['error'] == 0)
			{
					$config['upload_path'] = 'assets/img/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['overwrite'] = false;
					$config['remove_spaces'] = true;
					$config['encrypt_name'] = true;
					$config['max_size']	= '2048000';
					
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("userimage"))
					{
						$this->session->set_flashdata('message2', $this->upload->display_errors('', ''));
						redirect('my_account');			
					}
					else 
					{ 
						$uploadedImage = $this->upload->data();
						$image["userimage"] = $uploadedImage['file_name'];
					} 
			}
			else
			{
				$image["userimage"] = $this->input->post("userimage");
			}
			
			$update_profile = array(
									"fname"               => $this->input->post("firstname"),
									"lname"				  => $this->input->post("lastname"),
									"username"            => $this->input->post("username"),
									"email"               => $this->input->post("email"),
									"mobile"              => $this->input->post("mobile"),
									"shipping_address"    => $this->input->post("shipping"),
									"img"                 => $image["userimage"]
							  );
			
			$this->load->model("Register_model");
			$update = $this->Register_model->updatedata($update_profile,$this->session->userdata("c_id"));
			
			if($update)
			{
				$this->session->set_flashdata('message',"Profile Updated Successfully");
				redirect('my_account');
			}
			else
			{
				$this->session->set_flashdata('message2',"Something Went To Wrong");
				redirect('my_account');
			}
		}
		else
		{
			redirect("Login");
		}				  
	}
}