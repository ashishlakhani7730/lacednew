<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("c_id") && $this->session->userdata("username") && $this->session->userdata("email")) 
		{
			$this->db->select("*");
			$this->db->from("package_bid_rate");
			$que = $this->db->get();
			$data["bid_rate"] = $que->result();
		
			$this->load->view('payment',$data);
		}
		else
		{
			redirect(site_url("Login"));
		}
	}
	
	public function pay()
	{
		if($this->session->userdata("c_id") && $this->session->userdata("username") && $this->session->userdata("email")) 
		{
			if(!empty($this->input->post('stripeToken')))
			{
				// Retrieve stripe token, card and user info from the submitted form data 
				$token  = $this->input->post('stripeToken');				
				$card_number = $this->input->post('card_number'); 
				$card_exp_month = $this->input->post('card_exp_month'); 
				$card_exp_year = $this->input->post('card_exp_year'); 
				$card_cvc = $this->input->post('card_cvc'); 
					
					
				// Include Stripe PHP library 
				require_once FCPATH.'stripe/init.php';
				
						// Set API key 
				\Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
				 
				// Add customer to stripe 
				$customer = \Stripe\Customer::create(array( 
					'email' => $this->session->userdata("email"), 
					'source'  => $token 
				)); 
				 
				// Unique order ID 
				$orderID = strtoupper(str_replace('.','',uniqid('', true))); 
				
				$this->db->select("*");
				$this->db->from("package_bid_rate");
				$que = $this->db->get();
				$bid_rate = $que->result();
				
				$itemPrice = $bid_rate[0]->bid_rate;
				
				// Convert price to cents 
				$itemPrice = ($itemPrice*100); 
				$currency = "usd"; 
				$itemName = "Bids Package";
				// Charge a credit or a debit card 
				$charge = \Stripe\Charge::create(array( 
					'customer' => $customer->id, 
					'amount'   => $itemPrice, 
					'currency' => $currency, 
					'description' => $itemName, 
					'metadata' => array( 
						'order_id' => $orderID 
					) 
				)); 
				 
				// Retrieve charge details 
				$chargeJson = $charge->jsonSerialize(); 
			 
				// Check whether the charge is successful 
				if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
				{ 
					$add_card = array(
								"c_id"=>$this->session->userdata("c_id"),
								"card_number"=>$card_number,
								"card_exp_month"=>$card_exp_month,
								"card_exp_year"=>$card_exp_year,
								"card_cvc"=>$card_cvc
								);
					
					$trancation = array(
								  "c_id" =>$this->session->userdata("c_id"),
								  "trans_id" => $chargeJson['balance_transaction'],
								  "amount" => $bid_rate[0]->bid_rate
								  );
								  
					$this->load->model("Payment_model");
					$card_found_already = $this->Payment_model->get_card($this->session->userdata("c_id"));
					
					if(!$card_found_already)
					{
						$this->Payment_model->add_card($add_card);
					}
					
					$this->Payment_model->add_transaction($trancation);
					
					$this->db->select("*");
					$this->db->from("package_bids");
					$que = $this->db->get();
					$bidss = $que->result();
					
					$this->load->model("Register_model");
					$bids = $this->Register_model->getUser($this->session->userdata("c_id"));
					
					$updatebids = $bidss[0]->num_bids + $bids[0]->bids;
					
					$updatedata = array("bids"=>$updatebids);
					
					$this->load->model("Payment_model");			
					$this->Payment_model->update_bids($this->session->userdata("c_id"),$updatedata);
					$this->session->set_userdata('bids', $updatebids);
					// Order details  
					$transactionID = $chargeJson['balance_transaction']; 
					$paidAmount = $chargeJson['amount']; 
					$paidCurrency = $chargeJson['currency']; 
					$payment_status = $chargeJson['status']; 
					
					$this->session->set_flashdata('message', 'Payment Successfully and Transaction  id - '.$transactionID);
					redirect(site_url("Payment"));
				}
			}
			else
			{
				$this->session->set_flashdata('message2', 'Somthing Went To Wrong');
				redirect(site_url("Payment"));
			}
		}
		else
		{
			redirect(site_url("Login"));
		}
		
		
		
		
		/* for admin panel side use this code.
		$token  = $this->input->post('stripeToken');				
		$card_number = $this->input->post('card_number'); 
		$card_exp_month = $this->input->post('card_exp_month'); 
		$card_exp_year = $this->input->post('card_exp_year'); 
		$card_cvc = $this->input->post('card_cvc'); 
		
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
		  'amount' => 2000,
		  'currency' => 'usd',
		  'source' => $token['id'],
		  'description' => 'My First Test Charge (created for API docs)',
		]);

		$chargeJson = $charge->jsonSerialize();
		echo "<pre>"; print_r($chargeJson); exit;
		*/
	}
}