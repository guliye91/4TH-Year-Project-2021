<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST["orderName"])){
    
//set form variables
$dateOrdered = mysqli_real_escape_string($dbc,strip_tags($_POST['dateOrdered']));
$orderName = mysqli_real_escape_string($dbc,strip_tags($_POST['orderName']));
$quantity = mysqli_real_escape_string($dbc,strip_tags($_POST['quantity1']));
$orderAmount = mysqli_real_escape_string($dbc,strip_tags($_POST['amountChargedo']));
$deposit = mysqli_real_escape_string($dbc,strip_tags($_POST['deposit1']));
$customerName = mysqli_real_escape_string($dbc,strip_tags($_POST['owner2']));
$customerContact = mysqli_real_escape_string($dbc,strip_tags($_POST['phone2']));

$sql = "INSERT into orders (dateOrdered, orderName,quantity,amountCharged,deposit,customerName,customerContact)
        VALUES
        ('".$dateOrdered."','".$orderName."','".$quantity."','".$orderAmount."','".$deposit."','".$customerName."','".$customerContact."')";
if(mysqli_query($dbc,$sql))
{
    $added = "<h3 class='green-text center'>Order Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h3>";
        echo $added;
}
else
{
    echo mysqli_error($dbc);
   // echo "Failed. Try Again";
}

}
else
{
    echo "Not Posted";
}


?>