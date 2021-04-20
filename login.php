<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$USERNAME = $_POST['USERNAME'];
		$PASSWORD = $_POST['PASSWORD'];

		if(!empty($USERNAME) && !empty($PASSWORD) && !is_numeric($USERNAME))
		{

		
			$query = "select * from users where USERNAME= '$USERNAME' limit 1";
			$result = mysqli_query($con, $query);

			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['PASSWORD'] === $PASSWORD)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			
			echo "wrong username or PASSWORD!";
		}else
		{
			echo "wrong username or PASSWORD!";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device -width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Login / Sign Up Form</title>
	<link rel="shortcut icon" href="/assets/favicon.ico">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="container">
		<form class="form " id="login">
			<h1 class="form__title">Login</h1>
			<div class="form__message form__message--error"></div>
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="Username or email">
				<div class="form__input-error-message"></div>
			</div>
			<div class="form__input-group">
				<input type="password" class="form__input" autofocus placeholder="Password">
				<div class="form__input-error-message"></div>
			</div>
			<button class="form__button" type="submit" href="google.com">Continue</button>
			<p class="form__text">
				<a href="#" class="form__link">Forgot your password?</a>
			</p>
			<p class="form__text">
				<a  class="form__link" href="signup.php"  id="linkCreateAccount">Don't have an account?Create account</a>
			</p>
		</form>
		

</body>
</html>

