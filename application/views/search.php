<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<main id="main" class="py-4 py-md-5" >
 
   <div class="container">   
   	 
<div class="row">



<div class="col-12 col-lg-12 pagemiddle ">
<div id="main-inner">


          
       <div class="searchfiltering text-center text-md-left">

   <div class="border-bottom mb-3 pb-3">
      <div class="row">
         <div class="col-md-5">
 
            <div class="text-muted mt-2">
            <span class="numfound">                     
               </span>
               
                                          </div>
         </div>
           
      </div>
   </div>
   </div>
<section class="py-5 bg-white border-bottom">
   <div class="container">
      <div class="col-md-12 mb-4">
         <div class="ctitle1 ">
</div>      </div>
      <div class="col-12">
         <div class="row wlt_search_results">
            <div class='listing-list-wrapper small-list clearfix'>
<?php if($product) { ?>
				<?php foreach($product as $res) { ?>		
<div class="listing-list-item auction <?php if(count($product)>2) { echo "w-lg-20 ";} else { "w-lg-25 "; } ?>clearfix map-item" data-marker-id="485"><div class="listing-wrap">
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
               <!--<div class="countdowntimer text-danger">
      <span 
         data-ppt-countdown="<?php echo $res->end_time; ?>" 
         data-postid="485" 
         data-expire="ajax_expire_auction" 
         data-timezone="0" 
                  data-ontick="ajax_ontick_auction"></span>
          </div>-->
      		
 
         
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
         </div>
      </div>
   </div>
</section>

</main>

  
<?php include "footer.php";?>