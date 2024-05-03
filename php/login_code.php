<?php
session_start();
include '../admin/config/dbconn.php';

if (isset($_POST['studNum']) && isset($_POST['password']) && isset($_POST['role'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $studNum = test_input($_POST['studNum']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if ($role === "Admin" && empty($studNum)) {
        $_SESSION['error'] = "Username is Required";
        header("Location: ../newlogin.php");
        exit();
    } else if ($role !== "Admin" && empty($studNum)) {
        $_SESSION['error'] = "Student Number is Required";
        header("Location: ../newlogin.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['error'] = "Password is Required";
        header("Location: ../newlogin.php");
        exit();
    } else {
        // Login logic here
        echo "hello";
    }
} else {
    header("Location: ../newlogin.php");
}
?>