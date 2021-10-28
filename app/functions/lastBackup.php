<?php
$dir = '../../backup';

//sort in ascending order

$a = scandir($dir);
//sort in descending order
$b = scandir($dir,1);

print_r($a);
//print_r($b);
/*
$dir = '../../backup';
$files = array();

if($handle = opendir($dir)){
    while(false !== ($file = readdir($handle))){
        if($file!="." && $file != ".."){
            $files[filemtime($file)] = $file;
        }
    }
    closedir($handle);
    //sort
    ksort($files);
    //find last modification
    $reallyLastModified = end($files);
    
    foreach($files as $file){
        $lastModified = date('F d Y, H:i:s', filemtime($file));
        if(strlen($file)-strpos($file,".sql") == 4){
            //do stuff for last modified file
            echo "hey";
        }
    }
}

*/


?>