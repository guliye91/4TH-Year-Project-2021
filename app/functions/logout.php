<?php
session_start();
if(session_destroy()){
header("Location:../login/");
}
else{
    echo 'session failed to destroy';
}



?>