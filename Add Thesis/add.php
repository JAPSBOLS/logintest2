<?php 
    // Check if form is submitted
    if(isset($_POST['submit'])){
        // Get form data
        $thesis_Title = $_POST['thesis_Title'];
        $author_Name = $_POST['author_Name'];
        $department_Name = $_POST['department_Name'];
        $indicators = $_POST['indicators'];
        $abstract = $_POST['abstract'];
        //Storing Dates in PHP
        $date_Published = $_POST['date_Published'];

        //Separating Keywords
        $keywords = $_POST['keywords'];
        $keywordArray = explode(',', $keywords);
        
        //Database Connection Below
        $con = new mysqli('localhost', 'root', '', 'thesis informatios');
        // Check connection
        if($con->connect_error) {
            die('Error: ' . $con->connect_error);
        }

        // Prepare and bind
        $stmt = $con->prepare("INSERT INTO data (thesis_Title, author_Name, department_Name, date_Published, indicators, abstract) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $thesis_Title, $author_Name, $department_Name, $date_Published, $indicators, $abstract);

        // Execute the statement
        if ($stmt->execute()) {
            // id nung bagong lagay na thesis   
            $thesis_id = $con->insert_id;

            // Insert keywords associated with the thesis
            $stmt_keywords = $con->prepare("INSERT INTO keywords (thesis_id, keyword) VALUES (?, ?)");
            $stmt_keywords->bind_param("is", $thesis_id, $keyword);

            foreach ($keywordArray as $keyword) {
                // Bind the keyword parameter and execute the statement
                $keyword = trim($keyword); // Trim whitespace from the keyword
                $stmt_keywords->execute();
            }
            $stmt_keywords->close();
            $con->close();

            header("Location: add-thesis.php?success=true");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $con->close();
    } else {
        // Redirect if accessed directly without submitting the form
        header("Location: add-thesis.php");
        exit();
    }
?>
