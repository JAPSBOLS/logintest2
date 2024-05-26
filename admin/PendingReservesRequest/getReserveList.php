<?php
    include '../config/dbconn.php';
    $query = "SELECT * FROM reservation WHERE Status = 'Pending'";
    $run = mysqli_query($conn, $query);