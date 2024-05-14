<?php
$con = new mysqli('localhost', 'root', '', 'thesis_information');

if (isset($_GET['Th_ID'])) {
    $Thesis_ID = $_GET['Th_ID'];

    $con->begin_transaction();

    // Delete the record in thesis_author
    $deleteAuthor = "DELETE FROM thesis_author WHERE Th_ID = '$Thesis_ID'";
    $Authordelete = mysqli_query($con, $deleteAuthor);

    // Delete the thesis record
    $deleteThesis = "DELETE FROM thesis WHERE Th_ID = '$Thesis_ID'";
    $runThesisDelete = mysqli_query($con, $deleteThesis);

    // Delete record in th_id
    // $deleteId = "DELETE FROM th_id WHERE Th_Code = '$Thesis_Code'";
    // $runThesisDelete = mysqli_query($con, $deleteId);
    //if ($Authordelete && $runThesisDelete)

    if ($runThesisDelete) {
        $con->commit();
        header('location: remove-thesis.php');
        exit; // Exit after successful deletion
    } else {
        $con->rollback();
        echo "Error deleting records: " . mysqli_error($con);
        exit; // Exit if there's an error
    }
}
?>



<!--search .php gfile


<?php
include('dbcon.php');

    $return = '';
    if(isset($_POST['input'])){
        $search = mysqli_real_escape_string($conn, $_POST['input']);
        $query =  "SELECT thesis.*, thesis_author.Th_Author 
                  FROM thesis
                  INNER JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code 
                  WHERE thesis.Th_Code LIKE '%".$search."%' 
                  OR Th_Title LIKE '%".$search."%' 
                  OR Th_Author LIKE '%".$search."%' 
                  OR Th_Course LIKE '%".$search."%' 
                  OR Th_Advisor LIKE '%".$search."%' 
                  OR Th_Category LIKE '%".$search."%' 
                  OR Th_ThematicArea LIKE '%".$search."%' 
                  OR Th_ReservStatus LIKE '%".$search."%'
                  OR Th_DateModified LIKE '%".$search."%'
                  OR Th_Department LIKE '%".$search."%'";
    } else {
      
        $query =  "SELECT thesis.*, thesis_author.Th_Author 
                  FROM thesis
                  INNER JOIN thesis_author ON thesis.Th_Code = thesis_author.Th_Code";
    }

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $return .= '<table border="1" cellspacing="100" cellpadding="100">  
                        <tr class="heading">  
                            <th>#</th>  
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
                    ';

        $i = 1; 
        while ($row = mysqli_fetch_array($result)) {  
            $return .= '<table>
                            <tr class="data">  
                            <td>'.$i++.'</td>  
                            <td>'.$row['Th_Code'].'</td>
                            <td>'.$row['Th_Title'].'</td>
                            <td>'.$row['Th_Author'].'</td>  
                            <td>'.$row['Th_Course'].'</td>    
                            <td>'.$row['Th_Advisor'].'</td>  
                            <td>'.$row['Th_Category'].'</td>
                            <td>'.$row['Th_ThematicArea'].'</td>  
                            <td>'.$row['Th_ReservStatus'].'</td>  
                            <td>'.$row['Th_DateModified'].'</td>    
                            <td>'.$row['Th_Department'].'</td>  
                            <td><span class="delete-link" onclick="confirmDelete('.$row['Th_ID'].')">Delete</span></td>  
                            </tr>
                        ';  
        }
        $return .= '</table>'; 
    } else {
        $return = "<tr><td colspan='6'>No records found</td></tr>";
    }

echo $return;

