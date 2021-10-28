<?php
require_once("../../incs/authenticator.php");
require_once("../../incs/conn.php");
if($_SERVER['REQUEST_METHOD'] == "POST" ){
    
//set form variables
    $user = $_SESSION['username'];
    $dateReceived = mysqli_real_escape_string($dbc,strip_tags($_POST['dateReceived']));
    $itemDescription = mysqli_real_escape_string($dbc,strip_tags($_POST['itemDescription']));
    $itemProblem = mysqli_real_escape_string($dbc,strip_tags($_POST['itemProblem']));
    $Owner = mysqli_real_escape_string($dbc,strip_tags($_POST['Owner']));
    $ownerContact = mysqli_real_escape_string($dbc,strip_tags($_POST['ownerContact']));
    $amountCharged = mysqli_real_escape_string($dbc,strip_tags($_POST['amountCharged']));
    $amountPaid = mysqli_real_escape_string($dbc,strip_tags($_POST['amountPaid']));
    $status = mysqli_real_escape_string($dbc,strip_tags($_POST['status']));
    $month = date('F');
    $year = date('Y');
    
    $sql = "INSERT into repairs (dateReceived,month,year,itemDescription,itemProblem,Owner,ownerContact,amountCharged,amountPaid,status,proccessedBy)
            VALUES
            ('".$dateReceived."','".$month."','".$year."','".$itemDescription."','".$itemProblem."','".$Owner."','".$ownerContact."','".$amountCharged."','".$amountPaid."','".$status."','".$user."'
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



/*
$begin = "BEGIN WORK";
$result = mysqli_query($dbc,$begin);
if(!$result)
{
    echo "an error occured";
}
else
{
$insert = "INSERT into repairs (dateReceived,itemDescription,itemProblem,Owner,ownerContact,Deposit)
        VALUES
        ('".$dateReceived."','".$itemDescription."','".$itemProblem."','".$Owner."','".$ownerContact."','".$Deposit."'
        )";
$result = mysqli_query($dbc,$insert);
if(!$result)
{
    echo "An error occured while updating";
    $sql = "ROLLBACK";
    $result = mysqli_query($dbc,$sql);
}
else
{

        echo "Successfully Updated";
    }
}
}

else
{
    echo "Not Posted";
}
*/


?>