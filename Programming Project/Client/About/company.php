<!DOCTYPE html>
<?php
	session_start();
	$db = mysqli_connect("localhost", "root", "", "accounts");// db server connection

	$username = $_SESSION["username"];//storing logged user's username as username variable
	$get = "SELECT user_id FROM members WHERE username = '$username'";// selecting the user_id of the user logged in.
	$result = $db->query($get);

	if ($row = mysqli_fetch_assoc($result)) { // uf conditions are met, proceed to the code below
		$user_id = $row["user_id"]; // set the current logged user's ID into variable $user_id
	}else{
		echo "<script>alert('You have not logged in! We will take you to the login page!')</script>";
		header("location:../../Server/login/login.php");
	}
?>
<html>
	<head>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel ="stylesheet" type="text/css" href ="../css/index.css">
		<meta charset="utf-8">
		<title>About Us </title>
		<?php include("../external/nav.php");?>
	</head>
	<body>
		<section class ="intro">
			<div class="inner">
				<div class="content">
					<h1>ABOUT US</h1>
				</div>
			</div>
		</section>
		<section class="intro1">
			<div class ="inner1">
				<div class="content1">
					<h1>Our Mission</h1>
					<p2>Splendr started off as a start-up at RMIT University. With one goal in mind to develop a matching making application. With that objective, our team has developed a simple yet effective match making application. We've made  an application that covers the core values of online dating, and we hope to see you on our site.</p2>
				</div>
			</div>
		</section>
	</body>
	<?php include("../external/footer.php");?>
</html>
