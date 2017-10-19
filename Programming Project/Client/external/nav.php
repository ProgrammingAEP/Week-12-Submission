<?php
	$db = mysqli_connect("localhost","root","","accounts"); //databsae connection
	$username = $_SESSION["username"]; //$_SESSION["username"] is the username of the user that is logged in

	$get = "SELECT user_id FROM members WHERE username = '$username'"; // SQL condition grab the logged in user's user id
	$result = $db->query($get); // execute query

	if ($row = mysqli_fetch_assoc($result)) { // if conditions are met, run the code below
		$myid = $row["user_id"];
		$_SESSION["myid"] = $myid;
	}else{
		echo "User ID has not been found!";
	}

	foreach($db->query("SELECT COUNT(message) FROM message WHERE friend_id ='$myid' AND status= '1'") as $row) { // Message Notification System, check for any unread messages to the logged in user
		$notification = $row['COUNT(message)'];
	}
?>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="../../Client/css/nav.css">
<nav class ="navigation">
  <ul>
    <li class="img"><a href="../../Client/index/index.php"><img src="../../Database/img/Logo.png"></a></li>
    <li><a class ="link"href="../../Server/Preference/Match.php">MATCH & CHAT(<?php echo $notification;?>)</a></li>
    <li><a class="link" href="../../Server/Transaction/cart.php">TRANSACTIONS</a></li>

    <?php
			if(isset($_SESSION["loggedin"])){
	      echo"<li><a class='link' href ='../../Server/Profile/profilepage.php?user=$myid'>PROFILE</a></li>";
				echo "<li><a class='link' href=''../../Server/Login/logout.php'>LOGOUT</a></li>";
	    }else{
	      echo"<li><a class ='link' href ='../../Server/Login/login.php'>LOGIN</a></li>";
	    }
		?>

  </ul>
</nav>
