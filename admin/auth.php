<?php
session_start();

if(!isset($_SESSION['auth'])){

  $_SESSION['error'] = "Invalid Login";
  header("Location: ".GROOT."../Login/newlogin.php");
  exit(0);
}

?>