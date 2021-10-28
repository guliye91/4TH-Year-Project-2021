<?php
session_start();
if(!$_SESSION['username'] || !$_SESSION['userlevel'] || !$_SESSION['TimeLoggedIn'] || !$_SESSION['otp'])
{
  //header('Location: ../login/');
  exit(header('Location: ../login/'));
}
date_default_timezone_set('Africa/Nairobi');
?>