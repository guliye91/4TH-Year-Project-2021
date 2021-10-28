<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="../login/css/style.css">
    <!--<link rel="stylesheet" href="../../assets/css/loader.css">-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../login/images/system.PNG');">
			<div class="wrap-login100 p-t-30 p-b-50">
						<form class="login100-form validate-form p-b-33 p-t-5" id="userForm">
                            <div id="loader" class="login100-form-title p-b-41"></div>
							<span class="otp">
							Enter your registered Username or Email

							</span>
							<div id="error" class="text-center alert-danger"></div>
                            <div id="success" class="text-center alert-success"></div>
                            
							<div class="inputGroup inputGroup1">
								<input type="text" id="username"  name="username" placeholder="Username or Email" required/>
							</div>
							<div class="inputGroup inputGroup3">
								<button type="submit" onclick="findUser();">Confirm</button>
							</div>
                            <div class="row">
                                <a href="../login">Back to Login</a>
                             </div>
						</form>
                        <form class="login100-form validate-form p-b-33 p-t-5" id="resetPasswordform">
							<span class="otp">
							Enter a new Password to Reset your old password

							</span>
							<div id="error1" class="text-center alert-danger"></div>
                            <div id="success1" class="text-center alert-success"></div>
							<div class="inputGroup inputGroup1">
								<input type="password" id="password"  name="password" required/>
							</div>
                            <div class="inputGroup inputGroup1">
								<input type="password" id="confirm-password"  name="confirm-password" required/>
							</div>
							<div class="inputGroup inputGroup3">
								<button type="submit">Reset Password</button>
							</div>
                            <div class="row">
                                <a href="../login">Back to Login</a>
                             </div>
						</form>
					</div>
				</div>
			</div>

<!--===============================================================================================-->
	<script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../functions/reset.js"></script>

</body>
</html>