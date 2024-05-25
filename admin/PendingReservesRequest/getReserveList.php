<?php
    include '../config/dbconn.php';
    $query = "SELECT * FROM reservation WHERE Status = 'None'";
    $run = mysqli_query($conn, $query);