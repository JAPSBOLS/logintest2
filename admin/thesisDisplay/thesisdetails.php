<?php
include("../config/dbconn.php");

function getThesisDetails($conn, $code) {
    $code = mysqli_real_escape_string($conn, $code); // Sanitize the input
    $sql = "SELECT thesis.*, GROUP_CONCAT(thesis_author.Th_Author SEPARATOR ', ') as Authors
        FROM thesis 
        JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code
        WHERE thesis.Th_Code = '$code'
        GROUP BY thesis.Th_Code";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row;
}

if (isset($_GET["Th_Code"])) {
    $thesis = getThesisDetails($conn, $_GET["Th_Code"]);
} else {
    echo "No thesis selected.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thesis Details</title>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap'rel="stylesheet">
    <link rel="stylesheet" href="thesisdetailsstyle.css">
</head>
<body style="background-color: #c9d6ff;">
    <div class="container">
        <div class="card">
            <button class="back-button" onclick="goBack()">Go Back</button>
            <button class="reserve-button" onclick="reserveThesis()">Reserve</button>
            <script>
                function goBack() {
                    window.history.back();
                }
                function reserveThesis() {
                    // Add your reservation logic here
                }
            </script>
            <h2><?php echo $thesis["Th_Title"]; ?></h2>
            <p>
                <strong>Status:</strong> <?php echo $thesis["Th_ReservStatus"]; ?><br><br><br>
                <strong>Code:</strong> <?php echo $thesis["Th_Code"]; ?><br><br><br>
                <strong>Category:</strong> <?php echo $thesis["Th_Category"]; ?><br><br><br>
                <strong>Thematic Area:</strong> <?php echo $thesis["Th_ThematicArea"]; ?><br><br><br>
                <strong>Department:</strong> <?php echo $thesis["Th_Department"]; ?><br><br><br>
                <strong>Author:</strong> <?php echo $thesis["Authors"]; ?><br><br><br>
                <strong>Advisor:</strong> <?php echo $thesis["Th_Advisor"]; ?><br><br><br>
                <strong>Abstract:</strong> <?php echo $thesis["Th_Abstract"]; ?><br><br><br>
                <strong>Date Modified:</strong> <?php echo $thesis["Th_DateModified"]; ?><br><br><br>
            </p>
            
        </div>
    </div>
</body>
</html>
