<?php
session_start();
include '../admin/config/dbconn.php';

if(isset($_POST['studNum']) && isset($_POST['password']) && isset($_POST['role'])){

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $studNum    =     test_input($_POST['studNum']);
  $password   =     test_input($_POST['password']);
  $role       =     test_input($_POST['role']);

	if (empty($studNum)) {
		header("Location: ../newlogin.php?error=Student Number is Required");
	}else if (empty($password)) {
		header("Location: ../newlogin.php?error=Password is Required");
	}else {
    echo"hello";
	}

}
else{
  header("Location: ../newlogin.php");
}
?>
