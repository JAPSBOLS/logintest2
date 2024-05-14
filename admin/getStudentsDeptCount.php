<?php 

include 'config/dbconn.php';

$arr = array();

// Count students from each course
$query = "SELECT department, COUNT(*) as count FROM t_users GROUP BY department";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;

}
$result -> close();
$conn -> close();
echo json_encode($arr);