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
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

                <script defer src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
                <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
                <script defer src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
                <script defer src='scripts.js'></script>
                        
    </head>  
        <body>  
            <header>THESIS LIST</header>  

            <div class="table-container" style="overflow-x: auto;">
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
                            <td><span class="delete-link" onclick="confirmDelete(<?php echo $row['Th_ID'];?>)"><i class="fas fa-trash"></i>Delete</span></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>

            <!-- Confirmation Dialog -->
            <div id="confirmation-dialog" class="confirmation-dialog">
                <div class="confirmation-dialog-content">
                    <p>Are you sure you want to delete this thesis?</p>
                    <div class="confirmation-dialog-buttons">
                        <button onclick="" id="delete-button"><i class="fas fa-trash"></i> Delete</button>
                        <button onclick="closeDialog()"><i class="fas fa-times"></i> Cancel</button>
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
</html>
<?php
    
    include "../includes/scripts.php";
    include "../includes/footer.php";
?>>
<script>
    const Management = document.getElementById('ManagementSidebar');
    const AddThesis = document.getElementById('RemoveThesisSidebar');
    Management.classList.add('active');
    AddThesis.classList.add('active');
</script>


