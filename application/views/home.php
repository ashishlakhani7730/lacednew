<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<section class="border-bottom">
   <style>
.hero26 .text-area { position: absolute;  max-width: 400px; padding:20px;  }
.hero26 .text-area img { display:none;}
.hero26 .owl-slider .item img{    display: block;    width: 100%;    height: auto; }
.hero26 .owl-slider .owl-buttons { position:absolute; top:45%;     width: 100%; }
.hero26 .owl-slider .owl-next { float:right; margin-top:-40px;  }
.hero26 .owl-slider .owl-buttons div { text-align: center;    height: 35px; line-height: 30px;    font-size: 30px;    width: 30px;    border-radius: 0px; }
.hero26 .btn { position:relative; min-width:250px; }
.hero26 .text-area .iconb {     position: absolute;    right: 0px;    bottom: 0px;    width: 50px;    line-height: 55px;    border-left: 1px solid #ffffff6e;    text-align: center; } 
@media (max-width: 576px) { 
.hero26 .owl-wrapper-outer { min-height:290px;}
.hero26 .owl-wrapper-outer .btn { display:block; margin: 40px -20px; }
.hero26 .text-area { padding:20px;  }
.hero26 .text-area h1 { font-size:30px; }
.hero26 img { display:none !important;}
#ppt-hero-slider .owl-buttons { display:none; }
.popular-tabs .nav-tabs {    display: none;}
}

@media (min-width: 768px) {
.hero26 .text-area { padding:20px }
}
 
@media (min-width: 992px) { 
.hero26 .text-area {  bottom: 80px;    left: 70px;} 
}
 
</style>


<div class="hero26 pt-3 ">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3">
         </div>
         <div class="col-lg-9 owl-slider px-0 pl-lg-4">
            <div id="ppt-hero26-slider">
            <?php foreach($banner as $bg) { ?>
               <div class="item bg-primary">
                  <div class="text-area">
                     
                     <h1 class="mb-4 text-primary font-weight-bold"><?php echo $bg->caption; ?></h1>
                  </div>
                  <img src="<?php echo base_url()."assets/img/".$bg->image; ?>" class="img-user" alt="welcome" />   
               </div>
            <?php } ?>                                   
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<script>
$(document).ready(function() {
  
	// HERO SLIDER
	$("#ppt-hero26-slider").owlCarousel({    
         navigation : true, // Show next and prev buttons
         slideSpeed : 300,
         paginationSpeed : 400,
         singleItem:true,
   	  	 autoHeight : true,
         navigationText : ["<i class='fa fa-angle-left text-white'></i>","<i class='fa fa-angle-right text-white'></i>"],    
     }); 
   
});  
</script></section>
<section class="border-bottom my-4">
   <style>
.cicons1 .item {    border: 1px solid #dfdfdf;   padding: 10px 7px;    margin-bottom: 15px;    background-color: #fff; 		font-size: 14px;    color: #aaaaaa;}
.cicons1 .item .icon {    width: 66px;    height: 66px;    line-height: 62px;	    float: left;    margin-left: 20px; margin-right:10px;}
.cicons1 .item .fa { font-size: 50px;  }
.cicons1 strong { display:block; font-size: 16px;    font-weight: bold; text-transform:uppercase; color: #333333;     margin-top: 5px; }

</style>
<div class="cicons1">
 
      <div class="row">
         <div class="col-lg-3 col-6 col-md-6 d-none d-md-block d-md-lg">
            <div data-wow-duration="1s" class="wow bounceInUp animated item">  
               <span class="icon">
               <i class="fa fa-bullhorn text-secondary"></i>
               </span>
               <strong>Big Savings</strong>
               <span>Saving Upto Product</span>
            </div>
         </div>
         
         <div class="col-lg-3 col-12 col-sm-6">
            <div data-wow-duration="1.5s" class="wow bounceInUp animated item">  
               <span class="icon">
               <i class="fa fa-cube text-secondary"></i>
               </span>
               <strong>Buy Items</strong>
               <span>Get your stuff here</span>
            </div>
         </div>
      
         <div class="col-lg-3 col-12 col-sm-6">
            <div data-wow-duration="2s" class="wow bounceInUp animated item">
               <span class="icon">
               <i class="fa fa-user-circle text-secondary"></i>
               </span>
               <strong>Join Free</strong>
               <span>Get started today!</span>
            </div>
         </div>
         
         <div class="col-lg-3 col-6 col-md-6">
            <div data-wow-duration="2s" class="wow bounceInUp animated item d-none d-md-block d-md-lg">  
               <span class="icon">
               <i class="fa fa-support text-secondary"></i>
               </span>
               <strong>24/7 Support</strong>
               <span>Always here to help</span>
            </div>
         </div>
      </div>
</div>
 </section>
<section class="py-5 bg-white border-bottom">
   <div class="container">
      <div class="col-md-12 mb-4">
         <div class="ctitle1 ">
<h5>AUCTIONS</h5>
<h1>Don't miss out!</h1>
</div>      </div>
      <div class="col-12">
         <div class="row wlt_search_results">
            <div class='listing-list-wrapper small-list clearfix'>
<?php if($result) { ?>
				<?php foreach($result as $res) { ?>		
<div class="listing-list-item auction <?php if(count($result)>2) { echo "w-lg-20 ";} else { "w-lg-25 "; } ?> clearfix map-item" data-marker-id="485"><div class="listing-wrap">
   <div class="image">
      <figure class="mb-0">
         <a href="<?php echo base_url()."product_detail/".$res->p_id; ?>" class="wlt_image_link"><img src="<?php echo base_url()."uploads/product/".$res->pro_image1; ?>" alt="" data-src="https://premiumpress.com/_demoimages/auction2/8-1.jpg" class="wlt_image img-fluid" ></a> 
      </figure>
            <!--<div class="listing-list-featured">
         Featured      </div> -->
         </div>
   <div class="absolute-top ">
      <div class="listing-grid-category bg-primary hide-small-list"><span class='wlt_shortcode_category'><a href='listing-category/music/index.html' class=''>Music</a></span></div>
      <div class="listing-grid-category bg-primary show-small-list text-white font-weight-bold">$<?php echo $res->pro_price; ?></div>
   </div>
   <div class="content">
      <a href="listing/auction-36/index.html" class="text-dark">
         <h5 class="mb-3">Auction 36</h5>
      </a>
      <div class="microbot clearfix">
      
         <div> <i class="fa fa-hand-paper-o"></i> <span class="block"> <?php echo $res->nbis; ?> bids </span></div>
         <div> <i class="fa fa-clock-o"></i> <span class="block"> 
          <?php if($res->end_time == "0000-00-00 00:00:00") { ?>
		 <div data-countdown=""></div>
		 <?php }else{ ?>
         <div data-countdown="<?php echo $res->end_time; ?>"></div>
		 <?php } ?>
              <!-- <div class="countdowntimer text-danger">
      <span 
         data-ppt-countdown="<?php echo $res->end_time; ?>" 
         data-postid="485" 
         data-expire="ajax_expire_auction" 
         data-timezone="0" 
                  data-ontick="ajax_ontick_auction"></span>
          </div> -->
      		
 
         
         </span>  </div>
        
      </div>
            <p class="location">
      
       
         <span>$<?php echo $res->pro_price; ?></span> <span class="mx-lg-1">&bull;</span>
         <span><?php echo $res->nbis; ?> bids</span> <span class="mx-lg-1">&bull;</span>
         <span>126 views </span> 
         
         
               
            <span class="mx-lg-1">&bull;</span> <img src="<?php echo base_url()."assets/"; ?>wp-content/themes/AT9/framework/img/medal.png" alt="power seller" style="margin-top:-5px" />
                  </p>
 
      <p class="desc"><span class='wlt_shortcode_excerpt' >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque cons</span> </p>
      <span class="fav-like"><span class='wlt_shortcode_favs'><a id="button_favs_a48527041579672554204" class="list_favorites_add "  href="wp-login7eaf.html?action=login&amp;redirect_to=https://at9.premiummod.com/listing/auction-36/"><i class="fa fa-heart-o"></i> <span></span></a></span></span>        
   </div>
   <div class="absolute-right-top hide-ipad">
      <div class="relatrive">
      
               <div class="countdowntimer text-danger">
      <span 
         data-ppt-countdown="<?php echo $res->end_time; ?>" 
         data-postid="485" 
         data-expire="ajax_expire_auction" 
         data-timezone="0" 
                  data-layout="auction_search_timer"
                  data-ontick="ajax_ontick_auction"></span>
          </div>
      		
 
         
         <div class="pricebox">
            <div class="mt-3">$<?php echo $res->pro_price; ?></div>
         </div>
      </div>
   </div>
   <div class="absolute-right-bottom hide-ipad">
      <a href="listing/auction-36/index.html" class="btn btn-primary btn-block btn-sm">More Details</a>
   </div>
</div>
</div>

<?php } ?>
				<?php } else { ?>
				<h1>No any Product Found!</h1>
				<?php } ?>





</div> 
         </div>
      </div>
      <div class="col-12">
         <div class="text-center py-3">
            <a href="<?php echo site_url('live_product'); ?>" class="btn btn-primary btn-lg px-5 shadow">View More</a>
         </div>
      </div>
   </div>
</section>

<section class="py-5 bg-white">
<div class="container">
      <div class="col-md-12 mb-4">
         <div class="ctitle1 ">
<h5>LATEST NEWS</h5>
<h1>Stay updated!</h1>
</div>      </div>
<div class="blog3">
<div class="container-fluid">
<div class="row">
            <div class="col-lg-12">  
            
         <?php if($news) {?>  
		 <?php foreach($news as $ne) { ?>
         <div class="card mb-3">
            <div class="card-body">
            <div class="row">
            <div class="col-3 px-0 px-md-2">
			
            <img src="<?php echo base_url()."assets/img/"; ?><?php echo $ne->image; ?>" alt="" data-src="<?php echo base_url()."assets/"; ?><?php echo $ne->image; ?>" width="150" height="150" class="wlt_image img-fluid" ></div>
            
			<div class="col-9">
            <div class="blogcontent">
            <h6 class="text-uppercase font-weight-bold"><?php echo $ne->news_line; ?></h6>
            <div class="text-muted small mt-4"><?php echo $ne->creadted; ?></div>
            </div>
            </div>
            </div>               
            </div>
         </div>
         <?php } } else { ?>
				<h1>No any News Found!</h1>
		 <?php } ?>
		 </div></div></div></div>
</section> 
<?php include "footer.php"; ?>