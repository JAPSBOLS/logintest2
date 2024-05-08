<?php
session_start();


if(isset($_POST['logout_btn'])){

  unset( $_SESSION['auth']);
  unset( $_SESSION['username']);
  unset( $_SESSION['auth_user']);

  $_SESSION['error'] = "log out success";
  header("Location: ../Login/newlogin.php");
  exit(0);
}
?>