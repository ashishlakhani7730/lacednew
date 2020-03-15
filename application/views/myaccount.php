<?php include "header.php";?>
<div class="user-header page-content-block bg-white text-dark">
   <div class="page-content-title content-top border-bottom">
      <div class="container">
         <div class="image">
            <img alt='' src='<?php echo base_url()."assets/img/".$user[0]->img; ?>' class='avatar img-fluid userphoto avatar-180 photo' />
         </div>
         <div class="user-details text-center text-md-left ">
            <div class="row">
               <div class="col-lg-5 col-12">
                  <span class="username">Welcome back, <?php echo $user[0]->username; ?>!</span> 
                  
                  <div class="clearfix mt-4"></div>
                  
                   
                  <span class="badge badge-dark"><i class="fa fa-gavel" aria-hidden="true"></i> No Of Bids - <?php echo $user[0]->bids; ?></span>                   
                  <span class="mx-lg-1" style="opacity:0.5">&bull;</span>
                                    
                       
                  <a onclick="SwitchPage('membership');" href="javascript:void(0);">
				  <?php if($user[0]->bids == 0) { ?>
                                    <span class="badge badge-info"><i class="fa fa-user mr-1"></i> no membership</span>
				  <?php } else { ?>									
									<span class="badge badge-info"><i class="fa fa-user mr-1"></i>member</span>
				  <?php } ?>
                                    </a>                  
                  <span class="mx-lg-1" style="opacity:0.5">&bull;</span>
                                    
                  <span class="onlinebadge online text-dark badge border px-2 bg-white"><i class="fa fa-circle text-success"></i> Online</span>                  
                  
                  <div class="my-3 small">
                     <i class="fa fa-user-circle" aria-hidden="true"></i> Joined <?php echo date('d/m/Y h:i a', strtotime($user[0]->created));  ?></div>                  
               
               </div>
               <div class="col-lg-7 col-12 d-none d-lg-block  text-right">
                   
               </div>
            </div>
         </div>
      </div>
   </div>				 
</div>
<main id="main" class="py-4 py-md-5" >
   <div class="container">   
<div class="row">
<div class="col-12 col-lg-12 pagemiddle border-top">
    <div class="content-wrapper">
		  <?php if(validation_errors()) { ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo validation_errors(); ?>
					</div>
				<?php } ?>
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
<form method="post" action="<?php echo base_url()."update_profile";?>" enctype="multipart/form-data">
   <input type="hidden" name="userimage" value="<?php echo $user[0]->img; ?>" />
   <div id="html_element"></div>
      <div class="row">
	  <div class="col-12 col-md-6">
         <div class="controls mb-3"> 
			<label><b>User Photo</b></label>
            <input type="file" class="form-control" name="userimage" id="userimage">
         </div>
      </div>
	  <div class="col-12 col-md-6">
         <div class="controls mb-3"> 
			<label><b>User Name</b></label>
            <input type="text" class="form-control" name="username" id="username" value="<?php echo $user[0]->username; ?>" required="required">
         </div>
      </div>
      <div class="col-12 col-md-6">
         <div class="controls mb-3"> 
			<label><b>First Name</b></label>
            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $user[0]->fname; ?>"  required="required">
         </div>
      </div>
      <div class="col-12 col-md-6">
         
         <div class="controls mb-3"> 
		 <label><b>Last Name</b></label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user[0]->lname; ?>"  required="required">
         </div>
      </div>
      <div class="col-12 col-md-6">
        
         <div class="controls mb-3">
		 <label><b>Email Address</b></label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user[0]->email; ?>"  required="required">
         </div>
      </div>
	  <div class="col-12 col-md-6">
         <div class="controls mb-3"> 
		     <label><b>Mobile No</b></label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $user[0]->mobile; ?>"  required="required">
         </div>
      </div>
      <div class="col-12">
         
         <div class="controls mb-3">
		 <label><b>Shipping Address</b></label>
            <textarea name="shipping" class="form-control" id="shipping" style="height:150px; width:100%;"  required="required"><?php echo $user[0]->shipping_address; ?></textarea>
         </div>
      </div>
      <div class="col-12">
         <button type="submit" id="btncontactform" class="btn btn-primary btn-block rounded-0 py-2 px-3">Save Member</button>	
      </div>
            <div class="col-12 my-3 "> 
      </div>
   </div>
</form>          
    </div>    
    </div>
</div>
</div>
</main>
<?php include "footer.php";?>