<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_detail extends CI_Controller {
	
	public function index()
	{
		if($this->uri->segment(2))
		{
			//echo $this->uri->segment(2); exit;
			$this->db->select("*");
			$this->db->from("product");
			$this->db->where("p_id",$this->uri->segment(2));
			$que = $this->db->get();
			$data["product_detail"] = $que->result();
			
			$this->db->select_max('bid_price');
			$this->db->from("auction_bid");
			$this->db->where("p_id",$this->uri->segment(2));
			$que2 = $this->db->get();
			$data["bid_price"] = $que2->result();
			
			$this->db->select("ab.bid_price,c.username");
			$this->db->from("auction_bid ab");
			$this->db->join('customer c', 'ab.c_id = c.c_id');
			$this->db->where("p_id",$this->uri->segment(2));
			$this->db->order_by("bid_id", "desc");
			$que = $this->db->get();
			$data["total_row"] = $que->num_rows();
			$data["bid_detail"] = $que->result();
			
			
			$this->db->select('product.*,COUNT(auction_bid.p_id) as nbis');
			$this->db->from('product');
			$this->db->join('auction_bid', 'product.p_id = auction_bid.p_id','left')->group_by('product.p_id');
			$this->db->order_by("rand()");
			$this->db->limit(15);
			$que=$this->db->get();
			$data["c_product_detail"] = $que->result();
			
			//echo "<pre>"; print_r($data); exit;
			$this->load->view('prodetail',$data);
		}
		else
		{
			redirect("error");
		}
	}
	
	public function letest_bid()
	{
		$this->db->select_max('bid_price');
		$this->db->from("auction_bid");
		$this->db->where("p_id",$this->input->post("p_id"));
		$que2 = $this->db->get();
		$row2 = $que2->result();
		echo $row2[0]->bid_price;
	}
	
	public function all_bids()
	{
		$this->db->select("ab.bid_price,c.username");
		$this->db->from("auction_bid ab");
		$this->db->join('customer c', 'ab.c_id = c.c_id');
		$this->db->where("p_id",$this->input->post('p_id'));
		$this->db->order_by("bid_id", "desc");
		$que = $this->db->get();
		$row = $que->num_rows();
		$row2 = $que->result();
		
		echo '<li class="list-group-item lotid">TOTAL BIDS<span class="badge bg-primary text-light badge-pill">'.$row.'</span></li>';
		foreach($row2 as $bd) 
		{
			echo '<li class="list-group-item bids">'.$bd->username.'<span class="badge bg-primary text-light badge-pill">$'.$bd->bid_price.'</span></li>';
		}
	}
	
	public function bid()
	{
		$response = array();
		if($this->input->post("prosize") == "")
		{
			$response["code"] =0;
			$response["msg"] = "Please Enter Product Size";
		}
		else if($this->input->post("bid_amount") == "")
		{
			$response["code"] =0;
			$response["msg"] = "Please Enter Bid Amount";
		}
		else if(!preg_match("/^[1-9][0-9]*$/",$this->input->post('bid_amount')))
		{
			$response["code"] =0;
			$response["msg"] = "Bid Amount Must Be Number Only";	
		}
		else if($this->input->post("p_id") == "")
		{
			$response["code"] =0;
			$response["msg"] = "Please Select Valid Product";
		}
		else if($this->input->post("c_id") == "") 
		{
			$response["code"] =0;
			$response["msg"] = "Member Not Login Please Login First - <a href='".base_url()."Login'><strong> Click Here To Login<strong></a>";
		}
		else if($this->session->userdata("bids") == 0)
		{
			$response["code"] =0;
			$response["msg"] = "Please Purchase Bids By - <a href='".base_url()."membership'><strong> Click Here To Membership<strong></a>";	
		}
		else
		{
			$this->db->select("*");
			$this->db->from("customer");
			$this->db->where("c_id",$this->input->post("c_id"));
			$que = $this->db->get();
			$row = $que->result();
			
			$this->db->select_max('bid_price');
			$this->db->from("auction_bid");
			$this->db->where("p_id",$this->input->post("p_id"));
			$que2 = $this->db->get();
			$row2 = $que2->result();
			
			//echo "<pre>"; print_r($row2); exit;
			if($row[0]->shipping_address == "")
			{
				$response["code"] =0;
				$response["msg"] = "Please Enter Member Shipping Address - <a href='".base_url()."update_profile'><strong> Click Here To Add Shipping Address<strong></a>";
			}
			else if($row2[0]->bid_price == "")
			{
				$insertdata = array(
									"c_id"=>$this->input->post("c_id"),
									"p_id"=>$this->input->post("p_id"),
									"bid_price"=>$this->input->post('bid_amount'),
									"size"=>$this->input->post("prosize"),
							  );
							  
				$this->load->model("Product_model");
				$insert = $this->Product_model->insertdata($insertdata);
				
				$bids = $row[0]->bids - 1;
				
				$updatedata = array("bids"=>$bids);
				
				$this->load->model("Payment_model");			
				$this->Payment_model->update_bids($this->session->userdata("c_id"),$updatedata);
				
				$this->session->set_userdata('bids', $bids);
				
				if($insert)
				{
					$response["code"] =1;
					$response["msg"] = "Your Bid Place Successfully";
					$response["msg2"] = $bids;
				}
				else
				{
					$response["code"] =0;
					$response["msg"] = "Somthing Went To Wrong Please Try Again!";
				}
			}
			else if($this->input->post('bid_amount')>$row2[0]->bid_price)
			{
				$insertdata = array(
									"c_id"=>$this->input->post("c_id"),
									"p_id"=>$this->input->post("p_id"),
									"bid_price"=>$this->input->post('bid_amount'),
									"size"=>$this->input->post("prosize"),
							  );
				$this->load->model("Product_model");
			    $insert = $this->Product_model->insertdata($insertdata);
				
				$bids = $row[0]->bids - 1;
				
				$updatedata = array("bids"=>$bids);
				
				$this->load->model("Payment_model");			
				$this->Payment_model->update_bids($this->session->userdata("c_id"),$updatedata);
				
				$this->session->set_userdata('bids', $bids);
				
				if($insert)
				{
					$response["code"] =1;
					$response["msg"] = "Your Bid Place Successfully";
					$response["msg2"] = $bids;
				}
				else
				{
					$response["code"] =0;
					$response["msg"] = "Somthing Went To Wrong Please Try Again!";
				}
			}
			else
			{
				$response["code"] =0;
				$response["msg"] = "Latest Bid Price Is - ".$row2[0]->bid_price." Please Enter New Bid Price Greater Then This Price.";
			}
		}
		echo json_encode($response);
	}
}