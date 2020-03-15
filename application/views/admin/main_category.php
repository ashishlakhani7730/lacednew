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
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
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
			<!-- Input addon -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enter Main Category</h3>
              </div>
			  <form action="<?php echo base_url()."add_main_category"; ?>" method="POST">
              <div class="card-body">
                <div class="input-group">               
                  <input type="text" name="main_category" class="form-control" required="required">             
                </div>       
              </div>
				<div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
			  </form>
              <!-- /.card-body -->
            </div>
		    </div>
		</div>
		<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Main Category Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Main Category Name</th>
                  <th>DateTime</th> 
				  <th>Update</th> 
				  <th>Delete</th> 
                </tr>
                </thead>
                <tbody>
				<?php if($category) { ?>
				<?php foreach($category as $cat) { ?>
                <tr>               
				  <td><?php echo $cat->cat_name; ?></td>
				  <td><?php echo $cat->datetime; ?></td>
				  <td><a href="<?php echo base_url()."main_update/".$cat->mc_id; ?>" class="btn btn-success">Update</a></td>
				  <td><a href="<?php echo base_url()."main_delete/".$cat->mc_id; ?>" class="btn btn-danger">Delete</a></td>
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