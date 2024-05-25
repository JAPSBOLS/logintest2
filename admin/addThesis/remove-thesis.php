<?php
         define("GROOT","../");
         include "../auth.php";
          include "../includes/header.php";
         include "../includes/navbar.php";
$con = new mysqli('localhost', 'root', '', 'archive system 2');

$query = "SELECT thesis.*, thesis_author.Th_Author 
          FROM thesis
          INNER JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code";
  
$run = mysqli_query($con, $query);  
?>  

<title>BU Online Library Dashboard</title>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('../includes/topbar.php');
                ?>
            
                <!-- Begin Page Content -->
                <div class="container-fluid">
        <link rel="stylesheet" type="text/css" href="styleforRemove.css">  
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <link href="DataTables/datatables.min.css" rel="stylesheet">
    
        <script src="DataTables/datatables.min.js"></script>

    

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            });
            function confirmDelete(id) {
                document.getElementById('confirmation-dialog').style.display = 'block';
                document.getElementById('delete-button').onclick = function() {
                window.location.href = 'delete.php?Th_ID=' + id;
                };
            }
            function closeDialog() {
                document.getElementById('confirmation-dialog').style.display = 'none';
            }
        </script>


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

            <!--Return to Add-Thesis-->
            
            <form class="return-form" action="add-thesis.php" method="POST">  
                <button type="submit" class="btn" name="btn">
                    RETURN TO ADD THESIS TAB ?
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

            <?php
            if(isset($_POST['btn'])){
                header("Location: add-thesis.php");
                exit();
            }
            ?>
        </body>  

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>

</html>
<?php
    // Kapag ininclude to scripts nawawala yung serach and pagination
    include "../includes/scripts.php";
    include "../includes/footer.php";
?>>
<script>
    const Management = document.getElementById('ManagementSidebar');
    const AddThesis = document.getElementById('RemoveThesisSidebar');
    Management.classList.add('active');
    AddThesis.classList.add('active');
</script>


