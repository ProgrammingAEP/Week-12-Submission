<!DOCTYPE html>
<?php session_start();
  $_SESSION["loggedin"] = TRUE;//set the session variable $_SESSION["loggedin"] as TRUE
?>
<html>
  <head>
    <style>
      a{
        color: #FF3A44;
        font-family: 'Roboto', sans-serif;
        text-decoration: none;
      }
       .testing{
        text-align: center;
      }
    </style>
    <meta charset="utf-8">
    <title>Register Complete</title>
    <link rel="stylesheet" type="text/css" href="../../Client/css/registration.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <?php include("../../Client/external/nav.php");?>
  <body>
    <div class="middle">
      <h1 style = "font-family:'Lobster', cursive;">Welcome to the Slendr club! </h1>
      <a href="../Preference/preferences.php" class ="loginnow">Lets get Started</a>
    </div>
  </body>
  <?php include("../../Client/external/footer.php");?>
</html>
