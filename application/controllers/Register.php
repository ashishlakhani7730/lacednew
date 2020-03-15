<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('register');
	}
	
	public function new_member()
	{
		$response = array();
		
		$uppercase = preg_match('@[A-Z]@', $this->input->post("password"));
		$lowercase = preg_match('@[a-z]@', $this->input->post("password"));
		$number    = preg_match('@[0-9]@', $this->input->post("password"));

		if($this->input->post("username") == "")
		{
			$response['code'] = 0;
			$response['message'] = "Please Enter Username";
		}
		else if(!preg_match('/^[A-z0-9]+$/',$this->input->post("username")))
		{
			$response['code'] = 0;
			$response['message'] = "Username Must Be Character or Number";
		}
		else if($this->input->post("email") == "")
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
		else if($this->input->post("copassword") == "")
		{
			$response['code'] = 0;
			$response['message'] = "Please Enter Con-password";
		}
		else if(!$uppercase || !$lowercase || !$number || strlen($this->input->post("copassword")) < 8)
		{
			$response['code'] = 0;
			$response['message'] = "Con-password Must Be Below Format<br> at least 8 characters <br> at least 1 number <br> one uppercase character <br> one lowercase character";
		}
		else if($this->input->post("password") != $this->input->post("copassword"))
		{
			$response['code'] = 0;
			$response['message'] = "Password And Con-password Not Match";
		}
		else
		{
			$this->load->model("Register_model");
			$username = $this->Register_model->username_exists($this->input->post("username"));
			$email = $this->Register_model->mail_exists($this->input->post("email"));
			
			if($username)
			{
				$response['code'] = 0;
				$response['message'] = "This Username Already Register";
			}
			else if($email)
			{
				$response['code'] = 0;
				$response['message'] = "This Email Address Already Register";
			}
			else
			{
				$insertdata= array(
									"username" => $this->input->post("username"),
									"password" => md5($this->input->post("password")),
									"email"    => $this->input->post("email")
							 );
				
				$insert = $this->Register_model->insertdata($insertdata);
				
				if($insert)
				{
					$user = $this->Register_model->getUser($insert);
					//echo "<pre>"; print_r($user); exit;
					
					//set user session.
					$this->session->set_userdata("c_id",$user[0]->c_id);
					$this->session->set_userdata("username",$user[0]->username);
					$this->session->set_userdata("email",$user[0]->email);
					$this->session->set_userdata("bids",$user[0]->bids);
					
					$response['code'] = 1;
					$response['message'] = "Register Successfully";
				}
				else
				{
					$response['code'] = 0;
					$response['message'] = "Somthing Went To Wrong";
				}
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
}