<?php 

  session_start();  
  include("connection/connection.php");

  if(isset($_SESSION['token'])){
    $token = $_SESSION['token'];
  } else if(isset($_COOKIE['token'])) {    
    $token = $_COOKIE['token'];
  }

  if(isset($token)) {
    $result = $db->sessions->deleteOne(["_id"=>$token]);
  }
  unset($_SESSION['token']);
  setcookie("token", "", time() - 3600, '/');
  header("Location:index.php?msg=logout", true, 301);

?>