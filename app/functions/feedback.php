<?php
require_once("../../incs/conn.php");

if(isset($_POST["message"])){
   
//set form variables
$name = mysqli_real_escape_string($dbc,strip_tags($_POST['name']));
$email = mysqli_real_escape_string($dbc,strip_tags($_POST['email']));
$subject = mysqli_real_escape_string($dbc,strip_tags($_POST['subject']));
$message = mysqli_real_escape_string($dbc,strip_tags($_POST['message']));

$sql = "INSERT into feedback (name,email,subject,message)
        VALUES
        ('".$name."','".$email."','".$subject."','".$message."')";
if(mysqli_query($dbc,$sql))
{
    $added = "sent";
        echo $added;
}
else
{
    echo "Failed. Try Again";
}

}
else
{
    echo "Not Posted";
}

?>