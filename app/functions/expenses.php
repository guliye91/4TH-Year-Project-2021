<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");
if(isset($_POST["expenseName"])){
    
//set form variables
$expenseName = mysqli_real_escape_string($dbc,strip_tags($_POST['expenseName']));
$expenseAmount = mysqli_real_escape_string($dbc,strip_tags($_POST['expenseAmount']));
$month = date('F');
$year = date('Y');

$sql = "INSERT into expenses (expenseName,expenseAmount,month,year)
        VALUES
        ('".$expenseName."','".$expenseAmount."','".$month."','".$year."')";
if(mysqli_query($dbc,$sql))
{
    $added = "<h3 class='green-text center'>Expense Added
                    <br/>
                    <i class='material-icons'>done</i>
                    </h3>";
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