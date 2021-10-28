<?php
require_once("../incs/conn.php");
require_once("../incs/authenticator.php");
if(isset($_POST["liabilities"])){
    
//set form variables
$liabilities = mysqli_real_escape_string($dbc,strip_tags($_POST['liabilities']));

$sql = "INSERT into capital (liabilities) VALUES ('".$liabilities."')";
if(mysqli_query($dbc,$sql))
{
    $added = "<h6 class='text-success center'>Amount Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h6>";
        echo $added;
}
else
{
    echo "failed to Insert";
}

}
else
{
    echo "Not Posted";
}


?>