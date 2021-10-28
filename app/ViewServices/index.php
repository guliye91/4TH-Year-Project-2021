<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>View Services <?php echo $_SESSION['username'];?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="../../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="../../assets/libs/tooltipster/dist/css/tooltipster.bundle.min.css" />
    <!--  View Services CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='../../assets/icons/MaterialIcons.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="../../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="../" class="simple-text">
                    <i class="material-icons">account_balance</i>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="../dashboard">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="../AddServices">
                            <i class="material-icons">receipt</i>
                            <p>Add Services</p>
                        </a>
                    </li>
                    <li  class="active">
                        <a href="../ViewServices">
                            <i class="material-icons">content_paste</i>
                            <p>View Services</p>
                        </a>
                    </li>
                    <li>
                        <a href="../ManageUsers/">
                            <i class="material-icons">people</i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                    <li id="al">
                        <a href="../AccessLogs/">
                            <i class="material-icons">watch_later</i>
                            <p>Access Logs</p>
                        </a>
                    </li>
                    <li id="stock">
                        <a href="../Stock">
                            <i class="material-icons">shopping_cart</i>
                            <p>Stock</p>
                        </a>
                    </li>
                    <li>
                        <a href="../Expenditure">
                            <i class="material-icons text-gray">shopping_basket</i>
                            <p>Business Expenditure</p>
                        </a>
                    </li>
                    <li>
                        <a href="../Target">
                            <i class="material-icons text-gray">assessment</i>
                            <p>Business Target</p>
                        </a>
                    </li>
                    <li id="fb">
                        <a href="../Feedback">
                            <i class="material-icons text-gray">forum</i>
                            <p>Feedback</p>
                        </a>
                    </li>
                      <li>
                        <a href="#" id="buttonOut">
                            <i class="material-icons">power_settings_new</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> View Services </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown" id="notifications">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <?php
                                    //FEEDBACK
                                      $f = mysqli_query($dbc,"SELECT * FROM feedback WHERE status='unread' ORDER BY id DESC");
                                      $number = mysqli_num_rows($f);
                                      
                                      ?>
                                    <span class="notification"><?php echo $number; ?></span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                  <?php
                                  while($user = mysqli_fetch_assoc($f))
                                      {
                                        $name = $user['name'];
                                        $feedback = $user['subject'];
                                        ?>
                                        <li>
                                        <a href="../Feedback"><strong><?php echo $name; ?> </strong>sent a feedback on <strong><?php echo $feedback;?></strong></a>
                                        </li>
                                        <?php
                                      }
                                  ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">User</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Username: <?php echo $_SESSION['username'];?></a>
                                    </li>
                                    <li>
                                        <a href="#">User Level: <?php echo $_SESSION['userlevel'];?></a>
                                    </li>
                                    <li>
                                        <a id="backup_transactions">Backup Transactions</a>
                                    </li>
                                    <li>
                                        <a href="#" id="buttonOut">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="green">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#profile" data-toggle="tab">
                                                        <i class="material-icons">description</i> SALES
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#messages" data-toggle="tab">
                                                        <i class="material-icons">devices_other</i> ELECTRONIC SOLUTIONS
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#settings" data-toggle="tab">
                                                        <i class="material-icons">camera_alt</i> PHOTOGRAPHY
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#cs" data-toggle="tab">
                                                        <i class="material-icons">keyboard</i> CYBER SERVICES
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#orders" data-toggle="tab">
                                                        <i class="material-icons">keyboard</i> ORDERS
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile">
                                            <?php
                                            require_once("../../incs/conn.php");
                                            //fetch and display records from database
                                            $sql = "SELECT * FROM sales ORDER BY id DESC";
                                            if($query = mysqli_query($dbc,$sql))
                                            {
                                              $amount = mysqli_num_rows($query);
                                              echo '<p class="text-info">Showing '.$amount.' Records</p>';
                                              $number = 0;
                                              while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                              {
                                                $_SESSION['id'] = $row['id'];
                                                $_SESSION['dateSold'] = $row['dateSold'];
                                                $_SESSION['itemName'] = $row['itemName'];
                                                $_SESSION['quantity'] = $row['quantity'];
                                                $_SESSION['amountC'] = $row['amountC'];
                                                $_SESSION['amountP'] = $row['amountP'];
                                                $_SESSION['discount'] = $row['discount'];
                                                $_SESSION['cName'] = $row['cName'];
                                                $_SESSION['cContact'] = $row['cContact'];
                                                $_SESSION['proccessedBy'] = $row['proccessedBy'];
                                                $_SESSION['dateProccessed'] = $row['dateProccessed'];
                                                echo ++$number;
                                                global $row;
                                                ?>
                                             <div class="panel-group">
                                                <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title text-left">
                                                         <?php
                                                            if($row['amountP'] < $row['amountC'] && $row['discount'] == '0')
                                                            
                                                            {
                                                              $rem = $row['amountC'] - $row['amountP'];?>
                                                            <a data-toggle="collapse" title="Pending Payment of <?php echo $rem;?> KES" href="#collapse0-<?php echo $row['id'];?>"><?php echo ' '.$row['itemName'].'';?>
                                                            <i class="material-icons text-warning"  data-toggle="tooltip" title="Pending Payment of <?php echo $rem;?> KES">info</i></a>
                                                            <?php
                                                            
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <a data-toggle="collapse" href="#collapse0-<?php echo $row['id'];?>"><?php echo ' '.$row['itemName'].'';?>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                      
                                                      </a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                      <a data-toggle="collapse" href="#collapse0-<?php echo $row['id'];?>"><?php echo ' '.$row['dateSold'].'';?></a>
                                                    </h4>
                                                    
                                                  </div>
                                                  <div id="collapse0-<?php echo $row['id'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                              
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Date Sold:</span><br/><?php echo $row['dateSold'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Item Name:</span><br/><?php echo $row['itemName'] ;?></p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Quantity:</span><br/><?php echo $row['quantity'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Amount Charged:</span><br/><?php echo $row['amountC'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Name:</span><br/><?php echo $row['cName'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Contact:</span><br/><?php echo $row['cContact'] ;?></p>
                                                            </div>
                                                            <div class="col-md-3">
                                                          <p><span class="text-info">Discount:</span><br/>
                                                          <?php
                                                          echo $row['discount'];
                                                          ?>
                                                          </p>
                                                        </div>
                                                            <?php
                                                        if($row['amountP'] < $row['amountC'] && $row['discount'] == '0')
                                                        {
                                                          ?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid: <i class="material-icons">mode_edit</i></span><br/>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#edits-<?php echo $row['id'];?>">
                                                            <?php echo $row['amountP'];?>
                                                          </button>
                                                          </p>
                                                        </div>
                                                            
                                    
                                                        <!-- Modal Structure -->
                                                      <div id="edits-<?php echo $row['id'];?>" 	class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                               <form id="newAmountforms-<?php echo $row['id'];?>">
                                                               <span id="errs-<?php echo $row['id'];?>" class="center"></span>
                                                                 <div class="form-group">
                                                                    <label for="newAmounts">New Amount</label>
                                                                    <input type="hidden" id="<?php echo $row['id'];?>">
                                                                    <input id="newAmounts-<?php echo $row['id'];?>" class="form-control" type="text" name="newAmounts"  pattern="[0-9]{1,5}" class="validate center" >           
                                                                </div><br/>
                                                                <div class="modal-footer">
                                                                  <button onclick="updateDatas(<?php echo $row['id'];?>)" class="btn btn-default" type="submit" name="update">UPDATE AMOUNT
                                                                     <i class="material-icons">send</i>
                                                                  </button>
                                                                </div>
                                                              </form>
                                                               </div>
                                                             </div>
                                                      </div>
                                                      </div>
                                                          
                                                          <?php
                                                        }
                                                        else
                                                        {?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid:</span><br/>
                                                          <?php
                                                          echo $row['amountP'];
                                                          ?>
                                                          </p>
                                                        </div>
                                                       
                                                          <?php
                                                        }
                                                        
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <form id="printReceipt" class="col-md-4">
                                                            <button class="btn waves-effect waves-light grey" type="submit" name="printReceipt" id="printReceipt">
                                                                <i class="material-icons right">print</i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="panel-footer">
                                                         <i class="grey-text">Processed on: <?php echo $row['dateProccessed'];?> by 
                                                            <?php echo $row['proccessedBy'];?></i>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                             <?php
                                              }
                                            }
                                              ?>
                                        </div>
                                        <div class="tab-pane" id="messages">
                                            <?php
                                            //require_once("../../incs/conn.php");
                                            //fetch and display records from database
                                            $sql = "SELECT * FROM repairs ORDER BY repairId DESC";
                                            if($query = mysqli_query($dbc,$sql))
                                            {
                                              $amount = mysqli_num_rows($query);
                                              echo '<p class="text-info">Showing '.$amount.' Records</p>';
                                              while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                              {
                                                global $row;
                                                ?>
                                             <div class="panel-group">
                                                <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title text-left">
                                                         <?php
                                                            if($row['amountPaid'] < $row['amountCharged'])
                                                            
                                                            {
                                                              $rem = $row['amountCharged'] - $row['amountPaid'];?>
                                                            <a data-toggle="collapse" title="Pending Payment of <?php echo $rem;?> KES" href="#collapse1-<?php echo $row['repairId'];?>"><?php echo ' '.$row['itemDescription'].'';?>
                                                            <i class="material-icons text-warning">info</i></a>
                                                            <?php
                                                            
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <a data-toggle="collapse" href="#collapse1-<?php echo $row['repairId'];?>"><?php echo ' '.$row['itemDescription'].'';?>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                      
                                                      </a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                         <?php
                                                            if($row['amountPaid'] < $row['amountCharged'])
                                                            
                                                            {
                                                              $rem = $row['amountCharged'] - $row['amountPaid'];?>
                                                            <span><i class="material-icons orange-text tooltip" title="Pending Payment of <?php echo $rem;?> KES">info</i></span>
                                                            <?php
                                                            
                                                            }
                                                            ?>
                                                      <a data-toggle="collapse" href="#collapse1-<?php echo $row['repairId'];?>"><?php echo ' '.$row['dateReceived'].'';?></a>
                                                    </h4>
                                                    
                                                  </div>
                                                  <div id="collapse1-<?php echo $row['repairId'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Date Received:</span><br/><?php echo $row['dateReceived'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Item Description:</span><br/><?php echo $row['itemDescription'] ;?></p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Item Problem:</span><br/><?php echo $row['itemProblem'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Amount Charged:</span><br/><?php echo $row['amountCharged'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Status:</span><br/><?php echo $row['status'] ;?></p>
                                                            </div>
                                                            <?php
                                                        if($row['amountPaid'] < $row['amountCharged'])
                                                        {
                                                          ?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid: <i class="material-icons">mode_edit</i></span><br/>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#edit-<?php echo $row['repairId'];?>">
                                                            <?php echo $row['amountPaid'];?>
                                                          </button>
                                                          </p>
                                                        </div>
                                                            
                                    
                                                        <!-- Modal Structure -->
                                                        <div id="edit-<?php echo $row['repairId'];?>" 	class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                               <form id="newAmountform-<?php echo $row['repairId'];?>">
                                                               <span id="err-<?php echo $row['repairId'];?>" class="center"></span>
                                                                 <div class="form-group">
                                                                    <label for="newAmount">New Amount</label>
                                                                    <input type="hidden" id="<?php echo $row['repairId'];?>">
                                                                    <input id="newAmount-<?php echo $row['repairId'];?>" class="form-control" type="text" name="newAmount"  pattern="[0-9]{1,5}" class="validate center" required>           
                                                                </div><br/>
                                                                <div class="modal-footer">
                                                                  <button onclick="updateData(<?php echo $row['repairId'];?>)" class="btn btn-default" type="submit" name="update">UPDATE AMOUNT
                                                                     <i class="material-icons">send</i>
                                                                  </button>
                                                                </div>
                                                              </form>
                                                               </div>
                                                             </div>
                                                      </div>
                                                      </div>
                                                          
                                                          <?php
                                                        }
                                                        else
                                                        {?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid:</span><br/>
                                                          <?php
                                                          echo $row['amountPaid'];
                                                          ?>
                                                          </p>
                                                        </div>
                                                          <?php
                                                        }
                                                        
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">
                                                         <i class="grey-text">Processed on: <?php echo $row['dateProcessed'];?> by 
                                                            <?php echo $row['proccessedBy'];?></i>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                             <?php
                                              }
                                            }
                                              ?>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <?php
                                            //require_once("../../incs/conn.php");
                                            //fetch and display records from database
                                            $sql = "SELECT * FROM photography ORDER BY photoId DESC";
                                            if($query = mysqli_query($dbc,$sql))
                                            {
                                              $amount = mysqli_num_rows($query);
                                              echo '<p class="text-info">Showing '.$amount.' Records</p>';
                                              while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                              {
                                                global $row;
                                                ?>
                                             <div class="panel-group">
                                                <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title text-left">
                                                         <?php
                                                            if($row['amountPaid1'] < $row['amountCharged'])
                                                            
                                                            {
                                                              $rem = $row['amountCharged'] - $row['amountPaid1'];?>
                                                            <a data-toggle="collapse" title="Pending Payment of <?php echo $rem;?> KES" href="#collapse2-<?php echo $row['photoId'];?>"><?php echo ' '.$row['photoOption'].'';?>
                                                            <i class="material-icons text-warning">info</i></a>
                                                            <?php
                                                            
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <a data-toggle="collapse" href="#collapse2-<?php echo $row['photoId'];?>"><?php echo ' '.$row['photoOption'].'';?>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                      
                                                      </a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                         <?php
                                                            if($row['amountPaid1'] < $row['amountCharged'])
                                                            
                                                            {
                                                              $rem = $row['amountCharged'] - $row['amountPaid1'];?>
                                                            <span><i class="material-icons orange-text tooltip" title="Pending Payment of <?php echo $rem;?> KES">info</i></span>
                                                            <?php
                                                            
                                                            }
                                                            ?>
                                                      <a data-toggle="collapse" href="#collapse2-<?php echo $row['photoId'];?>"><?php echo ' '.$row['dateReceived1'].'';?></a>
                                                    </h4>
                                                    
                                                  </div>
                                                  <div id="collapse2-<?php echo $row['photoId'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Date Received:</span><br/><?php echo $row['dateReceived1'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Photo Option:</span><br/><?php echo $row['photoOption'] ;?></p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Source:</span><br/><?php echo $row['source'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Amount Charged:</span><br/><?php echo $row['amountCharged'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Name:</span><br/><?php echo $row['cName'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Contact:</span><br/><?php echo $row['cContact'] ;?></p>
                                                            </div>

                                                            <?php
                                                        if($row['amountPaid1'] < $row['amountCharged'])
                                                        {
                                                          ?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid: <i class="material-icons">mode_edit</i></span><br/>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editp-<?php echo $row['photoId'];?>">
                                                            <?php echo $row['amountPaid1'];?>
                                                          </button>
                                                          </p>
                                                        </div>
                                                            
                                    
                                                        <!-- Modal Structure -->
                                                        <div id="editp-<?php echo $row['photoId'];?>" 	class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                               <form id="newAmountformp-<?php echo $row['photoId'];?>">
                                                               <span id="errp-<?php echo $row['photoId'];?>" class="center"></span>
                                                                 <div class="form-group">
                                                                    <label for="newAmountp">New Amount</label>
                                                                    <input type="hidden" id="<?php echo $row['photoId'];?>">
                                                                    <input id="newAmountp-<?php echo $row['photoId'];?>" class="form-control" type="text" name="newAmountp"  pattern="[0-9]{1,5}" class="validate center" required>           
                                                                </div><br/>
                                                                <div class="modal-footer">
                                                                  <button onclick="updateDatap(<?php echo $row['photoId'];?>)" class="btn btn-default" type="submit" name="update">UPDATE AMOUNT
                                                                     <i class="material-icons">send</i>
                                                                  </button>
                                                                </div>
                                                              </form>
                                                               </div>
                                                             </div>
                                                      </div>
                                                      </div>
                                                          
                                                          <?php
                                                        }
                                                        else
                                                        {?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid:</span><br/>
                                                          <?php
                                                          echo $row['amountPaid1'];
                                                          ?>
                                                          </p>
                                                        </div>
                                                          <?php
                                                        }
                                                        
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">
                                                         <i class="grey-text">Processed on: <?php echo $row['dateProcessed'];?> by 
                                                            <?php echo $row['proccessedBy'];?></i>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                             <?php
                                              }
                                            }
                                              ?>
                                        </div>
                                        <div class="tab-pane" id="cs">
                                            <?php
                                            //require_once("../../incs/conn.php");
                                            //fetch and display records from database
                                            $sql = "SELECT * FROM cyber ORDER BY cyberId DESC";
                                            if($query = mysqli_query($dbc,$sql))
                                            {
                                              $amount = mysqli_num_rows($query);
                                              echo '<p class="text-info">Showing '.$amount.' Records</p>';
                                              while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                              {
                                                global $row;
                                                ?>
                                             <div class="panel-group">
                                                <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title text-left">
                                                         <?php
                                                            if($row['overallCharges'] < $row['amountCharged'])
                                                            
                                                            {
                                                              $rem = $row['amountCharged'] - $row['overallCharges'];?>
                                                            <a data-toggle="collapse" title="Pending Payment of <?php echo $rem;?> KES" href="#collapse3-<?php echo $row['cyberId'];?>"><?php echo ' '.$row['cyber'].'';?>
                                                            <i class="material-icons text-warning">info</i></a>
                                                            <?php
                                                            
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <a data-toggle="collapse" href="#collapse3-<?php echo $row['cyberId'];?>"><?php echo ' '.$row['cyber'].'';?>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                      
                                                      </a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                         <?php
                                                            if($row['overallCharges'] < $row['amountCharged'])
                                                            
                                                            {
                                                              $rem = $row['amountCharged'] - $row['overallCharges'];?>
                                                            <span><i class="material-icons orange-text tooltip" title="Pending Payment of <?php echo $rem;?> KES">info</i></span>
                                                            <?php
                                                            
                                                            }
                                                            ?>
                                                      <a data-toggle="collapse" href="#collapse3-<?php echo $row['cyberId'];?>"><?php echo ' '.$row['dateReceived2'].'';?></a>
                                                    </h4>
                                                    
                                                  </div>
                                                  <div id="collapse3-<?php echo $row['cyberId'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Date Received:</span><br/><?php echo $row['dateReceived2'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Service Type:</span><br/><?php echo $row['cyber'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Amount Charged:</span><br/><?php echo $row['amountCharged'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Name:</span><br/><?php echo $row['owner'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Contact:</span><br/><?php echo $row['phoneNumber'] ;?></p>
                                                            </div>

                                                            <?php
                                                        if($row['overallCharges'] < $row['amountCharged'])
                                                        {
                                                          ?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid: <i class="material-icons">mode_edit</i></span><br/>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editc-<?php echo $row['cyberId'];?>">
                                                            <?php echo $row['overallCharges'];?>
                                                          </button>
                                                          </p>
                                                        </div>
                                                            
                                    
                                                        <!-- Modal Structure -->
                                                        <div id="editc-<?php echo $row['cyberId'];?>" 	class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                               <form id="newAmountformc-<?php echo $row['cyberId'];?>">
                                                               <span id="errc-<?php echo $row['cyberId'];?>" class="center"></span>
                                                                 <div class="form-group">
                                                                    <label for="newAmountc">New Amount</label>
                                                                    <input type="hidden" id="<?php echo $row['cyberId'];?>">
                                                                    <input id="newAmountc-<?php echo $row['cyberId'];?>" class="form-control" type="text" name="newAmountc"  pattern="[0-9]{1,5}" class="validate center" required>           
                                                                </div><br/>
                                                                <div class="modal-footer">
                                                                  <button onclick="updateDatac(<?php echo $row['cyberId'];?>)" class="btn btn-default" type="submit" name="update">UPDATE AMOUNT
                                                                     <i class="material-icons">send</i>
                                                                  </button>
                                                                </div>
                                                              </form>
                                                               </div>
                                                             </div>
                                                      </div>
                                                      </div>
                                                          
                                                          <?php
                                                        }
                                                        else
                                                        {?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid:</span><br/>
                                                          <?php
                                                          echo $row['overallCharges'];
                                                          ?>
                                                          </p>
                                                        </div>
                                                          <?php
                                                        }
                                                        
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">
                                                         <i class="grey-text">Processed on: <?php echo $row['dateProcessed'];?> by 
                                                            <?php echo $row['proccessedBy'];?></i>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                             <?php
                                              }
                                            }
                                              ?>
                                        </div>
                                        <div class="tab-pane active" id="orders">
                                            <?php
                                            require_once("../../incs/conn.php");
                                            //fetch and display records from database
                                            $sql = "SELECT * FROM orders ORDER BY id DESC";
                                            if($query = mysqli_query($dbc,$sql))
                                            {
                                              $amount = mysqli_num_rows($query);
                                              echo '<p class="text-info">Showing '.$amount.' Records</p>';
                                              $number = 0;
                                              while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                              {
                                                echo ++$number;
                                                global $row;
                                                ?>
                                             <div class="panel-group">
                                                <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title text-left">
                                                         <?php
                                                            if($row['orderStatus'] == 'pending')
                                                            
                                                            {?>
                                                            <i class="material-icons text-warning"  data-toggle="tooltip" title="Pending Order">info</i></a>
                                                            <?php
                                                            
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <a data-toggle="collapse" href="#collapse0-<?php echo $row['id'];?>"><?php echo ' '.$row['orderName'].'';?>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                      
                                                      </a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                      <a data-toggle="collapse" href="#collapse0-<?php echo $row['id'];?>"><?php echo ' '.$row['dateOrdered'].'';?></a>
                                                    </h4>
                                                    
                                                  </div>
                                                  <div id="collapse0-<?php echo $row['id'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                              
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Date Ordered:</span><br/><?php echo $row['dateOrdered'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Order Name:</span><br/><?php echo $row['orderName'] ;?></p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><span class="text-info">Quantity:</span><br/><?php echo $row['quantity'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Amount Charged:</span><br/><?php echo $row['amountCharged'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Deposit:</span><br/><?php echo $row['deposit'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Name:</span><br/><?php echo $row['customerName'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="text-info">Customer Contact:</span><br/><?php echo $row['customerContact'] ;?></p>
                                                            </div>
                                                            <?php
                                                        if($row['orderStatus'] == 'pending')
                                                        {
                                                          ?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">OrderStatus: <i class="material-icons">mode_edit</i></span><br/>
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#edits-<?php echo $row['id'];?>">
                                                            <?php echo $row['orderStatus'];?>
                                                          </button>
                                                          </p>
                                                        </div>
                                                            
                                    
                                                        <!-- Modal Structure -->
                                                      <div id="edito-<?php echo $row['id'];?>" 	class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                               <form id="newAmountforms-<?php echo $row['id'];?>">
                                                               <span id="errs-<?php echo $row['id'];?>" class="center"></span>
                                                                 <div class="form-group">
                                                                    <label for="newAmounts">New Amount</label>
                                                                    <input type="hidden" id="<?php echo $row['id'];?>">
                                                                    <input id="newAmounts-<?php echo $row['id'];?>" class="form-control" type="text" name="newAmounts"  pattern="[0-9]{1,5}" class="validate center" >           
                                                                </div><br/>
                                                                <div class="modal-footer">
                                                                  <button onclick="updateDatas(<?php echo $row['id'];?>)" class="btn btn-default" type="submit" name="update">UPDATE AMOUNT
                                                                     <i class="material-icons">send</i>
                                                                  </button>
                                                                </div>
                                                              </form>
                                                               </div>
                                                             </div>
                                                      </div>
                                                      </div>
                                                          
                                                          <?php
                                                        }
                                                        else
                                                        {?>
                                                          <div class="col-md-3">
                                                          <p><span class="text-info">Amount Paid:</span><br/>
                                                          <?php
                                                          echo $row['amountP'];
                                                          ?>
                                                          </p>
                                                        </div>
                                                       
                                                          <?php
                                                        }
                                                        
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <form id="printReceipt" class="col-md-4">
                                                            <button class="btn waves-effect waves-light grey" type="submit" name="printReceipt" id="printReceipt">
                                                                <i class="material-icons right">print</i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="panel-footer">
                                                         <i class="grey-text">Processed on: <?php echo $row['dateProcessed'];?></i>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                             <?php
                                              }
                                            }
                                              ?>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/libs/sweet/sweetalert.min.js"></script>
<script src="../../assets/libs/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- View Services javascript methods -->
<script src="../../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- View Services DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script src="../functions/idleState.js"></script>
<script src="../functions/updateAmount.js"></script>
<script src="../functions/printFL.js"></script>
<script src="../functions/updateAmount1.js"></script>
<script src="../functions/updateAmount2.js"></script>
<script src="../functions/updateAmount3.js"></script>
<script src="../functions/processLogout.js"></script>
<script src="../functions/processBackup.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
 <?php if($_SESSION['userlevel'] != 'admin'){?>
      <script type="text/javascript" src="../functions/level.js"></script>
<?php }?>


</html>