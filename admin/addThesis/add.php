<script src="scripts.js"></script>
<?php 
session_start();
include('dbcon.php');


if(isset($_POST['submit'])){
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

    $duplicate_Th_Code_checker = $conn->prepare("SELECT * FROM thesis WHERE Th_Code =?");
    $duplicate_Th_Code_checker->bind_param("s", $Thesis_Code);
    $duplicate_Th_Code_checker->execute();
    $result = $duplicate_Th_Code_checker->get_result();

    if($result->num_rows > 0) {
        $_SESSION['status'] = "Thesis Code Already Exists!";
        $_SESSION['status_code'] = "warning";
        $duplicate_Th_Code_checker->close();
        $conn->close();
        header("Location: add-thesis.php");
        exit();
    }
    $duplicate_Th_Code_checker->close();

    $duplicate_Th_Title_checker = $conn->prepare("SELECT * FROM thesis WHERE Th_Title =?");
    $duplicate_Th_Title_checker->bind_param("s", $thesis_Title);
    $duplicate_Th_Title_checker->execute();
    $result_title = $duplicate_Th_Title_checker->get_result();

    if($result_title->num_rows > 0) {
        $_SESSION['status'] = "Thesis Title already exists!";
        $_SESSION['status_code'] = "warning";
        $duplicate_Th_Title_checker->close();
        $conn->close();
        header("Location: add-thesis.php");
        exit();
    }
    $duplicate_Th_Title_checker->close(); 

    $thesis_data = $conn->prepare("INSERT INTO thesis (Th_Code, Th_Title, Th_Abstract, Th_Advisor, Th_Category, 
                                               Th_Course, Th_DateModified, Th_Department, Th_ThematicArea) VALUES (?,?,?,?,?,?,?,?,?)");

    $thesis_data->bind_param("sssssssss", $Thesis_Code, $thesis_Title, $abstract, $advisor, $category, 
                                  $course, $date_Modified, $department_Name, $thematic_Area);

    if ($thesis_data->execute()) {
        $thesis_id = $thesis_data->insert_id;
        $thesis_data->close();

        $author = $conn->prepare("INSERT INTO thesis_author (Th_ID, Th_Code, TH_Author) VALUES (?,?,?)");
        $author->bind_param("iss", $thesis_id, $Thesis_Code, $author_Name); 

        if ($author->execute()) {
            $author->close(); 
            $conn->close(); 
            $_SESSION['status'] = "Thesis Added";
            $_SESSION['status_code'] = "success";
            header("Location: add-thesis.php");
            exit();
        } else {
            echo "Error: ". $author->error;
            $author->close(); 
            $conn->close(); 
        }       
    } else {
        echo "Error: ". $thesis_data->error;
        $thesis_data->close(); 
        $conn->close(); 
    }
} else {
    header("Location: add-thesis.php");
    exit();
}
?>