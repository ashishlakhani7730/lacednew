<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('c_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('bids');
		
		redirect(site_url("Home"));
	}
	
	public function member()
	{
		$response = array();
		
		$uppercase = preg_match('@[A-Z]@', $this->input->post("password"));
		$lowercase = preg_match('@[a-z]@', $this->input->post("password"));
		$number    = preg_match('@[0-9]@', $this->input->post("password"));
		
		if($this->input->post("email") == "")
		{
			$response['code'] = 0;
			$response['message'] = "Please Enter Email";
		}
		else if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$this->input->post("email")))
		{
			$response['code'] = 0;
			$response['message'] = "Please Enter Valid Email Address";
		}
		else if($this->input->post("password") == "")
		{
			$response['code'] = 0;
			$response['message'] = "Please Enter Password";
		}
		else if(!$uppercase || !$lowercase || !$number || strlen($this->input->post("password")) < 8)
		{
			$response['code'] = 0;
			$response['message'] = "Password Must Be Below Format<br> at least 8 characters <br> at least 1 number <br> one uppercase character <br> one lowercase character";
		}
		else
		{
			$this->load->model("Login_model");
			$logindata = $this->Login_model->check_login($this->input->post("email"),md5($this->input->post("password")));
			
			if($logindata)
			{
					//echo "<pre>"; print_r($logindata); exit;
					//set user session.
					$this->session->set_userdata("c_id",$logindata[0]->c_id);
					$this->session->set_userdata("username",$logindata[0]->username);
					$this->session->set_userdata("email",$logindata[0]->email);
					$this->session->set_userdata("bids",$logindata[0]->bids);
					
					$response['code'] = 1;
					$response['message'] = "Login Successfully";
			}
			else
			{
				$response['code'] = 0;
				$response['message'] = "Incorrect Email or Password";
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}