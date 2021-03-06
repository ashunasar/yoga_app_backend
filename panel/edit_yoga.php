<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Yoga Details</h4>
                  
                </div>
                <div class="card-body"> 
                 <?php
                    if(isset($_GET['edit'])){
                        $id = $_GET['edit'];
                        $query  = "SELECT * FROM `yoga_details` WHERE yoga_details_id=?";
                        $result = $con->prepare($query);
                        $result->execute([$id]);
//                        
//                        while($){
//                            
//                        }
                        $yoga = $result->fetch();
                        ?>
                          <form action="#" method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Yoga Name</label>
                          <input type="text" value="<?php echo $yoga->yoga_name ?>" name="yoga_name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Yoga Instructions</label>
                            <textarea class="form-control"  name="yoga_ins" rows="3" required><?php echo $yoga->instructions?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Yoga Objectives</label>
                            <textarea class="form-control"   name="yoga_obj" rows="3" required><?php echo $yoga->objective?> </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Video URL</label>
                          <input type="text" name="vid_url" value="<?php echo $yoga->video_path?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Video Duration</label>
                          <input type="text" name="vid_dur" value="<?php echo $yoga->video_duration?>" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Image URL</label>
                          <input type="text" name="img_url" class="form-control" value="<?php echo $yoga->thumbnail_path?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Date</label>
                          <input type="text" name="day" class="form-control" value="<?php echo $yoga->day?>" required>
                        </div>
                      </div>
                    </div>
<!--
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                        <button class="btn btn-primary pull-left" disabled>
                        <input type="file" name="img">Upload Image</button>
                        </div>
                      </div>
                    </div>
-->
                    <button name="submit" type="submit" class="btn btn-primary pull-right"> Submit</button>
                    <div class="clearfix"></div>
                  </form>
                        <?php
                        
                    }
                    ?>
                
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

<?php 
if(isset($_POST['submit'])){
//    $day       = $_POST['day'];


$yoga_name = $_POST['yoga_name'];
$yoga_ins = $_POST['yoga_ins'];
$yoga_obj = $_POST['yoga_obj'];
$vid_url = $_POST['vid_url'];
$vid_dur = $_POST['vid_dur'];
$img_url = $_POST['img_url'];
$day = $_POST['day'];
//$img_name = $_FILES['img']['name'];
//$img_tmp = $_FILES['img']['tmp_name'];
//move_uploaded_file($img_tmp,"img/".$img_name);
    
$query = "UPDATE `yoga_details` SET `yoga_name`=:yoga_name,`instructions`=:instructions,`objective`=:objective,`video_path`=:video_path,`video_duration`=:video_duration,`thumbnail_path`=:thumbnail_path,`day`=:day WHERE `yoga_details_id`=:id";
    $reslut = $con->prepare($query);
//    $reslut->execute(['yoga_name'=>$yoga_name,'instructions'=>$yoga_ins,'objective'=>$yoga_obj,'video_path'=>$vid_url,'thumbnail_path'=>"img/$img_name"]);
    $reslut->execute(['yoga_name'=>$yoga_name,'instructions'=>$yoga_ins,'objective'=>$yoga_obj,'video_path'=>$vid_url,'video_duration'=>$vid_dur,'thumbnail_path'=>$img_url,'day'=>$day,'id'=>$id]);
  ?>
  <script>
window.location = 'edit_yoga.php?edit=<?php echo $id?>';
</script>
  <?php
}

?> 

  <?php include "includes/footer.php"?>