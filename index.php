<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
<!--===============================================================================================-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/MPE.png" alt="IMG">
				</div>

				<form class="login100-form" action="controlador\valida.php" method="POST">
					<span class="login100-form-title">
						Fa??a seu login
					</span>

					<div class="wrap-input100" data-validate = "Usu??rio ?? necess??rio">
						<input class="input100" type="email" name="email" placeholder="Usu??rio">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" data-validate = "Senha ?? necess??rio">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<a class="text-danger">	
							<button class="login100-form-btn" type="submit">Login</button>
						</a>
					</div>
				</form>
					<?php
						if (isset($_SESSION['loginErro'])) {
							echo $_SESSION['loginErro'];
							unset($_SESSION['loginErro']);
						} 
			     		 if(isset($_SESSION['logindeslogado'])){
							echo $_SESSION['logindeslogado'];
							unset($_SESSION['logindeslogado']);
		  	    		}
					?>
          
			</div>
		</div>
	</div>	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--<script src="js/main.js"></script>===============================================================================================-->
</body>
</html>