<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Plan Details</h4>
                  
                </div>
                <div class="card-body">
                  <form action="#" method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Plan Name</label>
                          <input type="text" name="plan_name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Plan Discription</label>
                            <textarea class="form-control" name="plan_discp" rows="3" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Plan Price</label>
                          <input type="text" name="plan_price" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                        <button class="btn btn-primary pull-left" disabled>
                        <input type="file" name="img">Upload Image</button>
                        </div>
                      </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary pull-right"> Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

<?php 
if(isset($_POST['submit'])){
$plan_name  = $_POST['plan_name'];
$plan_discp = $_POST['plan_discp'];
$plan_price = $_POST['plan_price'];
$img_name = $_FILES['img']['name'];
$img_tmp = $_FILES['img']['tmp_name'];
move_uploaded_file($img_tmp,"img/".$img_name);
    
$query = "INSERT INTO `plans` (`plan_id`, `plan_name`, `plan_discp`, `plan_price`, `plan_image`) VALUES (NULL, ?, ?, ?, ?)";
    $reslut = $con->prepare($query);
    $reslut->execute([$plan_name,$plan_discp,$plan_price,"img/$img_name"]);
    
}

?>

  <?php include "includes/footer.php"?>