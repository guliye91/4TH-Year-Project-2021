<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['currentPassword']))
{
    $currentPassword = mysqli_real_escape_string($dbc,strip_tags($_POST['currentPassword']));
    //check the user's password from the database
    $select = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    if($query = mysqli_query($dbc, $select))
    {
		$row = mysqli_fetch_assoc($query);
		$pass1 = $row['password'];
		$pass2 = $row['newPassword'];
		if($pass2 == '')
		{
			if(password_verify($currentPassword, $pass1)){
				echo "correct";
			}
			else
			{
				echo "<span class='text-danger center'><strong>wrong password</strong></span>";
			}
		}
		else
		if($pass2 != '')
		{
			if(password_verify($currentPassword, $pass2)){
				echo "correct";
			}
			else
			{
				echo "<span class='text-danger center'><strong>wrong password</strong></span>";
			}
		}
    }  
}//update password now.
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['newPassword']))
{
		$newPassword = mysqli_real_escape_string($dbc,strip_tags($_POST['newPassword']));
		$confirmnewPassword = mysqli_real_escape_string($dbc,strip_tags($_POST['confirmnewPassword']));
		$newPassword = password_hash($newPassword, PASSWORD_DEFAULT, ['cost' => 12]);
		$confirmnewPassword = password_hash($confirmnewPassword, PASSWORD_DEFAULT, ['cost' => 12]);
		$modifiedOn = date("Y-m-d H:i:t");

    
    $update = "UPDATE users SET newPassword='".$newPassword."',dateModified='".$modifiedOn."' WHERE username='".$_SESSION['username']."'";
    if($query = mysqli_query($dbc,$update))
        {
            if(mysqli_affected_rows($dbc) == 1)
                {
                echo "<span class='text-success center'><strong>Password Updated. Please login with your new password on next logOn</strong></span>";
                }
                else
                {
                 echo "Password Failed to Update. Please Log out first and Try Again";
                }
        }
} 


?>