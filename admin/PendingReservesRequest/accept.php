<?php
    session_start();
    include('../config/dbconn.php');

    if (isset($_GET['Th_ID'])) {
        $Thesis_ID = $_GET['Th_ID'];
        $Reserv_ID = $_GET['ReservID'];

    
        
        $thesisList = "SELECT * FROM thesis WHERE Th_Code = '$Thesis_ID'";
        $runThesis = mysqli_query($conn, $thesisList);
        $numRows = mysqli_num_rows($runThesis);
        $thesis = mysqli_fetch_assoc($runThesis);
        if($numRows == 0){
            $_SESSION['msg'] = "Code not found";
        }else if($numRows > 1){
            $_SESSION["msg"] = "Multiple thesis ERROR";

        }else if($thesis['Th_ReservStatus'] == "Unavailable"){
            $_SESSION["msg"] = "Unavailable for reservation";
 
        }else{
            $deleteThesis = "DELETE FROM reservation WHERE Reserv_ID = '$Reserv_ID'";
            $runThesisDelete = mysqli_query($conn, $deleteThesis);
            $updateThesis = "UPDATE thesis SET Th_ReservStatus='Unavailable' WHERE Th_Code = '$Thesis_ID'";
            $runThesis = mysqli_query($conn, $updateThesis);

            $_SESSION["msg"] = "Successfully reserved Th Code ". $Thesis_ID;

        }
        header('location: index.php');
        exit;
    }