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
    //$userData = executeQuery($GLOBALS['SQL_COMMANDS']['SELECT_USER_WITH_ID'], "i", $id)->fetch_array();
    //$GLOBALS['login'] = executeQuery($GLOBALS['SQL_COMMANDS']['SELECT_ACCESS_TOKEN_WITH_ID_AND_TOKEN'], "si", $token, $id)->num_rows == 1;
  } else $GLOBALS['login'] = false;
  
  if($GLOBALS['login']) {
      if(!isset($_SESSION['token'])){
        $_SESSION['token'] = $_COOKIE['token'];
        $_SESSION['id'] = $_COOKIE['id'];
      }
      if(!isset($_SESSION['username'])) {
        $_SESSION['username'] = $userData['username']; 
      }      
  }

  if($GLOBALS['login']) {
    if(!/*hasRole("LOGIN")*/1) {
      unset($_SESSION);
      unset($_COOKIE);
      unset($GLOBALS);
      $GLOBALS['login'] = false;
      if(!strpos($_SERVER['REQUEST_URI'], "index.php") && !strpos($_SERVER['REQUEST_URI'], "login.php")) header("Location:index.php?msg=error", true, 301);
    }
  }
?>