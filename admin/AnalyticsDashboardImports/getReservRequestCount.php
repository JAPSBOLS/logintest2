<?php

include("../config/dbconn.php");

$query = "SELECT COUNT(*) as total from reservation WHERE Status = 'Pending'";
$result = mysqli_query($conn, $query);
$total = mysqli_fetch_assoc($result);

$result -> close();
$conn -> close();

echo json_encode($total['total']);