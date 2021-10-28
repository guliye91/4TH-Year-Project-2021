<?php
require_once("../incs/conn.php");
require_once("../incs/authenticator.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $finalAmount = mysqli_real_escape_string($dbc,strip_tags($_POST['finalAmount']));
    
   /* $sql = "INSERT INTO repairs (finalAmount) VALUES
            ('".$finalAmount."') ";*/
    $sql = "UPDATE repairs SET finalAmount='".$finalAmount."'  WHERE repairId='".$_SESSION['repairId']."'";
    if(mysqli_query($dbc,$sql))
    {
        echo "Successfully Updated";
    }
    else
    {
        echo "no";
    }
}
else
{
    echo "Not Posted";
}
?>