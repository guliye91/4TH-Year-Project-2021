<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_REQUEST["sid"]))
{
    $delete = "DELETE FROM users WHERE userId='".$_POST['sid']."' && username!='".$_SESSION['username']."'";
	if($query = mysqli_query($dbc,$delete))
    {
        if($affected = mysqli_affected_rows($dbc) ==1)
        {
           echo "User Deleted"; 
        }
        else
        {
            echo "User Cannot be deleted";
        }
        
    }
    else
    {
        echo "Failed";
    }
}


?>