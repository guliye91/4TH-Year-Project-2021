<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_REQUEST["sid"]))
{
    $update = "UPDATE users SET userlevel='admin' WHERE userId='".$_POST['sid']."' ";
	if($query = mysqli_query($dbc,$update))
    {
        if($affected = mysqli_affected_rows($dbc) ==1)
        {
           echo "User Level Updated to 'USER' "; 
        }
        else
        {
            echo "User Level Cannot be Updated";
        }
        
    }
    else
    {
        echo "Failed";
    }
}


?>