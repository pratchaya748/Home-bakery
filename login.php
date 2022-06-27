<?php 
session_start();

?>


<!DOCTYPE html>
<!--Code by Web Dev Trick ( https://webdevtrick.com )-->
<!--For More Source Code visit  https://webdevtrick.com -->
<html>

<head>
	<meta charset="UTF-8">
	<title>Home Bekery | Suan Dusit University</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
		integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">

</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100 my-5">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="image/logo.jpeg" class="brand_logo" alt="Logo">
					</div>
				</div>
					<div class="d-flex justify-content-center form_container my-3">
					<form method="post" action="chkLogin.php">
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="txtUsername" class="form-control input_user" value="" placeholder="username">
							</div>
							<div class="input-group mb-2">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="txtPass" class="form-control input_pass" value=""
									placeholder="password">
							</div>
							<!--div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customControlInline">
									<label class="custom-control-label" for="customControlInline">Remember Password</label>
								</div>
							</div-->
					<div class="d-flex justify-content-center mt-3 login_container">
						<button type="submit" name="button" class="btn login_btn btn-primary">Login</button>
					</div>
					</form>
					</div>
				<!-- </form> -->
				<!--div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="https://webdevtrick.com" class="ml-2">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#">Forgot your password?</a>
					</div>
				</div-->
			</div>
		</div>
	</div>
</body>

</html>