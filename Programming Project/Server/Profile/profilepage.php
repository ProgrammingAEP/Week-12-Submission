<!DOCTYPE html>
<?php
  session_start();
  $db = mysqli_connect("localhost","root","","accounts"); // connect to database

  if (isset($_GET['user'])) { // get user id from the previous page using URL links
   $user_id = $_GET['user']; // ocne the user is received, store it in the var $user_id
  }

  $year = date("Y");// get the current year

  if (isset($_POST["updateaboutme"])) { // if the user presses updateaboutme button
    $aboutme = $_POST["aboutmeupdate"]; // store the about me update into var $aboutme
    $sql = "UPDATE information SET aboutme = '$aboutme' WHERE user_id = '$user_id'"; // update aboutme section of the currently loggedin user
    mysqli_query($db, $sql); // execute the query
  }

  if (isset($_POST["upload"])) { // if the image upload button is triggered
    $target = "../../Database/img/".basename($_FILES['image']['name']); // set the destination of where the image will be stored
    $image = $_FILES['image']['name']; // the name of the image

    $sql = "SELECT * FROM image WHERE user_id ='$user_id'"; // select everything from image table in teh databsae where the row user_id matches the $user_id
    $result = mysqli_query($db,$sql); // execute the query

    if (mysqli_num_rows($result)>0) { // if the user exists, select the user's row in database and update the image
      $sql = "UPDATE image SET user_id = '$user_id', image = '$image' WHERE user_id = '$user_id'"; // update the user_id and image where the row user_id is $user_id in image table
      mysqli_query($db, $sql); // execute the query

      move_uploaded_file($_FILES['image']['tmp_name'], $target); //  move the file into the $target path
    }else{ // else insert the image into the image table and create a new row with the user_id
      $sql = "INSERT INTO image (user_id, image) VALUES ('$user_id', '$image')"; // insert image into the image table
      mysqli_query($db, $sql); // execute the query

      move_uploaded_file($_FILES['image']['tmp_name'], $target); // move the file into the $target path
    }
  }
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../Client/css/profile.css">
    <meta charset="utf-8">
    <title>Profile</title>
    <?php include("../../Client/external/nav.php");?>
  </head>
  <body>
    <h1 style ="color:#FF3A44; font-family:'lobster', cursive;">PROFILE</h1>
    <section class = "container1">
      <div align="center" class="middle1">>
        <?php
        $sql = "SELECT * FROM image WHERE user_id = '$user_id'";//select everything from table image where the user_id is equal to the currently logged in user
        $result = mysqli_query($db, $sql);//execute the query

        while ($row = mysqli_fetch_array($result)) { // displays user's image
          echo "<img class='person' src='../../Database/img/".$row["image"]."'>";
          echo "<br>";
        }
        ?>
        <p><?php
        $db = mysqli_connect("localhost", "root", "", "accounts");//database connection
        $sql = "SELECT * FROM members WHERE user_id = '$user_id'"; // select EVERYTHING from members where the user_id is equal to the currently logged in user
        $result = $db->query($sql); // execute the query
        	if ($result->num_rows > 0) { // if there are multiple results
        	    // output data of each row
        	  while($row = $result->fetch_assoc()) {
              $age = $year - $row["doby"]; // calculate the age with current year and year of birth from the database
              echo "<h3 class='userdesc'>".$row["fname"]." ".$row["lname"]." || ". $row["gender"]." || ".$age."</h3>"; // display their general information
            }
          }
          $myid = $_SESSION["myid"];
          $defaultimage = "../../Database/img/default.png"; // setting the default image is default.png
          $sql = "SELECT * FROM image WHERE user_id='$myid'";
          $result = $db->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if ($myid == $user_id) { // if it's the LOGGED IN USER'S PROFILE, allow the user to have the choice to update new pic or not.
                echo " <form action='../Profile/profilepage.php?user=$user_id' method='post' enctype='multipart/form-data'>
                <input class='inputButton'type='file' name='image' >";
                echo "<br>";
                echo "<input class='button' type='submit' name='upload' value='Upload'>
                </form>";
              }
            }
          }
        ?></p>
        <br>
      </div>
    </section>

    <div class="middleline"></div>

    <div class="aboutme">
      <?php
        $db = mysqli_connect("localhost", "root", "", "accounts"); // database connection

        $sql ="SELECT * FROM information WHERE user_id = '$user_id'";
        $result = $db->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if ($row["aboutme"] == NULL && $myid == $user_id) { // if the aboutme section hasnt been written, allow the user to write the section
                echo "<form method ='POST' action='../Profile/profilepage.php?user=$user_id'>";
                echo "<textarea name='aboutmeupdate' rows='5' cols='78' placeholder='Please write a brief introduction about yourself!'></textarea>";
                echo '<br>';
                echo "<input type='submit' name='updateaboutme'>";
                echo "</form>";
              }else{ // or if it has been written by the user, display what the user wrote,
                echo "<p>".$row["aboutme"]."</p><br><br>";
              }
            }
          }

        $sql = "SELECT * FROM members AS m INNER JOIN information as f ON m.user_id = f.user_id INNER JOIN ideal as i ON m.user_id = i.user_id INNER JOIN favourites as fa ON m.user_id = fa.user_id WHERE m.user_id = '$user_id'";
        $result = $db->query($sql);
        //PRINT ALL OF THEIR INFORMATION FROM THE TABLE ABOVE
        echo "<br>";
        echo "<table class ='table'>";
        echo "<tr>";
        echo "<th>Height</th>";
        echo "<th>Body Type</th>";
        echo "<th>Occupation</th>";
        echo "<th>Education</th>";
        echo "<th>Ethnic</th>";
        echo "<th>Drink</th>";
        echo "<th>Smoke</th>";
        echo "<th>Religion</th>";
        echo "<th>Favourite Movie Genre</th>";
        echo "<th>Favourite Movie</th>";
        echo "<th>Favourite Music Genre</th>";
        echo "<th>Favourite Song</th>";

        echo "</tr>";
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["height"]."</td>";
              echo "<td>".$row["body"]."</td>";
              echo "<td>".$row["jobs"]."</td>";
              echo "<td>".$row["education"]."</td>";
              echo "<td>".$row["ethnic"]."</td>";
              echo "<td>".$row["drink"]."</td>";
              echo "<td>".$row["smoke"]."</td>";
              echo "<td>".$row["religion"]."</td>";
              echo "<td>".$row["movgenre"]."</td>";
              echo "<td>".$row["favmovie"]."</td>";
              echo "<td>".$row["musgenre"]."</td>";
              echo "<td>".$row["favsong"]."</td>";
            }
          }
        echo "</table>";

        echo "<table class ='table'>";
        echo "<tr>";
        echo "<th>Hobby 1</th>";
        echo "<th>Hobby 2</th>";
        echo "<th>Hobby 3</th>";
        echo "<th>Hobby 4</th>";
        echo "<th>Hobby 5</th>";
        echo "<th>Personality Type</th>";
        echo "<th>Personality</th>";
        echo "<th>Likes to Travel?</th>";
        echo "<th>What country?</th>";
        echo "</tr>";

        $sql = "SELECT * FROM members AS m INNER JOIN information as f ON m.user_id = f.user_id INNER JOIN ideal as i ON m.user_id = i.user_id INNER JOIN favourites as fa ON m.user_id = fa.user_id INNER JOIN hobby as h on m.user_id = h.user_id WHERE m.user_id = '$user_id'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["hobby1"]."</td>";
            echo "<td>".$row["hobby2"]."</td>";
            echo "<td>".$row["hobby3"]."</td>";
            echo "<td>".$row["hobby4"]."</td>";
            echo "<td>".$row["hobby5"]."</td>";
            echo "<td>".$row["ptype"]."</td>";
            echo "<td>".$row["personality"]."</td>";
            echo "<td>".$row["travel"]."</td>";
            echo "<td>".$row["visit"]."</td>";

            echo "</tr>";
          }
        }
        echo "</table>";
      ?>
    </div>
    <?php
      if ($myid == $user_id) { // if the profile page is of the user that is using the account, allow the user to update his profile
        echo "<form method='POST' action='../Preference/updateprofile.php'>";
        echo "<input type='submit' name='Update' value='Update'>";
        echo "</form>";
      }
    ?>
  </body>
  <?php include("../../Client/external/footer.php");?>
</html>
