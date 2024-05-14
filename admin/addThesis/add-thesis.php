<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thesis Management System</title>
    <meta charset="UTF-8">
    <meta name="description" content="Add or Remove Thesis Tab">
    <meta name="keywords" content="Thesis, Add Thesis, Remove Thesis">
    <meta name="author" content="Ian Arevalo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleforADD.css">
</head>

    <body>
    
        <div class="container">
            <header>Add Thesis</header>

            <?php 
            if(isset($_SESSION['status']))
            {
                ?>
                    <div class="alert" role="alert">
                        <strong>Hey !</strong> <?= $_SESSION['status'] ?>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  
                    </div>
                <?php 
                unset($_SESSION['status']);
            }
            ?>

            <hr>
            <form action="add.php" method="POST" name="thesis-form">
                <div class="form">
                    <div class="details">
                        <span class="title">INFORMATION FORM</span>
                        <div class="fields">
                            <div class="input-field">
                                <label>Thesis Title </label>
                                <input type="text" placeholder="Enter Thesis Title" required id="Th_Title" name="Th_Title" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Author Name: </label>
                                <input type="text" placeholder="Enter Author Name" required id="TH_Author" name="TH_Author" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Date Modified </label>
                                <input type="date" placeholder="Enter Date" required id="Th_DateModified" name="Th_DateModified" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Department Name </label>
                                <input type="text" placeholder="Enter Department Name" required id="Th_Department" name="Th_Department" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Course </label>
                                <input type="text" placeholder="'Computer', 'AI', 'Basta'" required id="Th_Course" name="Th_Course" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Thematic Area </label>
                                <input type="text" placeholder="'Innovation and Technology', 'Sustainable Development'" required id="Th_ThematicArea" name="Th_ThematicArea" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Advisor </label>
                                <input type="text" placeholder="basta" required id="Th_Advisor" name="Th_Advisor" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label>Thesis Code</label>
                                <input type="text" placeholder="CNH198" required id="Th_Code" name="Th_Advisor" onkeyup="checkform()">
                            </div>
                            <div class="input-field">
                                <label> Category </label>
                                <input type="text" placeholder="basta" required id="Th_Category" name="Th_Category" onkeyup="checkform()">
                            </div>
                        </div>
                        <div class="abstractField">
                            <div class="abstract-field">
                                <label>Abstract </label>
                                <textarea type="text" placeholder="" required id="Th_Abstract" name="Th_Abstract" onkeyup="checkform()"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="formButton" class="button" name="submit" disabled="disabled">SUBMIT</button>
            </form>


            <!-- JavaScript Area-->
            <script>
                // Check form on keyup jajafaf
                function checkform() {
                    var inputs = document.querySelectorAll(".input-field input, #abstract");
                    var isValid = Array.from(inputs).every(input => input.value.trim() !== "");
                    document.getElementById("formButton").disabled = !isValid;
                }
            </script>

            <!-- Remove Thesis Tab -->
            <form action="remove-thesis.php" method="POST">
                <button type="submit" class="remove_button" name="remove_btn"> Want to Remove a Thesis?</button>
            </form>

            <?php
                if(isset($_POST['remove_btn'])){
                    header("Location: remove-thesis.php");
                    exit();
                }
        
                if(isset($_SESSION['status']))
                {
                    ?>
                        <div class="alert" role="alert">
                            <strong>Hey !</strong> <?= $_SESSION['status'] ?>
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  
                        </div>
                    <?php 

                    unset($_SESSION['status']);
                }
            ?>   
            
        </div>
    </body>
</html>






<?php 
session_start();

// Check if form is submitted
if(isset($_POST['submit'])){
    // Get form data
    $thesis_Title = $_POST['Th_Title'];
    $author_Name = $_POST['Th_Author'];
    $department_Name = $_POST['Th_Department'];
    $abstract = $_POST['Th_Abstract'];
    $category = $_POST['Th_Category'];
    $advisor = $_POST['Th_Advisor'];
    $course = $_POST['Th_Course'];
    $date_Modified = $_POST['Th_DateModified'];
    $thematic_Area = $_POST['Th_ThematicArea'];
    $Thesis_Code = $_POST['Th_Code'];

    // Database Connection Below
    $con = new mysqli('localhost', 'root', '', 'thesis_information');
    if($con->connect_error) {
        die('Error: ' . $con->connect_error);
    }

    $stmt_check = $con->prepare("SELECT * FROM thesis WHERE Th_Code = ?");
    $stmt_check->bind_param("s", $Thesis_Code);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if($result->num_rows > 0) {
        $_SESSION['status'] = "Thesis code already exists!";
        $stmt_check->close();
        $con->close();
        header("Location: add-thesis.php");
        exit();
    }

    // Insert data into thesis table
    $thesis_data = $con->prepare("INSERT INTO thesis (Th_Code, Th_Title, Th_Abstract, Th_Advisor, Th_Category, 
                                               Th_Course, Th_DateModified, Th_Department, Th_ThematicArea) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $thesis_data->bind_param("sssssssss", $Thesis_Code, $thesis_Title, $abstract, $advisor, $category, 
                                  $course, $date_Modified, $department_Name, $thematic_Area);

    if ($thesis_data->execute()) {
        // Retrieve the thesis_ID from the thesis_table
        $thesis_id = $thesis_data->insert_id;

        // Insert data into thesis_author table
        $author = $con->prepare("INSERT INTO thesis_author (Th_Code, Th_Author) VALUES (?, ?)");
        $author->bind_param("ss", $Thesis_Code, $author_Name); 

        if ($author->execute()) {
                // Insert data into thesis_ID table
                $stmt_thesis_id = $con->prepare("INSERT INTO th_id (Thesis_ID, Th_Code) VALUES (?, ?)");
                $stmt_thesis_id->bind_param("ss", $thesis_id, $Thesis_Code);
                if ($stmt_thesis_id->execute()) {
                   // $_SESSION['status'] = "Thesis Added";
                } else {
                    echo "Error: " . $stmt_thesis_id->error;
                }
                $stmt_thesis_id->close();

        } else {
            echo "Error: " . $author->error;
        }
    
        $author->close();
        $con->close();
        $_SESSION['status'] = "Thesis Added";
        header("Location: add-thesis.php");
        exit();
        
    } else {
        echo "Error: " . $thesis_data->error;
        $thesis_data->close();
        $con->close();
    }

    



} else {
    // Access directly without submitting the form
    header("Location: add-thesis.php");
    exit();
}

