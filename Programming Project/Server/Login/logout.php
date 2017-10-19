<?php
  session_start();//Start session and grab all avaliable session variables
  session_unset();//then UNSET ALL session variables
  header("location:login.php");//relocate the user to the login page
 ?>
