<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['userlevel']) && isset($_SESSION['TimeLoggedIn'])
   && isset($_SESSION['otp']))
{
	header("Location:../dashboard/");
}
else
{
	isset($_SESSION['email']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <link href="css/sans.css" rel="stylesheet">
    <link rel="stylesheet" href="css/meyer.css">
    <link rel="stylesheet" href="css/style.css">
	<link href="../../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='../../assets/icons/MaterialIcons.css' rel='stylesheet' type='text/css'>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/system.PNG');">
			<div class="wrap-login100 p-t-30 p-b-50">
				
		<form id="loginForm">
			<div class="svgContainer">
				<div>
					<img src="./images/email.png" alt="">
				</div>
			</div>
							<div id="feedback" class="text-center alert-danger"></div>
							<div class="timer" class="text-center alert-warning"></div>
							<div id="load" class="login100-form-title p-b-41"></div>
								
							<div class="inputGroup inputGroup1" id="inputGroup1">
								<label for="loginEmail" id="loginEmailLabel">Username</label>
								<input type="text" id="loginEmail" maxlength="254" name="username" required/>
							</div>
							<div class="inputGroup inputGroup2" id="inputGroup2">
								<label for="loginPassword" id="loginPasswordLabel">Password
								</label>
								<input type="password" id="loginPassword" name="password" required/>
								<label id="showPasswordToggle" for="showPasswordCheck">Show
									<input id="showPasswordCheck" type="checkbox"/>
									<div class="indicator"></div>
								</label>
								<label id="forgotPassword" for="forgotPassword" onclick="forgotPassword();">
									Forgot Password
								</label>
							</div>
							<div class="inputGroup inputGroup3" id="loginDiv">
								<button id="login">Log in</button>
							</div>	
						</form>

						<form class="login100-form validate-form p-b-33 p-t-5" id="otpForm">
							<div id="otpload" class="login100-form-title p-b-41"></div>
							<span class="otp">
							Enter the One Time Pin Sent to your email

							</span>
							<div id="otpfeedback" class="text-center alert-danger"></div>
							<div id="otpsuccess" class="text-center alert-success"></div>
							<div class="inputGroup inputGroup1">
								<input type="text" id="otp" maxlength="6" name="otp" placeholder="One Time Pin" required/>
							</div>
							<div class="inputGroup inputGroup3">
								<button type="submit">Confirm OTP</button>
							</div>
							<div class="row">
                                <a href="">Back to Login</a>
                             </div>


						</form>
					</div>
				</div>
			</div>
			

			<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src='js/TweenMax.min.js'></script>
    <script src='js/MorphSVGPlugin.min.js'></script>
    <script  src="js/index.js"></script>
	<script src="js/main.js"></script>
	<script src="../functions/processLogin.js"></script>
	<script src="../functions/reset.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.timeago.js"></script>

</body>
</html>