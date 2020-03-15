<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<main id="main" class="py-4 py-md-5" >
   <div class="container">   
<div class="row">
<div class="col-12 col-lg-12 pagemiddle ">
<div id="main-inner">
    <div class="content-wrapper">
    <div id="pagetitletop">
   <div class="row mb-5 border-bottom pb-5">
      <div class="col-md-7">
          
         <h1 class="mb-4">Memberships</h1>
         <p class="lead">Subscribe to one of our membership packages below and full access to our website!</p>
         <p>If you have any questions or queries, please use our contact page to get in touch!</p>
               </div>
      <div class="col-md-5">
         <div style="position:relative;">             
            <img src="<?php echo base_url()."assets/"; ?>premiumpress.com/_demoimages/pagetitle/title-default.jpg" alt="Contact Us" class="img-fluid"> 
            <div style="position:absolute; top:0;">
               <img src="<?php echo base_url()."assets/"; ?>wp-content/themes/AT9/framework/img/overlay.png" alt="OVERLAY" class="img-fluid">
            </div>
         </div>
      </div>
   </div>
</div>    <style>
.contactform2 input.form-control, .contactform2 textarea { color:#637381; background-color: rgba(99,115,129,0.06);
    border-color: rgba(99, 115, 129, 0.15);
    border-width: 1px 1px 1px 1px;
    border-radius: 0px 0px 0px 0px;  padding: 6px 16px; }
.contactform2 input.form-control { height: 50px; }
</style>
<section class="pricingblock">
 
   <!-- setup package array for jquery -->
   <script>var mem = [];</script>
   
    
                     
            
            
  <div class="package-posts py-4 col-12 bg-light">
            <div class="row">
               <div class="col-md-3 box-price text-center">
               
               
               
                <div class="text-success text-center h1">$<?php echo $bid_rate[0]->bid_rate; ?></div>
            	<div class="h6 text-center" id="pdaystext0">No Bids - <?php echo $bids[0]->num_bids; ?></div>
               
               
               
               </div>
               <div class="col-md-6 text-left box-desc">
              
              
              
              
              <h5 class="mb-3"> Membership </h5>
              
                                       <p class="small text-muted mt-4">Purchase bid by you get <?php echo $bids[0]->num_bids; ?> bids by rate $<?php echo $bid_rate[0]->bid_rate; ?> using payment details below.</p>
                        
            <ul class="fa-ul my-4">
            </ul>
               </div>
               <div class="col-md-3 box-btn">
             
				  <?php if($this->session->userdata("c_id") && $this->session->userdata("username") && $this->session->userdata("email")) { ?>
                  <a class="btn btn-success text-uppercase btn-block font-weight-bold mt-2" id="btn-mem1"  href="<?php echo site_url("Payment"); ?>">Select Package</a></div>
				  <?php } else { ?>
				  <a class="btn btn-success text-uppercase btn-block font-weight-bold mt-2" id="btn-mem2"  href="<?php echo site_url("Login"); ?>">Select Package</a></div>
				  <?php } ?>
			   </div>
            </div>
            
            <script>
            mem[0] = {
            	name:"Free Membership", 
            	price:"$0", 
            	time:"24 Hours", 
            	listings:"0",
				expirydate:"31 January , 2020 9:09 am",
            };
         </script>                                 
</section>
<script>
   function UpdateTCA(){					 
		if(jQuery('#agreetc').is(':checked') ){                        	
			jQuery('#btncontactform').removeAttr("disabled");
		}else{
			jQuery('#btncontactform').attr("disabled", true);                       
		} 					 
	}
   function CheckFormData()
   {
   
   
   var name 	= document.getElementById("name"); 
   var email1 	= document.getElementById("email1");
   var code = document.getElementById("code");
   var message = document.getElementById("message");	 
   			
   if(name.value == '')
   {
   	alert('Please complete all required fields.');
   	name.focus();
   	name.style.border = 'thin solid red';
   	return false;
   }
   if(email1.value == '')
   {
   	alert('Please complete all required fields.');
   	email1.focus();
   	email1.style.border = 'thin solid red';
   	return false;
   }
   
   
   if(code.value == '')
   {
   	alert('Please complete all required fields.');
   	code.focus();
   	code.style.border = 'thin solid red';
   	return false;
   } 
   
   if(message.value == '')
   {
   	alert('Please complete all required fields.');
   	message.focus();
   	message.style.border = 'thin solid red';
   	return false;
   } 			
   
   return true;
   }
</script>               
    </div>    
    </div></div>
</div>
</div>
</main>  
<script>
jQuery(document).ready(function() {
 $(".verticalmenu-content").css("display", "none");
});
</script>
<?php include "footer.php"; ?>