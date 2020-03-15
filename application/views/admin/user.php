<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include "header.php"; ?>
<?php include "navigation.php"; ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">User Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>UserImage</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Mobile</th>
				  <th>Bids</th>
				  <th>Shipping Addres</th>
                </tr>
                </thead>
                <tbody>
				<?php if($user) { ?>
				<?php foreach($user as $us) { ?>
                <tr>
                  <td><img src="<?php echo base_url()."assets/img/".$us->img; ?>" width="50px" height="50px"></img></td>
                  <td><?php if($us->fname == ""){ echo "--"; } else { echo $us->fname; } ?></td>
                  <td><?php if($us->lname == ""){ echo "--"; } else { echo $us->lname; }?></td>
                  <td><?php echo $us->username; ?></td>
                  <td><?php echo $us->email; ?></td>
				  <td><?php if($us->mobile == ""){ echo "--"; } else { echo $us->mobile; }?></td>
				  <td><?php echo $us->bids; ?></td>
				  <td><?php if($us->shipping_address == ""){ echo "--"; } else { echo $us->shipping_address; } ?></td>
                </tr>    
                <?php } ?>		
				<?php } else { ?>
				<tr>
					<td colspan="8">
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
    <!-- /.content -->
  </div>
<?php include "footer.php"; ?>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>