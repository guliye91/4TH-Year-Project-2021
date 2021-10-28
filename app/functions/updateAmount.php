<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST['newAmount']))
{
   // $repairId= $_REQUEST['repairId'];
    $repairId = mysqli_real_escape_string($dbc,$_POST['repairId']);
    $newAmount = mysqli_real_escape_string($dbc,$_POST['newAmount']);
    
    
    $amountUpdate = "UPDATE repairs SET amountPaid = amountPaid+".$newAmount."
                     WHERE repairId='".$repairId."'";
                     
    if($queryUpdate = mysqli_query($dbc,$amountUpdate))
    {
        echo "Amount Updated Successfully";
    }
    else
    {
        echo "Failed to Update. Please try again";
    }
}
else
{
    echo "Please try again";
}
