<?php
    include '../config/dbconn.php';
    $query = "SELECT * FROM reservation";
    $run = mysqli_query($conn, $query);