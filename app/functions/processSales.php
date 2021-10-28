<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if($_SERVER['REQUEST_METHOD'] == "POST" ){
    
//set form variables
    $user = $_SESSION['username'];
    $dateSold = mysqli_real_escape_string($dbc,strip_tags($_POST['dateSold']));
    $itemName = mysqli_real_escape_string($dbc,strip_tags($_POST['itemName']));
    $quantity = mysqli_real_escape_string($dbc,strip_tags($_POST['quantity']));
    $amountC = mysqli_real_escape_string($dbc,strip_tags($_POST['amountC']));
    $amountP = mysqli_real_escape_string($dbc,strip_tags($_POST['amountP']));
    $discount = mysqli_real_escape_string($dbc,strip_tags($_POST['dv']));
    $cName = mysqli_real_escape_string($dbc,strip_tags($_POST['cName']));
    $cContact = mysqli_real_escape_string($dbc,strip_tags($_POST['cContact']));
    $time = date('H');
    $month = date('F');
    $year = date('Y');
    
    $sqls = "SELECT * FROM stock WHERE stockName='".$itemName."' && stockQuantity=1";
    if($q = mysqli_query($dbc,$sqls))
    {
        if(mysqli_num_rows($q) > 0)
        {
            mysqli_query($dbc,"DELETE FROM stock WHERE stockName='".$itemName."'");
        }
    }
    
    $sqlss = "SELECT * FROM stock WHERE stockName='".$itemName."' && stockQuantity>1";
    if($qs = mysqli_query($dbc,$sqlss))
    {
        if(mysqli_num_rows($qs) > 0)
        {
            mysqli_query($dbc,"UPDATE stock SET stockQuantity=stockQuantity-$quantity,totalAmount=stockAmount*stockQuantity WHERE stockName='".$itemName."'");
        }
    }

        $sql = "INSERT into sales (dateSold,month,year,itemName,quantity,amountC,amountP,discount,cName,cContact,proccessedBy,time)
                VALUES
                ('".$dateSold."','".$month."','".$year."','".$itemName."','".$quantity."','".$amountC."','".$amountP."','".$discount."','".$cName."',
                 '".$cContact."','".$user."','".$time."'
                )";
        if(mysqli_query($dbc,$sql))
        {
            $added = "<h3 class='text-success center'>Record Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h3>";
        echo $added;
        }
        else
        {
            echo "Record Failed to be Added. Please Try Again";
        }
}
?>