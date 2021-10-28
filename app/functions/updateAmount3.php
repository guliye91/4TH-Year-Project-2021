<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST['newAmountp']))
{
   // $repairId= $_REQUEST['repairId'];
    $id = mysqli_real_escape_string($dbc,$_POST['id']);
    $newAmounts = mysqli_real_escape_string($dbc,$_POST['newAmountp']);
    
    
    $amountUpdate = "UPDATE photography SET amountPaid1 = amountPaid1+".$newAmounts."
                     WHERE photoId='".$id."'";
                     
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
