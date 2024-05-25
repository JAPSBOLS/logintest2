<?php
    session_start();
    include('../config/dbconn.php');

    if (isset($_GET['Th_ID'])) {
        $Thesis_ID = $_GET['Th_ID'];
        $Reserv_ID = $_GET['ReservID'];

        $updateThesis = "UPDATE thesis SET Th_ReservStatus='Available' WHERE Th_Code = '$Thesis_ID'";
        $runThesis = mysqli_query($conn, $updateThesis);

        $setStatus = "DELETE FROM reservation WHERE Reserv_ID = '$Reserv_ID'";
        $runsetStatus = mysqli_query($conn, $setStatus);

        $_SESSION["msg"] = "Successfully remove reservation on Th Code ". $Thesis_ID;
        header('location: index.php');
        exit;
    }