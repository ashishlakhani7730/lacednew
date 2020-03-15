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
                <h3 class="card-title">Update Sub Category</h3>
              </div>
			  <form action="<?php echo base_url()."sub_updated_cateogry"; ?>" method="POST">
              <div class="card-body">
				<div class="form-group">
                  <label>Select Main Category</label>
                  <select name="main_category_id" class="form-control" style="width: 100%;" required="required">
				    <?php if($main_category) { ?>
						<?php foreach($main_category as $mc) { ?>
							<option value="<?php echo $mc->mc_id; ?>" <?php if($mc->mc_id===$sub_cat[0]->mc_id) { echo "selected"; }?>><?php echo $mc->cat_name; ?></option>
						<?php } ?>
					<?php } else { ?>
					<option>No any Main Category</option>
					<?php } ?>             
                  </select>
                </div>
				<label>Enter Sub Category</label>
                <div class="input-group">
				  <input type="hidden" name="sc_id" value="<?php echo $sub_cat[0]->sc_id; ?>">
                  <input type="text" name="sub_cat_name" value="<?php echo $sub_cat[0]->sub_cat_name; ?>" class="form-control" required="required">             
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