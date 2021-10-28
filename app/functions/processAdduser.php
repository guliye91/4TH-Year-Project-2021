<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST["username"])){
    
//set form variables
$username = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
$password = mysqli_real_escape_string($dbc,strip_tags($_POST['password']));
$cpassword = mysqli_real_escape_string($dbc,strip_tags($_POST['cpassword']));
$email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
//$RegisterdOn = date("Y-m-d h:i:t");
$RegisterdOn = date("H:i:s F d Y ");
$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
$cpassword = password_hash($cpassword, PASSWORD_DEFAULT, ['cost' => 12]);

//check for duplicate email in database
$check = "SELECT username FROM users WHERE username='".$username."'";
if($query = mysqli_query($dbc,$check)){
    if($num = mysqli_num_rows($query) ==1){
        exit($error = "The user $username is already in use in this system");
    }
}
$sql = "INSERT into users (username,email,password,dateRegistered) VALUES ('".$username."','".$email."','".$password."','".$RegisterdOn."')";
if(mysqli_query($dbc,$sql))
{
    $added = "<h3 class='text-success center'>User Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h3>";
        echo $added;
}
else
{
    echo "User failed to Insert";
}

}
else
{
    echo "Not Posted";
}


?>