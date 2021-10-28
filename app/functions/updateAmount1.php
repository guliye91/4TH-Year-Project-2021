<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST['newAmountc']))
{
   // $repairId= $_REQUEST['repairId'];
    $cyberId = mysqli_real_escape_string($dbc,$_POST['cyberId']);
    $newAmountc = mysqli_real_escape_string($dbc,$_POST['newAmountc']);
    
    
    $amountUpdate = "UPDATE cyber SET overallCharges = overallCharges+".$newAmountc."
                     WHERE cyberId='".$cyberId."'";
                     
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
