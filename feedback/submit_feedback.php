<?php 
    session_start();
    include('../admin/config/dbconn.php');

    
$user_rating = $_POST['rating'];
$feedback_type = $_POST['subject_type'];
$user_comment = $_POST['user_review'];
$date = date('Y-m-d'); // Current date
$user_ID = $_SESSION['user']['userID'];

// Sanitize data
$user_rating = mysqli_real_escape_string($conn, $user_rating);
$feedback_type = mysqli_real_escape_string($conn, $feedback_type);
$user_comment = mysqli_real_escape_string($conn, $user_comment);
$date = mysqli_real_escape_string($conn, $date);
$user_ID = mysqli_real_escape_string($conn, $user_ID);


$stmt = $conn->prepare("INSERT INTO t_feedback (user_rating, feedback_type, user_comment, date, user_ID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $user_rating, $feedback_type, $user_comment, $date, $user_ID);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

?>