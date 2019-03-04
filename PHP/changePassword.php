<!DOCTYPE html>
<html lang="en">
<head>
	<title>NEEC - Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://membros.neec-fct.com/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/css/util.css">
	<link rel="stylesheet" type="text/css" href="https://membros.neec-fct.com/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="https://membros.neec-fct.com/images/img-01.png" alt="IMG">
				</div>

				<form class="login"  action="/PHP/changePasswordRequest.php?email=<?php echo $_GET["email"] ?>&hash=<?php echo $_GET["hash"] ?>"  method="post"   >
					<span class="login100-form-title">
						Nova password
					</span>

			
					<div class="wrap-input100 validate-input" data-validate = "Password  Nova">
						<input class="input100" type="password" name="pass1" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password  Repetir">
						<input class="input100" type="password" name="pass2" placeholder="Password Repetir">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<br><br><br>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Reset
						</button>
					</div>


				</form>															<div class="container-login100-form-btn">					</div>										
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="https://membros.neec-fct.com/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="https://membros.neec-fct.com/vendor/bootstrap/js/popper.js"></script>
	<script src="https://membros.neec-fct.com/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="https://membros.neec-fct.com/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="https://membros.neec-fct.com/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="https://membros.neec-fct.com/js/main.js"></script>

</body>
</html>