<?php

include("../config/dbconn.php");

$query = "SELECT COUNT(*) as count from thesis WHERE Th_ReservStatus = 'Available'";
$result = mysqli_query($conn, $query);
$count = mysqli_fetch_assoc($result);

$query = "SELECT COUNT(*) as total from thesis";
$result = mysqli_query($conn, $query);
$total = mysqli_fetch_assoc($result);

$result -> close();
$conn -> close();

echo json_encode($count["count"] / $total["total"]);