<?php
	session_start();
		if(isset($_POST["Update"])) {//if the update button has been pressed from the profile page,
			$_SESSION["update"] = TRUE; // set the session variable $_SESSION["update"] as TRUE
		}
?>
<html>
	<style media="screen">
		#footerContainer {
			position: absolute;
		}
	</style>
	<head>
		<link rel="stylesheet" type="text/css" href="../../Client/css/preference.css">
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php include("../../Client/external/nav.php");?>
		<title>Update Profile</title>
	</head>
  <body>
		<h1>Update Your Profile</h1>
		<div class="updateinfos">
			<button><a href="preference2.php">Edit General Information</a></button>
			<button><a href="preference3.php">Edit Your Favourite Movie & Music</a></button>
			<button><a href="preference4.php">Edit Your Personality & Hobbies</a></button>
			<button><a href="preference5.php">Edit Your Ideal Information</a></button>
			<button><a href="aboutme.php">Edit Your ABOUT ME descriptions</a></button>
		</div>
	</body>
	<?php include("../../Client/external/footer.php");?>
</html>
