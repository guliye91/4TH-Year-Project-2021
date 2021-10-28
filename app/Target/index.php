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
    <title>Business Target<?php echo $_SESSION['username'];?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="../../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='../../assets/icons/MaterialIcons.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="green" data-image="../../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="green | blue | green | orange | red"

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
                    <li class="active">
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
                        <a class="navbar-brand" href="#"> Business Target </a>
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
                                                        <i class="material-icons">today</i> DAILY TARGET
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#messages" data-toggle="tab">
                                                        <i class="material-icons">date_range</i> MONTHLY TARGET
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#settings" data-toggle="tab">
                                                        <i class="material-icons">event_available</i> YEARLY TARGET
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
                                            <form id="dtargetForm" name="mtargetForm">
                                                <div id="success_message"></div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Daily Target</label>
                                                            <input type="text" class="form-control" id="dtarget" name="dtarget" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info  pull-center">SET TARGET</button>
                                                <div class="clearfix"></div>
                                            </form>

                                        </div>
                                        <div class="tab-pane" id="messages">
                                            <form id="mtargetForm" name="mtargetForm">
                                                <div id="success_message1"></div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Monthly Target</label>
                                                            <input type="text" class="form-control" id="mtarget" name="mtarget" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info  pull-center">SET TARGET</button>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <form id="ytargetForm" name="ytargetForm">
                                                <div id="success_messagey"></div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Yearly Target</label>
                                                            <input type="text" class="form-control" id="ytarget" name="ytarget" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info  pull-center">SET TARGET</button>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 element"></div>
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
<!-- Material Dashboard javascript methods -->
<script src="../../ssets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script src="../functions/processTarget.js"></script>
<script src="../functions/idleState.js"></script>
<script type="text/javascript" src="../../assets/js/typed.js"></script>
<script type="text/javascript" src="../../assets/js/typedMod.js"></script>
<script src="../functions/processLogout.js"></script>
<script src="../functions/processBackup.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
 <?php if($_SESSION['userlevel'] != 'admin'){?>
      <script type="text/javascript" src="../functions/level.js"></script>
 <?php }?>

</html>