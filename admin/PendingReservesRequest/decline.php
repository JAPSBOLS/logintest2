<?php
    session_start();
    include('../config/dbconn.php');

    if (isset($_GET['Th_ID'])) {
        $Thesis_ID = $_GET['Th_ID'];
    
        $conn->begin_transaction();
    
        // Delete the thesis record
        $deleteThesis = "DELETE FROM reservation WHERE Reserv_ID = '$Thesis_ID'";
        $runThesisDelete = mysqli_query($conn, $deleteThesis);
        $msg = "Reservation Successfully Declined";
        $_SESSION['msg'] = $msg;
        header('location: index.php');
        if ($runThesisDelete) {
            $conn->commit();
            
            
            exit; // Exit after successful deletion
        } else {
            $conn->rollback();
            $msg = "Decline Failed";
            $_SESSION['msg'] = $msg;
            exit; // Exit if there's an error
        }
    }