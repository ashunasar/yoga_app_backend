<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Programme Details</h4>
                  
                </div>
                <div class="card-body">
                  <form action="#" method="post" enctype="multipart/form-data">

                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
<!--                          <label class="bmd-label-floating">Yoga Name</label>-->
                         <select name="day" id="" class="form-control">
                             <option value="select">Select Day</option>
                                <?php for($i=1;$i<=30;$i++){
                                 echo "<option value='day$i'>Day $i</option>";
                                }?>

                         </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Yoga Name</label>
                          <input type="text" name="yoga_name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Yoga Instructions</label>
                            <textarea class="form-control" name="yoga_ins" rows="3" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Yoga Objectives</label>
                            <textarea class="form-control" name="yoga_obj" rows="3" required> </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Video URL</label>
                          <input type="text" name="vid_url" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Image URL</label>
                          <input type="text" name="img_url" class="form-control" required>
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
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

<?php 
if(isset($_POST['submit'])){
$day       = $_POST['day'];
$yoga_name = $_POST['yoga_name'];
$yoga_ins = $_POST['yoga_ins'];
$yoga_obj = $_POST['yoga_obj'];
$vid_url = $_POST['vid_url'];
$img_url = $_POST['img_url'];
//$img_name = $_FILES['img']['name'];
//$img_tmp = $_FILES['img']['tmp_name'];
//move_uploaded_file($img_tmp,"img/".$img_name);
    
$query = "INSERT INTO `new_programme` (`new_programme_id`, `yoga_name`, `instructions`, `objective`, `video_path`, `thumbnail_path`,day) VALUES (NULL, :yoga_name, :instructions,:objective, :video_path, :thumbnail_path , :day)";
    $reslut = $con->prepare($query);
//    $reslut->execute(['yoga_name'=>$yoga_name,'instructions'=>$yoga_ins,'objective'=>$yoga_obj,'video_path'=>$vid_url,'thumbnail_path'=>"img/$img_name"]);
    $reslut->execute(['yoga_name'=>$yoga_name,'instructions'=>$yoga_ins,'objective'=>$yoga_obj,'video_path'=>$vid_url,'thumbnail_path'=>$img_url,'day'=>$day]);
    
}

?>

  <?php include "includes/footer.php"?>