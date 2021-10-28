<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
$output = '';
if(isset($_POST["query1"]))
{
 $search = mysqli_real_escape_string($dbc, $_POST["query1"]);
 $query = "
  SELECT * FROM signinlogs 
  WHERE ip LIKE '%".$search."%'
  OR username LIKE '%".$search."%'
  OR timeLoggedin LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM signinlogs WHERE timeLoggedin!='' ORDER BY id DESC
 ";
}
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) > 0)
{?>


                                    <div class="row">

                                              <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Ip Address</th>
                                                        <th>Username</th>
                                                        <th>Time Logged in</th>
                                                        <th>Time Logged Out</th>

                                                    </tr>
                                                </thead>
<?php

 while($row = mysqli_fetch_array($result))
 {?>

    
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                        <?php echo $row['ip'];?>
                                                      </td>
                                                      <td><?php
                                                      echo $row['username'];
                                                      ?></td>
                                                      <td><?php echo $row['timeLoggedin'];?></td>
                                                      <td><?php echo $row['timeLoggedout'];?></td>
                                                      
                                                    </tr>
                                                  </tbody>
                                              
                                     </div>
                                </li>
                              </ul>
                        </div>
                            
                        
            
                </div>
              </li>
                  
                  <?php
  
 }
 ?></table><?php
}
else
{
 echo 'Data Not Found';
}

?>