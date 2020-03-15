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
		  <?php if(validation_errors()) { ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo validation_errors(); ?>
					</div>
				<?php } ?>
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
                <h3 class="card-title">Add Product</h3>
              </div>
			  <form id="form1" action="<?php echo base_url()."addproduct"; ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body">
			  <div class="form-group">
                  <label>Select Main Category</label>
                  <select name="main_category_id" id="main_category_id" class="form-control" style="width: 100%;" required="required">
				    <option></option>
					<?php if($main_category) { ?>
						<?php foreach($main_category as $mc) { ?>
							<option value="<?php echo $mc->mc_id; ?>"><?php echo $mc->cat_name; ?></option>
						<?php } ?>
					<?php } else { ?>
					<option>No any Main Category</option>
					<?php } ?>             
                  </select>
                </div>
				<div class="form-group">
                  <label>Select Sub Category</label>
                  <select name="sub_category_id" id="sub_category_id" class="form-control" style="width: 100%;" required="required">
				                 
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img1" class="custom-file-input" id="exampleInputFile" value="<?php echo $up_pro[0]->pro_image1; ?>" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                  
                    </div>
                  </div>
				<div class="form-group">
                    <label for="exampleInputFile">image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img2" class="custom-file-input" id="exampleInputFile" value="<?php echo $up_pro[0]->pro_image2; ?>" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                  
                    </div>
                  </div>
				<div class="form-group">
                    <label for="exampleInputFile">image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img3" class="custom-file-input" id="exampleInputFile" value="<?php echo $up_pro[0]->pro_image3; ?>" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                  
                    </div>
                  </div>
				<div class="form-group">
                    <label for="exampleInputFile">image 4</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img4" class="custom-file-input" id="exampleInputFile" value="<?php echo $up_pro[0]->pro_image4; ?>" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>              
                    </div>
                  </div>
				<div class="form-group">
                    <label for="exampleInputFile">image 5</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img5" class="custom-file-input" id="exampleInputFile" value="<?php echo $up_pro[0]->pro_image5; ?>" required="required">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                    
                    </div>
                  </div>
<div class="form-group">
                    <label for="exampleInputEmail1">Product name</label>
                    <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" value="<?php echo $up_pro[0]->pro_name; ?>" placeholder="Enter Product Name" required="required">
                  </div>
<div class="form-group">
                    <label for="exampleInputEmail1">Product Detail</label>
                    <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="pro_des"  placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required" ><?php echo $up_pro[0]->pro_des; ?></textarea>
              </div>
              <p class="text-sm mb-0">            
              </p>
            </div>
                  </div>
<div class="form-group">
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="text" name="pro_price" class="form-control" id="exampleInputEmail1" value="<?php echo $up_pro[0]->pro_price; ?>" placeholder="Enter Product Price" required="required">
                  </div>
				<!-- Date and time range -->
                <div class="form-group">
                  <label>Start and End range:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="text" name="date" class="form-control float-right" id="reservationtime" value="<?php echo $up_pro[0]->start_time." - ".$up_pro[0]->end_time; ?>" required="required">
                  </div>
                  <!-- /.input group -->
                </div>				  
              </div>
				<div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
<script>
$(document).ready(function () {
	$("#msg1").hide();
	$("#msg2").hide();
});
$('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
});
$("#main_category_id").change(function(){
    $.ajax({
		url:"<?php echo site_url('get_category'); ?>",
		method: 'post',
		data: {main_category_id: $("#main_category_id").val()},
		dataType: 'html',
		success: function(response){
				$("#sub_category_id").empty();
				$("#sub_category_id").append(response);
		}
	});
});
</script>