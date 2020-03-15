<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if($this->uri->segment(1) == "Home" || $this->uri->segment(1) == "") { ?>
<script>
   $(document).ready(function() {
    
   	// SHOW MENU
   	$('.verticalmenu-content').fadeToggle();
     
    });
</script>

<?php } ?>

<footer><div class="elementor_footer footerpart footer-top4 py-3 bg-dark text-light mt-5 ">
   <div class="container">
      <div class="row my-4">
         <div class="col-md-6 col-lg-4 d-none d-md-block d-lg-block">
            <h3>Have a question? <br> contact us!</h3>
            <a href="<?php echo site_url('contact_us');?>" class="btn btn-outline-secondary btn-lg mt-3">Contact Us</a>
			
         </div>
         <div class="col-md-4 d-none d-lg-block">
            <h6 class="text-uppercase font-weight-bold mb-3">Useful Links</h6>
            <ul class="links clearfix mb-0 pr-lg-5">
               <li><a href="<?php echo site_url('my_account');?>">My Account</a></li>
               <li><a href="<?php echo site_url('how_it_works');?>">How Its Works</a></li>
               <li><a href="<?php echo site_url('about_us');?>">About Us</a></li>
               <li><a href="<?php echo site_url('contact_us');?>">Contact</a></li>
            </ul>
         </div>
		 <div class="col-md-4 d-none d-lg-block">          
            <ul class="links clearfix mb-0 pr-lg-5">
			 <h6 class="text-uppercase font-weight-bold mb-3">Useful Links</h6>
               <li><a href="<?php echo site_url('p_policys');?>">Privacy policy</a></li>
               <li><a href="<?php echo site_url('t_and_cs');?>">Terms and conditions</a></li>
				<li class="text-right"><button class="btn btn-primary scroll-top" data-scroll="up" type="button">
<i class="fa fa-chevron-up"></i>
</button></li>			   
            </ul>
			
         </div>
      </div>
   </div>
</div><div class="elementor_footer footerpart bg-dark text-light border-top ">
<div class="container py-3">
    
    <div class="row">    
    <div class="col-md-6 text-center text-md-left">
   		<div class="copy mt-2 text-uppercase">&copy; 2020 LACED</div>   
    </div>
    <div class="col-md-6 hide-mobile">    
             
          <div class="sicons float-md-right">
                                  <a class="social" target="_blank" href="https://twitter.com/golaced"><i class="fa fa-twitter"></i></a>
                                  
                                   <a class="social" target="_blank" href="https://www.instagram.com/golaced/"><i class="fa fa-instagram"></i></a>
                                    
                                   <!-- <a class="social" target="_blank" href="#"><i class="fa fa-facebook"></i></a> 
                                    
                                    <a class="social" target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                                    
                                    <a class="social" target="_blank" href="#"><i class="fa fa-skype"></i></a>
                                    
                                    <a class="social" target="_blank" href="#"><i class="fa fa-youtube"></i></a>  -->
                              </div>        
    </div>
    </div> 
</div>
</div> </footer>
</div><!-- end page -->

<div id="core_footer_ajax"></div>
<!-- Quick View Modal -->
<div id="quickview" class="modal fade" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div id="quickview-content"></div>
   </div>
</div>
<!-- end quick view modal -->
<noscript id="deferred-styles">
</noscript>

    <script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
      };
      var raf = requestAnimationFrame || mozRequestAnimationFrame ||
          webkitRequestAnimationFrame || msRequestAnimationFrame;
      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
      else window.addEventListener('load', loadDeferredStyles);
    </script>
 


<div class="auction_search_timer_layout" style="display:none;"> 
        <di class="box-count-down">
        <span class="countdown-lastest is-countdown">
        <span class="box-count"><span class="number">{dn}</span><span class="text">Days</span></span>
        <span class="dot">:</span>
        <span class="box-count"><span class="number">{hnn}</span> <span class="text">Hrs</span></span>
        <span class="dot">:</span>
        <span class="box-count"><span class="number">{mnn}</span> <span class="text">Mins</span></span>
        <span class="dot">:</span>
        <span class="box-count"><span class="number">{snn}</span> <span class="text">Secs</span></span>
        </span>
        </di>
</div> 


<div id="ajaxLoginModal" class="modal fade login-modal-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;"></div>
<div id="ajaxRegisterModal" class="modal fade login-modal-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;"></div>
<div id="ajaxSearchModal" class="modal fade search-modal-wrapper" data-width="500" data-backdrop="static" data-keyboard="false" tabindex="-1" style="display: none;"></div>


<div class="auction_search_timer" style="display:none;">
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
<script>
//count_down_js is used.
$('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
    $this.html(event.strftime('%D days %H:%M:%S'));
  });
});

	var $modal = $('#ajaxLoginModal');

	$(document).on('click', '.btn-ajax-login' ,function(){
		// create the backdrop and wait for next modal to be triggered
	  
		$('body').modalmanager('loading');

		setTimeout(function(){
			 $modal.load('index7e3b.html?core_aj=1&amp;action=loginform', '', function(){
				$modal.modal();
			});
		}, 1000);
	});
	
	var $modal2 = $('#ajaxRegisterModal');

	$(document).on('click', '.btn-ajax-register' ,function(){
		// create the backdrop and wait for next modal to be triggered
	  
		$('body').modalmanager('loading');

		setTimeout(function(){
			 $modal2.load('index6eda.html?core_aj=1&amp;action=registerform', '', function(){
				$modal2.modal();
			});
		}, 1000);
	});
 
	var $modal1 = $('#ajaxSearchModal');

	$(document).on('click', '.btn-ajax-search' ,function(){
		// create the backdrop and wait for next modal to be triggered
	  
		$('body').modalmanager('loading');

		setTimeout(function(){
			 $modal1.load('index6592.html?core_aj=1&amp;action=searchform', '', function(){
				$modal1.modal();
			});
		}, 1000);
 	
		
	});

</script>

     <script>
	 
	 function ajax_ontick_auction(hours, minutes, seconds, postid){
	 
	  
	  if(hours == 0 && minutes == 0 && seconds > 30 ){
	  //console.log('more than' +minutes + " - " + seconds + ' - ' +postid);
	  
	  $('.itemid'+postid+' .hasCountdown').removeClass('flash-red').addClass('flash-orange').stop().fadeTo('slow', 0.1).fadeTo('slow', 1.0);
	  
	  }else if (hours == 0 && minutes == 0 && seconds > 0 && seconds < 30 ){
	  //console.log('less than' +minutes + " - " + seconds + ' - ' +postid);
	  
	  $('.itemid'+postid+' .hasCountdown').removeClass('flash-orange').addClass('flash-red').stop(true).fadeTo('slow', 0.1).fadeTo('slow', 1.0);
	  
	  }  
	 
	 }
	 
	function ajax_expire_auction(postid) {
		
			$.ajax({
				type: "POST",
				url: 'https://at9.premiummod.com/',
				data: {
					action: "expire_check_listing",
					pid: postid,
				},
				success: function(e) {
				   // alert(e);
				   
				   // REMOVE BLINKING
				   $('.itemid'+postid+' .hasCountdown').stop(true).removeClass('flash-orange').removeClass('flash-red').addClass('flash-grey');				   
				   
				   // ADD IN CUSTOM TEXT
				   $('.itemid'+postid+' .btn-bid').html("ended");
				  
				   // HIDE BUY NOW BOX				   
				   $('.itemid'+postid+' .btn-bid').addClass('btn-ended').removeClass('btn-bid');
			 
				},
				error: function(e) {
					//alert("error" + e)
				}
			})
		}
		
$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $('.scroll-top').fadeIn();
    } else {
      $('.scroll-top').fadeOut();
    }
  });

  $('.scroll-top').click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, 100);
      return false;
  });

});
	</script>

<script src="<?php echo base_url()."assets/"; ?>wp-content/themes/AT9/framework/js/backup_js/js.bootstrap2333.js?ver=9.4.0"></script>
<script src="<?php echo base_url()."assets/"; ?>wp-content/themes/AT9/framework/js/backup_js/js.framework2333.js?ver=9.4.0"></script>
<script src="<?php echo base_url()."assets/"; ?>wp-content/themes/AT9/framework/js/backup_js/js.framework.js?ver=9.4.0"></script>
<script src="<?php echo base_url()."assets/"; ?>kit.fontawesome.com/5381299f202333.js?ver=9.4.0"></script>
<script> var ajax_site_url = "index.html"; </script>
</body>
</html>