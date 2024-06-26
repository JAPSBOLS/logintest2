<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['submit'])) {
    $thesis_code = $_POST['Th_Code'];
    $user_name = $_POST['User_Name'];
    $reserve_date = $_POST['Reserv_Date'];
    $return_date = $_POST['Return_Date'];

    $reserve_data = $conn->prepare("INSERT INTO reservation (Th_Code, User_Name, Reserv_Date, Return_Date) VALUES (?, ?, ?, ?)");
    $reserve_data->bind_param("ssss", $thesis_code, $user_name, $reserve_date, $return_date);

    $reserve_data->execute();

    $_SESSION['status'] = "Thesis Reserved";
    $_SESSION['status_code'] = "success";
    header("Location: thesisdetails.php?Th_Code=$thesis_code");
    $reserve_data->close();

    $conn->close();
    exit(); 
} else {
    echo "Error";
}
