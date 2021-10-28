<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Manage Users<?php echo $_SESSION['username'];?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link type="text/css" rel="stylesheet" href="../../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="../../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='../../assets/icons/MaterialIcons.css' rel='stylesheet' type='text/css'>
     <!-- Loader -->
    <link href="../../assets/css/loader.css" rel="stylesheet" />
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
                        <a href="../AddServices/">
                            <i class="material-icons">receipt</i>
                            <p>Add Services</p>
                        </a>
                    </li>
                    <li>
                        <a href="../ViewServices/">
                            <i class="material-icons">content_paste</i>
                            <p>View Services</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a href="../Stock/">
                            <i class="material-icons">shopping_cart</i>
                            <p>Stock</p>
                        </a>
                    </li>
                    <li>
                        <a href="../Expenditure/">
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
                        <a class="navbar-brand" href="#"> Manage Users </a>
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
                        <div class="col-md-12">
                            <div class="card">
                                    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="green">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active" id="addUser">
                                                    <a href="#manageUsers" data-toggle="tab">
                                                        <i class="material-icons">person_add</i> Add Users
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="" id="viewUsers">
                                                    <a href="#messages" data-toggle="tab">
                                                        <i class="material-icons">group</i> View Users
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#settings" data-toggle="tab">
                                                        <i class="material-icons">lock_open</i> Change Password
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="manageUsers">
                                            <form id="adduserForm" name="adduserForm">
                                                <div id="success_message3"></div>
                                                <div id="error_empty3"></div>
                                                <div id="loader1"></div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Email</label>
                                                            <input type="email" class="form-control" id="email" name="email" required>
                                                            <div id="suggestion-box"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Confirm Password</label>
                                                            <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-info  pull-center">ADD USER</button>
                                                <div class="clearfix"></div>
                                    </form>

                                        </div>
                                        <div class="tab-pane" id="messages">
                                                                                <?php
                                    $selectu = "SELECT * FROM users ORDER BY username ASC";
                                    if($queryu = mysqli_query($dbc,$selectu))
                                    {
                                      ?>
                                      <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>User Level</th>
                                                <th>Email</th>
                                                <th>DELETE</th>
                                            </tr>
                                        </thead>

                                        <?php
                                          while($rowsu = mysqli_fetch_assoc($queryu)){
                                            ?>
                                              <tbody>
                                                <tr id="<?php echo $rowsu['userId'];?>">
                                                
                                                  <td>
                                                  <?php echo $rowsu['username'].'<br/>'?>                                                 
                                                  </td>
                                                  <td>
                                                  <?php
                                                  if($_SESSION['username'] == $rowsu['username'] && $rowsu['userlevel'] == 'admin')
                                                  {
                                                   echo '<a class="waves-effect btn teal disabled">
                                                  '.$rowsu['userlevel'].'
                                                  </a>';
                                                  }
                                                  if($rowsu['userlevel'] == 'user')
                                                  {
                                                  echo '<a title="MAKE ADMIN" class="waves-effect btn btn-info" onclick="updateUser('.$rowsu['userId'].')">
                                                  '.$rowsu['userlevel'].'
                                                  </a>';
                                                 
                                                  }
                                                  else if($rowsu['userlevel'] == 'admin' && $_SESSION['username'] != $rowsu['username'])
                                                  {
                                                    echo '<a title="MAKE USER" class="waves-effect btn btn-info" onclick="updateUser1('.$rowsu['userId'].')">
                                                  '.$rowsu['userlevel'].'
                                                  </a>';
                                                  }
                                                  ?> 
                                                  
                                                  </td>
                                                  <td>
                                                  <?php
                                                  echo $rowsu['email']
                                                  ?>                                                 
                                                  </td>
                                                  
                                                  <?php
                                                  if($_SESSION['username'] == $rowsu['username'] && $rowsu['userlevel'] == 'admin')
                                                  {
                                                    //cannot delete a signed in user who is an admin
                                                    echo '<td><a class="waves-effect red btn disabled" ">
                                                    DELETE</a></td>';
                                                  }
                                                  else
                                                  {
                                                    echo '<td><a class="waves-effect btn btn-danger" onclick="deleteUser('.$rowsu['userId'].')" id="' . $rowsu['userId'] . '">
                                                    DELETE</a></td>';
                                                  }
                                                  
                                                  ?>
                                                  
    
                                                </tr>
                                              </tbody>
                                              <?php
                                              }
                                              ?>
                                         </table>
                                    <?php
                                    }
                                    ?>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                           <form id="passForm" name="passForm">
                                                    <div id="pass_message"></div>
                                                    <div id="loader2"></div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Current Password</label>
                                                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-info  pull-center">CONFIRM PASSWORD</button>
                                                    <div class="clearfix"></div>
                                            </form>
                                           <form id="newpassForm" name="newpassForm">
                                                    <div id="newpass_message"></div>
                                                    <div id="newerror_pass"></div>
                                                    <div id="loader3"></div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Confirm New Password</label>
                                                                <input type="password" class="form-control" id="confirmnewPassword" name="confirmnewPassword" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-info  pull-center">CHANGE PASSWORD</button>
                                                    <div class="clearfix"></div>
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
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project!
<script src="../../assets/js/demo.js"></script>-->
<script src="../functions/processAdd.js"></script>
<script src="../functions/changePassword.js"></script>
<script src="../functions/processUpdateuser.js"></script>
<script src="../functions/processDeleteuser.js"></script>
<script src="../functions/idleState.js"></script>
<script src="../functions/processLogout.js"></script>
<script src="../functions/processBackup.js"></script>
 <?php if($_SESSION['userlevel'] != 'admin'){?>
      <script type="text/javascript" src="../functions/level.js"></script>
 <?php }?>

</html>