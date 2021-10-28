<?php
require_once("../../incs/conn.php");
//require_once("../incs/authenticator.php");
if(isset($_POST["stockName"])){
    
//set form variables
$stockName = mysqli_real_escape_string($dbc,strip_tags($_POST['stockName']));
$stockQuantity = mysqli_real_escape_string($dbc,strip_tags($_POST['stockQuantity']));
$stockAmount = mysqli_real_escape_string($dbc,strip_tags($_POST['stockAmount']));
$totalAmount = $stockQuantity*$stockAmount;

$sql = "INSERT into stock (stockName,stockQuantity,stockAmount,totalAmount)
        VALUES
        ('".$stockName."','".$stockQuantity."','".$stockAmount."','".$totalAmount."')";
if(mysqli_query($dbc,$sql))
{
    $added = "<b class='success-text'>Stock Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </b>";
        echo $added;
}
else
{
    echo "Failed. Try Again";
}

}
else
{
    echo "Not Posted";
}


?>