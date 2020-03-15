<form action="<?php echo base_url()."addproduct"; ?>" method="POST" enctype="multipart/form-data">
<div class="form-group">
                    <label for="exampleInputFile">image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img1" value="<?php echo set_value('img1'); ?>" class="custom-file-input" id="exampleInputFile1">
                        <label class="custom-file-label" for="exampleInputFile1">Choose file</label>
                      </div>                  
                    </div>
                  </div>
				  
				  <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>

</form>