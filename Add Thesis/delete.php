<?php
$con = new mysqli('localhost', 'root', '', 'thesis informatios');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete keywords associated with the thesis
    $deleteKeywordsQuery = "DELETE FROM keywords WHERE thesis_id = '$id'";
    $runKeywordsDelete = mysqli_query($con, $deleteKeywordsQuery);
    
    if (!$runKeywordsDelete) {
        echo "Error deleting keywords: " . mysqli_error($con);
        exit; // Exit if there's an error deleting keywords
    }

    // Delete the thesis record
    $deleteThesisQuery = "DELETE FROM data WHERE id = '$id'";
    $runThesisDelete = mysqli_query($con, $deleteThesisQuery);

    if ($runThesisDelete) {
        header('location:remove-thesis.php');
        exit; // Exit after successful deletion
    } else {
        echo "Error deleting thesis: " . mysqli_error($con);
    }
}
?>
