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
					<section class="py-5 bg-white">
						<div class="container">
							    <div class="col-md-12 mb-4">
								     <div class="ctitle1 ">
									     <h5>USER BIDS HISTORY</h5>
								     </div>      
							    </div>
								<div class="blog3">
									<div class="container-fluid">
										<div class="row">
													<div class="col-lg-12">  
													
												 <?php if($posts) { ?>
												 <?php foreach($posts as $b) { ?>
												 <?php 
														  $cnt = 0;
														  $sql ="SELECT * FROM product where p_id = $b->p_id";
														  $query = $this->db->query($sql);
														  $product = $query->result();								
														  foreach ($product as $pro) 
														  {
												 ?>
												 <div class="card mb-3">
													<div class="card-body">
													<div class="row">
													<div class="col-3 px-0 px-md-2">
													
													<img src="<?php echo base_url()."uploads/product/".$pro->pro_image1; ?>" alt="" data-src="<?php echo base_url()."uploads/product/".$pro->pro_image1; ?>" width="150" height="150" class="wlt_image img-fluid" ></div>
													
													<div class="col-9">
													<div class="blogcontent">
													<h6 class="text-uppercase font-weight-bold">Product name : <?php echo $pro->pro_name; ?></h6>						
													<div class="text-muted  mt-4">Your highest bid : <?php echo $b->bid_price; ?></div>
													<div class="text-uppercase font-weight-bold"><button id="<?php echo $cnt++; ?>" type="button" class="btn btn-primary" onclick="getbiding(<?php echo $b->p_id; ?>)" >Click Here To Bid List</button></div>
													<div class="text-muted  "><a href="<?php echo base_url()."product_detail/".$b->p_id; ?>" >Click Here Go To This Product</a></div>
													</div>
													</div>
													</div>               
													</div>
												 </div>
												 <?php } } ?>
											     <?php } else { ?>
												 <div><h3>No Any Record Found</h3></div>
												 <?php } ?>
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
				</div>
			</div>
		</div>			
	</div>
</main>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title">Bidding List</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div id="bid-body" class="modal-body">
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
  
<?php include "footer.php";?>

<script>
function getbiding(p_id)
	{
		$.ajax({
				url: '<?php echo site_url("bid_list") ?> ',
				type: 'post',
				dataType: 'json',
				data: {p_id:p_id},
				success: function(json) {
					
					if(json.code == 1)
					{
							$("#bid-body").empty();
							htmls = "<div class='row'><div class='col-sm-12'>";
							htmls += "<table width='100%'>";
							htmls += "<th>User Profile</th><th>User</th><th>Size</th><th>Bid Price</th><th>Winner</th>";	
							
							for(var dt=0;dt<json.datas.length;dt++)
							{
								if(json.datas[dt].img == '' || json.datas[dt].img == null) 
								{
									htmls += "<tr><tr><td><img src='<?php echo base_url().'assets/img/default.png'; ?>' height='50' width='50'></td><td><span style='vertical-align: middle; '>"+json.datas[dt].username+"</span></td><td>"+json.datas[dt].size+"</td><td>"+json.datas[dt].bid_price+"</td>";
									if(json.datas[dt].winner == 0)
									{
										htmls += "<td>NO</td>";
									}
									else
									{
										htmls += "<td>Yes</td>";
									}
									htmls += "</tr>";		
								}
								else
								{
								    
									htmls += "<tr><tr><td><img src='<?php echo base_url().'assets/img/'; ?>"+json.datas[dt].img+"' height='50' width='50'></td><td><span style='vertical-align: middle'>"+json.datas[dt].username+"</span></td><td>"+json.datas[dt].size+"</td><td>"+json.datas[dt].bid_price+"</td>";	
									if(json.datas[dt].winner == 0)
									{
										htmls += "<td>NO</td>";
									}
									else
									{
										htmls += "<td>Yes</td>";
									}
									htmls += "</tr>";
								}
							}
							
							htmls += "<table>";
							htmls += "</div></div>";
							
							$("#bid-body").html(htmls);
							$('#myModal').modal('show');
					}
					else if(json.code == 0)
					{
						$("#msgsuccess").html('<strong>'+json.message+'</strong>');
						$("#msgsuccess").show();
						setTimeout(function(){
							$("#msgsuccess").hide();
						}, 8000);
					}
				}
			});
	}
</script>