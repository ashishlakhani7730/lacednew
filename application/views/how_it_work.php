<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<main id="main" class="py-4 py-md-5" >
 
   <div class="container">   
   	 
<div class="row">



<div class="col-12 col-lg-9 pagemiddle ">
<div id="main-inner">


    
<div class="content-wrapper">
   <div id="pagetitletop">
   <div class="row mb-5 border-bottom pb-5">
      <div class="col-md-7">
          
         <h1 class="mb-4">How it works</h1>
         <p class="lead">It's quick and easy to get started! Learn how our website works in less than 2 minutes!</p>
         <p>If you have any problems or questions, please don't hesitate to get in touch with our team using the contact page.</p>
               </div>
      <div class="col-md-5">
         <div style="position:relative;">             
            <img src="<?php echo base_url()."assets/img/"?>title-how.jpg" alt="How it works" class="img-fluid"> 
            <div style="position:absolute; top:0;">
               <img src="<?php echo base_url()."assets/img/"?>overlay.png" alt="OVERLAY" class="img-fluid">
            </div>
         </div>
      </div>
   </div>
</div>      
   
   <?php echo $how[0]->h_desc; ?>
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
<?php include "footer.php";?>