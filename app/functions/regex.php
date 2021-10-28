<?php
require_once("../incs/conn.php");
if(isset($_POST['submit']))
{
    $user = mysqli_real_escape_string($dbc,$_POST['user']);
    $users = mysqli_query($dbc,"SELECT *  FROM users WHERE username='".$user."'");
    $row = mysqli_fetch_assoc($users);
    $username = $row['username'];
    
    
    if(preg_match("/$username/", $user,$match))
    {
        echo "user". $user. "is in the database";
    }
    else
    {
        echo "User does not existooooooooooooooooooooooooooooooo";
    }
}

?>
<form method="post" action="">
    <input type="text" name="user">
    
    <input type="submit" name="submit">
</form>