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
                <h3 class="card-title">Enter Package Bid Rate</h3>
              </div>
			  <form action="<?php echo base_url()."add_bid_rate"; ?>" method="POST">
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" name="bidrate" value="<?php if(isset($bidrate)) { echo $bidrate[0]->bid_rate; }?>" class="form-control" required="required">             
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
	  </div>
	</div>
</div>
<?php include "footer.php"; ?>