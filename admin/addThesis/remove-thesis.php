<?php
$con = new mysqli('localhost', 'root', '', 'thesis_information');

$query = "SELECT thesis.*, thesis_author.Th_Author 
          FROM thesis
          INNER JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code";
  
$run = mysqli_query($con, $query);  
?>  


<!DOCTYPE html>  
<html>  
    <head>  
        <meta charset="utf-8">  
        <title>Thesis List</title>  
        <link rel="stylesheet" type="text/css" href="styleforRemove.css">  
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    

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

            <!--Search Feature-->
            <form class="search-form">
                <div class="search-box">
                    <div class="form-outline">
                        <input type="text" placeholder="Search" id="search"/>
                    </div>
                </div>
            </form>
            
            <!--Display REsults-->
            <div id="result"> </div>
            
            <!--Pagination-->
            <form >
                        <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                    </nav>
            </form>

            
            <!--Return to Add-Thesis-->
            
            <form class="return-form" action="add-thesis.php" method="POST">  
                <button type="submit" class="btn" name="btn">
                    RETURN TO ADD THESIS TAB ?
                </button>
            </form>


            <script>
                $(document).ready(function(){
                load_data(); 
                function load_data(query){
                    $.ajax({
                        url:"search.php",
                        method:"POST",
                        data:{input: query},
                        success:function(data){
                            $("#result").html(data);
                        }
                    }); 
                }
                $("#search").keyup(function(){
                    var search = $(this).val();
                    load_data(search);
                });
                load_data(""); });
            </script>


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
</html>




