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
				  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php if($product) { ?>
				<?php foreach($product as $pro) { ?>
                <tr>               
				  <td><img src="<?php echo base_url()."uploads/product/".$pro->pro_image1; ?>" width="50px" height="50px"></td>
				  <td><?php echo $pro->pro_name; ?></td>
				  <td><?php echo $pro->pro_price; ?></td>
				   <td><?php echo $pro->start_time; ?></td>
				  <td><?php echo $pro->end_time; ?></td>
				 <!-- <td><a href="<?php echo base_url()."product_update/".$pro->p_id; ?>" class="btn btn-success">Update</a></td>-->
				  <td><a href="<?php echo base_url()."product_delete/".$pro->p_id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>    
                <?php } ?>		
				<?php } else { ?>
				<tr>
					<td colspan="2">
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
<?php include "footer.php"; ?>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>