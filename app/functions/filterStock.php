<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbc, $_POST["query"]);
 $query = "
  SELECT * FROM stock 
  WHERE stockName LIKE '%".$search."%'

 ";
}
else
{
 $query = "
  SELECT * FROM stock ORDER BY stockName ASC
 ";
}
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) > 0)
{?>


                                    <div class="row">

                                              <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Stock Name</th>
                                                        <th>Quantity</th>
                                                        <th>Item Amount (KES)</th>
                                                        <th>Total Amount (KES)</th>
                                                        <th>Date Added</th>

                                                    </tr>
                                                </thead>
<?php
$number = 0;
 while($row = mysqli_fetch_array($result))
 {?>

    
                                        <tbody>
                                          <tr>
                                            <td><?php echo ++$number;?></td>
                                            <td><?php echo $row['stockName'];?></td>
                                            <td><?php echo $row['stockQuantity'];?></td>
                                            <td><?php echo $row['stockAmount'];?></td>
                                            <td><?php echo $row['totalAmount'];?></td>
                                            <td><?php echo $row['date'];?></td>
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