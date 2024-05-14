<?php 
$conn = mysqli_connect("localhost","root","","archive system 2");
  
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>