<?php 

  session_start();  
  include("connection/connection.php");

  if(isset($_SESSION["user"])) {
    unset($_SESSION['user']);
  }
  header("Location:index.php?msg=logout", true, 301);

?>