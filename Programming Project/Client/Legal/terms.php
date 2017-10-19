<!DOCTYPE html>
<?php
	session_start();
	$db = mysqli_connect("localhost", "root", "", "accounts");// db server connection

	$get = "SELECT user_id FROM members WHERE username = '$username'";// selecting the user_id of the user logged in.
	$result = $db->query($get);// run the SELECT statement from above

	if ($row = mysqli_fetch_assoc($result)) { // uf conditions are met, proceed to the code below
		$user_id = $row["user_id"]; // store the current logged user's ID into variable $user_id
	}else{//if the conditions are NOT met, proceed with the code below
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
		<title>Terms & Conditions</title>
		<?php include("../external/nav.php");?>
	</head>
	<body>
		<section class ="intro">
			<div class="inner">
				<div class="content">
					<h1>TERMS AND CONDITIONS</h1>
				</div>
			</div>
		</section>
		<section class="intro1">
			<div class ="inner1">
				<div class="content1">
					<h1>Disclaimer</h1>
                    <p2>Please use this site with care, as there are many dangers in the online world. Many individuals can be posing as someone else or trying to gain personal information from you. If you suspect any such behavior please use the contact us link and we'll respond immediately.</p2>
				</div>
			</div>
		</section>
	</body>
	<?php include("../external/footer.php");?>
</html>
