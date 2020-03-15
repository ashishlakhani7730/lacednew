<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<main id="main">
    <section>
    <div class="modal-dialog " role="document">
   <div class="modal-content">
      <form name="registerform" id="registerform" action="" method="post">               
         <div class="text-center titleblock">
            <h4 class="title">New Member</h4>
            <p class="subtitle">Create your free account now and enjoy all of the member benefits.</p>
         </div>
         <div class="line bg-primary">&nbsp;</div>
         <div class="modal-body">
            <div class="row">
               <hr class="dashed" />
               <div class="col-xs-12 col-md-12">
				  <div id="msgsuccess" class="alert alert-success">
				     
				  </div>
				  
				  <div id="msgfail" class="alert alert-danger">
				     
				  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="text" name="user_name" id="user_name" tabindex="3" value="" class="form-control" placeholder="*Username">                 
                        </div>
                     </div>
                  </div>
               </div>
                  
               <div class="col-xs-12 col-md-12">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="text" name="user_email" id="user_email" tabindex="4" value="" class="form-control" placeholder="*Email">                 
                        </div>
                     </div>
                  </div>
               </div>
                      
				<div class="col-xs-12 col-md-12">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="password" name="password" id="user_password" tabindex="4" value="" class="form-control" placeholder="*Password">                 
                        </div>
                     </div>
                  </div>
               </div>
			   
			   <div class="col-xs-12 col-md-12">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <input type="password" name="user_con_password" id="user_con_password" tabindex="4" value="" class="form-control" placeholder="*Con-password">                 
                        </div>
                     </div>
                  </div>
               </div>
	        <div>
         </div>        
            <div class="clearfix"></div>
           
         <div class="modal-footer text-center">
            <button type="button" name="wp-submit" id="wp-submit-register" class="btn btn-primary btn-block rounded-0 py-3">Register</button>
         </div>
      </form>
   </div>
</div>
</section>
</main><!-- end main -->
<script>
	$(document).ready(function() {
		$('#msgsuccess').hide();
		$('#msgfail').hide();
    });
	
	$(document).on('click', '#wp-submit-register' ,function(){
			$.ajax({
				type: "POST",
				url: '<?php echo site_url("register/member"); ?>',
				data: {
					username: $("#user_name").val(),
					email: $("#user_email").val(),
					password: $("#user_password").val(),
					copassword: $("#user_con_password").val()
				},
				datatype:"json",
				success: function(result) {
						if(result.code)
						{
							$("#user_name").val('');
							$("#user_email").val('');
							$("#user_password").val('');
							$("#user_con_password").val('');

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