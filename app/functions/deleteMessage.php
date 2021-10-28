<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_REQUEST["sid"]))
{
    $delete = "DELETE FROM feedback WHERE id='".$_POST['sid']."'";
	if($query = mysqli_query($dbc,$delete))
    {
        if($affected = mysqli_affected_rows($dbc) ==1)
        {
           echo "Message Deleted"; 
        }
        else
        {
            echo "Message Cannot be deleted";
        }
        
    }
    else
    {
        echo "Failed";
    }
}


?>