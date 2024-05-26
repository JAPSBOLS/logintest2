<?php
// Include the TCPDF library
require_once('../../tcpdf/tcpdf.php');

// Include your database connection code
require('../config/dbconn.php'); // Assuming this file contains your database connection code

// Get the thesis code from the POST request
$code = $_POST['Th_Code'];

// Sanitize the input (assuming $conn is your database connection)
$code = mysqli_real_escape_string($conn, $code);

// SQL query to fetch thesis data
$sql = "SELECT * FROM thesis WHERE Th_Code = '$code'";
$result = mysqli_query($conn, $sql);

// Check if any results are found
if (mysqli_num_rows($result) > 0) {
    // Fetch data
    $row = mysqli_fetch_assoc($result);

    // Now, use the fetched data to generate the PDF using TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Thesis PDF');
    $pdf->SetSubject('Thesis Details');
    $pdf->SetKeywords('Thesis, PDF, TCPDF');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Output thesis data to the PDF
    $pdf->Write(0, 'Thesis Title: ' . $row['Th_Title'], '', 0, 'L', true, 0, false, false, 0);
    $pdf->Write(0, 'Thesis Abstract: ' . $row['Th_Abstract'], '', 0, 'L', true, 0, false, false, 0);
    // Add more data as needed

    // Close and output PDF
    $pdf->Output('thesis.pdf', 'I');
} else {
    // No data found
    echo "No thesis found with code: $code";
}

// Close database connection
mysqli_close($conn);
?>
