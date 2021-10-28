<?php
require_once("../incs/conn.php");
session_start();
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbc, $_POST["query"]);
 $query = "
  SELECT * FROM repairs 
  WHERE itemDescription LIKE '%".$search."%'
  OR Owner LIKE '%".$search."%' 
  OR ownerContact LIKE '%".$search."%' 
  OR dateReceived LIKE '%".$search."%' 
 
 ";
}
else
{
 $query = "
  SELECT * FROM repairs ORDER BY repairId DESC
 ";
}
$result = mysqli_query($dbc, $query);
if(mysqli_num_rows($result) > 0)
{

 while($row = mysqli_fetch_array($result))
 {?>
                   <li>
                      <div class="collapsible-header center" id="repair1">
                      <?php echo '<span class="teal-text left"> '.$row['dateReceived'].' </span>';?>
                      <?php echo '<span class="dark-text right"> '.$row['itemDescription'].' </span>';?>
                      <?php
                      if($row['amountPaid'] < $row['amountCharged'])
                      
                      {
                        $rem = $row['amountCharged'] - $row['amountPaid'];?>
                      <span><i class="material-icons orange-text tooltip" title="Pending Payment of <?php echo $rem;?> KES">info</i></span>
                      <?php
                      
                      }
                      ?>
                      
                      </div>
                      <div class="collapsible-body">
                       <p>
                       <div class="row">
                      
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Date Received:</span><br/>
                      <?php
                      echo $row['dateReceived'] ;
                      $_SESSION['dateReceived'] =$row['dateReceived'] ;
                      $_SESSION['repairId'] =$row['repairId'] ; 
                      ?>
                      </p>
                    </div>
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Item Description:</span><br/>
                      <?php
                      echo $row['itemDescription'];
                      $_SESSION['itemDescription'] =$row['itemDescription'] ;
                      ?>
                      </p>
                    </div>
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Item Problem:</span><br/>
                      <?php
                      echo $row['itemProblem'];
                      $_SESSION['itemProblem'] = $row['itemProblem'];
                      ?>
                      </p>
                    </div>
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Owner:</span><br/>
                      <?php
                      echo $row['Owner'];
                      $_SESSION['Owner'] = $row['Owner']; 
                      ?>
                      </p>
                    </div>
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Owner Contact:</span><br/>
                      <?php
                      echo $row['ownerContact'];
                      $_SESSION['ownerContact'] = $row['ownerContact'];
                      ?>
                      </p>
                    </div>
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Amount Charged:</span><br/>
                      <?php
                      echo $row['amountCharged'];
                      ?>
                      </p>
                    </div>
                    <?php
                    if($row['amountPaid'] < $row['amountCharged'])
                    {
                      ?>
                      <div class="col s12 m6 l3">
                      <p><span class="teal-text">Amount Paid: <i class="material-icons">mode_edit</i></span><br/>
                      <a class="modal-trigger waves-effect waves-light btn" href="#edit-<?php echo $row['repairId'];?>"><?php echo $row['amountPaid'];?></a>
                      </p>
                    </div>
                        

                    <!-- Modal Structure -->
                  <div id="edit-<?php echo $row['repairId'];?>" class="modal">
                        <div class="modal-content">
                           <form id="newAmountform-<?php echo $row['repairId'];?>">
                             <div class="input-field">
                                <label for="newAmount">New Amount</label>
                                <input type="hidden" id="<?php echo $row['repairId'];?>">
                                <input id="newAmount-<?php echo $row['repairId'];?>" type="text" name="newAmount"  value="<?php echo $row['amountPaid'];?>" pattern="[0-9]{1,5}" class="validate center" >           
                            </div>
                            <div class="col s12">
                              <button onclick="updateData(<?php echo $row['repairId'];?>)" class="btn waves-effect waves-light col s12 center" type="submit" name="update">UPDATE AMOUNNT
                                 <i class="material-icons">send</i>
                              </button>
                            </div>
                          </form>
                         </div>
                  </div>
                      
                      <?php
                    }
                    else
                    {?>
                      <div class="col s12 m6 l3">
                      <p><span class="teal-text">Amount Paid:</span><br/>
                      <?php
                      echo $row['amountPaid'];
                      $_SESSION['amountPaid'] = $row['amountPaid'];
                      ?>
                      </p>
                    </div>
                      <?php
                    }
                    
                    ?>
                  
                    <div class="col s12 m6 l3">
                      <p><span class="teal-text">Status:</span><br/>
                      <?php echo $row['status'];
                      $_SESSION['status'] = $row['status'];
                      ?>
                      </p>
                    </div>
                    <div class="col s12">
                      <i class="grey-text">Processed on:
                      <?php
                      echo $row['dateProcessed'];
                      $_SESSION['dateProcessed'] = $row['dateProcessed'];
                      ?> by 
                      <?php echo $_SESSION['username'];?></i>
                    </div>
                    <div class="col s12">                       
                        <?php
                        echo '<button class="btn waves-effect waves-light" type="submit" name="print"
                                onclick="printReceipt('.$row['repairId'].')" id="' . $row['repairId'] . '">GENERATE RECEIPT
                          <i class="material-icons right">print</i>
                        </button>';
                        ?>
                    </div>
                  </div>
                  <hr class="teal">
                 
                      </div>
                    </li>

                  
                  <?php
  
 }
}
else
{
 echo 'Data Not Found';
}

?>