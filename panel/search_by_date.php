<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
           <div class="col-md-12">
               <form action="search_by_date.php" method="post">
                    <button name="submit" type="submit" class="btn btn-primary pull-right"> Search</button>
                    <input type="date" style="border-radius: 7px;border: 2px #9830b0 solid;padding: 10px;color: #9229ad;margin-right:15px;float:right;" name="date" required>
                    </form>
           </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Yoga Details</h4>
<!--                  <p class="card-category"> Here is a subtitle for this table</p>-->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                         <th>
                          
                        </th>
                        <th>
                         Yoga Name
                        </th>
                        <th>
                         Date
                        </th>
                        <th>
                          Delete
                        </th>
                        <th>
                          Edit
                        </th>
                        
                      </tr></thead>
                      <tbody>
                      
                    <?php $date = $_POST['date'];
                    $query = 'SELECT yoga_details_id,yoga_name,day FROM `yoga_details` WHERE day LIKE ?';
                    $result = $con->prepare($query);
                    $result->execute(["%$date%"]);
                    while($yoga = $result->fetch()){
                    $yoga_details_id = $yoga->yoga_details_id;
                    $yoga_name = $yoga->yoga_name;
                    $day = $yoga->day;
                    $options = "";
                        $exp =  explode(',',$day);
                        for($i = 0; $i < count($exp) - 1;$i++){
                            $options .= "<option>$exp[$i]</option>";
                            
                        }
                        echo '<tr>';
                        echo "<td><input type='checkbox' onclick='addId(this)' data-id='$yoga_details_id' id='$yoga_details_id'></td>";
                        echo "<td>$yoga_name</td>";
                    
                        echo "<td><select style='all: revert;width: 130px;padding-left: 15px;font-size: 15px;border-radius: 3px;padding-top: 5px;padding-bottom: 5px;color: #932bad;border-color: #9b34b2;padding-right: 10px;'>$options</select></td>";
                        echo "<td><a onclick=\" javascript : return confirm('Are you sure want to delete this?')\" href='shedule.php?delete=$yoga_details_id'>Delete</a></td>";
                        echo "<td><a href='edit_yoga.php?edit=$yoga_details_id'>Edit</a></td>";
                        
                        echo '</tr>';

                    }

                    ?>

                    
<!--                    echo substr($yoga->instructions,0,15);-->
<!--
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Dakota Rice
                          </td>
                          <td>
                            <select name="" id="" style="    all: revert;width: 100px;padding-left: 15px;font-size: 15px;border-radius: 3px;padding-top: 5px;padding-bottom: 5px;color: #932bad;border-color: #9b34b2;padding-right: 10px;">
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                                <option value="Niger">Niger</option>
                            </select>
                            
                             
                          </td>
                          <td>
                            Oud-Turnhout
                          </td>
                          <td class="text-primary">
                            $36,738
                          </td>

                        </tr>
-->
               
                
                      </tbody>
                    </table>
<!--
                    <form action="#" method="post">
                    <input type="text" id='data' hidden name="Id_data" required>
                    <input type="date" style="border-radius: 7px;border: 2px #9830b0 solid;padding: 10px;color: #9229ad;" name="date" required>
                    <button name="submit" type="submit" class="btn btn-primary pull-right"> Submit</button></form>
-->
                  </div>
                <?php 
                    if(isset($_GET['delete'])){
                        $id = $_GET['delete'];
                        $query = "DELETE FROM `yoga_details` WHERE `yoga_details_id`=?";
                        $result = $con->prepare($query);
                        $result->execute([$id]);
                        ?>
                        <script> 
                    
                            window.location = 'shedule.php';
                            
                        </script>
                        <?php
                    }
                    
                    
                    ?>
                
                
                
                </div>
              </div>
            </div>
    
          </div>
        </div>
      </div>
      <script>
                          
                          function addId(id){
                              decider = document.getElementById(id.id);
                              if(decider.checked){
                                 document.getElementById('data').value +=id.getAttribute("data-id")+ ',';
                                 } 
                              if(!decider.checked){
                                
                                  var value = document.getElementById('data').value;
                                  var txt = value.replace(id.getAttribute("data-id")+"," ,"");
                                  console.log(value);
                                  console.log(txt);
                                  document.getElementById('data').value = txt;
                                  
                                 }
                             
                          }
                          </script>
  <?php include "includes/footer.php"?>