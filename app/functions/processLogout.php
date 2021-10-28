<?php
require_once("../../incs/conn.php");
require_once("../../incs/authenticator.php");

  date_default_timezone_set('Africa/Nairobi');
  $timeLoggedout = date('Y-m-d h:i s a');
  $insertOut = "UPDATE signinlogs SET timeLoggedout='".$timeLoggedout."'
                WHERE (username='".$_SESSION['username']."'
                &&
                timeLoggedin='".$_SESSION['TimeLoggedIn']."') LIMIT 1";
  //update logout time and logout
  if($queryOut = mysqli_query($dbc,$insertOut))
  {
    if(session_destroy())
    {
      header("Location:../login");
    }
    
  }
  else
    {
      echo "Log out time update failed";
    }

?>