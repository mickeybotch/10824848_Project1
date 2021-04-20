<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$USERNAME = $_POST['USERNAME'];
		$PASSWORD = $_POST['PASSWORD'];
		$EMAIL = $_POST['EMAIL'];

		if(!empty($USERNAME) && !empty($PASSWORD) && !empty($EMAIL) &&!is_numeric($USERNAME))
		{

			$user_id = random_num(20);
			$query = "insert into users (user_id,USERNAME,PASSWORD,EMAIL) values ('$user_id','$USERNAME','$PASSWORD','$EMAIL')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
		<form " id="createAccount">
			<h1 align = "center">Create Account</h1>
			<div ></div>
			<div class= >
				<input type="text" class="form__input" autofocus placeholder="Username"><br>
				<div ></div>
			</div>
			<div class= >
				<input type="text" class="form__input" autofocus placeholder="Email Address"><br>
				<div class="form__input-error-message"></div>
			</div>
			<div class= >
				<input type="password" class="form__input" autofocus placeholder="Password"><br>
				<div class="form__input-error-message"></div>
			</div>
			<div class= >
				
				<div class="form__input-error-message"></div>
			</div>
			<button class="form__button" type="submit">Continue</button>
			
			<p class="form__text">
				<a  class="form__link" href="login.php"  id="linkLogin">Already have an account? Sign in</a>
			</p>
		</form>
	</div>

</body>
</html>