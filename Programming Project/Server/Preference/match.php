<!DOCTYPE html>
<?php
  require("preferencefinish.php");// require preferencefinish.php file before displaying this page

  $db = mysqli_connect("localhost", "root", "", "accounts");//connect to the database
  $username = $_SESSION["username"];//store the current logged user's username into variable $username
  $year = date("Y");//used to calculate age later

  $get = "SELECT user_id FROM members WHERE username = '$username'";//select EVERYTHING from database where row username matches the variable $username
  $result = $db->query($get);//run the query

  if ($row = mysqli_fetch_assoc($result)) {//if the query is successfull
    $user_id = $row["user_id"];//store the row user_id from the database table into variable $user_id
  }
?>
<html>
  <?php include("../../Client/external/nav.php");// include Navigation Bar
    foreach($db->query("SELECT COUNT(message) FROM message WHERE friend_id ='$myid' AND status= '1'") as $row) { //  check how many unread messages the user has
	    $notification = $row['COUNT(message)']; // COUNT the quantity of the messages and store it into the var $notification
    }
  ?>
  <head>
		<link rel ="stylesheet" type="text/css" href ="../../Client/css/match.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <title>Match</title>
  </head>
  <body>
  	<h1>FIND YOUR MATCH</h1>
  	<?php
  	$query = "SELECT * FROM members AS m INNER JOIN ideal AS i ON m.user_id=i.user_id INNER JOIN information AS f ON m.user_id = f.user_id INNER JOIN hobby as h ON m.user_id = h.user_id WHERE m.user_id='$user_id'"; // join database table members, ideal, information, hobby and select EVERYTHING where the members table row user_id matches the variable $user_id
  	$result2 = $db->query($query);//run the query with $query from above
  	if ($result2->num_rows > 0) {// if there are multiple results
  	    // output data of each row
  	  while($row = $result2->fetch_assoc()) {//proceed with the code below if the query condition is successfull from above
        if ($row["idealgender"] == "female") { // if the row idealgender is female
          $gender = "Female"; // rewriting the value with Upper case at the front
        }else{
          $gender = "Male"; //rewriting the value with proper spelling and Uppercase
        }
  			$age = $year - $row["doby"]; // calculating age, using the date of birth year in database and current year

        echo "<p class='asd'>Name: ".$row["fname"]." ".$row["lname"]."<br>"."Gender: ".$row["gender"]."<br>"."Age: ".$age."<br>"."Height: ".$row["height"]."<br>"; // print out the user's name, gender, age, height
        echo "Looking for: ".$gender."<br>";//print out the gender user is looking for
        echo "Ideal Body Type: ".$btype."<br></p>"; // print out the body type user is looking for
  		}
      echo "<h2>YOUR MATCHES</h2><br><br>";
  	}
  	$sql = "SELECT * FROM members AS m INNER JOIN ideal AS i ON m.user_id=i.user_id INNER JOIN information AS f ON m.user_id = f.user_id INNER JOIN hobby as h ON m.user_id = h.user_id INNER JOIN result as s ON m.user_id = s.user_id
  	INNER JOIN members as m2 ON m2.user_id=s.partner_id INNER JOIN information AS f2 ON m2.user_id = f2.user_id  INNER JOIN ideal AS i2 ON m2.user_id = i2.user_id INNER JOIN hobby as h2 ON m2.user_id = h2.user_id WHERE m.user_id = $user_id order by s.score desc";
  	$result = $db->query($sql); // joining member, ideal, information, hobby, result to display list of users matched and their informations.
    //THIS IS FOR THE MATCHED USERS (THOSE WHO HAVE MATCHES TO THE CURRENT LOGGED USER)
  	echo "<table>
            <tr style='background: #FFCFD1;'>
    	 	      <th>GENDER</th>
    		      <th>NAME</th>
    		      <th>AGE</th>
    		      <th>HEIGHT</th>
    		      <th>LOOKING FOR</th>
    		      <th>BODY TYPE</th>
              <th>ETHNICITY</th>
    		      <th>COMMON INTERESTS</th>
    		      <th>SCORE</th>
                  <th></th>
  	       </tr>";
  	if ($result -> num_rows > 0) {// if the conditions are all met
  		while ($row = $result->fetch_assoc()) { // print every sin\
  			if ($row["idealgender"] == "male") { // if the row idealgender is male
  				$idealgender = "Male"; //rewrite the value with proper Uppercase
  			}else{
  				$idealgender = "Female"; // rewrite the value with proper Uppercase
  			}
        $ethnic = $row["ethnic"]; // store row ethnic into var $ethnic
  			$age = $year - $row["doby"]; //calulate the user's age from their year of birth and the current year. Current Year - Year of Birth = Current Age
  			$id = $row["user_id"]; // store the row user_id to var $id
        //echo gender, name, age, height, idealgender, body type, ethnic, number of similar interests, compatibility score;
        echo "<tr><td>".$row["gender"]."</td>".
  			"<td>".$row["fname"]." ".$row["lname"]."</td>".
  			"<td>".$age."</td>".
  			"<td>".$row["height"]."</td>".
  			"<td>".$idealgender."</td>".
  			"<td>".$btype."</td>".
        "<td>".$ethnic."</td>".
  			"<td>".$row["similarint"]."</td>".
  			"<td>".$row["score"]."%"."</td>";

        foreach($db->query("SELECT COUNT(*) FROM message WHERE friend_id ='$myid' AND status= '1'") as $row) {
        	$notification = $row['COUNT(*)'];
        } // if the matched user with this id has sent the logged in user a message, display how many unread messages there are
        $sql2 = "SELECT * FROM message WHERE user_id = $id AND status = '1'";
        $result2 = $db->query($sql2);
        if ($row2 = mysqli_fetch_assoc($result2)) { // if the user has messages from a certain person, display how many from such user
          echo "<td><form action='../Profile/profilepage.php?user=$id' method='post'>
  				<a href='../Profile/profilepage.php?user=$id' class='profiletest'>View Profile</a><br>
          <a href='chat.php?user=$id' class='profiletest'>Send Message($notification)</a></td></tr>";
  		    echo "</form>";
        }else{ // else just display the normal buttons
          echo "
          <td><form action='../Profile/profilepage.php?user=$id' method='post'>
          <a href='../Profile/profilepage.php?user=$id' class='profiletest'>View Profile</a><br>
          <a href='chat.php?user=$id' class='profiletest'>Send Message</a></td></tr>";
          echo "</form>";
        }
      }
    }
  	echo "</table>";
    ?>
  </body>
  <?php include("../../Client/external/footer.php");?>
</html>
