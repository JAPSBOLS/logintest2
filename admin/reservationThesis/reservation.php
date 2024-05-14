<?php 

    session_start();

    // Check if form is submitted
    if(isset($_POST['submit'])){
        // Get form data
        $thesis_Title = $_POST['thesis_title'];
        $author_Name = $_POST['author_name'];
        $published_year = $_POST['published_year'];
        $thesis_code = $_POST['thesis_code'];
        $department = $_POST['department'];
        $reservation_date = $_POST['reservation_date'];

        //Database Connection Below
        $con = new mysqli('localhost', 'root', '', 'thesis_information');

        if($con->connect_error) {
            die('Error: ' . $con->connect_error);
        }

        $thesis_data = $con->prepare("INSERT INTO reservation (thesis_title, author_name, published_year, thesis_code, department, reservation_date) VALUES (?, ?, ?, ?, ?, ?)");
        $thesis_data->bind_param("ssssss", $thesis_Title, $author_Name, $published_year, $thesis_code, $department, $reservation_date);
        
        if ($thesis_data->execute()) {
            // id nung bagong lagay na thesis   
            $Thesis_ID = $con->insert_id;

            // issend anf thesis id tas author sa ibang table
            $author = $con->prepare("INSERT INTO thesis_author (Thesis_ID, TH_Author) VALUES (?, ?)");
            $author->bind_param("is", $Thesis_ID, $author_Name);
            $author->execute();
            $author->close();
            $con->close();
            header("Location: index.php");
            exit();

        } else {
            echo "Error: " .$thesis_data->error;
        }

        $thesis_data->close();
        $con->close();
    } else {
        //access directly without submitting the form
        header("Location: index.php");
        exit();
    }
?>