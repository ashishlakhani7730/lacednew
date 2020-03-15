<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<main id="main" class="py-4 py-md-5" >
 
   <div class="container">   
   	 
<div class="row">



<div class="col-12 col-lg-9 pagemiddle ">
		  <?php if($this->session->flashdata('message')) { ?>
		  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
		  <?php } ?>
		  <?php if($this->session->flashdata('message2')) { ?>
		  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  
                  <?php echo $this->session->flashdata('message2'); ?>
                </div>
		  <?php } ?>
<div id="main-inner">


 
 
    <div class="content-wrapper">
    <div id="pagetitletop">
   <div class="row mb-5 border-bottom pb-5">
      <div class="col-md-7">
          
         <h1 class="mb-4">Contact Us</h1>
         <p class="lead">Fill in the form below and one of our friendly support staff will contact you back ASAP regarding your question or query.</p>
         <p>Please allow up-to 48 hours for a response - thank you!</p>
               </div>
      <div class="col-md-5">
         <div style="position:relative;">             
            <img src="<?php echo base_url()."assets/"; ?>premiumpress.com/_demoimages/pagetitle/title-contact.jpg" alt="Contact Us" class="img-fluid"> 
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
<form  role="form" method="post" action="<?php echo site_url("contact/add_contact"); ?>" class="contactform2">
   <div id="html_element"></div>
      <div class="row">
      <div class="col-12 col-md-6">
         
         <div class="controls mb-3"> 
            <input type="text" class="form-control" name="fname" id="name" placeholder="First Name" required="required">
         </div>
      </div>
      <div class="col-12 col-md-6">
         
         <div class="controls mb-3"> 
            <input type="text" class="form-control" name="lname" id="name1" placeholder="Last Name" required="required">
         </div>
      </div>
      <div class="col-12 col-md-6">
         
         <div class="controls mb-3"> 
            <input type="text" class="form-control" id="email1" name="email1" placeholder="Email" required="required">
         </div>
      </div>
      <div class="col-12 col-md-6">
        
         <div class="controls mb-3">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required="required">
         </div>
      </div>
      <div class="col-12">
         
         <div class="controls mb-3">
            <textarea name="message" class="form-control" id="message" style="height:150px; width:100%;" placeholder="Message" required="required"></textarea>
         </div>
      </div>
         

      <div class="col-12">
         <button type="submit" id="btncontactform" class="btn btn-primary btn-block rounded-0 py-2 px-3">Send Message</button>	
      </div>
           
   </div>
</form>           
    </div>    
        
    </div></div><aside class="sidebar-page  col-12 col-lg-3">


<div class="bg-primary p-4 text-light">

<i class="fas fa-envelope-open-text float-left" style="font-size: 45px;   margin-left:-10px; margin-right: 20px;"></i>

<h4 class="text-uppercase font-weight-bold mb-3">Sign up for Newsletter</h4>
            <p style="font-size:12px;">Sign up to get our latest exclusive updates, deals, offers and promotions.</p>
             


<script>

function ajax_newsletter_signup(){

    $.ajax({
        type: "POST",
        url: '<?php echo site_url("aboutus/newsletter"); ?>',		
		dataType: 'json',
		data: {
            action: "newsletter_join",
			email: $('#wlt_newsletter_mailme1').val(),	 
        },
        success: function(r) {
			
			if(r.status == "ok"){
				$('#newsletterthankyou1').show();
				$('#mailinglist-form1').html('');
			}else{
				$('#mailinglist-form1').html("Email Address Already Exits");
			}
			
        },
        error: function(e) {
            //alert("error "+e)
        }
    });

}
</script>

<div id="newsletterthankyou1" style="display:none" class="newsletter-confirmation txt">
	<div class="h4">Thank you, For Subscribe us.</div>
</div>

<form id="mailinglist-form1" name="mailinglist-form1" method="post" onSubmit="return IsEmailMailinglist();" class="footer-newsletter">
    

<div class="input-group">										 
<input type="text" name="wlt_newsletter_mailme1" id="wlt_newsletter_mailme1" value="" placeholder="Email Address Here.." class="form-control  rounded-0" /> 
<div class="input-group-append">
<button type="submit" class="btn btn-secondary rounded-0 font-weight-bold text-uppercase">Join</button>
</div>	

  					
</div>  

     
        
         
 </form>
<script>
		function IsEmailMailinglist(){
		var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
			var de4 	= document.getElementById("wlt_newsletter_mailme1");
			
			if(de4.value == ''){
			alert("Please enter your email.");
			de4.style.border = 'thin solid red';
			de4.focus();
			return false;
			}
			if( !pattern.test( de4.value ) ) {	
			alert("Invalid Email Address");
			de4.style.border = 'thin solid blue';
			de4.focus();
			return false;
			}
			ajax_newsletter_signup();
		 
		  	return false;
		}		
 </script>
 
 

</div>

    
        

</aside>

</div>

</div>
</main>  
<script>
jQuery(document).ready(function() {
 $(".verticalmenu-content").css("display", "none");
});
</script>
<?php include "footer.php"; ?>