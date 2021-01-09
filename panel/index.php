<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Total Users</p>
                  <?php 
                    $query = "SELECT * FROM `user`";
                    $reslut = $con->prepare($query);
                    $reslut->execute();
                    $count = $reslut->rowCount();
                    ?>
                  <h3 class="card-title"><?php echo $count ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">play_circle_outline</i>
                  </div>
                  <p class="card-category">Videos</p>
                    <?php 
                    $query = "SELECT * FROM `yoga_details`";
                    $reslut = $con->prepare($query);
                    $reslut->execute();
                    $count = $reslut->rowCount();
                    ?>
                  <h3 class="card-title"><?php echo $count?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

  <?php include "includes/footer.php"?>