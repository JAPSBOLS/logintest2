<?php
$con = new mysqli('localhost', 'root', '', 'thesis informatios');

$query = "SELECT * FROM data";  
$run = mysqli_query($con, $query);  
?>  
<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="utf-8">  
    <title>Thesis List</title>  
    <link rel="stylesheet" type="text/css" href="styleforRemove.css">  
</head>  
<body>  
    <header>THESIS LIST</header>  
    <table border="1" cellspacing="0" cellpadding="0">  
        <tr class="heading">  
            <th>ID</th>  
            <th>Thesis Title</th>  
            <th>Author Name</th>  
            <th>Department Name</th>  
            <th>Date Published</th>  
        </tr>  
        <?php   
        $i = 1; 
        if ($run && mysqli_num_rows($run) > 0) {  
            while ($result = mysqli_fetch_assoc($run)) {  
                echo "<tr class='data'>  
                    <td>".$i++."</td>  
                    <td>".$result['thesis_Title']."</td>  
                    <td>".$result['author_Name']."</td>  
                    <td>".$result['department_Name']."</td>  
                    <td>".$result['date_Published']."</td>  
                    <td><a href='delete.php?id=".$result['id']."' id='btn'>Delete</a></td>  
                </tr>";  
            }  
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>  
    </table>  

    <form class="return-form" action="add-thesis.php" method="POST">  
        <button type="submit" class="btn" name="btn">
            RETURN TO ADD THESIS TAB?
        </button>
    </form>

    <?php
    if(isset($_POST['btn'])){
        header("Location: add-thesis.php");
        exit();
    }
    ?>
</body>  
</html>
