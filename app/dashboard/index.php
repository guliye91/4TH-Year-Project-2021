<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");


//BUSINESS TARGETS
//daily target
$sqlt = "SELECT MAX(id) AS latestTarget FROM dailytarget ";
                          if($queryt = mysqli_query($dbc,$sqlt))
                          {
                            $rowt = mysqli_fetch_assoc($queryt);
                            if($rowt > 0)
                            {
                              $sumt = $rowt['latestTarget'];
                              $t = "SELECT dailyTarget FROM dailytarget WHERE id='".$sumt."'";
                              if($tt = mysqli_query($dbc,$t))
                              {
                                $ttt = mysqli_fetch_assoc($tt);
                                if($ttt > 0)
                                {
                                  $nt = $ttt['dailyTarget'];
                                }
                              }
                              global $nt;
                            } 
                          }
//monthly target
$sqlt1 = "SELECT MAX(id) AS latestTarget1 FROM monthlytarget ";
                          if($queryt1 = mysqli_query($dbc,$sqlt1))
                          {
                            $rowt1 = mysqli_fetch_assoc($queryt1);
                            if($rowt1 > 0)
                            {
                              $sumt1 = $rowt1['latestTarget1'];
                              $t1 = "SELECT monthlyTarget FROM monthlytarget WHERE id='".$sumt1."'";
                              if($tt1 = mysqli_query($dbc,$t1))
                              {
                                $ttt1 = mysqli_fetch_assoc($tt1);
                                if($ttt1 > 0)
                                {
                                  $nt1 = $ttt1['monthlyTarget'];
                                }
                              }
                              global $nt1;
                            } 
                          }
//yearly target
$sqlty = "SELECT MAX(id) AS latestTarget1 FROM yearlytarget ";
                          if($queryty = mysqli_query($dbc,$sqlty))
                          {
                            $rowty = mysqli_fetch_assoc($queryty);
                            if($rowty > 0)
                            {
                              $sumty = $rowty['latestTarget1'];
                              $ty = "SELECT yearlytarget FROM yearlytarget WHERE id='".$sumty."'";
                              if($tty = mysqli_query($dbc,$ty))
                              {
                                $ttty = mysqli_fetch_assoc($tty);
                                if($ttty > 0)
                                {
                                  $nty = $ttty['yearlytarget'];
                                }
                              }
                              global $nty;
                            } 
                          }
                         

                                
                               
                                
                                //NET WORTH
                          $month = date('F');
                          $year = date('Y');

                          //monthly worth
                          $sqli = "SELECT SUM(amountPaid) AS sumi FROM repairs WHERE month='".$month."' && year='".$year."'";
                              if($queryi = mysqli_query($dbc,$sqli))
                              {
                                $rowi = mysqli_fetch_assoc($queryi);
                                if($rowi > 0)
                                {
                                  $sumi = $rowi['sumi'];
                                  global $sumi;
                                }   
                              }
                          $sqlii= "SELECT SUM(amountPaid1) AS sumii FROM photography WHERE month='".$month."' && year='".$year."'";
                                if($queryii = mysqli_query($dbc,$sqlii))
                                {
                                  $rowii = mysqli_fetch_assoc($queryii);
                                  if($rowii > 0)
                                  {
                                    $sumii = $rowii['sumii'];
                                    global $sumii;
                                  }  
                                }
                          $sqliii = "SELECT SUM(overallCharges) AS sumiii FROM cyber WHERE month='".$month."' && year='".$year."'";
                                if($queryiii = mysqli_query($dbc,$sqliii))
                                {
                                  $rowiii = mysqli_fetch_assoc($queryiii);
                                  if($rowiii > 0)
                                  {
                                    $sumiii = $rowiii['sumiii'];
                                    global $sumiii;
                                  }   
                                }
                            $sqliiy = "SELECT SUM(amountP) AS sumiiy FROM sales WHERE month='".$month."' && year='".$year."'";
                                if($queryiiy = mysqli_query($dbc,$sqliiy))
                                {
                                  $rowiiy = mysqli_fetch_assoc($queryiiy);
                                  if($rowiiy > 0)
                                  {
                                    $sumiiy = $rowiiy['sumiiy'];
                                    global $sumiiy;
                                  }   
                                }
                                $mi = $sumi + $sumii + $sumiii + $sumiiy;
                         
                 $sqltl = "SELECT SUM(expenseAmount) AS ea FROM expenses WHERE month='".$month."' && year='".$year."'";
                    if($querytl = mysqli_query($dbc,$sqltl))
                       {
                          $rowtl = mysqli_fetch_assoc($querytl);
                          if($rowtl > 0)
                             {
                             $ntl =  $rowtl['ea'];

                             } 
                        }       
          $capital = $mi - $ntl;
         
          //end of monthly worth
          //yearly worth
           $sqliy = "SELECT SUM(amountPaid) AS sumi FROM repairs WHERE year='".$year."'";
                              if($queryiy = mysqli_query($dbc,$sqliy))
                              {
                                $rowiy = mysqli_fetch_assoc($queryiy);
                                if($rowiy > 0)
                                {
                                  $sumiy = $rowiy['sumi'];
                                  global $sumiy;
                                }   
                              }
                          $sqliiy= "SELECT SUM(amountPaid1) AS sumii FROM photography WHERE year='".$year."'";
                                if($queryiiy = mysqli_query($dbc,$sqliiy))
                                {
                                  $rowiiy = mysqli_fetch_assoc($queryiiy);
                                  if($rowiiy > 0)
                                  {
                                    $sumiiy = $rowiiy['sumii'];
                                    global $sumiiy;
                                  }  
                                }
                          $sqliiiy = "SELECT SUM(overallCharges) AS sumiii FROM cyber WHERE year='".$year."'";
                                if($queryiiiy = mysqli_query($dbc,$sqliiiy))
                                {
                                  $rowiiiy = mysqli_fetch_assoc($queryiiiy);
                                  if($rowiiiy > 0)
                                  {
                                    $sumiiiy = $rowiiiy['sumiii'];
                                    global $sumiiiy;
                                  }   
                                }
                           $sqliiiyy = "SELECT SUM(amountP) AS sumiiiy FROM sales WHERE year='".$year."'";
                                if($queryiiiyy = mysqli_query($dbc,$sqliiiyy))
                                {
                                  $rowiiiyy = mysqli_fetch_assoc($queryiiiyy);
                                  if($rowiiiyy > 0)
                                  {
                                    $sumiiiyy = $rowiiiyy['sumiiiy'];
                                    global $sumiiiyy;
                                  }   
                                }
                                $yi = $sumiy + $sumiiy + $sumiiiy + $sumiiiyy;
                         
                 $sqltly = "SELECT SUM(expenseAmount) AS ea FROM expenses WHERE year='".$year."'";
                    if($querytly = mysqli_query($dbc,$sqltly))
                       {
                          $rowtly = mysqli_fetch_assoc($querytly);
                          if($rowtly > 0)
                             {
                             $ntly =  $rowtly['ea'];

                             } 
                        }       
          $capitaly = $yi - $ntly;
          //end of yearly worth
                                
            //charts
            
             $data=mysqli_query($dbc,"SELECT SUM(amountPaid) AS amount FROM repairs GROUP BY dateReceived");
          ?>
          <script>
              var myData=[<?php 
              while($info=mysqli_fetch_array($data))
                  echo $info['amount'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
              ?>];
              <?php
              $data=mysqli_query($dbc,"SELECT dateReceived FROM repairs GROUP BY dateReceived");
              ?>
              var myLabels=[<?php 
              while($info=mysqli_fetch_array($data))
              
                  echo '"'.$info['dateReceived'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
              
              ?>];
          </script>
              <?php
             $data1=mysqli_query($dbc,"SELECT SUM(amountPaid1) AS amount1 FROM photography GROUP BY dateReceived1");
          ?>
          <script>
              var myData1=[<?php 
              while($info1=mysqli_fetch_array($data1))
                  echo $info1['amount1'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
              ?>];
              <?php
              $data1=mysqli_query($dbc,"SELECT dateReceived1 FROM photography GROUP BY dateReceived1");
              ?>
              var myLabels1=[<?php 
              while($info1=mysqli_fetch_array($data1))
              
                  echo '"'.$info1['dateReceived1'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
              
              ?>];
          </script>
              <?php
             $data2=mysqli_query($dbc,"SELECT SUM(overallCharges) AS amount2 FROM cyber GROUP BY dateReceived2");
          ?>
          <script>
              var myData2=[<?php 
              while($info2=mysqli_fetch_array($data2))
                  echo $info2['amount2'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
              ?>];
              <?php
              $data2=mysqli_query($dbc,"SELECT dateReceived2 FROM cyber GROUP BY dateReceived2");
              ?>
              var myLabels2=[<?php 
              while($info2=mysqli_fetch_array($data2))
              
                  echo '"'.$info2['dateReceived2'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
              
              ?>];
          </script>
          
          <?php
             $data3=mysqli_query($dbc,"SELECT SUM(amountP) AS amount FROM sales GROUP BY dateSold ");
          ?>
          <script>
              var myData3=[<?php 
              while($info3=mysqli_fetch_array($data3))
                  echo $info3['amount'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
              ?>];
              <?php
              $data3=mysqli_query($dbc,"SELECT dateSold FROM sales GROUP BY dateSold");
              ?>
              var myLabels3=[<?php 
              while($info3=mysqli_fetch_array($data3))
              
                  echo '"'.$info3['dateSold'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
              
              ?>];
          </script>
          
           <?php
            $today = date("Y-m-d");
             $data4=mysqli_query($dbc,"SELECT SUM(amountP) AS amount FROM sales WHERE dateSold='".$today."' GROUP BY time ");
          ?>
          <script>
              var myData4=[<?php 
              while($info4=mysqli_fetch_array($data4))
                  echo $info4['amount'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
              ?>];
              <?php
              $data4=mysqli_query($dbc,"SELECT time FROM sales WHERE dateSold='".$today."' GROUP BY time");
              ?>
              var myLabels4=[<?php 
              while($info4=mysqli_fetch_array($data4))
              
                  echo '"'.$info4['time'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
              
              ?>];
          </script>
          
                            
                       
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard <?php echo $_SESSION['username'];?></title>
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
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="../../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="../" class="simple-text">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">account_balance</i>
                                </div>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="">
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
                        <a href="../AccessLogs">
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
                        <a class="navbar-brand" href="#"> Dashboard </a>
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
                      <?php
                       $today = date("Y-m-d");
                          //for repairs
                          $sql = "SELECT SUM(amountPaid) AS sum FROM repairs WHERE dateReceived='".$today."'";
                          if($query = mysqli_query($dbc,$sql))
                          {
                            $row = mysqli_fetch_assoc($query);
                            if($row > 0)
                            {
                              $sum = $row['sum'];
                              global $sum;
                            }    
                          }
                          //for photography
                           $sql1 = "SELECT SUM(amountPaid1) AS sum1 FROM photography WHERE dateReceived1='".$today."'";
                          if($query1 = mysqli_query($dbc,$sql1))
                          {
                            $row1 = mysqli_fetch_assoc($query1);
                            if($row1 > 0)
                            {
                              $sum1 = $row1['sum1'];
                            } 
                          }
                         
                         //for cyber
                           $sql2 = "SELECT SUM(overallCharges) AS sum2 FROM cyber WHERE dateReceived2='".$today."'";
                          if($query2 = mysqli_query($dbc,$sql2))
                          {
                            $row2 = mysqli_fetch_assoc($query2);
                            if($row2 > 0)
                            {
                              $sum2 = $row2['sum2'];
                            } 
                          }
                          
                          //for sales
                           $sql23 = "SELECT SUM(amountP) AS sum3 FROM sales WHERE dateSold='".$today."'";
                          if($query23 = mysqli_query($dbc,$sql23))
                          {
                            $row23 = mysqli_fetch_assoc($query23);
                            if($row23 > 0)
                            {
                              $sum23 = $row23['sum3'];
                            } 
                          }
                          $todaysIncome = $sum+$sum1+$sum2+$sum23;
                      ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                               <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">today</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Todays Income: <?php echo $today; ?></p>
                                    <h6>ELECTRONICS SOLUTIONS: <?php echo $sum;?></h6>
                                    <h6>PHOTOGRAPHY: <?php echo $sum1;?></h6>
                                    <h6>CYBER SERVICES: <?php echo $sum2;?></h6>
                                    <h6>SALES: <?php echo $sum23;?></h6>
                                    <h6>GRAND TOTAL:</h6>
                                    <h4>Ksh: <?php echo $todaysIncome;;?></h4>
                                </div>
                                <div class="card-footer">
                                  <?php
                                  if($todaysIncome < $nt)
                                  {
                                    $less = $nt - $todaysIncome;
                                    ?>
                                    <div class="stats">
                                        <i class="material-icons large text-danger">trending_down</i>
                                        <a href="#" class="text-warning">You have earned less than your daily target <?php echo $nt; ?> by <?php echo $less; ?></a>
                                    </div>
                                  <?php
                                  }
                                  else
                                  {
                                    $greater = $todaysIncome - $nt;?>
                                    <div class="stats">
                                        <i class="material-icons text-success">trending_up</i>
                                        <a href="#" class="text-success">You have earned greater than your daily target <?php echo $nt; ?> by <?php echo $greater; ?></a>
                                    </div>
                                  <?php
                                  }
                                  ?>
                                </div>
                            </div>
                        </div>
                        <?php
                         //monthly income
                          $month = date('F');
                          $month = strtoupper($month);
                          $year = date('Y');

                          
                          $sql6 = "SELECT SUM(amountPaid) AS sum6 FROM repairs WHERE month='".$month."' && year='".$year."'";
                              if($query6 = mysqli_query($dbc,$sql6))
                              {
                                $row6 = mysqli_fetch_assoc($query6);
                                if($row6 > 0)
                                {
                                  $sum6 = $row6['sum6'];
                                  global $sum6;
                                }   
                              }
                          $sql4 = "SELECT SUM(amountPaid1) AS sum4 FROM photography WHERE month='".$month."' && year='".$year."'";
                                if($query4 = mysqli_query($dbc,$sql4))
                                {
                                  $row4 = mysqli_fetch_assoc($query4);
                                  if($row4 > 0)
                                  {
                                    $sum4 = $row4['sum4'];
                                    global $sum4;
                                  }  
                                }
                          $sql5 = "SELECT SUM(overallCharges) AS sum5 FROM cyber WHERE month='".$month."' && year='".$year."'";
                                if($query5 = mysqli_query($dbc,$sql5))
                                {
                                  $row5 = mysqli_fetch_assoc($query5);
                                  if($row5 > 0)
                                  {
                                    $sum5 = $row5['sum5'];
                                    global $sum5;
                                  }   
                                }
                            $sql56 = "SELECT SUM(amountP) AS sum56 FROM sales WHERE month='".$month."' && year='".$year."'";
                                if($query56 = mysqli_query($dbc,$sql56))
                                {
                                  $row56 = mysqli_fetch_assoc($query56);
                                  if($row56 > 0)
                                  {
                                    $sum56 = $row56['sum56'];
                                    global $sum56;
                                  }   
                                }
                                $monthlyIncome = $sum6+$sum4+$sum5+$sum56;
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                               <div class="card-header" data-background-color="green">
                                    <i class="material-icons">date_range</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Monthly Income: <?php echo $month; ?></p>
                                <h6>ELECTRONICS SOLUTIONS: <?php echo $sum6;?></h6>
                                <h6>PHOTOGRAPHY: <?php echo $sum4;?></h6>
                                <h6>CYBER SERVICES: <?php echo $sum5;?></h6>
                                <h6>SALES: <?php echo $sum56;?></h6>
                                <h6>GRAND TOTAL:</h6>
                                <h4>Ksh: <?php echo $monthlyIncome;;?></h4>
                                </div>
                                <div class="card-footer">
                                  <?php
                                    if($monthlyIncome < $nt1)
                                    {
                                      $lesser = $nt1 - $monthlyIncome;
                                      ?>
                                      <div class="stats">
                                          <i class="material-icons text-danger">trending_down</i>
                                          <a href="#" class="text-warning">You have earned less than your monthly target <?php echo $nt1;?> by <?php echo $lesser ;?></a>
                                      </div>
                                    <?php
                                    }
                                    else
                                    {
                                      $greater1 = $monthlyIncome - $nt1;
                                      ?>
                                      <div class="stats">
                                          <i class="material-icons text-success">trending_up</i>
                                          <a href="#" class="text-success">You have earned greater than your monthly target <?php echo $nt1; ?> by <?php echo $greater1 ;?></a>
                                      </div>
                                    <?php
                                    }
                                  ?>
                                </div>
                            </div>
                        </div>
                        <?php
                                                  $year = date('Y');

                          
                          $sql6 = "SELECT SUM(amountPaid) AS sum6 FROM repairs WHERE year='".$year."'";
                              if($query6 = mysqli_query($dbc,$sql6))
                              {
                                $row6 = mysqli_fetch_assoc($query6);
                                if($row6 > 0)
                                {
                                  $sum6 = $row6['sum6'];
                                  global $sum6;
                                }   
                              }
                          $sql4 = "SELECT SUM(amountPaid1) AS sum4 FROM photography WHERE year='".$year."'";
                                if($query4 = mysqli_query($dbc,$sql4))
                                {
                                  $row4 = mysqli_fetch_assoc($query4);
                                  if($row4 > 0)
                                  {
                                    $sum4 = $row4['sum4'];
                                    global $sum4;
                                  }  
                                }
                          $sql5 = "SELECT SUM(overallCharges) AS sum5 FROM cyber WHERE year='".$year."'";
                                if($query5 = mysqli_query($dbc,$sql5))
                                {
                                  $row5 = mysqli_fetch_assoc($query5);
                                  if($row5 > 0)
                                  {
                                    $sum5 = $row5['sum5'];
                                    global $sum5;
                                  }   
                                }
                             $sql55 = "SELECT SUM(amountP) AS sum55 FROM sales WHERE year='".$year."'";
                                if($query55 = mysqli_query($dbc,$sql55))
                                {
                                  $row55 = mysqli_fetch_assoc($query55);
                                  if($row55 > 0)
                                  
                                  {
                                    $sum55 = $row55['sum55'];
                                    global $sum55;
                                  }   
                                }
                                
                                $yearlyIncome = $sum6+$sum4+$sum5+$sum55;
                                ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">event_available</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Yearly Income: <?php echo $year; ?></p>
                                <h6>ELECTRONICS SOLUTIONS: <?php echo $sum6;?></h6>
                                <h6>PHOTOGRAPHY: <?php echo $sum4;?></h6>
                                <h6>CYBER SERVICES: <?php echo $sum5;?></h6>
                                <h6>SALES: <?php echo $sum55;?></h6>
                                <h6>GRAND TOTAL:</h6>
                                <h4>Ksh: <?php echo $yearlyIncome;;?></h4>
                                </div>
                                <div class="card-footer">
                                       <?php
                                  if($yearlyIncome < $nty)
                                  {
                                    $lesser = $nty - $yearlyIncome ;
                                    ?>
                                    <div class="stats">
                                        <i class="material-icons text-danger">trending_down</i>
                                        <a href="#" class="text-warning">You have earned less than your yearly target <?php echo $nty; ?> by <?php echo $lesser ;?></a>
                                    </div>
                                  <?php
                                  }
                                  else
                                  {
                                    $greater1 = $yearlyIncome  - $nty;
                                    ?>
                                    <div class="stats">
                                        <i class="material-icons text-success">trending_up</i>
                                        <a href="#" class="text-success">You have earned more than your yearly target <?php echo $nty; ?> by <?php echo $greater1 ;?></a>
                                    </div>
                                  <?php
                                  }
                                  ?>
                                </div>
                            </div>
                        </div>
                        <?php
                         //overall income
                                $sql7 = "SELECT SUM(amountPaid) AS sum7 FROM repairs";
                              if($query7 = mysqli_query($dbc,$sql7))
                              {
                                $row7 = mysqli_fetch_assoc($query7);
                                if($row7 > 0)
                                {
                                  $sum7 = $row7['sum7'];
                                  global $sum7;
                                }  
                              }
                          $sql8 = "SELECT SUM(amountPaid1) AS sum8 FROM photography";
                              if($query8 = mysqli_query($dbc,$sql8))
                              {
                                $row8 = mysqli_fetch_assoc($query8);
                                if($row8 > 0)
                                {
                                  $sum8 = $row8['sum8'];
                                  global $sum8;
                                } 
                              }
                            $sql9 = "SELECT SUM(overallCharges) AS sum9 FROM cyber";
                                if($query9 = mysqli_query($dbc,$sql9))
                                {
                                  $row9 = mysqli_fetch_assoc($query9);
                                  if($row9 > 0)
                                  {
                                    $sum9 = $row9['sum9'];
                                    global $sum9;
                                  }  
                                }
                                $sql95 = "SELECT SUM(amountP) AS sum95 FROM sales";
                                if($query95 = mysqli_query($dbc,$sql95))
                                {
                                  $row95 = mysqli_fetch_assoc($query95);
                                  if($row95 > 0)
                                  {
                                    $sum95 = $row95['sum95'];
                                    global $sum95;
                                  }  
                                }
                                $totalIncome = $sum7+$sum8+$sum9+$sum95;
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                              <div class="card-header" data-background-color="red">
                                    <i class="material-icons">event_note</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Overall Income</p>
                              <h6>ELECTRONICS SOLUTIONS: <?php echo $sum7; ?> </h6>
                              <h6>PHOTOGRAPHY: <?php echo $sum8; ?></h6>
                              <h6>CYBER SERVICES: <?php echo $sum9; ?></h6>
                              <h6>SALES: <?php echo $sum95; ?></h6>
                              <h6>GRAND TOTAL:</h6>
                              <h4>KSh: <?php echo $totalIncome; ?></h4>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <!--<div id="myChart4"></div>-->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-chart" data-background-color="green">
                                    <div class="ct-chart" id="myChart4"></div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Hourly Sales</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--carousel-->
                    <div class="row">
                      <!--<div id="myChart4"></div>-->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-chart">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                          <li data-target="#myCarousel" data-slide-to="1"></li>
                                          <li data-target="#myCarousel" data-slide-to="2"></li>
                                          <li data-target="#myCarousel" data-slide-to="3"></li>
                                          <li data-target="#myCarousel" data-slide-to="4"></li>
                                        </ol>
                                      
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                          <div class="item active">
                                            <div id="myChart"></div>
                                            <div class="carousel-caption">
                                              <h3>ELECTRONIC SOLUTIONS</h3>
                                            </div>
                                          </div>
                                      
                                          <div class="item">
                                            <div id="myChart1"></div>
                                            <div class="carousel-caption">
                                              <h3>PHOTOGRAPHY</h3>
                                            </div>
                                          </div>
                                      
                                          <div class="item">
                                            <div id="myChart2"></div>
                                            <div class="carousel-caption">
                                              <h3>CYBER</h3>
                                            </div>
                                          </div>
                            
                                          <div class="item">
                                            <div id="myChart3"></div>
                                            <div class="carousel-caption">
                                              <h3>SALES</h3>
                                            </div>
                                          </div>
                                        </div>

                                      <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                </div>
                                <div class="card-content">
                                    <h4 class="title">Daily Income Progress</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                    
                    <!--end carousel-->
                    <div class="row">
                        <div class="col-lg-6 col-md-12" id="worth">
                            <div class="card card-nav-tabs">
                                <div class="card-header" data-background-color="green">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">Net Worth:</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#profile" data-toggle="tab">
                                                        <i class="material-icons">date_range</i> Monthly
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#messages" data-toggle="tab">
                                                        <i class="material-icons">event_available</i> Yearly
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
                                            <table class="table table-stripped">
                                                <thead>
                                                  <tr>
                                                      <th>Monthly Income (KES)</th>
                                                      <th>Monthly Liabilities (KES)</th>
                                                      <th>Net Monthly Worth (KES)</th>
                                                  </tr>
                                                </thead>
                                        
                                                <tbody>
                                                  <tr>
                                                    <td><?php echo $mi ;?></td>
                                                    <td><?php echo $ntl ;?></td>
                                                    <td><?php echo $capital ;?></td>
                                                  </tr>
                                        
                                                </tbody>
                                          </table>

                                                <?php
                                                 if($ntl > $mi)
          {
            $l = $ntl - $mi;
            $loss = '
                                        <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">trending_down</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="category">MONTHLY LOSS OF '.$l.'
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="#pablo">Check your business proccessess</a>
                                    </div>
                                </div>
                            </div>
            ';
            echo $loss;
          }
          else
          {
            $p = $mi - $ntl;
            $profit = '
                                        <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">trending_up</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="category">MONTHLY PROFIT OF '.$p.' KES</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">done_all</i>
                                        <a href="#pablo">Keep up the good work</a>
                                    </div>
                                </div>
                            </div>
            ';
            echo $profit;
          }
                                                
                                                ?>
                                                  

                                        </div>
                                        <div class="tab-pane" id="messages">
                                            <table class="table table-hover">
                                                <thead>
                                                  <tr>
                                                      <th>Yearly Income (KES)</th>
                                                      <th>Yearly Liabilities (KES)</th>
                                                      <th>Net Yearly Worth (KES)</th>
                                                  </tr>
                                                </thead>
                                        
                                                <tbody>
                                                  <tr>
                                                    <td><?php echo $yi ;?></td>
                                                    <td><?php echo $ntly ;?></td>
                                                    <td><?php echo $capitaly ;?></td>
                                                  </tr>
                                        
                                                </tbody>
                                          </table>
                                            <?php
                                                      if($ntly > $yi)
          {
            $ly = $ntly - $yi;
            $lossy = '
                                        <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">trending_down</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="category">YEARLY LOSS OF '.$ly.'
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <a href="#pablo">Check your business processes</a>
                                    </div>
                                </div>
                            </div>
            ';
            echo $lossy;
          }
          else
          {
            $py = $yi - $ntly;
            $profity = '
            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">trending_up</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="category">YEARLY PROFIT OF '.$py.'
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-success">done_all</i>
                                        <a href="#pablo">Keep up the good work</a>
                                    </div>
                                </div>
                            </div>
            ';
            echo $profity;
          }
                                            
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Debts</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <?php
                                      $sqld = "SELECT * FROM sales WHERE amountP < amountC && discount=0 ORDER BY id DESC";
                                      if($queryd = mysqli_query($dbc,$sqld))
                                      $totaldebts = mysqli_num_rows($queryd);
                                      {?>
                                      <span class="teal-text center"><?php echo $totaldebts;?> Pending Payments</span>
                                      <table class="table table-hover">
                                        <thead>
                                          <tr>
                                              <th>Date</th>
                                              <th>Service Type</th>
                                              <th>Debtor</th>
                                              <th>Amount Paid</th>
                                              <th>Amount Remaining</th>
                                          </tr>
                                        </thead>
                                
                                        <?php
                                        while($rowd = mysqli_fetch_array($queryd,MYSQLI_BOTH))
                                        
                                        {?>
                                          <tbody>
                                          <tr>
                                            <td><?php echo $rowd['dateSold'];?></td>
                                            <td><?php echo $rowd['itemName'];?></td>
                                            <td onclick="Materialize.toast('<?php echo $rowd['cContact'];?>', 4000)"><?php echo $rowd['cName'];?></td>
                                            <td><?php echo $rowd['amountP'];?></td>
                                            <td>
                                            <?php
                                            $remaining = $rowd['amountC'] - $rowd['amountP'];
                                            echo $remaining;
                                            ?>
                                            </td>
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
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script src="../../assets/libs/zing/zingchart.min.js"></script>
<script src="../functions/graph.js"></script>
<script src="../functions/idleState.js"></script>
<!--<script src="../functions/feedback.js"></script>-->
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