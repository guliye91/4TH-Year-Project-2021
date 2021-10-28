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
    <title>Expenditure <?php echo $_SESSION['username'];?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
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
                        <a href="../Stock/">
                            <i class="material-icons">shopping_cart</i>
                            <p>Stock</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand" href="#"> Business Expenditure </a>
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
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">Monthly Expenditure</h4>
                                </div>
                                <div class="card-content">
                                    <form id="expenseForm">
                                        <div class="row">
                                            <div id="successex"></div>
                                            <div id="loader4"></div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Expense Name</label>
                                                    <input type="text" name="expenseName" id="expenseName" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Expense Amount</label>
                                                    <input type="text" name="expenseAmount" id="expenseAmount" class="form-control" maxlength="6" pattern="[0-9]{1,6}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info pull-right">Add Expense
                                            <i class="material-icons right">add</i>
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="green">
                                    <h4 class="title">Monthly Expenses</h4>
                                </div>
                                <div class="card-content table-responsive" id="stockData">
                                    <?php
                                        require_once("../../incs/conn.php");
                                        $month = date('F');
                                        $year = date('Y');
                                        $slxas = "SELECT SUM(expenseAmount) AS sa FROM expenses WHERE month='".$month."' && year='".$year."'";
                                        if($queryxas = mysqli_query($dbc,$slxas))
                                        {
                                          $rowxas = mysqli_fetch_assoc($queryxas);
                                          ?>
                                          <form id="printExpenseform">
                                                      Total Monthly Expense :    <button class="btn waves-effect waves-light grey" type="submit" name="printExpense" id="printExpense"
                                                          ><?php echo $rowxas['sa']?> KES
                                                          <i class="material-icons right">print</i>
                                                          </button>
                                                      </form>
                                          <?php
                                          
                                        }
                                        $slxs = "SELECT * FROM expenses WHERE month='".$month."' && year='".$year."' ORDER BY expenseId DESC";
                                        if($queryxs = mysqli_query($dbc,$slxs))
                                        {?>
                                           <table class="table table-hover">
                                                                         <thead>
                                                                              <th>Number</th>
                                                                              <th>Expense Name</th>
                                                                              <th>Expense Amount</th>
                                                                              <th>Date Proccessed</th>
                                                                          </thead>
                                  
                                        <?php
                                        $number = 0;
                                        while($rowxs = mysqli_fetch_array($queryxs))
                                        {?>
                                         <tbody>
                                          <tr>
                                            <td><?php echo ++$number;?></td>
                                            <td><?php echo $rowxs['expenseName'];?></td>
                                            <td><?php echo $rowxs['expenseAmount'];?></td>
                                            <td><?php echo $rowxs['dateProcessed'];?></td>
                                          </tr>
                                        </tbody>
                                          
                                          <?php
                                        }?>
                                         </table>
                                    </div>
                                         <?php
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
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script src="../functions/expenses.js"></script>
<script src="../functions/printFL.js"></script>
<script src="../functions/idleState.js"></script>
<script src="../functions/processLogout.js"></script>
<script src="../functions/processBackup.js"></script>
 <?php if($_SESSION['userlevel'] != 'admin'){?>
      <script type="text/javascript" src="../functions/level.js"></script>
 <?php }?>

</html>