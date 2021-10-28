<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");

   // $repairId= $_REQUEST['repairId'];
    $id = mysqli_real_escape_string($dbc,$_POST['id']);

    $amountUpdate = "UPDATE feedback SET status = 'read'
                     WHERE id='".$id."'";
                     
    if($queryUpdate = mysqli_query($dbc,$amountUpdate))
    {
        echo "read";
    }
    else
    {
        echo "unread";
    }

