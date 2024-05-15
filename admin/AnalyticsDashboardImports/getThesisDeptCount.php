<?php 

include '../config/dbconn.php';

$arr = array();

// Count students from each course
$query = "SELECT Th_Department, COUNT(*) as count FROM thesis GROUP BY Th_Department";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;

}
$result -> close();
$conn -> close();
echo json_encode($arr);