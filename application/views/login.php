<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<main id="main">
      <div class="container">
      <section>
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <form id="loginform" class="loginform ajax_modal" action="<?php echo site_url("member/login"); ?>" method="post" >
         <input type="hidden" name="testcookie" value="1" /> 
         <input type="hidden"  name="rememberme" id="rememberme"  value="1" /> 
         <button type="button" class="close modalclose" data-dismiss="modal" aria-label="Close" onclick="jQuery('.modal-backdrop').hide();" style="cursor:pointer;">
         <span aria-hidden="true">&times;</span>
         </button>
         <div class="text-center titleblock">
            <h4 class="title">Members Area</h4>
            <p class="subtitle">Please sign-in to access this page and enjoy the other member benefits.</p>
         </div>
         <div class="line bg-primary">&nbsp;</div>
         <div class="modal-body mt-2">
            <div class="row gap-20">
                              <div class="col-xs-12 col-sm-12 col-md-12">
							  <div id="msgsuccess" class="alert alert-success">
				     
				  </div>
				  
				  <div id="msgfail" class="alert alert-danger">
				     
				  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" name="email" id="user_email" value="" title="Please enter you Email"  placeholder=" Email 
                        ">
                     <span class="help-block"></span>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                     <input type="password" class="form-control" name="password" id="user_pass" value="" title="Please enter your password" placeholder="Password">
                     <span class="help-block"></span>
                  </div>
               </div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">		
                     <button type="button" name="wp-submit" id="wp-submit" class="btn btn-primary btn-block rounded-0 py-3" style="cursor:pointer;">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     Member Login                     </button>
                  </div>
               </div>
			   <div class="col-xs-12 col-sm-12 col-md-12">
				<a href="<?php echo site_url("Register"); ?>">New Member ?</a>
				<a href="<?php echo site_url("Register"); ?>" class="float-right">Forgot Password ?</a>
			   </div>
                           </div>
         </div>
      </form>
   </div>
</div>
      </section>
         </div>
</main>
<script>
$(document).ready(function(){
$('button.close').hide();
$('#msgsuccess').hide();
$('#msgfail').hide();
});

$(document).on('click', '#wp-submit' ,function(){
			$.ajax({
				type: "POST",
				url: '<?php echo site_url("member/login"); ?>',
				data: {
					email: $("#user_email").val(),
					password: $("#user_pass").val()
					
				},
				dataType:"json",
				success: function(result) {
						if(result.code)
						{
							$("#user_email").val('');
							$("#user_pass").val('');

							$('#msgsuccess').html(result.message);
							$('#msgsuccess').show();
							
							setTimeout(function(){ 
								$('#msgsuccess').hide();
							}, 3000);
							
							window.location.href = "<?php echo site_url('Home'); ?>";
						}
						else
						{
							$('#msgfail').html(result.message);
							$('#msgfail').show();
						}
				},
				error: function(error) {
					//alert("error" + error)
					//alert("error" + error)
				}
			});
	});
</script>
<?php include "footer.php";?>