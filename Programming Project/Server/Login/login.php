<?php session_start();
if(!isset($_SESSION["loggedin"])){// if the $_SESSION["loggedin"] is not set, echo the message below
    echo "<script>alert('You have been redirected to the login page, Please log in to access the homepage')</script>";
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="../../Client/css/login.css">
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>
	<body>
		<form action = "validation.php" method="POST">
			<div class="login">
				<a href="../../Client/Index/index.php"><h1>Splendr</h1></a>
					<?php
						if (isset($_SESSION["error"])){ //  SESSION["error"] is flagged in validation.php file
							echo "<p style=color:red;>"."Your username and password is incorrect!"."<p>";
							session_unset(); // unset any sessions stored as of this point if the login attempt has failed.
						}
					?>
      	<div class="user"><span><input type="text" name ="username" placeholder="Username" id="uname"/></span></div>
      	<div class="pws"><span><input type="password" name="password" placeholder="Password" id="pword"/></span></div>
    		<div class="logbutton"><span><button type ="submit" name ="login_btn">Log In</button></span></div><br>
    </form>
    <div class="logbutton"><span><a href="../Registration/register.php">Sign Up</a></span></div>
     </div>
		<?php include("../../Client/external/footer.php");?>
	</body>
</html>
