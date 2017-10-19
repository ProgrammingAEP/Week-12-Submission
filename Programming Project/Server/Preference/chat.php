<!DOCTYPE html>
<?php
  session_start();
  $db = mysqli_connect("localhost", "root", "", "accounts");//connect to the database
  $username = $_SESSION["username"];//store the session variable username into variable $username
  date_default_timezone_set("Australia/Sydney");//setting the date timezone to Australia Sydney
  $time = date("h:i:s A"); // time in HH:MM:SS format

  $get = "SELECT * FROM members WHERE username = '$username'";//select everything form the database table MEMBERS where the username meets the username row in database table
  $result = $db->query($get); // run the query

  if ($row = mysqli_fetch_assoc($result)) {// if the query above is successfull
  	$user_id = $row["user_id"];//store the row user_id from the table members to $user_id
  }else{//else
  	echo "User ID has not been found!";//echo this message
  }

  if (isset($_GET['user'])) { // get the matched user_id from url link
    $partner_id = $_GET['user'];//store the user_id from the URL link passed from the previous page into $partner_id
  }else{//else
    echo "Partner ID has not been set yet!";//display this message
  }

  $sql = "SELECT * FROM members WHERE user_id='$partner_id'";// select EVERYTHING from database table "MEMBERS" where the user_id from the database matches the variable $partner_id
  $result = $db->query($sql);

  if ($row = mysqli_fetch_assoc($result)) { //print the name of user whom the message will be sent to
    $name = $row["fname"]." ".$row["lname"]; // combine both first name and last name from the database into one full name in variable $name
  }

  $sql = "SELECT * FROM members AS m INNER JOIN cart AS c ON m.user_id = c.user_id WHERE c.user_id = '$user_id'"; // join members and carts together and see if the user has made any purchase
  $result = $db->query($sql); // run the query
  if ($row = mysqli_fetch_assoc($result)){ // if the query from above is successfull
    if (isset($_POST["send_msg"])) { // when send_msg button is set
      if (isset($_POST["message"])) { // and the message is also set
        $message = mysqli_real_escape_string($db, $_POST["message"]);

        $storemsg = "INSERT INTO message(user_id, friend_id, message, time, status) VALUES('$user_id', '$partner_id', '$message','$time', 1)";//store user_id, friend_id, message, timestamp, read status onto message table
        mysqli_query($db, $storemsg);//execute $storemsg into $db
      }
    }
  }else{ // if no purchase has been made
    $sql = "SELECT * FROM members WHERE user_id = '$user_id'"; // select everything from the database table members where row user_id equals var $user_id
    $result = $db->query($sql);//run the query
    if ($row = mysqli_fetch_assoc($result)) {
      $msgRemaining = $row["msgQty"]; // setting the message limit to msgQty from database(3 messages allowed)
    }
    echo "You have not purchased the unlimited message! <br>";//alert the user

    if ($msgRemaining > 0) {// if msgRemaining is bigger than 0
      if (isset($_POST["send_msg"])) {
        $msgRemaining = $row["msgQty"]; //set the message limit to 3
        $msgRemaining-=1; // reduce msgRemaining by 1 everytime a message is sent

        $sql ="UPDATE members SET msgQty = '$msgRemaining' WHERE user_id = '$user_id'";
        mysqli_query($db, $sql); // update the new msgRemaining into database

        if (isset($_POST["message"])) {// if the message is set
          $message = mysqli_real_escape_string($db, $_POST["message"]); //store the message entered into var $message
          $storemsg = "INSERT INTO message(user_id, friend_id, message, time, status) VALUES('$user_id', '$partner_id', '$message','$time', 1)";//then store the var message into message table with $user_id, $partner_id, $message and set status as unread (1)
          mysqli_query($db, $storemsg);// run the query
        }
      }
    }else{
      if (isset($_POST["send_msg"])) { // if there are no more messages allowed, alert the user to purchase
        echo "<script>alert('You have reached your monthly message limits! Please proceed to our Transaction page to purchase more messages!');</script>";
      }
    }
  }

  $sql = "SELECT * FROM message WHERE user_id = '$user_id' AND friend_id = '$partner_id'  OR user_id ='$partner_id' AND friend_id ='$user_id'";// select the messages that corresponds with user and partner
  $result = $db->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
    while($row = $result->fetch_assoc()) {
      $partner_id2 = $row["friend_id"];
      $user_id2 = $row["user_id"];
    }
    if($user_id == $partner_id2){ // if the user goes into the chat, update status to 0 into the database
      $status = 0;
      $sql = "UPDATE message SET status = 0 WHERE user_id = '$user_id2' AND friend_id='$partner_id2'";
      mysqli_query($db, $sql);
    }
  }
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Client/css/chat.css">
    <meta charset="utf-8">
    <title>Chat</title>
    <?php include("../../Client/external/nav.php");//include navigation bar ?>
  </head>
  <body>
    <form action="chat.php?user=<?php echo $partner_id?>" method="post">
    <h1 style="text-align:center; font-family:'Lobster', cursive; color:#FF3A44;"><?php echo $name; ?></h1>
    <div class= "empty"></div>
    <?php echo "<div class='chat'>";
      $sql = "SELECT * FROM message AS msg INNER JOIN members AS m ON msg.user_id = m.user_id
      WHERE msg.user_id = '$user_id' AND msg.friend_id = '$partner_id' OR msg.user_id ='$partner_id'
      AND msg.friend_id ='$user_id' order by time asc"; // grab messages that corresponds with user and partner
      $result= $db->query($sql);// run the query

      if ($result->num_rows > 0) {// if theres more than 1 result
        // output data of each row
        while($row = $result->fetch_assoc()) {// run the code below while the condition is correct
          echo "<h3>".$row["fname"]."</h3><p>"."(".$row["time"].")".": ".$row["message"]."</p>"; //display name, time and message
        }
      }
      echo "</div>";
    ?>
      <div class="testing">
        <textarea name="message" rows="4" cols="60" required placeholder="Please type a message!"></textarea>
        <br>
        <input type="submit" name="send_msg" value="Send Message">
      </div>
    </form>
  </body>
  <?php include("../../Client/external/footer.php");//include footer?>
</html>
