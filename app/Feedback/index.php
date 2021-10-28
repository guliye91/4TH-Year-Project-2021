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
    <title>Feedback <?php echo $_SESSION['username'];?></title>
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
                    <li>
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
                    <li>
                        <a href="../AccessLogs/">
                            <i class="material-icons">watch_later</i>
                            <p>Access Logs</p>
                        </a>
                    </li>
                    <li>
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
                    <li class="active">
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
                                                        <i class="material-icons">forum</i> MESSAGES
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
                                            $sql = "SELECT * FROM feedback ORDER BY id DESC";
                                            if($query = mysqli_query($dbc,$sql))
                                            {
                                              $amount = mysqli_num_rows($query);
                                              echo '<p class="teal-text">Showing '.$amount.' messages</p>';
                                              while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                              {
                                                global $row;
                                                ?>
                                             <div class="panel-group">
                                                <div class="panel panel-default">
                                                 <?php
                                                 if($row['status'] == 'read')
                                                 {
                                                 ?>
                                                  <div class="panel-heading">
                                                    <h4 class="panel-title text-left">
                                                        <a onclick="unnotify(<?php echo $row['id'];?>)" data-toggle="collapse" href="#collapse1-<?php echo $row['id'];?>"><?php echo ' '.$row['name'].'';?></a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                        <a onclick="unnotify(<?php echo $row['id'];?>)" data-toggle="collapse" href="#collapse1-<?php echo $row['id'];?>"><?php echo ' '.$row['timeSent'].'';?></a>
                                                        <button class="btn" data-background-color="red" onclick="deleteMessage(<?php echo $row['id'];?>)">
                                                            <i class="material-icons">cancel</i>
                                                        </button>

                                                    </h4>
                                                    
                                                  </div>
                                                  <?php
                                                  }
                                                  else
                                                  {
                                                    ?>
                                                    <div class="panel-heading" data-background-color="blue">
                                                    <h4 class="panel-title text-left">
                                                        <a onclick="unnotify(<?php echo $row['id'];?>)" data-toggle="collapse" href="#collapse1-<?php echo $row['id'];?>"><?php echo ' '.$row['name'].'';?></a>
                                                    </h4>
                                                    <h4 class="panel-title text-right">
                                                        <a onclick="unnotify(<?php echo $row['id'];?>)" data-toggle="collapse" href="#collapse1-<?php echo $row['id'];?>"><?php echo ' '.$row['timeSent'].'';?></a>
                                                        <button class="btn" data-background-color="red" onclick="deleteMessage(<?php echo $row['id'];?>)">
                                                            <i class="material-icons">cancel</i>
                                                        </button>

                                                    </h4>
                                                    
                                                  </div>
                                                    <?php
                                                  }
                                                  ?>
                                                  <div id="collapse1-<?php echo $row['id'];?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p><span class="teal-text">Date Sent:</span><br/><?php echo $row['timeSent'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="teal-text">Sender Name:</span><br/><?php echo $row['name'] ;?></p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><span class="teal-text">Sender Email:</span><br/><?php echo $row['email'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="teal-text">Subject:</span><br/><?php echo $row['subject'] ;?></p>
                                                            </div>
                                                             <div class="col-md-3">
                                                                <p><span class="teal-text">Message:</span><br/><?php echo $row['message'] ;?></p>
                                                            </div>
                                                             
                                                         <div class="row">
                                                          <div class="col-md-3">
                                                          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#reply-<?php echo $row['id'];?>">
                                                          REPLY
                                                          </button>
                                                          </p>
                                                        </div>
                                                         </div>
                                                            
                                    
                                                        <!-- Modal Structure -->
                                                      <div id="reply-<?php echo $row['id'];?>" 	class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                               <form id="replyForm-<?php echo $row['id'];?>">
                                                               <span id="errs-<?php echo $row['id'];?>" class="center"></span>
                                                                 <div class="form-group">
                                                                    <label for="reply">Message</label>
                                                                    <input type="hidden" id="<?php echo $row['id'];?>">
                                                                    <input id="reply-<?php echo $row['id'];?>" class="form-control" type="text" name="reply"  class="validate center" >           
                                                                </div><br/>
                                                                <div class="modal-footer">
                                                                  <button onclick="replyMessage(<?php echo $row['id'];?>)" class="btn btn-default" type="submit" name="update">SEND MESSAGE
                                                                     <i class="material-icons">send</i>
                                                                  </button>
                                                                </div>
                                                              </form>
                                                               </div>
                                                             </div>
                                                      </div>
                                                      </div>
                                                        </div>
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
<script src="../functions/deleteMessage.js"></script>
<script src="../functions/notification.js"></script>
<script src="../functions/updateAmount2.js"></script>
<script src="../functions/processLogout.js"></script>
<script src="../functions/processBackup.js"></script>
 <?php if($_SESSION['userlevel'] != 'admin'){?>
      <script type="text/javascript" src="../functions/level.js"></script>
 <?php }?>

</html>