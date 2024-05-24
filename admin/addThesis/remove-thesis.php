<?php
        include('../config/dbconn.php');
        $query = "SELECT thesis.*, thesis_author.Th_Author 
                FROM thesis 
                INNER JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code";

        $run = mysqli_query($conn, $query);
        if(isset($_POST['btn'])){
            header("Location: add-thesis.php");
            exit();
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thesis List</title>
        
        <link href="DataTables/datatables.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="DataTables/datatables.min.js"></script>
        <script src='scripts.js'></script>
        
    </head>
    <body>
        <header>THESIS LIST</header>
        <table id="myTable" class="display">
            <thead>
                <tr class="heading">
                    <th>Thesis Code</th>
                    <th>Thesis Title</th>
                    <th>Author Name</th>
                    <th>Course</th>
                    <th>Advisor</th>
                    <th>Category</th>
                    <th>Thematic Area</th>
                    <th>Reserve Status</th>
                    <th>Date Modified</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($run)) {
                ?>
                <tr class="data">
                    <td><?php echo $row['Th_Code'];?></td>
                    <td><?php echo $row['Th_Title'];?></td>
                    <td><?php echo $row['Th_Author'];?></td>
                    <td><?php echo $row['Th_Course'];?></td>
                    <td><?php echo $row['Th_Advisor'];?></td>
                    <td><?php echo $row['Th_Category'];?></td>
                    <td><?php echo $row['Th_ThematicArea'];?></td>
                    <td><?php echo $row['Th_ReservStatus'];?></td>
                    <td><?php echo $row['Th_DateModified'];?></td>
                    <td><?php echo $row['Th_Department'];?></td>
                    <td><span class="delete-link" onclick="confirmDelete(<?php echo $row['Th_ID'];?>)">Delete</span></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <form class="return-form" action="add-thesis.php" method="POST">
            <button type="submit" class="btn" name="btn">
                RETURN TO ADDTHESIS TAB ?
            </button>
        </form>
        <!-- Confirmation Dialog -->
        <div id="confirmation-dialog" class="confirmation-dialog">
            <div class="confirmation-dialog-content">
                <p>Are you sure you want to delete this thesis?</p>
                <div class="confirmation-dialog-buttons">
                    <button onclick="" id="delete-button">Delete</button>
                    <button onclick="closeDialog()">Cancel</button>
                </div>
            </div>
        </div>
    </body>
</html>