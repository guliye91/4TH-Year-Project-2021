<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['dtarget'])){
    
//set form variables
$dtarget = mysqli_real_escape_string($dbc,strip_tags($_POST['dtarget']));
$fullDate1 = date("Y-m-d");
 $update1 = "INSERT INTO dailytarget (dailyTarget,dateSet) VALUES ('".$dtarget."','".$fullDate1."') ";
    
        if($query1 = mysqli_query($dbc,$update1))
        {
            $added1 = "<p class='text-success center'>Daily Target Set Successfully
                            </p>";
                echo $added1;
        }
}
else
{
    //echo "Not Posted";
}

//for monthly target
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['mtarget'])){
    
//set form variables
$mtarget = mysqli_real_escape_string($dbc,strip_tags($_POST['mtarget']));
$fullDate = date("Y-m-d");
 $update = "INSERT INTO monthlytarget (monthlyTarget,dateSet) VALUES ('".$mtarget."','".$fullDate."') ";
if($query = mysqli_query($dbc,$update))
{
    $added = "<p class='text-success center'>Monthly Target Set Successfully
                    </p>";
        echo $added;
}
}
else
{
   // echo "Not Posted";
}

//for yearly target
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ytarget'])){
    
//set form variables
$ytarget = mysqli_real_escape_string($dbc,strip_tags($_POST['ytarget']));
$fullDate = date("Y-m-d");
 $update2 = "INSERT INTO yearlytarget (yearlytarget,dateSet) VALUES ('".$ytarget."','".$fullDate."') ";
if($query2 = mysqli_query($dbc,$update2))
{
    $added2 = "<p class='text-success center'>Yearly Target Set Successfully
                    </p>";
        echo $added2;
}
}
else
{
   // echo "Not Posted";
}

?>