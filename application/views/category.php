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
			<?php echo $total_rows;  ?> results found			
               </span>
               
                                          </div>
         </div>
         
 
            
         <div class="col-md-7 text-md-right">
         
         <div class="row mt-3 mt-md-0">
         
       
            
         <div class="col-6 col-lg-7 pr-0 ">
         
           <div class="btn-group btn-block" style="display:none" id="displayfilterbtn">
               <a href="javascript:void(0);" class="btn btn-outline-secondary rounded-0" onclick="switchfilters();"><i class="fa fa-sliders"></i> Filters</a>
            </div>
            
         
         </div>
        
         <div class="col-4 col-6 col-lg-5">
         
         
          <div class="btn-group btn-block" id="displaysortbybtn">
               <button id="btnGroupDrop1" type="button" class="btn btn-outline-secondary sortbybtn dropdown-toggle  rounded-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="pr-3">Sort By: <span class="sortbytitle font-weight-bold"></span> </span>
               </button>
               <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
               
               
                                  <a href="javascript:void(0);" onclick="addnewfilter('s6','s');" id="sortfilter-s6" class="dropdown-item">Price (Highest)</a>  
                  <a href="javascript:void(0);" onclick="addnewfilter('s6a','s');" id="sortfilter-s6a"class="dropdown-item">Price (Lowest)</a>  
                                 
                                     <a href="javascript:void(0);" onclick="addnewfilter('at2','s');" id="sortfilter-s8" class="dropdown-item">Auction Ending (Newest)</a>
                  
                  <a href="javascript:void(0);" onclick="addnewfilter('at1','s');" id="sortfilter-s7" class="dropdown-item">Auction Ending (Oldest)</a>
                  
                                    <a href="javascript:void(0);" onclick="addnewfilter('s4','s');"  id="sortfilter-s4" class="dropdown-item">Featured Listings (Top)</a>
                  <a href="javascript:void(0);" onclick="addnewfilter('s1','s');" id="sortfilter-s1" class="dropdown-item">Title (A-z)</a>
                  <a href="javascript:void(0);" onclick="addnewfilter('s1a','s');" id="sortfilter-s1a" class="dropdown-item">Title (Z-a)</a>            
                  <a href="javascript:void(0);" onclick="addnewfilter('s2','s');" id="sortfilter-s2" class="dropdown-item">Date Added (Newest)</a>
                  <a href="javascript:void(0);" onclick="addnewfilter('s2a','s');"  id="sortfilter-s2a" class="dropdown-item">Date Added (Oldest)</a>
                  <a href="javascript:void(0);" onclick="addnewfilter('s3','s');" id="sortfilter-s3" class="dropdown-item">Popularity (Most)</a>
                  <a href="javascript:void(0);" onclick="addnewfilter('s3a','s');"  id="sortfilter-s3a" class="dropdown-item">Popularity (Least)</a>
                 
               </div>
            </div>
         </div>
          
         
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
<?php if($posts) { ?>
				<?php foreach($posts as $res) { ?>		
<div class="listing-list-item auction <?php if(count($posts)>2) { echo "w-lg-20 ";} else { echo "w-lg-25 "; } ?>clearfix map-item" data-marker-id="485"><div class="listing-wrap">
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
            	<ul class="pagination justify-content-center">
					<?php echo $links; ?>
				</ul>     
				</div>
				</div>
         </div>
      </div>
   </div>
</section>

</main>

  
<?php include "footer.php";?>