<?php
	session_start();

	$db = mysqli_connect("localhost", "root", "", "accounts" );

	$username = $_SESSION["username"];//fetch SESSION["username"] from validation.php
	$get = "SELECT user_id FROM members WHERE username = '$username'"; //sql statement to find user_id
	$result = $db->query($get);

	if ($row = mysqli_fetch_assoc($result)) {
		$user_id = $row["user_id"]; // find user_id of the currently logged in user
	}else{
		echo "user ID has not been found!";// else if not found, print.
	}
?>
<html>
	<head>
		<title>About ME</title>
		<style>
			#footerContainer{
				position: absolute;
			}
		</style>

		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../Client/css/preference.css">
		<?php include("../../Client/external/nav.php"); ?>
	</head>
  <body>
		<div class="updateinfos">
			<h1>Edit your ABOUT ME section!</h1>
			<form action="../Profile/profilepage.php?user=<?php echo $user_id;?>" method="post">
				<textarea name="aboutmeupdate" rows="8" cols="80" placeholder="Please write a brief introduction about yourself!"></textarea><br>
				<input type="submit" name="updateaboutme">
			</form>
		</div>
	</body>
	<?php include("../../Client/external/footer.php");?>
</html>
