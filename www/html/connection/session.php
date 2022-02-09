<?php 
  session_start();  
  require_once("connection.php");

  function requiredLogin($isRequired = true) {
    if($isRequired && !isset($_SESSION["user"])) {
      header("Location:index.php?msg=session-out", true, 301);
    }
  }
?>