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
    <title>Add Services <?php echo $_SESSION['username'];?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Add Services CSS    -->
    <link href="../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="../../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>
    <link href="../../assets/js/datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
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
                    <li class="active">
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
                        <a class="navbar-brand" href="#"> Add Services </a>
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
                                            <form id="salesForm" name="salesForm">
                                                <div id="done2"></div>
                                                <div id="loader"></div>
                                                <div class="row">
                                                     <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" id="dateSold" name="dateSold" class="datepicker form-control" placeholder="Please choose a date...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Item Name</label>
                                                            <input type="text" class="form-control" id="itemName" name="itemName" required>
                                                            <div id="suggestion-box"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Quantity</label>
                                                            <input type="text" class="form-control" id="quantity" name="quantity" onBlur="checkStockquantity();" required>
                                                            <span id="showQuantity" class="text-warning"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Charged</label>
                                                            <input type="text" class="form-control" id="amountC" name="amountC" required>
                                                            <span id="expectedAmount" class="text-info"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Paid</label>
                                                            <input type="text" class="form-control" id="amountP" name="amountP" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                               
                                                <div class="row" id="owners2">
                                                    <div class="col-md-3">
                                                            <select class="form-control show-tick" name="discount" id="discount" onchange="showDiscount(this.id);">
                                                                <option value="">-- Discount --</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                    </div>
                                                      <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Name</label>
                                                            <input type="text" class="form-control" id="cName" name="cName">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Contact</label>
                                                            <input type="text" class="form-control" id="cContact" name="cContact">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="discountValue">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Discount Value</label>
                                                            <input type="text" class="form-control" id="dv" name="dv">
                                                            <span id="d" class="text-info"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                   
                                                <div id="addSalebutton">
                                                <button type="submit" class="btn btn-info pull-center">ADD SALE</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </form>

                                        </div>
                                        <div class="tab-pane" id="messages">
                                            <form id="repairForm" name="salesForm">
                                                <div id="success"></div>
                                                <div class="row">
                                                     <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" id="dateReceived" name="dateReceived" class="datepicker form-control" placeholder="Please choose a date...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Item Description</label>
                                                            <input type="text" class="form-control" id="itemDescription" name="itemDescription" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Item Problem</label>
                                                            <input type="text" class="form-control" id="itemProblem" name="itemProblem" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Owner</label>
                                                            <input type="text" class="form-control" id="Owner" name="Owner" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Owner Contact</label>
                                                            <input type="text" class="form-control" id="ownerContact" name="ownerContact" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Charged</label>
                                                            <input type="text" class="form-control" id="amountCharged" name="amountCharged">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Paid</label>
                                                            <input type="text" class="form-control" id="amountPaid" name="amountPaid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <select class="form-control show-tick" name="status" id="status">
                                                                <option value="">-- Status --</option>
                                                                <option value="fixed">Fixed</option>
                                                                <option value="not fixed">Not Fixed</option>
                                                                <option value="pending">Pending</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info  pull-center">SUBMIT DATA</button>
                                                <div class="clearfix"></div>
                                    </form>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <form id="photographyForm" name="salesForm">
                                                <div id="done"></div>
                                                <div class="row">
                                                     <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" id="dateReceived1" name="dateReceived1" class="datepicker form-control" placeholder="Please choose a date..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   <div class="col-md-3">
                                                        <select class="form-control show-tick" id="photoOption" name="photoOption">
                                                            <option value="">-- Photo Option --</option>
                                                            <option value="Photo Album Size">Photo Album Size</option>
                                                            <option value="Passport">Passport</option>
                                                            <option value="A4">A4</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-control show-tick" id="source" name="source">
                                                            <option value="">-- Select Source --</option>
                                                            <option value="From Studio">From Studio</option>
                                                            <option value="From Clients">From Clients</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Charged</label>
                                                            <input type="text" class="form-control" id="amountCharged1" name="amountCharged1" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Paid</label>
                                                            <input type="text" class="form-control" id="amountPaid1" name="amountPaid1" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="clients">
                                                      <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Name</label>
                                                            <input type="text" class="form-control" id="cName1" name="cName1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Contact</label>
                                                            <input type="text" class="form-control" id="cContact1" name="cContact1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info  pull-center">SUBMIT DATA</button>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="cs">
                                            <form id="cyberForm" name="cyberForm">
                                                <div id="done1"></div>
                                                <span id="formErr1"></span>
                                                <div class="row">
                                                     <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" id="dateReceived2" name="dateReceived2" class="datepicker form-control" placeholder="Please choose a date..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="col-md-3">
                                                        <select class="form-control show-tick" id="cyber" name="cyber">
                                                            <option value="">-- Select Source --</option>
                                                            <option value="Photocopying">Photocopying</option>
                                                            <option value="Printing">Printing</option>
                                                            <option value="Typesetting">Typesetting</option>
                                                            <option value="Internet Services">Internet Services</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Charged</label>
                                                            <input type="text" class="form-control" id="amountCharged3" name="amountCharged3" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Paid</label>
                                                            <input type="text" class="form-control" id="overallCharges" name="overallCharges" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="owners">
                                                      <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Name</label>
                                                            <input type="text" class="form-control" id="owner1" name="owner1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Contact</label>
                                                            <input type="text" class="form-control" id="phone1" name="phone1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-info  pull-center">SUBMIT DATA</button>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="orders">
                                            <form id="ordersForm" name="ordersForm">
                                                <div id="successOrder"></div>
                                                <div id="loadero"></div>
                                                <div class="row">
                                                     <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="date" id="dateOrdered" name="dateOrdered" class="datepicker form-control" placeholder="Please choose a date..." required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Order Name</label>
                                                            <input type="text" class="form-control" id="orderName" name="orderName" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Quantity</label>
                                                            <input type="text" class="form-control" id="quantity1" name="quantity1" required>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Amount Charged</label>
                                                            <input type="text" class="form-control" id="amountChargedo" name="amountChargedo" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Deposit</label>
                                                            <input type="text" class="form-control" id="deposit1" name="deposit1" required>
                                                        </div>
                                                    </div>
                                                
                                               
                                                      <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Name</label>
                                                            <input type="text" class="form-control" id="owner2" name="owner2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Customer Contact</label>
                                                            <input type="text" class="form-control" id="phone2" name="phone2">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-info  pull-center">SUBMIT DATA</button>
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
<script src="../../assets/js/momentjs/moment.js"></script>
<script src="../../assets/js/datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- Add Services javascript methods -->
<script src="../../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Add Services DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script src="../functions/datePicker.js"></script>
<script src="../functions/searchStock.js"></script>
<script src="../functions/idleState.js"></script>
<script src="../functions/processSales.js"></script>
<script src="../functions/discount.js"></script>
<script src="../functions/checkStockquantity.js"></script>
<script src="../functions/processRepair.js"></script>
<script src="../functions/processPhoto.js"></script>
<script src="../functions/processCyber.js"></script>
<script src="../functions/orders.js"></script>
<script src="../functions/idleState.js"></script>
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