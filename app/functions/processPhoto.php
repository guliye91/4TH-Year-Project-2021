<?php
//for photography
require_once("../../incs/authenticator.php");
require_once("../../incs/conn.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
//set form variables
    $user = $_SESSION['username'];
    $dateReceived1 = mysqli_real_escape_string($dbc,strip_tags($_POST['dateReceived1']));
    $photoOption = mysqli_real_escape_string($dbc,strip_tags($_POST['photoOption']));
    $source = mysqli_real_escape_string($dbc,strip_tags($_POST['source']));
    $amountCharged1 = mysqli_real_escape_string($dbc,strip_tags($_POST['amountCharged1']));
    $amountPaid1 = mysqli_real_escape_string($dbc,strip_tags($_POST['amountPaid1']));
    $customerName= mysqli_real_escape_string($dbc,strip_tags($_POST['cName1']));
    $customerContact = mysqli_real_escape_string($dbc,strip_tags($_POST['cContact1']));
    $month = date('F');
    $year = date('Y');

    
    $sql = "INSERT into photography (dateReceived1,month,year,photoOption,source,amountCharged,amountPaid1,cName,cContact,proccessedBy)
            VALUES
            ('".$dateReceived1."','".$month."','".$year."','".$photoOption."','".$source."','".$amountCharged1."','".$amountPaid1."','".$customerName."','".$customerContact."','".$user."'
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