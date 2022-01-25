<?php 

  session_start();
  
  include("connection/connection.php");

  if(isset($_SESSION['token']) && isset($_SESSION['id'])){
    $token = $_SESSION['token'];
    $id = $_SESSION['id'];
  } else if(isset($_COOKIE['token']) && isset($_COOKIE['id'])) {    
    $token = $_COOKIE['token'];
    $id = $_COOKIE['id'];
  }

  if(isset($token)) {
    $affected = executeQuery($GLOBALS['SQL_COMMANDS']['SELECT_ACCESS_TOKEN_WITH_ID_AND_TOKEN'], "si", $token, $id)->num_rows;
    if($affected == 1){
      if(empty($_SESSION['token'])){
        unset($_COOKIE['token']);
        unset($_COOKIE['id']);
      } else {
        unset($_SESSION['token']);
        unset($_SESSION['id']);
      }
      executeQuery($GLOBALS['SQL_COMMANDS']['DELETE_ACCESS_TOKEN'], "i", $id);
    }
  }
  header("Location:index.php", true, 301);

?>