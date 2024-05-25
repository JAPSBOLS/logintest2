<?php
        define("GROOT","../");
        include('../config/dbconn.php');
        include(GROOT."auth.php");
        include(GROOT."includes/header.php");
        include(GROOT."includes/navbar.php");
        $fullname = $_SESSION['user']['fname']." ". $_SESSION['user']['lname'];
        $query = "SELECT * from reservation WHERE User_Name = '$fullname'";
        $run = mysqli_query($conn, $query);


?>
<!-- Magg add na ika ning incrementation puonsa 1000 para sa User_ID -->

<title>My Reservations</title>
<script src="ok.js"></script>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include(GROOT.'includes/topbar.php');?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Reserved Thesis</h1>
                </div>

                <div class="card p-3">
                        <table id="myTable" class="display">
                            <thead>
                                <tr class="heading">
                                    <th>Thesis Code</th>
                                    <th>Reserve Date</th>
                                    <th>Return Date</th>
                                    <th>Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <tr class="data">
                                    <td><a href="../thesisDisplay/thesisdetails.php?Th_Code=<?php echo $row['Th_Code'];?>">
                                        <?php echo $row['Th_Code'];?>
                                    </a></td>
                                    <td><?php echo $row['Reserv_Date'];?></td>
                                    <td><?php echo $row['Return_Date'];?></td>
                                    <td><?php echo $row['Status'];?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
<?php
    include(GROOT.'includes/footer.php');
    include(GROOT.'includes/scripts.php');
?>
<script>
    const active = document.getElementById('myReservations');
    active.classList.add('active');
</script>               
</html>