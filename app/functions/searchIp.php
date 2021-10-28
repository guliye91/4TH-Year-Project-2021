<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbc, $_POST["query"]);
 $query = "
  SELECT * FROM failed_logins 
  WHERE ip LIKE '%".$search."%'
  OR userAgent LIKE '%".$search."%'
  OR deviceName LIKE '%".$search."%'
  OR status LIKE '%".$search."%'
  OR dateProccessed LIKE '%".$search."%' 

 ";
}
else
{
 $query = "
  SELECT * FROM failed_logins ORDER BY id DESC
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
                                                        <th>User Agent</th>
                                                        <th>Failed String</th>
                                                        <th>Date</th>

                                                    </tr>
                                                </thead>
<?php

 while($row = mysqli_fetch_array($result))
 {?>

    
                                                  <tbody>
                                                    <tr>
                                                      <td>
                                                      <?php
                                                      if($row['status'] == 'allowed'){
                                                      echo '<button type="submit" class="btn btn-success" title="BLOCK USER" onclick="changeStatus('.$row['id'].')" id="' . $row['id'] . '">
                                                     '.$row['ip'].'
                                                       </button>';
                                                      }
                                                      else
                                                        echo '<button type="submit" class="btn btn-danger" title="UNBLOCK USER" onclick="changeStatus1('.$row['id'].')" id="' . $row['id'] . '">
                                                     '.$row['ip'].'
                                                       </button>';
                                                       ?>
                                                    <?php
                                                    if($row['status'] =='allowed')
                                                    {
                                                     echo '<span class="text-success"><strong>'.$row['status'].'</strong></span>';
                                                    }
                                                    else
                                                    {
                                                     echo '<span class="text-danger"><strong>'.$row['status'].'</strong></span>';
                                                    }
                                                    //echo $row['status'];?>
                                                      </td>
                                              
                                                      <td><?php
                                                      echo '<b>'.$row['device'].'</b><br/>';
                                                      echo '<b>'.$row['deviceName'].'</b><br/>';
                                                      echo $row['userAgent'];
                                                      ?></td>
                                                      <td>
                                                      <?php echo '<b>User</b>: '. $row['failedString'] .'<br/>';?>
                                                      <?php echo '<b>Pass</b>: '.$row['failedPass'] .'<br/>';?>
                                                      </td>
                                                      <td><?php echo $row['dateProccessed'];?></td>
                                                      
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