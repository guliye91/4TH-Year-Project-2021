<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST['newAmounts']))
{
   // $repairId= $_REQUEST['repairId'];
    $id = mysqli_real_escape_string($dbc,$_POST['id']);
    $newAmounts = mysqli_real_escape_string($dbc,$_POST['newAmounts']);
    
    
    $amountUpdate = "UPDATE sales SET amountP = amountP+".$newAmounts."
                     WHERE id='".$id."'";
                     
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
