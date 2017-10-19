<?php
  session_start();//start session to allow access to session variables

	$db = mysqli_connect("localhost", "root", "","accounts");//connect to database

  $username = $_SESSION["username"];//store the current logged user's username into var $username

  $get = "SELECT user_id FROM members WHERE username = '$username'";//select everythinvg from database table called members where the row username matches variable $username
  $result = $db->query($get);//execute the query

  if ($row = mysqli_fetch_assoc($result)) {//if the query is successfull
  	$user_id = $row["user_id"];//store the current logged user's user_id into variable $user_id
  }else{

  }
    $email = mysqli_real_escape_string($db, $_POST['email']);//grab email information using POST method from previous page
    $billAddress = mysqli_real_escape_string($db, $_POST['billAddress']);//grab bill address information using POST method from previous page
    $ccNo = mysqli_real_escape_string($db, $_POST['ccNo']);//grab credit card number information using POST method from previous page
    $cvv = mysqli_real_escape_string($db, $_POST['cvv']);//grab CVV using POST method from previous page
		$ccHolder = mysqli_real_escape_string($db, $_POST["ccHolder"]);//grab Credit Card Holder information using POST method from previous page
    $secureccNo = md5($ccNo); //ccNo are stored using md5 for security purposes
    $secureCVV = md5($cvv); //CVV are stored using md5 for security purposes
    $msgPlan = $_SESSION["subscription"];

    $sql = "INSERT INTO cart(user_id, email, billAddress, ccNo, ccHolder, cvv, msgPlan) VALUES('$user_id', '$email', '$billAddress', '$secureccNo','$ccHolder', '$secureCVV', '$msgPlan')";
    mysqli_query($db, $sql); // insert into cart

    $sql = "UPDATE members SET msglimit = 1, msgQty = NULL WHERE user_id = '$user_id'"; // once confirmed, set the msglimit to unlimited and msgQtyl, NULL
    mysqli_query($db, $sql);//execute the query

 ?>
<!DOCTYPE html>
<html>
<style>
#footerContainer {
  position: absolute;
}

</style>
  <head>
    <link rel="stylesheet" type="text/css" href="../../Client/css/transaction.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <title>
      Confirmation Page
    </title>
  </head>
  <?php include("../../Client/external/nav.php");?>
  <body>
    <h1>Thank you for purchasing our service!</h1>
  </body>
  <?php include("../../Client/external/footer.php");?>
</html>
