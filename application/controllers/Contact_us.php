<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {
	
	public function index()
	{
		$this->load->view("contact");
	}
	
	public function add_contact()
	{
		$add_contact = array(
					   "fname"=>$this->input->post('fname'),
					   "lname"=>$this->input->post('lname'),
					   "email"=>$this->input->post('email1'),
					   "mobile"=>$this->input->post('phone'),
					   "message"=>$this->input->post('message')
					   );
					   
		$this->db->set('created', 'NOW()', FALSE);
		$this->db->insert('contact_us',$add_contact);  
		$last_id = $this->db->insert_id();
		
		if($last_id)
		{
			$this->session->set_flashdata('message', "Thanks To Rech Out,We Will Contact You In With In 48 Hours.");
			redirect('contact_us');
		}
		else
		{
			$this->session->set_flashdata('message2', "Somthing Went To Wrong.");
			redirect('contact_us');
		}
	}
}