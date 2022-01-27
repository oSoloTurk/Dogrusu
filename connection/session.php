<?php 
  session_start();  
  require_once("connection.php");
  
  if(isset($_SESSION['token'])){
    $token = $_SESSION['token'];
  } else if(isset($_COOKIE['token'])) {    
    $token = $_COOKIE['token'];
  }
  if(isset($token)) {
    if($db->sessions->findOne(["_id" => $token]) == null) {
      unset($_SESSION["token"]);
      setcookie("token", "", time() - 3600, '/');
      header("Location:index.php?msg=session-out", true, 301);
    }
  }
?>