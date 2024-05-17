<?php
include('../config/dbconn.php');

if (isset($_GET['Th_ID'])) {
    $Thesis_ID = $_GET['Th_ID'];

    $conn->begin_transaction();

    // Delete the record in thesis_author
    $deleteAuthor = "DELETE FROM thesis_author WHERE Th_ID = '$Thesis_ID'";
    $Authordelete = mysqli_query($conn, $deleteAuthor);

    // Delete the thesis record
    $deleteThesis = "DELETE FROM thesis WHERE Th_ID = '$Thesis_ID'";
    $runThesisDelete = mysqli_query($conn, $deleteThesis);

    if ($runThesisDelete) {
        $conn->commit();
        header('location: remove-thesis.php');
        exit; // Exit after successful deletion
    } else {
        $conn->rollback();
        echo "Error deleting records: " . mysqli_error($conn);
        exit; // Exit if there's an error
    }
}
?>
