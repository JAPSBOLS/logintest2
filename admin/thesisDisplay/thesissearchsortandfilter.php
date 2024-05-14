<?php
include("../config/dbconn.php");
include("thesis_list.php");

function thesislist($conn, $sql){
    $result = mysqli_query($conn, $sql);

    $thesislist = ""; // Initialize the variable
    $Total_Resultscounter = 0; // Initialize the counter

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $thesislist .= "<div class='card' style='width: 90%; margin:0 auto; position: relative;'>
            <div class='card-body'>
                <u><h2 class='card-title'>". $row["Th_Title"] . "</h2></u>
                <p class='card-text'>

            <h2><mark>" . $row["Th_ReservStatus"] . "<br></mark></h2>

            Code: " . $row["Th_Code"] . "<br>
            Author: " . $row["Authors"] . "<br>
            <div style=\"display: flex; justify-content: space-between;\">
                <div><i>Advisor: " . $row["Th_Advisor"] . "</i></div>
                <div><i>Date Modified: " . $row["Th_DateModified"] . "</i></div>
            </div>
            ".$row["Th_Abstract"]."<br><br>
            </p>
                <a href=\"thesisdetails.php?Th_Code=" . $row["Th_Code"] . "\" style='position: absolute;
                    bottom: 10px; right: 10px;'>
                    <button style='background-color: #4CAF50; /* Green */
                        border: none;
                        font-family: Montserrat;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 4px 2px;
                        cursor: pointer;'>View</button>
                </a>
             </div>
            </div><br>";

        
            $Total_Resultscounter++; // Increment the counter
        }
    } 
    mysqli_close($conn);
    return array($thesislist, $Total_Resultscounter); // Return the list and the count
}

function search($conn, $searchTerm) {
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm); // Sanitize the input

    // Initialize an empty array to hold your filters
    $filters = [];


    if(isset($_POST['Available'])){
        $filters[] = "thesis.Th_ReservStatus = 'Available'";
    }
    if(isset($_POST['On-Hold'])){
        $filters[] = "thesis.Th_ReservStatus = 'On-Hold'";
    }
    if(isset($_POST['Unavailable'])){
        $filters[] = "thesis.Th_ReservStatus = 'Unavailable'";
    }
    if(isset($_POST['Research'])){
        $filters[] = "thesis.Th_Category = 'Research'";
    }
    if(isset($_POST['Development'])){
        $filters[] = "thesis.Th_Category = 'Development'";
    }
    if(isset($_POST['RnD'])){
        $filters[] = "thesis.Th_Category = 'R & D'";
    }
    if(isset($_POST['BEEd'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Elementary Education'";
    }
    if(isset($_POST['BSAT'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Automotive Technology'";
    }
    if(isset($_POST['BSCpE'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Computer Engineering'";
    }
    if(isset($_POST['BSCS'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Computer Science'";
    }
    if(isset($_POST['BSECE'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Electronics Engineering'";
    }
    if(isset($_POST['BSET'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Electronics Technology'";
    }
    if(isset($_POST['BSEntrep'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Entrepreneurship'";
    }
    if(isset($_POST['BSIS'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Information System'";
    }
    if(isset($_POST['BSIT'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Information Technology'";
    }
    if(isset($_POST['BSITa'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Information Technology (Animation)'";
    }
    if(isset($_POST['BSMT'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Mechanical Technology'";
    }
    if(isset($_POST['BSN'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Science in Nursing'";
    }
    if(isset($_POST['BSEde'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Secondary Education Major in English'";
    }
    if(isset($_POST['BSEdm'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Secondary Education Major in Math'";
    }
    if(isset($_POST['BTLEdi'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Technology and Livelihood Education Major in ICT'";
    }
    if(isset($_POST['BTLEdh'])){
        $filters[] = "thesis.Th_Course = 'Bachelor of Technology and Livelihood Education Major in Home Economics'";
    }
    if(isset($_POST['Thematic1'])){
        $filters[] = "thesis.Th_ThematicArea = 'Environment and Natural Resources Systems Management and Development'";
    }
    if(isset($_POST['Thematic2'])){
        $filters[] = "thesis.Th_ThematicArea = 'Climate Change Adaptation and Disaster Risk Reduction'";
    }
    if(isset($_POST['Thematic3'])){
        $filters[] = "thesis.Th_ThematicArea = 'Socio-Economics, Culture and Arts and Governance'";
    }
    if(isset($_POST['Thematic4'])){
        $filters[] = "thesis.Th_ThematicArea = 'Health Systems Management and Development'";
    }
    if(isset($_POST['Thematic5'])){
        $filters[] = "thesis.Th_ThematicArea = 'Gender and Development'";
    }
    if(isset($_POST['Thematic6'])){
        $filters[] = "thesis.Th_ThematicArea = 'Inclusive Education and Lifelong Learning'";
    }
    if(isset($_POST['Thematic7'])){
        $filters[] = "thesis.Th_ThematicArea = 'Food & Nutrition Security and Poverty Reduction'";
    }
    if(isset($_POST['Thematic8'])){
        $filters[] = "thesis.Th_ThematicArea = 'Scientific, Technological Innovations and Techno-Entrepreneurship in Industry, Energy, Emergency Technologies for Global Competitiveness'";
    }


    // Convert the filters array into a string
    $filterString = implode(' OR ', $filters);

    // If there are any filters, add them to the WHERE clause
    $sql = "SELECT thesis.*, GROUP_CONCAT(thesis_author.Th_Author SEPARATOR ', ') as Authors
        FROM thesis 
        JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code
        WHERE thesis.Th_Title LIKE '%$searchTerm%'" . (empty($filters) ? '' : " AND ($filterString)") . "
        GROUP BY thesis.Th_Code";

    return thesislist($conn, $sql);
}

function GetSearchTerm($conn) {
    $searchTerm = ""; // Initialize searchTerm as an empty string
    if (isset($_POST["searchTerm"])) { 
        $searchTerm = $_POST["searchTerm"];
    }
    return  search($conn, $searchTerm); 
}


$output_list = GetSearchTerm($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thesis Page</title>  
</head>
<body style="background-color: #c9d6ff;">
    <div class="container">
        <h2>Results: <?php echo $output_list[1]; ?> </h2>
        <p><?php echo $output_list[0]; ?></p>
    </div>
</body>
</html>