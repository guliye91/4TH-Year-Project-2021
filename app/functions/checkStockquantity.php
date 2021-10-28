<?php
require_once("../../incs/authenticator.php");
require_once("../../incs/conn.php");

    
    $item = mysqli_real_escape_string($dbc,strip_tags($_POST['itemName']));
    $quantity = mysqli_real_escape_string($dbc,strip_tags($_POST['quantity']));
    $amountCharged = mysqli_real_escape_string($dbc,strip_tags($_POST['amountC']));
    
    $sql = mysqli_query($dbc,"SELECT * FROM stock WHERE stockName='".$item."' && stockQuantity < '".$quantity."'") or die ("failed");
    if(mysqli_num_rows($sql) > 0)
    {
        $s = mysqli_fetch_array($sql);
        $r = $s['stockQuantity'];
        exit($r . " item /s available");
    }
    else
    {
        $sql1 = mysqli_query($dbc,"SELECT * FROM stock WHERE stockName='".$item."'");
        $row = mysqli_fetch_array($sql1, MYSQLI_BOTH);
        
        $amount = $row['stockAmount'];
        
        $total = $amount * $quantity;
        echo $total;
        
    }
    
?>