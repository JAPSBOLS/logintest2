<?php
        include('../config/dbconn.php');
        $query = "SELECT * from reservation";

        $run = mysqli_query($conn, $query);
        if(isset($_POST['btn'])){
            header("Location: add-thesis.php");
            exit();
        }
?>
<!-- Magg add na ika ning incrementation puonsa 1000 para sa User_ID -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="reservedList.css">
        <link href="DataTables/datatables.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="DataTables/datatables.min.js"></script>
        <script src='scripts.js'></script>
        
    <title>Reservation</title>
</head>
<body>
    <header>Reserved List</header>
        <form class="form" action="">
            <table id="myTable" class="display">
                <thead>
                    <tr class="heading">
                        <th>Thesis Code</th>
                        <th>Username</th>
                        <th>Reserve Date</th>
                        <th>Return Date</th>
                        <th>Change Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($run)) {
                    ?>
                    <tr class="data">
                        <td><?php echo $row['Th_Code'];?></td>
                        <td><?php echo $row['User_Name'];?></td>
                        <td><?php echo $row['Reserv_Date'];?></td>
                        <td><?php echo $row['Return_Date'];?></td>
                        <td><span class="available_link" onclick="">To Available</span>
                            <span class="notAvailable_link" onclick="">Not Available</span>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
        </table>
        </form>
</body>
</html>