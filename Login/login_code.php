<?php
session_start();
include '../admin/config/dbconn.php'; // Make sure this file contains your database connection

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

    if (empty($password)) {
        $_SESSION['error'] = "Password is Required";
        header("Location: newlogin.php");
        exit();
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        if ($role === "admin") {
            // Admin login
            if (empty($studNum)) {
                $_SESSION['error'] = "Username is Required";
                header("Location: newlogin.php");
                exit();
            }
            $query = "SELECT t_admin.*, t_users.password 
                      FROM t_admin 
                      INNER JOIN t_users ON t_admin.user_fk = t_users.userID 
                      WHERE t_users.username = '$studNum' AND t_users.password = '$password'";
        } else {
            // Student login
            if (empty($studNum)) {
                $_SESSION['error'] = "Student Number is Required";
                header("Location: newlogin.php");
                exit();
            }
            $query = "SELECT t_student.*, t_users.* FROM t_student 
                        INNER JOIN t_users ON t_student.user_fk = t_users.userID 
                        WHERE t_student.studentNum = '$studNum' AND t_users.password = '$password'";
        }

        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                // User authenticated successfully
                $row = mysqli_fetch_assoc($result);

                $_SESSION['auth'] = true;
                $_SESSION['auth_role'] = $role;
                $_SESSION['user'] = $row; // Storing user data in session
                $_SESSION['username'] = $studNum;
                
                header("Location: ../admin/index.php");
                exit();
            } else {
                //User authentication failed
                if ($role === "admin") {
                    $_SESSION['error'] = "Invalid Username or Password";
                } else {
                    $_SESSION['error'] = "Invalid Student Number or Password";
                }
                header("Location: newlogin.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
            header("Location: newlogin.php");
            exit();
        }
    }
} else {
    header("Location: ../newlogin.php");
}
?>