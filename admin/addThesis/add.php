<?php 

    session_start();

    // Check if form is submitted
    if(isset($_POST['submit'])){
        // Get form data
        $thesis_Title = $_POST['Th_Title'];
        $author_Name = $_POST['TH_Author'];
        $department_Name = $_POST['Th_Department'];
        $abstract = $_POST['Th_Abstract'];
        $category = $_POST['Th_Category'];
        $advisor = $_POST['Th_Advisor'];
        $course = $_POST['Th_Course'];
        $date_Modified = $_POST['Th_DateModified'];
        $thematic_Area = $_POST['Th_ThematicArea'];


        //Database Connection Below
        $con = new mysqli('localhost', 'root', '', 'thesis_information');
        if($con->connect_error) {
            die('Error: ' . $con->connect_error);
        }

        $thesis_data = $con->prepare("INSERT INTO thesis (Th_Title, Th_Abstract, Th_Advisor, Th_Category, 
                                                   Th_Course, Th_DateModified, Th_Department, Th_ThematicArea) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $thesis_data->bind_param("ssssssss", $thesis_Title, $abstract, $advisor, $category, 
                                      $course, $date_Modified, $department_Name, $thematic_Area);
        
        if ($thesis_data->execute()) {
            // id nung bagong lagay na thesis   
            $Thesis_ID = $con->insert_id;

            // issend ang thesis id tas author sa ibang table
            $author = $con->prepare("INSERT INTO thesis_author (Thesis_ID, TH_Author) VALUES (?, ?)");
            $author->bind_param("is", $Thesis_ID, $author_Name);
            $author->execute();
            $author->close();
            $con->close();

            $_SESSION['status']="Thesis Added";
            header("Location: add-thesis.php");
            exit();

        } else {
            echo "Error: " . $thesis_data->error;
        }

        $thesis_data->close();
        $con->close();
    } else {
        //access directly without submitting the form
        header("Location: add-thesis.php");
        exit();
    }
?>
