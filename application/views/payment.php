<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php"; ?>
<main id="main">
      <div class="container">
      <section>
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <form id="loginform" class="loginform ajax_modal" action="<?php echo site_url("stripe/payment"); ?>" method="post" >
         
         <div class="text-center titleblock">
            <h4 class="title">Pay For Bids</h4>
            <p class="subtitle">Please Enter Valid Card Detail And Get Bids.</p>
         </div>
         <div class="line bg-primary">&nbsp;</div>
         <div class="modal-body mt-2">
            <div class="row gap-20">
                              <div class="col-xs-12 col-sm-12 col-md-12">
				<?php if($this->session->flashdata('message')){ ?>
				<div id="msgsuccess" class="alert alert-success">
				     <?php echo $this->session->flashdata('message'); ?>
				</div>
				<?php } ?>  
				<?php if($this->session->flashdata('message2')){ ?>
				<div id="msgsuccess2" class="alert alert-danger">
				     <?php echo $this->session->flashdata('message2'); ?>
				</div>
				<?php } ?> 
				  <div id="msgfail" class="alert alert-danger payment-status">
				     
				  </div>
				   <h3 class="panel-title">&nbsp;&nbsp;&nbsp;Charge $<?php echo $bid_rate[0]->bid_rate; ?> with Stripe</h3>
				   <div style="visibility: hidden">
			   Stripe
			   </div>
                  <div class="form-group">
                     <input type="text" class="form-control" name="card_number" id="card_number" value="" title="Card Number"  maxlength="16" placeholder="Card Number - 1234123412341234" required="required">
                     <span class="help-block"></span>
                  </div>
               </div>
			   <div class="col-xs-4 col-sm-4 col-md-4">
			   <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" maxlength="2" value="" title="MM"  placeholder="MM" required="required">
			   <span class="help-block"></span>
			   </div>
			   <div class="col-xs-4 col-sm-4 col-md-4">
			   <input type="text" class="form-control" name="card_exp_year" id="card_exp_year" maxlength="4" value="" title="YYYY"  placeholder="YYYY" required="required">			
			   <span class="help-block"></span>
			   </div>
			   <div class="col-xs-4 col-sm-4 col-md-4">
			   <input type="text" class="form-control" name="card_cvc" id="card_cvc" maxlength="3" value="" title="CVC"  placeholder="CVC" required="required">			
			   <span class="help-block"></span>
			   </div>
               <div style="visibility: hidden">
			   Stripe
			   </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">		
                     <button type="submit" name="payBtn" id="payBtn" class="btn btn-primary btn-block rounded-0 py-3" style="cursor:pointer;">
                     <i class="fa fa-money" aria-hidden="true"></i>
                     Stripe Pay</button>
                  </div>
               </div>			   
            </div>
         </div>
      </form>
   </div>
</div>
      </section>
         </div>
</main>
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>
<script>
$(document).ready(function(){
$('button.close').hide();
$('#msgfail').hide();
});
// Set your publishable key
Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payBtn').removeAttr("disabled");
        // Display the errors on the form
        $(".payment-status").html('<p>'+response.error.message+'</p>');
		$('#msgfail').show();
    } else {
        var form$ = $("#loginform");
        // Get token id
        var token = response.id;
        // Insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        // Submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    // On form submit
    $("#loginform").submit(function() {
        // Disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
		
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#card_number').val(),
            exp_month: $('#card_exp_month').val(),
            exp_year: $('#card_exp_year').val(),
            cvc: $('#card_cvc').val()
        }, stripeResponseHandler);
		
        // Submit from callback
        return false;
    });
});
</script>
<?php include "footer.php"; ?>