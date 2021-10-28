<?php
require_once("../../incs/authenticator.php");
require_once("../../incs/conn.php");
if($_SERVER['REQUEST_METHOD'] == "POST" ){
    
//set form variables
    $user = $_SESSION['username'];
    $dateReceived2 = mysqli_real_escape_string($dbc,strip_tags($_POST['dateReceived2']));
    $cyber = mysqli_real_escape_string($dbc,strip_tags($_POST['cyber']));
    $amountCharged = mysqli_real_escape_string($dbc,strip_tags($_POST['amountCharged3']));
    $overallCharges = mysqli_real_escape_string($dbc,strip_tags($_POST['overallCharges']));
    $owner = mysqli_real_escape_string($dbc,strip_tags($_POST['owner1']));
    $phone = mysqli_real_escape_string($dbc,strip_tags($_POST['phone1']));
    $month = date('F');
    $year = date('Y');

    $sql = "INSERT into cyber (dateReceived2,month,year,cyber,amountCharged,overallCharges,owner,phoneNumber,proccessedBy)
            VALUES
            ('".$dateReceived2."','".$month."','".$year."','".$cyber."','".$amountCharged."','".$overallCharges."','".$owner."','".$phone."','".$user."'
            )";
    if(mysqli_query($dbc,$sql))
    {
        $added = "<h3 class='text-success center'>Record Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h3>";
        echo $added;
    }
    else
    {
        echo "Record Failed to be Added. Please Try Again";
    }

}
?>