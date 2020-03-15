<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
	  <section class="content">
      <div class="row">
        <div class="col-12">
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Product Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Pro_image</th>
				  <th>Pro_name</th>
                  <th>Pro_price</th>           
				  <th>Start_date</th>
				  <th>End_date</th>
				 <!-- <th>Update</th> -->
				  <th>More Info</th>
                </tr>
                </thead>
                <tbody>
				<?php if($bidproduct) { ?>
				<?php $cnt = 1; ?>
				<?php foreach($bidproduct as $pro) { ?>
                <tr>               
				  <td><img src="<?php echo base_url()."uploads/product/".$pro->pro_image1; ?>" width="50px" height="50px"></td>
				  <td><?php echo $pro->pro_name; ?></td>
				  <td><?php echo $pro->pro_price; ?></td>
				   <td><?php echo $pro->start_time; ?></td>
				  <td><?php echo $pro->end_time; ?></td>
				  <td><button id="more<?php echo $cnt++ ?>" type="button" class="btn btn-primary" onclick="getbiding(<?php echo $pro->p_id; ?>)">More</button></td>
                </tr>    
                <?php } ?>		
				<?php } else { ?>
				<tr>
					<td colspan="6">
						Record Not Found!
					</td>
				</tr>
				<?php } ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	  </div>
	</div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
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
<?php include "footer.php"; ?>
<script>
  $(function () {
    $("#example1").DataTable();
  });
  
	function getbiding(p_id)
	{
		$.ajax({
				url: '<?php echo site_url("bid_lists") ?> ',
				type: 'post',
				dataType: 'json',
				data: {p_id:p_id},
				success: function(json) {
					
					if(json.code == 1)
					{
							$("#bid-body").empty();
							htmls = "<div class='row'><div class='col-sm-12'>";
							htmls += "<table width='100%'>";
							htmls += "<th>User Profile</th><th>User</th><th>Size</th><th>Bid Price</th><th>Winner</th><th>Shipping Info</th>";	
							
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
									htmls += "<td>"+json.datas[dt].shipping_address+"</td>";
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
									htmls += "<td>"+json.datas[dt].shipping_address+"</td>";
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