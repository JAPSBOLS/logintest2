<?php
    define("GROOT","../");
    include(GROOT."auth.php");
    include(GROOT."includes/header.php");
    include(GROOT."includes/navbar.php");
    include("getReserveList.php")
?>
<title>Pending Reserve Requests</title>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include(GROOT.'includes/topbar.php');?>
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Reservation Requests</h1>
                    </div>


                    <div class="card p-3">
                        <table id="myTable" class="display">
                            <thead>
                                <tr class="heading">
                                    <th>Reserve ID</th>
                                    <th>Thesis Code</th>
                                    <th>Username</th>
                                    <th>User ID</th>
                                    <th>Reserve Date</th>
                                    <th>Return Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <tr class="data">
                                    <td><?php echo $row['Reserv_ID'];?></td>
                                    <td><?php echo $row['Th_Code'];?></td>
                                    <td><?php echo $row['User_Name'];?></td>
                                    <td><?php echo $row['User_ID'];?></td>
                                    <td><?php echo $row['Reserv_Date'];?></td>
                                    <td><?php echo $row['Return_Date'];?></td>
                                    <td><span class="delete-link">Decline</span></td>
                                    <td><span class="delete-link">Accept</span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<?php
    include(GROOT.'includes/footer.php');
    include(GROOT.'includes/scripts.php');
?>
<script>
    const active = document.getElementById('Pendings');
    active.classList.add('active');
</script>
 