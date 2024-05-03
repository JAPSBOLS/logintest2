<?php

  // database connection
  
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "archive system 2";

  $conn = mysqli_connect ("$host","$username","$password","$database");

  if(!$conn)
  {
    die("Something Went Wrong");
  }
?>