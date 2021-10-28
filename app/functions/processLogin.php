<?php
session_start();
require_once("../../incs/conn.php");
require_once '../../assets/classes/detect/Mobile_Detect.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true); // Instantiation and passing `true` enables exceptions
            //Server setting
            $mail->SMTPDebug  = 0; 
 //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
 $mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'guliyetest123@gmail.com';                     // SMTP username
$mail->Password   = 'guliye123';                               // SMTP password
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
 $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
$mail->setFrom('guliyetest123@gmail.com', 'GULIYE TEST');
//what we can do for now is register a user with admin access directly

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']))
{
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();
    $dd = $deviceType;
    $ua = htmlentities($_SERVER['HTTP_USER_AGENT']);
    /*$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDE‌​D_FOR'])?$_SERVER
    ['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];*/

    // the commented function above is deprecated so, lets use an api real quick to get the ip address

    $ip = file_get_contents('https://api.ipify.org');

               
    $host = gethostname();

    $username = mysqli_real_escape_string($dbc,strip_tags($_POST['username']));
    $password = mysqli_real_escape_string($dbc,strip_tags($_POST['password']));
    $failedPass = mysqli_real_escape_string($dbc,strip_tags($_POST['password']));
    
    //this is the function for blocking users on failed login attempts, let's maintain this function for now
    $s = "SELECT * FROM failed_logins WHERE status='blocked' && ip='".$ip."'";
     if($ss = mysqli_query($dbc,$s))
          {
            if(mysqli_num_rows($ss) !=0)
                {
                     ?>
                       <script>
                        $("#inputGroup1").hide();
                        $("#inputGroup2").hide();
                        $("#loginDiv").hide(); 
                        </script>
                        <?php
                    exit("<b>You have been blocked</b>");
                  
                }
            }

            $sql = mysqli_query($dbc,"SELECT * FROM users WHERE username='".$username."' ");
            $rowp = mysqli_fetch_assoc($sql);
            $dbpass1 = $rowp['password'];
            $dbpass2  = $rowp['newPassword'];
            if($dbpass2 =='')
            {
            
                //the login method uses a multi-factor authentication, we shall disable it.. it sends a mail
            if(password_verify($password,$dbpass1))
            {
                
                date_default_timezone_set('Africa/Nairobi');
                $_SESSION['username'] = $rowp['username'];
                $_SESSION['userlevel'] = $rowp['userlevel'];
                $_SESSION['email'] = $rowp['email'];
               // $otp = '1234';
                $otp = rand(100000,999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['timeOTPsent'] = date('Y-m-d h:i s a');
                $insert1 = mysqli_query($dbc,"INSERT INTO signinlogs(username,OTP,timeOTPsent,ip) VALUES
                                        ('".$_SESSION['username']."','".$_SESSION['otp']."','".$_SESSION['timeOTPsent']."','".$ip."')");
                
                //send otp to email, the mail function uses smtp, we can just disable this one sicne we do not need an otp for now
              /*  $to      = $_SESSION['email'];
                $subject = 'One Time Pin';
                $message = $_SESSION['otp'];
                $headers = 'From: webmaster@btms.com' . "\r\n" .
                    'Reply-To: webmaster@btms.com' . "\r\n" .
                    'X-Mailer: PHP/';

                mail($to, $subject, $message, $headers);
                
                */

                //start php mailer function 
                try
                {
                    $mail->addAddress($_SESSION['email'], $_SESSION['username']);     // Add a recipient
                    $mail->addAddress($_SESSION['email']);               // Name is optional
                    $mail->addReplyTo('guliyetest123@gmail.com', 'Guliye Test');
                   
                    $mail->isHTML(true);                                  // Set email format to HTML
                    
                    $mail->Subject = 'OTP FOR SYSTEM';
                    $mail->Body    = 'Please use the following OTP '.$_SESSION['otp'];
                    $mail->AltBody = 'Please use the following OTP '.$_SESSION['otp'];

                    $mail->send();
                    exit ('success');
                }
                catch (Exception $e)
                {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                //end php mailer function 


                exit("success");
            } //if password incorrect, display error, insert into failed logins
            
            else
            {
                $invalid = "<h6>Invalid Credentials
                                    <br/>
                                    <i class='material-icons'>report_problem</i>
                                </h6>";
                echo $invalid;
                
            
               $si = "INSERT INTO failed_logins (ip,device,deviceName,userAgent,failedString,failedPass,dateProccessed)
                       VALUES
                     ('$ip','$dd','$host','$ua','$username','$failedPass', NOW())";
               $siq = mysqli_query($dbc,$si);
               

                        $sip = "SELECT count(ip) AS failed_login_attempt
                                FROM failed_logins
                                WHERE ip = '$ip'
                                AND dateProccessed
                                BETWEEN DATE_SUB( NOW() , INTERVAL 1 DAY )
                                AND NOW()";
                        $result = mysqli_query($dbc,$sip);
                        $row  = mysqli_fetch_assoc($result);
                        $failed_login_attempt = $row['failed_login_attempt'];
                        if($failed_login_attempt == 3){
                         ?>
                        <script>
                        $(function(){
                           var time = 10; //60 seconds = 1 minute
                           
                           function redirect(){
                            var id = setTimeout(redirect, 1000);
                            $('#feedback').html('');
                            $(".timer").html("<b class='text-center alert-warning'>Too many login attempts. Please try again in "+time+" seconds</b>");
                            $("#loginEmail").prop("disabled",true);
                            $("#loginPassword").prop("disabled",true);
                            $("#loginDiv").hide();
                            if(time === 0){
                            clearTimeout(id);
                            $(".timer").html('');
                            $("#loginEmail").prop("disabled",false);
                            $("#loginPassword").prop("disabled",false);
                            $("#loginDiv").show();
                           }
                           time --;
                        }
                        redirect();
                        });
                        </script>
                        
                        <?php
                    }
                    elseif($failed_login_attempt > 3)
                    {
                        $block = mysqli_query($dbc,"UPDATE failed_logins SET status='blocked' WHERE ip='".$ip."' ");
                        if($block){
                            ?>
                            <script>
                               $("#inputGroup1").hide();
                               $("#inputGroup2").hide();
                               $("#loginDiv").hide(); 
                            </script>
                            <?php
                            exit("<b>You have been blocked</b>");
                        }
                    }
            }
        } //other pass
            if($dbpass2 !='')
            {
            
            if(password_verify($password,$dbpass2))
            {
                date_default_timezone_set('Africa/Nairobi');
                $_SESSION['username'] = $rowp['username'];
                $_SESSION['userlevel'] = $rowp['userlevel'];
                $_SESSION['email'] = $rowp['email'];
                $otp = rand(100000,999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['timeOTPsent'] = date('Y-m-d h:i s a');          
                $insert2 = mysqli_query($dbc,"INSERT INTO signinlogs(username,OTP,timeOTPsent,ip) VALUES
                                ('".$_SESSION['username']."','".$_SESSION['otp']."','".$_SESSION['timeOTPsent']."','".$ip."')");
                
               /* $to      = $_SESSION['email'];
                $subject = 'One Time Pin';
                $message = $_SESSION['otp'];
                $headers = 'From: webmaster@btms.com' . "\r\n" .
                'Reply-To: webmaster@btms.com' . "\r\n" .
                    'X-Mailer: PHP/';

                mail($to, $subject, $message, $headers);

                */

                try
                {
                    $mail->addAddress($_SESSION['email'], $_SESSION['username']);     // Add a recipient
                    $mail->addAddress($_SESSION['email']);               // Name is optional
                    $mail->addReplyTo('guliyetest123@gmail.com', 'Guliye Test');
                   
                    $mail->isHTML(true);                                  // Set email format to HTML
                    
                    $mail->Subject = 'OTP FOR SYSTEM';
                    $mail->Body    = 'Please use the following OTP '.$_SESSION['otp'];
                    $mail->AltBody = 'Please use the following OTP '.$_SESSION['otp'];

                    $mail->send();
                    exit ('success');
                }
                catch (Exception $e)
                {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                //end php mailer function 
        
                exit("success");
            } //if password incorrect, display error, insert into failed logins
            else
            if(password_verify($password,$dbpass1))
            {
                ?>
                <script>$(".modified").timeago();</script>
                <?php
                $original = $rowp['dateRegistered'];
                $original1=strtotime($original);
                $new = $rowp['dateModified'];
                $mod =  date(''.$new.'', $original1);
                $m = '<span><b>Your password was changed <time class="modified" datetime="'.$mod.'"></time></b></span>';
                echo $m;
                


            }
            else
            if(password_verify($password,$dbpass2))
            {
                ?>
                <script>
                    $(".modified").timeago();
                </script>
                <?php
                $original = $rowp['dateRegistered'];
                $original1=strtotime($original);
                $new = $rowp['dateModified'];
                $mod =  date(''.$new.'', $original1);
                $m = '<span"><b>Your password was changed <time class="modified" datetime="'.$mod.'"></time></b></span>';
                echo $m;
                


            }
            
            else
            {
                $invalid = "<h6 class='red-text center'>Invalid Credentials
                                    <br/>
                                    <i class='material-icons'>report_problem</i>
                                </h6>";
                echo $invalid;
                
            
               $si = "INSERT INTO failed_logins (ip,device,deviceName,userAgent,failedString,failedPass,dateProccessed)
                       VALUES
                     ('$ip','$dd','$host','$ua','$username','$failedPass', NOW())";
               $siq = mysqli_query($dbc,$si);

                        $sip = "SELECT count(ip) AS failed_login_attempt
                                FROM failed_logins
                                WHERE ip = '$ip'
                                AND dateProccessed
                                BETWEEN DATE_SUB( NOW() , INTERVAL 1 DAY )
                                AND NOW()";
                        $result = mysqli_query($dbc,$sip);
                        $row  = mysqli_fetch_assoc($result);
                        $failed_login_attempt = $row['failed_login_attempt'];
                        if($failed_login_attempt == 3){
                         ?>
                        <script>
                        $(function(){
                           var time = 10; //60 seconds = 1 minute
                           
                           function redirect(){
                            var id = setTimeout(redirect, 1000);
                            $('#feedback').html('');
                            $(".timer").html("<b class='red-text center'>Too many failed login attempts. Please try again in "+time+" seconds</b>");
                            $("#username").prop("disabled",true);
                            $("#password").prop("disabled",true);
                            $("#submit").prop("disabled",true);
                            if(time === 0){
                            clearTimeout(id);
                            $(".timer").html('');
                            $("#username").prop("disabled",false);
                            $("#password").prop("disabled",false);
                            $("#submit").prop("disabled",false);
                           }
                           time --;
                        }
                        redirect();
                        });
                        </script>
                        
                        <?php
                    }
                     elseif($failed_login_attempt > 3)
                    {
                        $block = mysqli_query($dbc,"UPDATE failed_logins SET status='blocked' WHERE ip='".$ip."' ");
                        if($block){
                            ?>
                            <script>
                               $("#inputGroup1").hide();
                               $("#inputGroup2").hide();
                               $("#loginDiv").hide(); 
                            </script>
                            <?php
                            exit("<b>You have been blocked</b>");
                        }
                    }
            }
        } //other pass
           

 
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp']))
{

    //lets just put a custom number here

   // $otpcode = '1234';
   $otpcode = mysqli_real_escape_string($dbc,strip_tags($_POST['otp']));
    
   $selectcode = mysqli_query($dbc, "SELECT * FROM signinlogs WHERE OTP='".$otpcode."'
                              AND
                              username='".$_SESSION['username']."'
                              AND
                              timeOTPsent='".$_SESSION['timeOTPsent']."'
                              ");
    /*

 since we have the same OTP over and over, we will use the 
 GREATER THAN sign


    */
    if(mysqli_num_rows($selectcode) == 1)
    {
        $rowo = mysqli_fetch_assoc($selectcode);
        $_SESSION['otp'] = $rowo['OTP'];
        $_SESSION['TimeLoggedIn'] = date('Y-m-d h:i s a');
        mysqli_query($dbc,  "UPDATE signinlogs SET timeloggedin='".$_SESSION['TimeLoggedIn']."'
                     WHERE
                     username='".$_SESSION['username']."'
                     AND
                     OTP='".$_SESSION['otp']."'");
        exit("successotp");
    }
    else
    {
        exit("<b>Invalid OTP</b>");
    }
    
    

 
}

else
{
    //echo "Form not posted"; //jeez, i really had complicated the login method
}

?>