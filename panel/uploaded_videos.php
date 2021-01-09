<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
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
                        <tr><th>
                          Yoga Id
                        </th>
                        <th>
                         Yoga Name
                        </th>
                        <th>
                          Instructions
                        </th>
                        <th>
                          Objective
                        </th>
                        <th>
                          Video URL
                        </th>
                        <th>
                          Thumbnail Url
                        </th>
                        <th>
                          Date
                        </th>
                      </tr></thead>
                      <tbody>
                      
                    <?php
                    $query = 'SELECT * FROM `yoga_details`';
                    $result = $con->prepare($query);
                    $result->execute();

                    while($yoga = $result->fetch()){
                    $yoga_details_id = $yoga->yoga_details_id;
                    $yoga_name = $yoga->yoga_name;
                    $instructions = $yoga->instructions;
                    $objective = $yoga->objective;
                    $video_path = $yoga->video_path;
                    $thumbnail_path = $yoga->thumbnail_path;
                    $day = $yoga->day;
                     
                        echo '<tr>';
                        echo "<td>$yoga_details_id</td>";
                        echo "<td>$yoga_name</td>";
                        echo "<td>". substr($instructions,0,15) ."......</td>";
                        echo "<td>". substr($objective,0,15). "......</td>";
                        echo "<td class='text-primary'>$video_path</td>";
                        echo "<td class='text-primary'>$thumbnail_path</td>";
                        echo "<td>$day</td>";
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
                            Niger
                          </td>
                          <td>
                            Oud-Turnhout
                          </td>
                          <td class="text-primary">
                            $36,738
                          </td>
                          <td class="text-primary">
                            $36,738
                          </td>
                        </tr>
-->
               
                
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
        </div>
      </div>


  <?php include "includes/footer.php"?>