<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_REQUEST["sid"]))
{
    $update = "UPDATE failed_logins SET status='blocked' WHERE id='".$_POST['sid']."' ";
	if($query = mysqli_query($dbc,$update))
    {
        if($affected = mysqli_affected_rows($dbc) ==1)
        {
           echo "STATUS Updated to 'BLOCKED' "; 
        }
        else
        {
            echo "Status Cannot be Updated";
        }
        
    }
    else
    {
        echo "Failed";
    }
}

?>