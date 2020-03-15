<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}
	
	public function logging()
	{
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('admin/login');
		}
		else
		{
			$logindata = array(
							'email' => $this->input->post('email'),
							'password' => md5($this->input->post('password'))
						);
			$this->load->model("admin/Login_Model");			
			$data = $this->Login_Model->loginMatch($logindata);
			
			//print_r($data); exit;
			if(!empty($data))
			{
				$this->session->set_userdata("isLogin",TRUE);
				$this->session->set_userdata("isLoginid",$data[0]->a_id);
				$this->session->set_userdata("isLoginusername",$data[0]->email);
				
				redirect('admin/Home');
			}
			else if(!$data)
			{
				$this->session->set_flashdata('message', 'Email Or Password Is Not Correct!');
				$this->load->view('admin/login');
			}
		}		
	}
	 
	 public function logout()
	 {
		 $this->session->unset_userdata('isLogin'); 
		 $this->session->unset_userdata('isLoginid'); 
		 $this->session->unset_userdata('isLoginusername'); 
		 
		 redirect('admin/Home'); 
	 }
}