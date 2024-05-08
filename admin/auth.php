<?php
session_start();

if(!isset($_SESSION['auth'])){

  $_SESSION['error'] = "Login to access dashboard";
  header("Location: ../Login/newlogin.php");
  exit(0);
}

?>