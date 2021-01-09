<?php include 'includes/header.php' ?>
      <!-- End Navbar -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User Details</h4>
<!--                  <p class="card-category"> Here is a subtitle for this table</p>-->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          Username
                        </th>
                        <th>
                         User mail
                        </th>
                        <th>
                        User mob no.
                        </th>
                        <th>
                        User membership
                        </th>
<!--
                        <th>
                          Objective
                        </th>
                        <th>
                          Video URL
                        </th>
                        <th>
                          Thumbnail
                        </th>
-->
                      </tr></thead>
                      <tbody>
                      
                    <?php
                    $query = 'SELECT * FROM `user`';
                    $result = $con->prepare($query);
                    $result->execute();

                    while($user = $result->fetch()){
                    $username    = $user->username;
                    $usermail    = $user->usermail;
                    $user_mobile = $user->user_mobile;
                    $user_membership = $user->user_membership;
                     
                        echo '<tr>';
                        echo "<td>$username</td>";
                        echo "<td>$usermail</td>";
                        echo "<td class='text-primary'>$user_mobile</td>";
                        echo "<td>$user_membership</td>";
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