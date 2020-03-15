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
                <h3 class="card-title">Enter News</h3>
              </div>
			  <form action="<?php echo base_url()."add_news"; ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body">
				  <div class="form-group">
                    <label for="exampleInputFile">News image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img1" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                  
                    </div>
                  </div>
                
				<label>Enter News Line</label>
                <div class="input-group"> 				  
                  <input type="text" name="n_caption" class="form-control">             
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
              <h3 class="card-title">News Listing</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Image</th>
				  <th>News_line</th>
				  <th>Date</th>
				  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php if($news) { ?>
				<?php foreach($news as $ban) { ?>
                <tr>               
				  <td><img src="<?php echo base_url()."assets/img/".$ban->image; ?>" width="50" height="50"></img></td>
				  <td><?php echo $ban->news_line; ?></td>
				  <td><?php echo $ban->creadted; ?></td>
				  <td><a href="<?php echo base_url()."news_delete/".$ban->n_id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>    
                <?php } ?>		
				<?php } else { ?>
				<tr>
					<td colspan="3">
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