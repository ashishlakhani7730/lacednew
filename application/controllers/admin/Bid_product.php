<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_product extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$this->db->select("*");
			$this->db->from("product");
			$this->db->where("p_id IN (SELECT DISTINCT p_id FROM auction_bid where completeauction != 1)", NULL, FALSE);
			//$this->db->order_by("p_id","desc");
			$query = $this->db->get();
			$data['bidproduct'] = $query->result();
			//echo "<pre>"; print_r($data); exit;
			
			$this->load->view("admin/bid_product",$data);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function winner()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			$response = array();

			$this->db->select_max('bid_price');
			$this->db->from("auction_bid");
			$this->db->where('p_id',$this->input->post('p_id'));
			$this->db->where('completeauction',"0");
			
			$query = $this->db->get();
			$list = $query->result();
			
			// getting the Id
			$this->db->where('bid_price',$list[0]->bid_price);
			$this->db->where('p_id',$this->input->post('p_id'));
			$query = $this->db->get('auction_bid');
			$result = $query->result_array();
			$updated_id = $result[0]['c_id'];
			//echo $updated_id;
			
			$this->db->select("*");
			$this->db->from("card_detail");
			$this->db->where("c_id",$updated_id);
			$querys = $this->db->get();
			$stripe = $querys->result();
			
			$card_number =       $stripe[0]->card_number; 
			$card_exp_month =    $stripe[0]->card_exp_month;
			$card_exp_year =     $stripe[0]->card_exp_year; 
			$card_cvc =          $stripe[0]->card_cvc; 
			
			$amount = ($list[0]->bid_price*100);
			require_once FCPATH.'stripe/init.php';
			
			\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

			$token = \Stripe\Token::create([
			  'card' => [
				'number' => $card_number,
				'exp_month' => $card_exp_month,
				'exp_year' => $card_exp_year,
				'cvc' => $card_cvc,
			  ],
			]);
			
			$tokenJson = $token->jsonSerialize();
			
			$charge = \Stripe\Charge::create([
			  'amount' => $amount,
			  'currency' => 'usd',
			  'source' => $token['id'],
			  'description' => 'charge for auction winner admin panel c_id = '.$updated_id,
			]);

			$chargeJson = $charge->jsonSerialize();
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				$this->db->set('winner','1',false);
				$this->db->where('bid_price',$list[0]->bid_price);
				$this->db->where('p_id',$this->input->post('p_id'));
				$this->db->update('auction_bid');
			
				$this->db->set('completeauction','1',false);
				$this->db->where('p_id',$this->input->post('p_id'));
				$this->db->update('auction_bid');
			
				$response['code'] = 1;
				$this->db->set('pro_sold','1',false);
				$this->db->where('p_id',$this->input->post('p_id'));
				$this->db->update('product');
			}
			else
			{
				$response['code'] = 0;
				$response['message'] = "Please Try Again";
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
	public function bidlist()
	{
		if($this->session->userdata('isLoginid') && $this->session->userdata('isLoginusername'))
		{
			
			$response = array();
		
			$this->db->select("ab.bid_price,ab.winner,ab.size,c.img, c.username, c.shipping_address");
			$this->db->from("auction_bid ab");
			$this->db->join('customer c','ab.c_id = c.c_id');
			$this->db->where('ab.p_id',$this->input->post('p_id'));
			$this->db->order_by('ab.bid_price','DESC');
			
			$query = $this->db->get();
			$list = $query->result();
			
			
			if($list)
			{
				$response['code'] = 1;
				$response['datas'] = $list;
			}
			else
			{
				$response['code'] = 0;
				$response['message'] = "Please Try Again";
			}
			
			header('Content-Type: application/json');
			echo json_encode($response);
		}
		else
		{
			redirect('admin/Login');
		}
	}
	
}