<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php";?>
<?php if($product_detail) { ?>
<main id="main" class="py-4 py-md-5" >
   <div class="container">
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title">! Warning</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
            <div id="msgsuccess" class="alert alert-warning">
			
			</div>
			<div id="msgsuccess2" class="alert alert-success">
			
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>   
		<div class="row">
			<div class="col-12 col-lg-8 pagemiddle ">
				<div id="main-inner">
					<select class="form-control my-4" id="mobile-submenu" onchange="selectWidgetBox(this.value)">
					   <option value="#widget-maindetails">Show Description</option>
					</select>
						<div class="widget" id="widget-single-images" data-title="Photos">
							<div class="listing-list-featured">
								new arrival      
							</div>
							<div class="widget-heading"><h1 class="mb-3 h1-md"><?php echo $product_detail[0]->pro_name; ?></h1></div>
							<div class="mb-3 subtitle-list">
								<ul class="d-flex list-unstyled">
									<li ><i class="fa fa-eye"></i>Please Click On Image To Display More And Other Images</li>
								</ul>
							</div>   
							<div class="widget-body">
							<div class="text-center p-5 border bg-light mb-2">
							<a href='<?php echo base_url()."uploads/product/".$product_detail[0]->pro_image1; ?>' data-gal='prettyPhoto[ppt_gal_494]'><img src='<?php echo base_url()."uploads/product/".$product_detail[0]->pro_image1; ?>' alt='' class='img-fluid'  height="300px" width="300px" /></a>
							<a href='<?php echo base_url()."uploads/product/".$product_detail[0]->pro_image2; ?>' data-gal='prettyPhoto[ppt_gal_494]'></a>
							<a href='<?php echo base_url()."uploads/product/".$product_detail[0]->pro_image3; ?>' data-gal='prettyPhoto[ppt_gal_494]'></a>
							<a href='<?php echo base_url()."uploads/product/".$product_detail[0]->pro_image4; ?>' data-gal='prettyPhoto[ppt_gal_494]'></a>
							<a href='<?php echo base_url()."uploads/product/".$product_detail[0]->pro_image5; ?>' data-gal='prettyPhoto[ppt_gal_494]'></a>
							</div>
							</div>
						</div>
						<div id="widget-maindetails">
							<div class="widget-single">
							<div class="widget-title mt-md-2">
							  <span class='wlt_shortcode_favs'><a id="button_favs_a49412101579672633782" class="list_favorites_add float-right btn btn-sm btn-outline-dark"  href="../../wp-logind85a.html?action=login&amp;redirect_to=https://at9.premiummod.com/listing/auction-45/"><span>Add Favorites</span></a></span>          
								 <h6>Description</h6>
							</div>
						<div class="pb-3"><p><?php echo $product_detail[0]->pro_des; ?></p></div>
						<div class="p-4 card my-5 rounded-0 border-0 bg-light" style="position:relative; overflow:hidden">
							 <i class="fa fa-map-marker" aria-hidden="true" style="    font-size: 150px;    position: absolute;    right: -10px;    opacity: 0.1;"></i>
							 <h5>This item can be shipped to you!</h5>
							 <p class="mt-2">The laced will ship this item to you once payment has been recieved.</p>
							 <p class="small">The item will be shipped from US, shipping charges are dicussed between you and the laced.</p>
						</div>
						<div id="ajaxRatingModal" class="modal fade search-modal-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;"></div>

							</div>
						</div>
				</div>
			</div>
			<aside class="sidebar-listingcol-12 col-lg-4">
				<div class="widget" id="widget-buybox" data-title="Bidding Options">
				  <div class="widget-title">
					  <i class="fa fa-hand-paper-o float-right mt-1"></i>
					  <h6>Bidding</h6>
				  </div>
				  <div id="buybox-timer" class="mb-4 clearfix"></div>
					<div id="auction_timer_layout_single_side" style="display:none;">
					   <di class="box-count-down">
						  <span class="countdown-lastest is-countdown">
						  <span class="box-count bg-primary"><span class="number">{dn}</span><span class="text">Days</span></span>
						  <span class="dot">:</span>
						  <span class="box-count bg-primary"><span class="number">{hnn}</span> <span class="text">Hrs</span></span>
						  <span class="dot">:</span>
						  <span class="box-count bg-primary"><span class="number">{mnn}</span> <span class="text">Mins</span></span>
						  <span class="dot">:</span>
						  <span class="box-count bg-primary"><span class="number">{snn}</span> <span class="text">Secs</span></span>
						  </span>
					   </di>
					</div>
					<div class="clearfix"></div>
					   <div class="row">
						  <div class="col-12">
							 <span class="h3 font-weight-bold text-center">
								 
								<div id="buybox-price" class="border p-3 bg-light">
								   <span class="buybox-price-symbol h2">$</span>
								   <span class="buybox-price-num h2"><?php echo $product_detail[0]->pro_price; ?></span>
								   <span class="buybox-price-currency">USD</span>
								</div>
								 
							 </span>
						  </div>
					   </div>
					   <?php if($product_detail[0]->pro_sold != 1) { ?>
					   <a href="javascript:void(0);" onclick="$('#biddingarea').slideToggle();" class="btn btn-lg btn-primary btn-block rounded-0 shadow">Bid Now</a>
   
					   <div class="p-4 border bg-light mt-3" id="biddingarea" style="display:none;">
						  <div class="row">
							 <div class="col-12 mb-2">
								<span class="float-right small mt-2 text-muted">Latest Bid</span>            
								<span class="buybox-price-symbol h2">$</span>
								<span class="buybox-price-num h2" id="bid_price"><?php echo $bid_price[0]->bid_price; ?></span>
								<span class="buybox-price-currency">USD</span>            
							 </div>
							 <div class="col-12 ">
								<div class="input-group">
								   <div class="input-group-prepend">
									  <span class="input-group-text">size</span>
								   </div>
								   <input type="text" class="form-control size16 nob" id="prosize"  name="prosize" maxlength="10">
								</div>
							 </div>
							 <div class="col-12 ">
								<div class="input-group">
								   <div class="input-group-prepend">
									  <span class="input-group-text">$</span>
								   </div>
								   <input type="text" class="form-control size16 nob" id="bid_amount"  name="bidamount" maxlength="10">
								</div>
							 </div>
							 <div class="col-12 text-xs-right">
											<button type="button" name="post_bid" id="post_bid" class="btn-bid btn btn-block mt-2 rounded-0 btn-success" >Bid Now</button> 
										 </div>
						  </div>											 
					   </div>
					   <?php } ?>
					   <ul id="t_all_bids" class="list-group list-group-flush my-3">
						  <li class="list-group-item lotid">TOTAL BIDS 
							 <span class="badge bg-primary text-light badge-pill"><?php echo $total_row; ?></span>
						  </li>
						 <?php foreach($bid_detail as $bd) { ?>
						  <li class="list-group-item bids"><?php echo $bd->username; ?> 
							 <span class="badge bg-primary text-light badge-pill">$<?php echo $bd->bid_price; ?></span>
						  </li>
						 <?php } ?>
					   </ul>
				</div>

<input type="hidden" class="ggtd" />
</aside>
</div>
</main>  
<?php } else { ?>
<main id="main" class="py-4 py-md-5" >
<div class="container">   
<div class="row">
<div class="col-12 col-lg-12 pagemiddle ">
<div id="main-inner">
    <div class="content-wrapper">
    <div id="pagetitletop">
    <div class="row mb-5 border-bottom pb-5">
      <div class="col-md-7">  
         <h1 class="mb-4"><h1>Product Not Found</h1></h1>
         <p class="lead"></p>
         <p>Please Try To Find Another Product.</p>
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
</div>    
</div> 
</div> 
</div> 
</div> 
</div> 
<div class="row">
hello
</div>
</main>

<?php } ?>


         <section class="py-5 border-top bg-white hide-mobile" id="nearbylistings">
      <div class="container">
             
 <h3>More Product</h3>
<div style="margin-right:-10px;">
<div class="owl-carousel small-list p-0" id="nearby" data-autoPlay="1" data-items="5" data-stagePadding="10">
<?php if($c_product_detail) { ?>
				<?php foreach($c_product_detail as $res) { ?>		
<div class="listing-list-item auction <?php if(count($c_product_detail)>1) { echo "w-lg-20 ";} else { "w-lg-25 "; } ?>clearfix map-item" data-marker-id="485"><div class="listing-wrap">
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
				<h1>No any Related Product Found!</h1>
				<?php } ?><!-- end item #615 -->
</div>
</div>
 
<script>
$(document).ready(function() {
$("#nearby").owlCarousel({ items : 5, autoPlay : true, loop:true, stagePadding:10, margin:10, });

	// SHOW HIDE BOX IS NO CONTENT	
	 setTimeout(function(){  
		if($('#widget-nearby').height() < 200){ 
			$('#widget-nearby').hide();
		}
	}, 1000);

});	
</script>       </div>
   </section>
<?php include "footer.php";?>
<script>
$(document).ready(function () {
	$("#msgsuccess").hide();
	$("#msgsuccess2").hide();
});

setInterval(function(){ 

$.ajax({
		type: "POST",
		url: '<?php echo site_url("product/letest_bid"); ?>',
		data: {
			p_id: "<?php echo $product_detail[0]->p_id; ?>",
		},
		dataType:"json",
		success: function(result) {
			$("#bid_price").empty();
			$("#bid_price").html(result);
		}
});

}, 10000);

setInterval(function(){ 

$.ajax({
		type: "POST",
		url: '<?php echo site_url("product/all_bids"); ?>',
		data: {
			p_id: "<?php echo $product_detail[0]->p_id; ?>",
		},
		dataType:"html",
		success: function(result) {
			$("#t_all_bids").empty();
			$("#t_all_bids").html(result);
		}
});

}, 15000);
	$(document).on('click', '#post_bid' ,function(){
			$.ajax({
				type: "POST",
				url: '<?php echo site_url("product/bid"); ?>',
				data: {
					p_id: "<?php echo $product_detail[0]->p_id; ?>",
					c_id: "<?php echo $this->session->userdata('c_id'); ?>",
					bid_amount: $("#bid_amount").val(),
					prosize: $("#prosize").val(),
				},
				dataType:"json",
				success: function(result) {
					
					    //$('#myModal').modal('toggle');
						//$('#myModal').modal('show');
						//$('#myModal').modal('hide');
						
						if(result.code)
						{
							$("#prosize").val('');
							$("#bid_amount").val('');
							$("#msgsuccess").hide();
							$("#msgsuccess2").show();
							$("#ses_bids").empty();
							$("#ses_bids").html(result.msg2);
							$('#msgsuccess2').html(result.msg);
							$('.modal-title').empty();
							$('.modal-title').html("Success");
							$('#myModal').modal('show');
						}
						else
						{
							$("#msgsuccess").show();
							$("#msgsuccess2").hide();
							$('#msgsuccess').html(result.msg);
							$('.modal-title').empty();
							$('.modal-title').html("Warning");
							$('#myModal').modal('show');
						}
				},
				error: function(error) {
					//alert("error" + error)
					//alert("error" + error)
				}
			});
	});
</script>