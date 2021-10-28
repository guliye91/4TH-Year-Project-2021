<?php
require_once("../../incs/conn.php");
if(isset($_POST['username']))
{
    $user = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
   
    $sql = mysqli_query($dbc,"SELECT * FROM  users WHERE username='".$user."' || email = '".$user."'") or die ("query failed");
    if(mysqli_num_rows($sql) > 0)
    {
        $s = mysqli_fetch_array($sql);
        $name    = $s['username'];
        $to      = $s['email'];
        $subject = 'RESET PASSWORD';
        $link = "<a onclick='resetPasswordform()';>Reset Password</a>";

        $message =
        'Hey "'.$name.'" , You are receiving this email because someone sent
        a request to reset your password on Secure Online Business Transactions System.
        If it is not you, please ignore this message.
        If its is YOU, the click the following link to reset the password.
        '.$link.'
        '
        ;
        $headers = 'From: Secure Online Business Transactions' . "\r\n" .
                    'Reply-To: webmaster@btms.com' . "\r\n" .
                    'X-Mailer: PHP/';

        mail($to, $subject, $message, $headers);
        exit("found");
    }
    else
    {
        exit("unavailable");
        
    }   
}
if(isset($_POST['password']))
{
    $user = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
    $password = mysqli_real_escape_string($dbc,strip_tags($_POST['password']));
    $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    $sql = mysqli_query($dbc,"UPDATE users SET newPassword = '".$password."' WHERE username = '".$user."'") or die ("query failed");
    if($sql){
        exit("success");
    }
    else
    {
        exit("failed");
    }
    
}

    
?>