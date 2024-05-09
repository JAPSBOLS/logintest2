<?php
session_start();


if(isset($_POST['logout_btn'])){

  unset( $_SESSION['auth']);
  unset( $_SESSION['user']);
  unset( $_SESSION['auth_role']);

  $_SESSION['error'] = "log out success";
  header("Location: ../Login/newlogin.php");
  exit(0);
}
?>