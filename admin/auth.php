<?php
session_start();

if(!isset($_SESSION['auth'])){

  $_SESSION['error'] = "Login to access dashboard";
  header("Location: ../../newlogin.php");
  exit(0);
}
else{

  if($_SESSION['auth_role'] != "admin"){
    $_SESSION['error'] = "You're not authorized as";
    header("Location: ../../newlogin.php");
    exit(0);
  }

}
?>